<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['college_account'] ) ? $_SESSION['college_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Welcome to <?php echo js_get_option('sitename') ?></h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tb_dashboard">
				<tr>
				  <td class="td_dashboard td_one">
					<a href="index.php?action=departments"><h1>Departments</h1></a>
					<?php if ($myaccount != "student") { ?><hr>
					<a href="index.php?action=newdepartment"><h2>Add a department</h2></a>
					<?php } ?>
				  </td>
				  <td class="td_dashboard td_two">
					<a href="index.php?action=students"><h1>Students</h1></a>
					<?php if ($myaccount != "student") { ?><hr>
					<a href="index.php?action=newstudent"><h2>Add a Student</h2></a>
					<?php } ?>
				  </td>				
				</tr>
				
				<tr>
				  <td class="td_dashboard td_three">
					<a href="index.php?action=lecturers"><h1>Lecturers</h1></a>
					<?php if ($myaccount != "student") { ?><hr>
					<a href="index.php?action=newlecturer"><h2>Add a lecturer</h2></a>
					<?php } ?>
				  </td>
				  <td class="td_dashboard td_four">
					<?php if ($myaccount != "student") { ?>
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
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
