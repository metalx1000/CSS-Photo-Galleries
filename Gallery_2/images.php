<?php
$dir = "photos/";

// Sort in ascending order - this is default
$a = array_slice(scandir($dir),2);

foreach ($a as $v) {
  echo "$v\n";
}
// Sort in descending order
//$b = scandir($dir,1);


//print_r($a);
//print_r($b);
?>
