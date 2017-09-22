<?php
	function as_navigation_item( $nav_item )
	{
		$class = ( !!@$nav_item['selected'] ) ? ' active' : '';
		$class = ( !!@$nav_item['selected'] ) ? ' class="first active"' : '';
		echo '<li>',
			'<a href="' . $nav_item['url'] . '"'.$class.'>' . $nav_item['label'] . '</a>',
			'</li>';
	}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title><?php echo as_get_option('sitename') ?></title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="as_themes/style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Visitors <span class="logo_colour">Online Track</span></a></h1>
          <h2>Simple. Contemporary. Convinient.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Home</a></li>
          <?php 
				$as_site_nav = as_navigation();
				foreach ( $as_site_nav as $key => $navigation_item ){
					as_navigation_item( $navigation_item );
				}
			?>
        </ul>
      </div>
 