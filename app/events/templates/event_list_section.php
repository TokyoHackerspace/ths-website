<h5 id="<?php echo urlencode($event['id']); ?>"><a href="/<?php echo $locale; ?>/event/<?php echo urlencode($event['id']); ?>/<?php echo urlencode($event['name']); ?>"><?php echo $event['name']; ?></a></h5>
<p><div class="date-block">
    <ul>
      <li><?php echo date('F d', ($event['time']/1000))?></li>
      <li><?php echo date('H:i', ($event['time']/1000))?></li>
    </ul>  
  </div><?php echo $event['description']; ?></p>
<br>&nbsp;<br>




