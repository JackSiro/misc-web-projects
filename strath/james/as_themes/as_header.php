<?php 
	$myaccount = isset( $_SESSION['voting_account'] ) ? $_SESSION['voting_account'] : "";
	$myuserid = isset( $_SESSION['voting_userid'] ) ? $_SESSION['voting_userid'] : "";
	$sitename = as_get_option('as_sitename');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $sitename ?></title>
	<link rel="stylesheet" type="text/css" href="as_themes/style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script language="javascript" type="text/javascript">
	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
	</script>
</head>

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">
    
    	<div id="site_title">
            <h1><a href="index.php" rel="nofollow"><img src="as_themes/images/logo.png" alt="logo" /><span><?php echo as_get_option('as_slogan') ?></span></a></h1>
        </div> 
        <div id="header_right">
        
        	<div id="social_box">
                <ul>
                    <li><a href="#"><img src="as_themes/images/facebook.png" alt="facebook" /></a></li>
                    <li><a href="#"><img src="as_themes/images/twitter.png" alt="twitter" /></a></li>
                    <li><a href="#"><img src="as_themes/images/linkedin.png" alt="linkin" /></a></li>
                    <li><a href="#"><img src="as_themes/images/technorati.png" alt="technorati" /></a></li>
                    <li><a href="#"><img src="as_themes/images/myspace.png" alt="myspace" /></a></li>                
                </ul>
                <div class="cleaner"></div>
			</div>   
			         
             <div id="search_box">
                <form action="#" method="get">
                    <input type="text" value="Search" name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                  <input type="submit" name="Search" value="" id="searchbutton" title="Search" />
                </form>
            </div>
            	
        </div>
    
    </div>
</div>

<div id="tooplate_middle_wrapper">
	<div id="tooplate_middle">
    
    	<img src="as_media/car.jpg" alt="Image 01" />
        
        <div id="middle_content">
        	<h2><?php echo $sitename ?></h2>
            <p><?php echo as_get_option('as_description') ?></p>
            <div class="wwu_btn"><a href="#"></a></div>
        </div>
    
    </div>
</div>

 <div id="tooplate_menu">
                
    <ul>
		<?php if ($myaccount == 5){ ?>
			<li><a href="index.php" class="current">Home</a></li>
			<li><a href="index.php?action=plan_all">Plans</a></li>
			<li><a href="index.php?action=client_all">Clients</a></li>
			<li><a href="index.php?action=user_all">Users</a></li>
			<li><a href="index.php?action=logout">Logout?</a></li>
			
		<?php } else if ($myaccount == 3){ ?>
		<li><a href="index.php" class="current">DashBoard</a></li>
		<li><a href="index.php?action=vote_now">Vote Now</a></li>
		<li><a href="index.php?action=logout">Logout?</a></li>
		<?php }  else { ?>
		<li><a href="index.php" class="current">Home</a></li>
		<li><a href="index.php?action=register">Register</a></li>
		<li><a href="index.php?action=forgot_password">Password?</a></li>
		<li><a href="index.php?action=forgot_username">Username?</a></li>
		<?php } ?>
    </ul>    	

	<div class="cleaner"></div>
</div>