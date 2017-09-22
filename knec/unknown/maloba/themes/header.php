<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="wrap">

	<div id="header">
		
		<h1>
		  <a href="."><?php echo htmlspecialchars( $results['pageTitle'] )?></a>
		</h1>
		
		<p>
		 <?php echo htmlspecialchars( $results['pageDescription'] )?>
		</p>
		
		<div class="clear">
		</div>
		
	</div>
	
	<ul id="nav">
	  <li><a href=".">Home</a></li>
	  <li><a href="index.php?action=allcats">All Categories</a></li>
	  <li><a href="index.php?action=allitems">All Items</a></li>
	  <li><a href="index.php?action=newcat">Add a Category</a></li>
	  <li><a href="index.php?action=newitem">Receive an Item</a></li>
	  <li><a href="index.php?action=logout">Logout?</a></li>
	</ul>
	
	<div class="clear">
	</div>
	
	