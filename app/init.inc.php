<?php

define('APP_DIR',__DIR__);

// Check if the app dir exists
if(file_exists(APP_DIR))
{
  // Make sure the file cache exists if not then create it.
  if(!file_exists(APP_DIR . '/events/cache/status.txt'))
  {
    touch(APP_DIR . '/events/cache/status.txt');
  }
  
  require_once(APP_DIR . '/lib/includes.inc.php');
  require_once(APP_DIR . '/routes.inc.php');

  // Make sure we have our pieces
  list($lang, $locale, $route, $queryString) = array_pad(parseRequestUri(), 4, null);

  // Process the global $route
  processRoute();

}
else
{
  echo "No application directory exists";
}



