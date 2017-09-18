  <?php
  require_once(APP_DIR . '/events/eventsLib.php');
  ?>

<div class="regular-blog-wrap">
  <div class="container" id="scrollspy-bars">
    <div class="row">
        <div class="col-lg-9 col-sm-8">
          <h3>Events List</h3>
          <div class="row">
            <div class="col-md-12">
              <div class="description">
                <?php include_once(APP_DIR . "/templates/" . $lang . "/event_headline_description.html"); ?>
              &nbsp;
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php foreach($events as $event)
                    {
                      include(APP_DIR . '/events/templates/event_list_section.php');
                    }
              ?>
              <hr style="border: 1px solid black !important; ">
            </div>
          </div>
          <nav class="navigation pagination">
            <div class="nav-links">
              <?php for($i = 1; $i <= $pageCount; $i++): ?>
                <?php if($i == $page): ?>
                <span class="page-numbers current"><span class="meta-nav screen-reader-text">Page </span><?php echo $i ?></span>
                <?php else: ?>
                <a class="page-numbers" href="/<?php echo $locale ?>/events?page=<?php echo $i ?>"><span class="meta-nav screen-reader-text">Page </span><?php echo $i ?></a>
                <?php endif; ?>
              <?php endfor; ?>
            </div><!-- nav-links -->
          </nav>
        </div>
        <!-- div class="col-lg-3 col-sm-4 fix-top-mobile"  ng-include="'/assets/templates/common/sidebar.html'"></div -->
      </div>
  </div>
</div>