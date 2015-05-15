<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
#require_once('../simplepie.inc');
require_once('/home5/jeehtove/public_html/provindex/simplepie/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();

//change the cache location
$feed->set_cache_location($_SERVER['DOCUMENT_ROOT'] . '/trends/cache/');
 
// Set the feed to process.
$feed->set_feed_url('http://news.google.com/news?pz=1&cf=all&ned=us&hl=en&q=hemline&output=rss');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 
 
<html xmlns="
<head>
	<title>Provindex Trends: Hemline</title>
 
 
	<style type="text/css">
	body {
		font:12px/1.4em Verdana, sans-serif;
		color:#333;
		background-color:#fff;
		padding:0;
	}
 
	a {
		color:#326EA1;
		text-decoration:underline;
		padding:0 1px;
	}
 
	a:hover {
		background-color:#333;
		color:#fff;
		text-decoration:none;
	}
 
	div.header {
		border-bottom:1px solid #999;
	}
 
	div.item {
		padding:5px 0;
		border-bottom:1px solid #999;
	}
	
	#tweets {
		float: right;
	}
	
	#ticker {
		width: 50%;
		margin: 0 auto;
	}
	
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
	right: -30%
    
		
}

	</style>
 

 <script src="tagcanvas.js" type="text/javascript"></script>
    <script type="text/javascript">
      window.onload = function() {
        try {
          TagCanvas.Start('myCanvas','tags',{
            textColour: '#ff0000',
            outlineColour: '#ff00ff',
            reverse: true,
            depth: 0.8,
            maxSpeed: 0.05
          });
        } catch(e) {
          // something went wrong, hide the canvas container
          document.getElementById('myCanvasContainer').style.display = 'none';
        }
      };
    </script>
	<script src="http://richhollis.github.com/vticker/js/jquery-1.7.2.min.js"></script>
<script src="jquery.vticker.js" type="text/javascript"> </script>
	<script type="text/javascript">
	$(function() {
	  $('#ticker').vTicker();
	});
 </script>
</head>
<body>
<div id="menu">
<ul>
<li><a href="../../index.php">Home</a></li>
<li><a href="../../aboutus.php">About Us</a></li>
<li><a href="../../services.php">Services</a></li>
<li><a href="../../trends/index.php">Trends</a></li>
<li><a href="../../contactus.php">Contact Us</a></li>
</ul>
</div>
<br><br>
<center><img src="../images/hemline.jpg"></center>
<center>
<br><br>
<div id="ticker">
	  <ul>
		<?php 

		$headlines = array();
		$headlink = array();
		foreach ($feed->get_items() as $item):
			$headlines[] = $item->get_title();
			$headlink[] = $item->get_permalink();
			//code placeholder
		?>

		<?php endforeach; ?>
	<?php 

	$arrlength = count($headlines);
	$li_link = $item->get_permalink();
	$li_title = $item->get_title();
	for($x = 0; $x < $arrlength; $x++) {
		echo "<li><a href='".$headlink[$x]."' target='_blank'>".$headlines[$x]."</a></li>";
	}?>
	</ul>
	</div>
<br><br><div id="tweets">
<a class="twitter-timeline" href="https://twitter.com/search?q=hemline" data-widget-id="593981501290733568">Tweets about hemline</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>

	<div class="header">
		<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
		<p><?php echo $feed->get_description(); ?></p>
	</div>
 
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	First, we'll create an array for the headlines.
	*/
	
	
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><?php echo $item->get_description(); ?></p>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
		</div>
 
	<?php endforeach; ?></center>
	<center>
	
	
	</center>
 <br><br>
<div id="copyright">Copyright 2015 Provindex, Inc.</div>
</body>
</html>