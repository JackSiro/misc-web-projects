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
<!DOCTYPE html>
<head>
	<title><?php echo as_get_option('sitename') ?></title>
	<meta charset="utf-8">
	<link href="as_themes/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<a href="index.html"><img class="logo" src="as_media/logo.png" width="500" height="124" alt=""></a>
			<span><img src="as_media/hot-line-number.png" width="183" height="50" alt=""></span>
			<ul class="navigation">				 
				<?php 
					$as_site_nav = as_navigation();
					foreach ( $as_site_nav as $key => $navigation_item ){
						as_navigation_item( $navigation_item );
					}
				?>
			</ul>
		</div>	
	<div id="body">