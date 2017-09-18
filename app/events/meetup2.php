<?php
  
require_once('../vendor/autoload.php');
require_once('./config.php');

use DMS\Service\Meetup\MeetupKeyAuthClient;

  
//  Try to get data from meetup  
try
{
  $cache_file = './cache/cache_file.txt';

  if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 5 ))) {
     // Cache file is less than five minutes old. 
     // Don't bother refreshing, just use the file as-is.
     $file = file_get_contents($cache_file);
  } else {
  
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

  // Decode the json back into an array
  $events = json_decode($file,true);

  foreach($events as $event)
  {
    include('event_template.php');
  }

  
}
catch (\Exception $e)
{
  echo $e->getMessage();
}


  
