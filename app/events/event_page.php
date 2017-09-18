<?php
  
  require_once('eventsLib.php');
  
  // Find our events.
  foreach($events as $idx => $event)
  {
    if($event['id'] == $urlParams[0])
    {
      break;
    }
  }
  ?>
    <div class="invert-bg-light regular-blog-wrap category-cardview">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <div class="row row-10">

                        <!-- Category Information
                        ============================================= -->
                        <div class="col-sm-12">
                            <!-- Heading
                            ============================================= -->
                            <div class="section-heading">
                              <h2 class="mh"><?php echo $event['name']; ?></h2>
                            </div>
                    
                            <!-- Description
                            ============================================= -->
                            <div class="single-entry-content">
                              <div class="rsvp-widget">
                                <ul>
                                  <li>
                                    <strong>When?</strong><br>
                                    <?php echo meetupTimeToString("l F dS, Y", $event['time'], $event['utc_offset']); ?></li>
                                  <li>
                                    <br>
                                    <strong>Where?</strong><br>
                                    <?php echo meetupVenu($event['venue']); ?>
                                  </li>
                                  <li>
                                    <br>
                                    <a href="https://www.meetup.com/TokyoHackerSpace/events/<?php echo $event['id']; ?>/" class="btn btn-light-brown" style="color: #fff;" target="_blank"><i class="fa fa-meetup"></i> RSVP on Meetup!</a></li>
                                </ul>
                              </div>
                              <?php echo $event['description']; ?>
                              <!-- the clear is here so the text wraps around the RSVP widget but gets cleared afterwards -->
                              <hr>
                            </div>
                        </div>
                        
                        <!-- pre>
                        <?php // print_r($event); ?>
                        </pre -->

                       
                        <?php // Next 3 events advertised below 
                        for($i = ($idx+1); $i < ($idx+4); $i++): ?>
                        <!-- div class="col-sm-4 col">
                            <div class="cardview-post wow zoomIn">
                                <div class="post-thumbnails">
                                    <a href="#"><img src="http://placehold.it/290x203" width="290" height="203" alt="" class="img-responsive"></a>
                                </div>
                                <div class="post-info">
                                    <h2 class="entry-title"><a href="#">Donec eleifend, nunc ac egestas facilisis, nunc ex feugiat odio</a></h2>
                                    <ul class="entry-meta list-inline">
                                        <li>18 July 2016</li>
                                        <li><i class="fa fa-heart-o"></i> 13</li>
                                        <li><i class="fa fa-eye"></i> 1,684</li>
                                        <li><i class="fa fa-comment"></i> 3</li>
                                    </ul>
                                </div>
                            </div>
                        </div -->
                        <?php endfor; ?>
                    </div>
                </div>
                
                <!-- sidebar starts here -->
                <div class="col-lg-3 col-md-3 col-sm-4 fix-top-mobile">
                  <!-- 
                    <aside class="widget widget-advert wow jello">
                        <div class="widget-title-wrap">
                            <span class="widget-title">Advertisement</span>
                        </div>
                        <a href="#"><img width="250" height="250" src="http://placehold.it/250x250/cecece?text=Ad+(250x250)" class="img-responsive" alt=""></a>
                    </aside>

                    <aside class="widget widget-feedburner wow slideInRight">
                        <div class="widget-title-wrap">
                            <span class="widget-title">Subscribe Email</span>
                        </div>
                        <p>We will not sell, trade, share or rent your email address.</p>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                            <button class="btn btn-light-brown"><i class="fa fa-send"></i> Subscribe</button>
                        </form>
                    </aside>
                  -->
                </div>
            </div>
        </div>
    </div>
