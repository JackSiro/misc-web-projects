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
				<a href="."><h2><img src="images/logo.png" width="50"/><?php echo $results['pageTitle'] ?></h2></a>
				<p>If you would like to view a pupil's results, please select their class and admission number to proceed</p>
			</div>
			<hr class="separator"/>
			<div class="content">
				<h2>View Results online</h2>
				<form action="index.php?action=<?php echo $results['formAction'] ?>" method="post">
					<label>School Code</label>
					<input type="text" name="code" id="code" placeholder="school code" required autofocus maxlength="255" />
					
					<br>
					<label>Admission Number</label>
					<input type="text" name="admno" id="admno" placeholder="Adm. No" required autofocus maxlength="255" />
					<br><br>
					<input type="submit" name="viewResults" value="View Results" />
				</form>
			</div>
			<hr class="separator"/>
			
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