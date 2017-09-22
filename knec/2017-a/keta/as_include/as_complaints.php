<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">
	  <div id="content"> 
        <div class="content_item">
		  <br>		  
			<div class="main_body" >
			  <center><h1>Submit a Quick Complaint OR <a href="index.php">Sign In to Your Account</a></h1></center><br>
				<form role="form" method="post" name="Submit" action="index.php?action=complaints" >
					<input type="text" autocomplete="off" name="title" placeholder="Complaint Title" required></td>
					<textarea name="content" autocomplete="off" rows="4" required>Complaint Description (500 max)</textarea>
					<input type="text" autocomplete="off" name="fullname" placeholder="Full Name" required>
					<input type="email" autocomplete="off" name="email" placeholder="Email Address" required></td>
					<input type="submit" class="submit_this" name="SubmitComplaint" value="Submit Complaint">
				</form>				
			</div>
		</div>
      </div>   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>