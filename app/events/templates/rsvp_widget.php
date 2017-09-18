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
                                    <a href="https://www.meetup.com/TokyoHackerSpace/events/<?php echo $event['id']; ?>/" class="btn btn-light-brown" style="color: #fff;"><i class="fa fa-meetup"></i> RSVP on Meetup!</a></li>
                                </ul>
                              </div>
