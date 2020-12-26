<!DOCTYPE html>
<html>
<head>
<title>Web Snapshot</title>
<style>
</style>
</head>
<body>

<h1>Web Snapshot</h1>
<!-- <p>This is a paragraph.</p> -->
<form action="" id="form1">
  <label for="fname">URL:</label>
  <input type="text" id="url" name="url">
  <input type="submit" value="Snapshot"><br>
</form>
<?php

$website = $_GET['url'];
$parse = parse_url($website);
$datetime = date("Y-m-d-H-i-s");
$filename = $parse['host'].'-'.$datetime;

// $desktopwidth = $desktopdimension[0] * 0.25;
// echo $desktopwidth;
// echo $parse['host'];
if($website){
  echo $website."<br>";
  echo $datetime."<br>";
  try {
      exec('node capture.js '.$website.' '.$filename);
  } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
  }
  $desktopdimension = getimagesize($filename.'-desktop.png');
  $desktopwidth = $desktopdimension[0] * 0.25;
  $desktopheight = $desktopdimension[1] * 0.25;
  $fulldimension = getimagesize($filename.'-full.png');
  $fullwidth = $fulldimension[0] * 0.25;
  $fullheight = $fulldimension[1] * 0.25;
  $tabdimension = getimagesize($filename.'-tab.png');
  $tabwidth = $tabdimension[0] * 0.25;
  $tabheight = $tabdimension[1] * 0.25;
  $mobiledimension = getimagesize($filename.'-mobile.png');
  $mobilewidth = $mobiledimension[0] * 0.25;
  $mobileheight = $mobiledimension[1] * 0.25;
  echo '<a href="'.$filename.'-desktop.png" title="'.$filename.'-desktop.png" download>';
  echo $filename.'-desktop.png'."</a><br>";
  echo '<img class="desktop" src="'.$filename.'-desktop.png" width="'.$desktopwidth.'" height="'.$desktopheight.'"/><br>';
  echo '<a href="'.$filename.'-full.png" title="'.$filename.'-full.png" download>';
  echo $filename.'-full.png'."</a><br>";
  echo '<img class="full" src="'.$filename.'-full.png" width="'.$fullwidth.'" height="'.$fullheight.'"/><br>';
  echo '<a href="'.$filename.'-tab.png" title="'.$filename.'-tab.png" download>';
  echo $filename.'-tab.png'."</a><br>";
  echo '<img class="tab" src="'.$filename.'-tab.png" width="'.$tabwidth.'" height="'.$tabheight.'"/><br>';
  echo '<a href="'.$filename.'-mobile.png" title="'.$filename.'-mobile.png" download>';
  echo $filename.'-mobile.png'."</a><br>";
  echo '<img class="mobile" src="'.$filename.'-mobile.png" width="'.$mobilewidth.'" height="'.$mobileheight.'"/><br>';
} else {
  echo 'Please enter URL...';
}


?>
</body>
</html>
