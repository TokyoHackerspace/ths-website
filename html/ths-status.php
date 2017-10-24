<html>
  <title></title>
  <link href="/assets/css/bootstrap.new.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <body>
<?php

$openIconClass = "";
$closeIconClass = "";
$classIconClass = "";
$typhoonIconClass = "";

$cacheFile = dirname(__DIR__) . '/app/events/cache/status.txt';

if(is_writable($cacheFile))
{
  if(isset($_GET['toggle']))
  {
    switch($_GET['toggle'])
    {
      case 'open':
        $status = 'open';
        $openIconClass="glyphicon glyphicon-star";
        break;
      case 'close':
        $status = 'closed';
        $closeIconClass="glyphicon glyphicon-star";
        break;
      case 'class':
        $status = 'class';
        $classIconClass="glyphicon glyphicon-star";
        break;
      case 'typhoon':
        $status = 'typhoon';
        $typhoonIconClass="glyphicon glyphicon-star";
        break;
      default:
        echo "Invalid selection, please choose 'open', 'class', 'closed', 'typhoon'.<br><br>";
        exit();
    }

    $fh = fopen($cacheFile, "w");
    fwrite($fh, $status);
    fclose($fh);
  }


  if(is_readable($cacheFile))
  {
    $status = file($cacheFile)[0];

    switch($status){
      case 'open':
        $openIconClass="glyphicon glyphicon-star";
        break;
      case 'closed':
        $closeIconClass="glyphicon glyphicon-star";
        break;
      case 'class':
        $classIconClass="glyphicon glyphicon-star";
        break;
      case 'typhoon':
        $typhoonIconClass="glyphicon glyphicon-star";
        break;
    }
  }

  ?>
  <div class="row">
    <div class="col-md-12" style="text-align: center">
      <br><br>
      <a class="btn btn-lg btn-success" href="/ths-status.php?toggle=open">Open the hackerspace <span class="<?php echo $openIconClass; ?>"></span></a><br><br><br>
      <a class="btn btn-lg btn-primary" href="/ths-status.php?toggle=class">Open the hackerspace for a class <span class="<?php echo $classIconClass; ?>"></span></a><br><br><br>
      <a class="btn btn-lg btn-danger" href="/ths-status.php?toggle=close">Close the hackerspace <span class="<?php echo $closeIconClass; ?>"></span></a><br><br><br>
      <a class="btn btn-lg btn-warning" href="/ths-status.php?toggle=typhoon">Typhoon the hackerspace <span class="<?php echo $typhoonIconClass; ?>"></span></a><br>

    </div>
  </div>
  <?php

}
else
{
  echo "Status cache file is unwritable";
}
?>
  </body>
</html>

