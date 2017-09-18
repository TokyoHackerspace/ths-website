<?php

define('APP_DIR',__DIR__);
require_once(APP_DIR . '/lib/includes.inc.php');
require_once(APP_DIR . '/routes.inc.php');

// Make sure we have our pieces
list($lang, $locale, $route, $queryString) = array_pad(parseRequestUri(), 4, null);

// Process the global $route
processRoute();