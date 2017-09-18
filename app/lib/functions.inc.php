<?php
 
/**
 * Function parses the request_URI and returns the route and the query string in an array
 */ 
function parseRequestUri()
{

  list($path, $qs) = array_pad(explode("?", $_SERVER["REQUEST_URI"], 2), 2, null);
  parse_str($qs, $output);

  switch(substr($path, 1,2))
  {
    case 'en':
      $lang='english';
      break;
    case 'ja':
      $lang='japanese';
      break;
    default:
      $lang='';
  }

  return array(
    $lang,
    $locale = getLocaleFromLanguage($lang),
    $path,
    $output
  );

}

/**
 * Function processes the route and takes action based on the route definition
 */ 
function processRoute()
{
  global $route, $routes, $lang, $locale;
  
  if(isset($routes[$route]))
  {
    $routeDefinition = $routes[$route];

    switch($routeDefinition['action'])
    {
      case 'redirect':
        header("Location: " . $routeDefinition['uri_path'] . "\n\n");
        exit();
      case 'display':
        include_once(APP_DIR . "/pages/" . $routeDefinition['page']);
      }
  }
  else
  {
    processMatchRoutes();
  }
  exit();
}

function processMatchRoutes()
{
  global $route, $routes, $lang, $locale;
  
  // Place to put all matches
  $allMatches = array();

  foreach($routes as $key => $val)
  {
    $expression = $key;

    // match the route to the availalbe rountes
    $expression = "/^" . str_replace('/', '\/', $key) . ".*/";
    $hasMatch = preg_match($expression, $route, $matches);

    if($hasMatch)
    {
      array_push($allMatches, $key);
    }
  }
  
  // Get lengths of array nodes and store in $lengths array 
  $lengths = array_map('strlen', $allMatches);
  $key = array_search(max($lengths), $lengths);
  $routeDefinition = $routes[$allMatches[$key]];
  
  // Get the additional params from the URI
  $paramsString =  str_replace($allMatches[$key], "", $route);

  if(substr($paramsString, 0 , 1) == "/")
  {
    $urlParams = explode('/', substr($paramsString, 1));
  }
  
  include_once(APP_DIR . "/pages/" . $routeDefinition['page']);

}


function getLocaleFromLanguage($lang)
{
  switch($lang)
  {
    case 'english':
      return 'en';
    default:
      return 'ja';
  };
}