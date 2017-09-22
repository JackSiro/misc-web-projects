<?php include AS_THEME."as_header.php";
	$myaccount = isset( $_SESSION['school_account'] ) ? $_SESSION['school_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Welcome to <?php echo as_get_option('sitename') ?></h1> 
          
			<div class="main_content" align="center">
			
			   <table class="tb_dashboard">
				<tr>
				  <td class="td_dashboard td_one">
					<a href="index.php?action=class"><h1>Items</h1></a>
					<?php if ($myaccount != "customer") { ?><hr>
					<a href="index.php?action=salesitem_new"><h2>Add a class</h2></a>
					<?php } ?>
				  </td>
				  <td class="td_dashboard td_two">
					<a href="index.php?action=customer_all"><h1>Customers</h1></a>
					<?php if ($myaccount != "customer") { ?><hr>
					<a href="index.php?action=customer_new"><h2>Add a Customer</h2></a>
					<?php } ?>
				  </td>
				  <td class="td_dashboard td_two">
					<a href="index.php?action=subject_all"><h1>Subjects</h1></a>
					<?php if ($myaccount != "customer") { ?><hr>
					<a href="index.php?action=subject_new"><h2>Add a Subject</h2></a>
					<?php } ?>
				  </td>
				</tr>
				
				<tr>
				  <td class="td_dashboard td_three">
					<a href="index.php?action=user_all"><h1>Users</h1></a>
					<?php if ($myaccount != "customer") { ?><hr>
					<a href="index.php?action=user_new"><h2>Add a user</h2></a>
					<?php } ?>
				  </td>
				  <td class="td_dashboard td_three">
					<a href="index.php?action=marks_all"><h1>Marks</h1></a>
					<?php if ($myaccount != "customer") { ?><hr>
					<a href="index.php?action=marks_new"><h2>Enter Marks</h2></a>
					<?php } ?>
				  </td>
				  <td class="td_dashboard td_four">
					<?php if ($myaccount != "customer") { ?>
					<a href="index.php?action=options"><h1>Site Options</h1></a><hr>
					<a href="index.php?action=options"><h2>Manage options</h2></a>
					<?php } else { ?>
					<a href="index.php?action=profile"><h1>My Profile</h1></a>
					<?php } ?>
				  </td>				
				</tr>
			   </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_customer-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
