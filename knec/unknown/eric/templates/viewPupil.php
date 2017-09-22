<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $results['pageTitle'] ?></title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" />
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body >
		<div class="wrap">
		<header class="header">
			<br class="clearfix"/>
		</header>
			
		<div class="container">
				
			<div class="content">
				<a href="."><h2><img src="images/logo.png" width="50"/><?php echo $results['school']->schoolname ?></h2></a>
			<hr class="separator"/>
			</div>
			<h3>Full Name: <?php echo $results['pupil']->firstname.' '.$results['pupil']->secondname ?></h3>
			<h3>Adm no.: <?php echo $results['pupil']->admno ?></h3>
			<h3>Class: <?php echo $results['pupil']->pclass.' Term: '.$results['pupil']->pterm ?> </h3>
			<hr class="separator"/>
			<hr class="separator"/>
			<table>
			<tr><td>Mathematics: </td><td><h5><?php echo $results['pupil']->math ?></h5></td></tr>
			<tr><td>English: </td><td><h5><?php echo $results['pupil']->eng ?></h5></td></tr>
			<tr><td>Kiswahili: </td><td><h5><?php echo $results['pupil']->kisw ?></h5></td></tr>
			<tr><td>Science: </td><td><h5><?php echo $results['pupil']->sci ?></h5></td></tr>
			<tr><td>Social Studies: </td><td><h5><?php echo $results['pupil']->sos ?></h5></td></tr>
			<tr><td>CRE: </td><td><h5><?php echo $results['pupil']->cre ?></h5></td></tr>
			<tr><td>Average: </td><td><h5><?php echo $results['pupil']->avrg ?></h5></td></tr>
			<tr><td>Total: </td><td><h5><?php echo $results['pupil']->tot ?></h5></td></tr>
			</table>
			<hr class="separator"/>
			<hr class="separator"/>
				<a href="index.php"><h3>← Go Back Home</h3></a>
			
		</div>
		<hr class="separator"/>
		<footer class="footer">
			<p>&copy; 2015 Ericotieno.com &bull; All Rights Reserved</p>
			<div class="social">
				<a href="#"><img src="images/facebook.png" alt=""></a>
				<a href="#"><img src="images/twitter.png" alt=""></a>
				<a href="#"><img src="images/gplus.png" alt=""></a>
			</div>
		</footer>
		<div class="copy">Design by <a href="#">Ericotieno</a>.com</div>
		</div>
	</body>
</html>