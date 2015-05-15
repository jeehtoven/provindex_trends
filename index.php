<html>
<title>Provindex Trends</title>
<style type="text/css">
#menu {
    width: 1400px;
    height: 35px;
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
	text-align: center;
    text-shadow: 3px 2px 3px #333333;
    background-color: #65AC34;
    border-radius: 8px;
	position:relative;
	}

#menu ul {
    height: auto;
    padding: 8px 0px;
    margin: 0px;
}

#menu li { 
display: inline; 
padding: 20px; 
}

#menu a {
    text-decoration: none;
    color: #040404;
    padding: 8px 8px 8px 8px;
}

#menu a:hover {
    color: #65AC34;
    background-color: #040404;
}

#copyright {
    width: 500px;
    height: 20px;
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    text-align: center;
    text-shadow: 3px 2px 3px #333333;
    background-color: #65AC34;
    border-radius: 8px;
	position:relative;
    
		
}

</style>
<body>
<div id="menu">
<ul>
<li><a href="../index.php">Home</a></li>
<li><a href="../aboutus.php">About Us</a></li>
<li><a href="../services.php">Services</a></li>
<li><a href="../trends/index.php">Trends</a></li>
<li><a href="contactus.php">Contact Us</a></li>
</ul>
</div>
	<br><br><br><br>
	<center><h1>Provindex Trends</h1><br>These are unusual indicators that give a perspective of our economy. Click an economic indicator to get more information, including tweets, news feeds, and headlines.</center><br>
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
			//echo "<a href='./" . trim($images[$i],".jpg") . "/'><img src='./images/" . $images[$i] . "'></a>&nbsp;&nbsp;";
			echo "<a href='./" . substr($images[$i],0,-4) . "/'><img src='./images/" . $images[$i] . "'></a>&nbsp;&nbsp;";
			$count = $count + 1;
			
			//re-initialize count
			if ($count == 2) {
				echo "</center><br><br><center>";
				$count; $count = 0;
				}
		//}
	}
		
?>
<br><br>
<div id="copyright">Copyright 2015 Provindex, Inc.</div>
</body>
</html>