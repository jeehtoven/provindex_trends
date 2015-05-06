<html>
<title>Provindex Trends</title>
<body>
	<br><br><br><br>
<?php

//Define image directory
$dir = "./images";
$images = scandir($dir);
//Initialize layout
$count = 0;

echo "<center>";

for ($i=0; $i < count($images); ++$i)	{
	//Check for directory files and skip if in array
	if ($images[$i] == ".") {continue;}
	if ($images[$i] == "..") {continue;}
			
	//else {
			echo "<a href='./" . trim($images[$i],".jpg") . "/'><img src='./images/" . $images[$i] . "'></a>&nbsp;&nbsp;";
			$count = $count + 1;
			
			//re-initialize count
			if ($count == 2) {
				echo "</center><br><br><center>";
				$count; $count = 0;
				}
		//}
	}
		
?>
</body>
</html>