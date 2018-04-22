<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?> Tokyo Hackerspace</title>

    <link rel=icon href="/assets/images/ths-favicon-circle.png">
    <link rel="apple-touch-icon" href="/assets/images/ths-favicon-square.png" />

    <!-- Bootstrap & Other CSS -->
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:300,400,700" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/style.min.css" rel="stylesheet">
    <link href="/assets/css/firefox.css" rel="stylesheet">
    <link href="/assets/css/ths-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="h-style-2">
  <?php $status = get_hackerspace_status(); ?>
  <div class="container">
   <?php if(is_file(APP_DIR . '/templates/' . $lang . '/statuses/' . $status .'.html'))
   {
     include(APP_DIR . '/templates/' . $lang . '/statuses/' . $status .'.html');
   }  ?>
  </div>
  <div class="menu-wrap nicescroll">
    <nav class="menu">
      <aside class="side-menu visible-xs visible-sm">
        <ul class="list-unstyled">
          <?php include(APP_DIR . '/templates/' . $lang . '/common/navigation.html'); ?>
        </ul><!-- list-unstyled -->
        <ul class="list-unstyled">
          <?php include(APP_DIR . '/templates/common/lang-selector.html'); ?>
        </ul>
        <ul class="list-unstyled">
          <li class="social-nav">
            <?php include(APP_DIR . '/templates/common/social_links.html'); ?>
          </li>
        </ul>
      </aside><!-- side-menu -->
    </nav><!-- menu -->
    <button class="close-button hidden-xs" id="close-button">Close Menu</button>
  </div>
  <div id="site-header" class="header-style-2">
    <div class="nav-pages-social hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <ul class="nav navbar-nav">
              <?php include(APP_DIR . '/templates/' . $lang . '/common/navigation.html'); ?>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="nav navbar-nav menu-right">
              <li class="social-nav">
                <?php include_once(APP_DIR . '/templates/common/social_links.html'); ?>
              </li>
              <li class="search-nav menu-item-has-children">
                <ul>
                  <?php include(APP_DIR . '/templates/common/lang-selector.html'); ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- nav-pages-social -->
    <div class="logo-advert">
      <div class="container">
        <div class="row">
        </div>
        <div class="row">
          <div class="row-table-desktop">
            <div class="col-sm-3 col-md-4 col-lg-4 col-xs-12 col col-vm">
              <div class="navbar-header">
                <button type="button" class="toggle-categories menu-button visible-xs" id="open-button"><i class="fa fa-bars"></i><span>Menu</span></button><!-- toggle-categories -->
                <a class="navbar-brand" href="/<?php echo $locale; ?>"><img src="/assets/svg/thslogo.svg" alt="Tokyo Hackerspace" title="Tokyo Hackerspace"></a>
              </div>
            </div>
            <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12 hidden-xs col col-vm text-right">
              <!-- <a href="#"><img src="http://placehold.it/970x90/cecece?text=Advertisement+(970x90)" width="970" height="90" alt=""></a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of base_header.html -->
