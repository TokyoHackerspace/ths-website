<?php

$routes = array(
  '/en/membership' => array('action' => 'display', 'page' => 'english/membership.php', 'title' => 'Membership'),
  '/ja/membership' => array('action' => 'display', 'page' => 'japanese/membership.php', 'title' => '会員であること'),
  '/en/access' => array('action' => 'display', 'page' => 'english/access.php', 'title' => 'Access'),
  '/ja/access' => array('action' => 'display', 'page' => 'japanese/access.php', 'title' => 'アクセス'),
  '/en/events' => array('action' => 'display', 'page' => 'english/events.php', 'title' => 'Events'),
  '/ja/events' => array('action' => 'display', 'page' => 'japanese/events.php', 'title' => 'イベント'),
  '/en/event' => array('action' => 'display', 'type'=> 'match', 'page' => 'english/event.php'),
  '/ja/event' => array('action' => 'display', 'type'=> 'match', 'page' => 'japanese/event.php'),
  '/en' => array('action' => 'display', 'page' => 'english/home.php', 'title' => ''),
  '/ja' => array('action' => 'display', 'page' => 'japanese/home.php', 'title' => ''),
  '/' => array ('action' => 'redirect', 'uri_path' => '/ja')
);
