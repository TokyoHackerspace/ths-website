<?php

$routes = array(
  '/en/membership' => array('action' => 'display', 'page' => 'english/membership.php'),
  '/ja/membership' => array('action' => 'display', 'page' => 'japanese/membership.php'),
  '/en/access' => array('action' => 'display', 'page' => 'english/access.php'),
  '/ja/access' => array('action' => 'display', 'page' => 'japanese/access.php'),
  '/en/events' => array('action' => 'display', 'page' => 'english/events.php'),
  '/ja/events' => array('action' => 'display', 'page' => 'japanese/events.php'),
  '/en/event' => array('action' => 'display', 'type'=> 'match', 'page' => 'english/event.php'),
  '/ja/event' => array('action' => 'display', 'type'=> 'match', 'page' => 'japanese/event.php'),
  '/en' => array('action' => 'display', 'page' => 'english/home.php'),
  '/ja' => array('action' => 'display', 'page' => 'japanese/home.php'),
  '/' => array ('action' => 'redirect', 'uri_path' => '/ja')
);
