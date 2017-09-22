<?php
	$sitename = as_get_option('sitename');
	$sitedescription = as_get_option('description');
	
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : ""; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitename ?></title>
<link href="as_themes/tooplate_style.css" rel="stylesheet" type="text/css" />
<!--   Free Website Template by t o o p l a t e . c o m   -->
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</head>
<body>

<div id="tooplate_header">
	<div id="site_title"><h1><a rel="nofollow" href="index.php"><?php echo $sitename ?></a></h1></div>
	<div id="search_box">
		<form action="#" method="get">
			<input type="text" value="Search" name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
			<input type="submit" name="Search" value="" id="searchbutton" title="Search" />
		</form>
	</div>
</div> <!-- end of header -->

<div id="tooplate_middle_wrapper">
	<div id="tooplate_middle">
    	<h2><?php echo $sitename ?></h2>
        <p><?php echo $sitedescription ?></p>
        <div id="learn_more"><a href="#">Register Now</a></div>
    
    </div> <!-- end of middle -->
</div> <!-- end of tooplate_middle wrapper -->

<div id="tooplate_menu">
    <ul>
        <?php 
		  if ($loggedin) {
			if ($administrator) { echo
			'<li><a href="index.php?action=dashboard">DashBoard</a></li>
			<li><a href="index.php?action=student_all">Students</a></li>
			<li><a href="index.php?action=fee_all">Fees</a></li>
			<li><a href="index.php?action=exam_new">Registration</a></li>
			<li><a href="index.php?action=exam_all">Exams</a></li>'; 
		
			}  else {
				echo '<li><a href="index.php?action=signout">Sign Out</a></li>';
			}
		  } else {
			  echo
					'<li><a href="index.php?action=signup">Sign Up</a></li>
					<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
					<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';					  
			}
			?>	
    </ul>    	
</div> <!-- end of tooplate_menu -->
