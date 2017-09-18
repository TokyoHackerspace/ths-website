<?php
  
require_once('../vendor/autoload.php');
require_once('./config.php');

use DMS\Service\Meetup\MeetupKeyAuthClient;

  
//  Try to get data from meetup  
try
{
  
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

  // Create json to return to the angular script
  echo json_encode($events);
  
}
catch (\Exception $e)
{
  echo $e->getMessage();
}
  
