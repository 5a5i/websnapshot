<?php

$website = $_GET['url'];
$parse = parse_url($website);

// echo $parse['host'];


// exec('node capture.js '.$website.' '.$parse['host'].'.png');

echo $_GET['url'];
