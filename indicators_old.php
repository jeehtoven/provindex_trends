<?php
$dir = "./images/";
$files1 = scandir($dir);
$source1 = "./beer/autoloader.php";
$source2 = "./beer/tagcanvas.js";
$source3 = "./beer/index.php";

foreach($files1 as $place) 
{
$no_jpg = substr($place,0,-4);
mkdir($no_jpg, 0755);

copy($source1, "./".$no_jpg."/autoloader.php");
copy($source2, "./".$no_jpg."/tagcanvas.js");
copy($source3, "./".$no_jpg."/index.php");

echo "<center>Indicator folder " . $no_jpg . " has been created.</center></br>";
}
?>