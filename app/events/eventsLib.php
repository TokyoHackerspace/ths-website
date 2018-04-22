<?php
  
require_once(realpath(APP_DIR . '/vendor/autoload.php'));
require_once(APP_DIR .'/events/config.php');

use DMS\Service\Meetup\MeetupKeyAuthClient;

// Tranform the meetup timestamp to a string.
function meetupTimeToString($format, $meetupTimeStamp, $meetupOffset)
{
  return date($format, ($meetupTimeStamp/1000) + ($meetupOffset/1000) ); 
}

// Formate the meetup event menu
function meetupVenu($venue)
{
  $html = $venue['name'].'<br>';
  $html .= $venue['address_1'].'<br>';
  if(isset($venue['address_2']))
  {
    $html .= $venue['address_2'].'<br>';
  }
  $html .= $venue['city'].'<br>';
  return $html;
}

// Get the image for the event from the csv file.
function getImageForEvent($eventName, $fileContents)
{
  $imageName = 'default.jpg';


  if(is_array($fileContents))
  {
    foreach($fileContents as $fileLine)
    {
      $csvLine = str_getcsv($fileLine, ":");
      if($csvLine[0] == $eventName)
      {
        $imageName = $csvLine[2];
      }
    }
  }
  
  return $imageName;
}

function get_next_event($events)
{
  global $eventCount;
  if(count($events) > $eventCount)
  {
    return $events[$eventCount++];
  }
  return array();
}
  
//  Try to get data from meetup  
try
{
  $cache_file = APP_DIR . '/events/cache/cache_file.txt';
  $csvFile =  APP_DIR . '/events/images.csv';
  $eventsPerPage = 10;
  $pathLang = (isset($_GET['pathLang'])) ? $_GET['pathLang'] : "ja";

  // If the file is readable get the contents otherwise set as empty array.
  $fileContents = (is_readable($csvFile)) ? file($csvFile) : array();

  // If the cache file is recent then get the cache.
  if ((!isset($_GET['recache'])) && (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 60 * 24 ))))
  {
     // Cache file is less than five minutes old. 
     // Don't bother refreshing, just use the file as-is.
     $file = file_get_contents($cache_file);
     
  // If the cachefile is not recent the rebuild it.
  } else {
  
    try {
      // Create a client.
      $client = MeetupKeyAuthClient::factory(array('key' => $apiKey));

      //Retrieve the Command from Guzzle
      $command = $client->getCommand('GetGroup', array('urlname' => 'TokyoHackerspace'));
      $command->prepare();

      // Get the response.
      $response = $command->execute();
      $groupData = $response->getData();

      //Retrieve the Command from Guzzle
      $command = $client->getCommand('GetEvents', array('group_id' => $groupData['id']));
      $command->prepare();

      // Get the response.
      $response = $command->execute();
      $events = $response->getData();

       // Our cache is out-of-date, so load the data from our remote server,
       // and also save it over our cache for next time.
       file_put_contents($cache_file, json_encode($events, true), LOCK_EX);
       $file = file_get_contents($cache_file);
    }
    catch (\Exception $e)
    {
      echo "Unable to connect to MeetupAPI, it's probably an invalid API Key.";
    }
  }
  
  // Decode the json back into an array
  $events = json_decode($file, true);

  // If more than 10 events then we'll build an array of 10 events.
  if(count($events) > 10)
  {
    if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==""))
    {
      $page = 1;
    }
    else
    {
      $page = $_GET['page'];
    }

    // Figure out how many pages of events we have...
    $pageCount = ceil(count($events) / $eventsPerPage);
    $eventSlice = array_slice($events, ($eventsPerPage * ($page-1)), $eventsPerPage);
    $events = $eventSlice;
  }

  $newEvents = array();
  if(is_array($events))
  {
    foreach($events as $event)
    {
      $event['image'] = getImageForEvent($event['name'], $fileContents);
      $newEvents[] = $event;
    }
  }
  
  // Update the events array
  $events = $newEvents;

}
catch (\Exception $e)
{
  echo $e->getMessage();
}
