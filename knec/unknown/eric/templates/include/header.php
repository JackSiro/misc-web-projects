<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- Begin JavaScript -->

		<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="lib/jquery.tools.js"></script>
    	<script type="text/javascript" src="lib/jquery.custom.js"></script>

<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="main">
<!-- header begins -->
<div id="header">
	
	<span class="pagedescription" ><br><br><h3><?php echo htmlspecialchars( $results['pageDescription'] )?>
	<a href="admin.php?action=logout">Logout?</a></h3></span>
   <div id="buttons">
      <a href="admin.php" class="but"  title=""><?php echo htmlspecialchars( $results['pageTitle'] )?></a>
    </div>
</div>