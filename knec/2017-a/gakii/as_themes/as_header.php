<?php 
	$myaccount = isset( $_SESSION['lostfound_account'] ) ? $_SESSION['lostfound_account'] : "";
	$administrator = isset( $_SESSION['lostfound_group'] ) ? $_SESSION['lostfound_group'] : "";
    $usergrp = isset( $_SESSION['lostfound_group'] ) ? $_SESSION['lostfound_group'] : "user";
	$loggedin = isset( $_SESSION['lostfound_user'] ) ? $_SESSION['lostfound_user'] : ""; 
	
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
<title><?php echo as_get_option('sitename') ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="as_themes/css/tooplate_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="as_themes/js/swfobject.js"></script>
<script type="text/javascript">
	var flashvars = {};
	flashvars.xml_file = "photo_list.xml";
	var params = {};
	params.wmode = "transparent";
	var attributes = {};
	attributes.id = "slider";
	swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "440", "220", "9.0.0", false, flashvars, params, attributes);
</script>

<link rel="stylesheet" type="text/css" href="as_themes/css/ddsmoothmenu.css" />

<script type="text/javascript" src="as_themes/js/jquery.min.js"></script>
<script type="text/javascript" src="as_themes/js/ddsmoothmenu.js">
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "tooplate_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
    
</head>
<body>

<div id="tooplate_wrapper">
	<div id="tooplate_header">
	
    	<div id="site_title"><h1><a href="index.php"><?php echo as_get_option('sitename') ?></a></h1></div>
        
        <div id="tooplate_menu" class="ddsmoothmenu">
		
          	<ul>
               	<?php 
				$as_site_nav = as_navigation();
				foreach ( $as_site_nav as $key => $navigation_item ){
					as_navigation_item( $navigation_item );
				}
			?>
            </ul>
			
            <br style="clear: left" />
        </div> <!-- end of tooplate_menu -->
    </div>
    
    <div id="tooplate_social">
    	<a href="#"><img src="as_themes/images/facebook.png" alt="facebook" /></a>
        <a href="#"><img src="as_themes/images/stumbleupon.png" alt="stumbleupon" /></a>
        <a href="#"><img src="as_themes/images/feed.png" alt="feed" /></a>
        <a href="#"><img src="as_themes/images/twitter.png" alt="twitter" /></a>        
    </div>
    
    <div id="tooplate_main_top"></div>