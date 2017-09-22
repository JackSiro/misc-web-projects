<?php

	require_once JS_APP.'js_time_ago/js_time_ago.php';
	require_once JS_APP.'js_mobile_detect/js_mobile_detect.php';
	$detect = new Mobile_Detect;
        
    $request = $_SERVER['REQUEST_URI'];
     
	$promotitle = '';
	$pagetitle = isset( $results['pageTitle'] ) ? $results['pageTitle'] : js_get_option('sitename');
	$pagekeywords = isset( $results['pageKeywords'] ) ? $results['pageKeywords'] : js_get_option('keywords');
	$pagedescription = isset( $results['pageDescription'] ) ? $results['pageDescription'] : js_get_option('description');
		
	//js_new_story();
?>
<!DOCTYPE html>
	<html class="no-js"> 
		<head>
			<meta charset="utf-8">
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<title><?php echo $pagetitle.$promotitle ?></title>
			<meta name="keywords" itemprop="keywords" content="<?php echo $pagekeywords.$promotitle ?>">
			<meta name="description" itemprop="description" content="<?php echo $pagedescription.$promotitle ?>">
			<meta name="author" itemprop="author" content=" newsholla.com"/>
			<meta name="google-site-verification" content="google3abe9ea31c16dfea.html" />	
			
			<meta name="copyright" content="newsholla.com"/>
			<meta http-equiv="Reply-to" content="info@newsholla.com"/>
			<meta name="alexaVerifyID" content="Nu-quLrKRvuiE42rAepnuf8Zkqs"/>

			<meta name="msvalidate.01" content=""/>
			<meta http-equiv="Cache-control" content="public">
			<meta http-equiv="refresh" content="1000">
			<meta http-equiv="Lang" content="en"/>
			
			<link rel="canonical" href="http://www.newsholla.com">
			<meta name="robots" content="index,follow"/>
			<meta name="online" content="info@newsholla.com"/>
			
			<link rel="image_src" href="http://newsholla.com/js_images/thumbnail.png">
			<meta name="twitter:card" content="summary_large_image"/>
			<meta name="twitter:site" content="@tujuane_ke"/>
			<meta name="twitter:creator" content="@tujuane_ke"/>
			<meta property="twitter:title" content=" "/>
			<meta property="twitter:description" content=""/>
			
			<meta property="twitter:url" content="http://www.newsholla.com"/>
			<meta property="twitter:image" content="http://www.newsholla.com"/>
			<meta property="og:type" content="website"/>
			
			<meta property="og:title" content=" "/>
			<meta property="og:description" content=""/>
			<meta property="og:site_name" content=" newsholla.com"/>
			
			<meta type="og:url" content="http://www.newsholla.com">
			<meta property="og:image" itemprop="thumbnailUrl" content="http://newsholla.com/js_images/thumbnail.png"/>
			<meta property="og:image:secure_url" content="http://newsholla.com/js_images/thumbnail.png"/>

			<meta name="generator" content=" newsholla.com">
			<meta name="msapplication-TileColor" content="#8da09f">
			<meta name="msapplication-TileImage" content="/mstile-144x144.png">
			<meta name="theme-color" content="#ffffff">
			
			<link href="<?php echo js_siteUrl() ?>js_themes/css/bootstrap.min.css" rel="stylesheet">
		
			<link href="<?php echo js_siteUrl() ?>js_themes/css/styles.css" rel="stylesheet">			
			<link rel="manifest" href="<?php echo js_siteUrl() ?>js_icons/manifest.json">
			
		</head>
		
		
	<body>
	<nav class="navbar navbar-fixed-top header">
		<div class="col-md-12">
			<div class="navbar-header">
			  
			  <a href="<?php echo js_siteUrl() ?>" class="navbar-brand">
                            <img src="js_themes/logobig.jpeg" height="35"></a>
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
			  <i class="glyphicon glyphicon-search"></i>
			  </button>
		  
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse1">
			  <form class="navbar-form pull-left">
				  <div class="input-group" style="max-width:470px;">
					<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
					<div class="input-group-btn">
					  <button class="btn btn-default btn-primary" type="submit"><img src="js_themes/search.JPG" style="margin:0px;"></button>
					</div>
				  </div>
			  </form> 
			  <ul class="nav navbar-nav navbar-right">
                               
				<!--<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-bell"></i></a>
					
					<ul class="dropdown-menu">
					  <li><a href="#"><span class="badge pull-right">40</span>Link</a></li>
					  <li><a href="#"><span class="badge pull-right">2</span>Link</a></li>
					  <li><a href="#"><span class="badge pull-right">0</span>Link</a></li>
					  <li><a href="#"><span class="label label-info pull-right">1</span>Link</a></li>
					  <li><a href="#"><span class="badge pull-right">13</span>Link</a></li>
					</ul>
				 </li> -->
                                 <li><a href="#" >On This Day</a></li>
				 
				 <!-- <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li> -->
                             <?php if (js_is_logged()) { ?>
 
                                <li><a href="#SomethingFresh" role="button" data-toggle="modal">New Post</a></li>
							
				 <!--<li class="active"><a href="#">Posts</a></li>-->
                                   
				<li><a href="logout" >Logout</a></li> <?php } ?>
				 				 
				 <li><a href="#aboutModal" role="button" data-toggle="modal">About</a></li>
                                 <li><a href="#" id="btnToggle"><img src="js_themes/toggle.JPG" style="margin:0px;"></a></li>
			   </ul>
			</div>	
		 </div>	
	</nav>
	
	<div class="navbar navbar-default" id="subnav">
				 
		<div class="col-md-12">
			<div class="navbar-header">
			<a href="#loginModal" role="button" data-toggle="modal" style="float:left;margin-left:-10px;width:5px;height:50px;background:#000;">|</a>
			<?php if (js_is_logged()) { ?>
			  <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>

			  <ul class="nav dropdown-menu">
				  <li><a href="#"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> Profile</a></li>
				  <li><a href="#"><i class="glyphicon glyphicon-dashboard" style="color:#0000aa;"></i> Dashboard</a></li>
				  <li><a href="#"><i class="glyphicon glyphicon-inbox" style="color:#11dd11;"></i> Pages</a></li>
				  <li class="nav-divider"></li>
				  <li><a href="#"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Settings</a></li>
				  <li><a href="#"><i class="glyphicon glyphicon-plus"></i> More..</a></li>
			  </ul>
			<?php } ?>
			  
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  </button>
		  
		  <?php
		  if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
						
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<span class="error" id="error">',$msg,'</span>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
		}
		?>
			</div><a href="#loginModal" role="button" data-toggle="modal" style="float:right;margin-right:-10px;width:5px;height:50px;background:#000;">|</a>
			<div class="collapse navbar-collapse" id="navbar-collapse2">
			  
                          <ul class="nav navbar-nav navbar-right">
                          <?php //echo js_my_nav_cat() ?>
			  
			   </ul>
			</div>	
                     

		 </div>	
		 
	
		</div>
		
	
	