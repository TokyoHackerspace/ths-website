<?php
  require_once(APP_DIR . '/events/eventsLib.php');

  // Because this page is included from within a function we need to grab
  // the global event count and set it to 0
  global $eventCount;
  $eventCount = 0;

?>
    <div class="regular-blog-wrap featured-posts-thumbnails">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <?php 
              $event = get_next_event($events);
              include(APP_DIR . '/events/templates/event_tile_large.php');
            ?>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
              <div class="col-sm-6">
                <?php 
                  $event = get_next_event($events);
                  include(APP_DIR . '/events/templates/event_tile_small.php');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>