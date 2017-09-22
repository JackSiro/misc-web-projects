		<div class="sidebar_content">
			<h2>Nafaka Companys Supplies</h2>
			<p>Welcome to <?php echo js_get_option('sitename') ?></p>
			<br><hr><br>
			<h2>Quick Navigation</h2>
		<ul id="sidebar_nav">
          <li><a href=".">Home Page</a></li>
		<?php 
		$myaccount = isset( $_SESSION['buscar_account'] ) ? $_SESSION['buscar_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?page=ticket_all">Companys</a></li>
		<li><a href="index.php?page=bus_all">Types</a></li>
		<li><a href="index.php?page=supp_all">Suppliers</a></li>
		<li><a href="index.php?page=employee_all">Users</a></li>
		<li><a href="index.php?page=options">Site Options</a></li>
		<li><a href="index.php?page=logout">Logout?</a></li>'; 
	
		}  else { echo
			'<li><a href="index.php?page=register">Register</a></li>
			<li><a href="index.php?page=forgot_password">Forgot Password</a></li>
			<li><a href="index.php?page=forgot_username">Forgot Username</a></li>';
		}
			?>		
        </ul>
		</div>