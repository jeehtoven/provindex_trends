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
$feed->set_feed_url('http://news.google.com/news?pz=1&cf=all&ned=us&hl=en&q=aspirin+sales&output=rss');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 
 
<html xmlns="
<head>
	<title>Provindex Trends: Aspirin Sales</title>
 
 
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
	
	</style>
 
</head>
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
<body>
<center><img src="../images/asprin.jpg">
<br><br><div id="tweets">
<a class="twitter-timeline" href="https://twitter.com/search?q=aspirin" data-widget-id="593510302483947520">Tweets about aspirin</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>

	<div class="header">
		<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
		<p><?php echo $feed->get_description(); ?></p>
	</div>
 
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
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
	<?php foreach ($feed->get_items() as $item):
	?>
	<div id="myCanvasContainer">
      <canvas width="300" height="300" id="myCanvas">
        <p>Anything in here will be replaced on browsers that support the canvas element</p>
      </canvas>
    </div>
    <div id="tags">
      <ul>
        <li><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a></li>
        </li>
      </ul>
    </div>
	<?php endforeach; ?>
	</center>
 
</body>
</html>