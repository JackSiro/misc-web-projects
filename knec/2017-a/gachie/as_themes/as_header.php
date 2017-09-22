<?php
	$site_title = as_get_option('sitename');
	$site_tagline = as_get_option('description');
	function as_navigation_item( $nav_item )
	{
		$class = ( !!@$nav_item['selected'] ) ? ' active' : '';
		$class = ( !!@$nav_item['selected'] ) ? ' class="first active"' : '';
		echo '<li>',
			'<a href="' . $nav_item['url'] . '"'.$class.'>' . $nav_item['label'] . '</a>',
			'</li>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $site_title ?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="<?php echo $site_tagline ?>" />
		<link href="as_themes/tooplate_style.css" rel="stylesheet" type="text/css" />
		<!--   Free Website Template by t o o p l a t e . c o m   -->
		<script language="javascript" type="text/javascript">
		function clearText(field)
		{
			if (field.defaultValue == field.value) field.value = '';
			else if (field.value == '') field.value = field.defaultValue;
		}
		</script>

		<link rel="stylesheet" type="text/css" href="as_themes/css/jquery.lightbox-0.5.css" />    
			
		<!-- Arquivos utilizados pelo jQuery lightBox plugin -->
		<script type="text/javascript" src="as_themes/js/jquery.js"></script>
		<script type="text/javascript" src="as_themes/js/jquery.lightbox-0.5.js"></script>
		<link rel="stylesheet" type="text/css" href="as_themes/css/jquery.lightbox-0.5.css" media="screen" />
		<!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->

		<!-- Ativando o jQuery lightBox plugin -->
		<script type="text/javascript">
		$(function() {
			$('#map a').lightBox();
		});
		</script>

	</head>
	<body>

	<div id="tooplate_wrapper">

		<div id="tooplate_header">
			
			<div id="tooplate_menu">
				<ul>
					<?php 
						$as_site_nav = as_navigation();
						foreach ( $as_site_nav as $key => $navigation_item ){
							as_navigation_item( $navigation_item );
						}
					?>
				</ul>
				<div class="cleaner"></div>
			</div> <!-- end of menu -->
			
			<div id="site_title"><h1><a href="#"><?php echo $site_title ?></a><span>We are you!</span></h1></div>
		
		</div> <!-- end of header -->
		
		<div id="tooplate_middle">
			<div id="search_box">
				<form action="#" method="get">
					<input type="text" value="Search" name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
					<input type="submit" name="Search" value="" id="searchbutton" title="Search" />
				</form>
			</div> <!-- end of search box -->
		</div> <!-- end of middle -->
		