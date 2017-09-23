  <a href="<?php echo $locale ?>/event/<?php echo urlencode($event['id']); ?>/<?php echo urlencode($event['name']); ?>"><img src="/assets/images/events/<?php echo urlencode($event['image']); ?>" width="570" height="373" alt="" class="img-responsive"></a><!-- img-responsive -->
  <div class="post-info">
    <h2 class="entry-title"><a href="/<?php echo $locale; ?>/event/<?php echo urlencode($event['id']); ?>/<?php echo urlencode($event['name']); ?>"><?php echo $event['name']; ?></a></h2><!-- entry-content -->
    <ul class="entry-meta list-inline">
        <li><?php echo meetupTimeToString("l F dS, Y", $event['time'], $event['utc_offset']); ?></li>
        <li><i class="fa fa-meetup" aria-hidden="true"></i> <?php echo $event['yes_rsvp_count'] ?></li>
    </ul><!-- entry-meta -->
  </div><!-- post-info -->


<!-- |  date:'dd MMMM yyyy @ h:mma' -->