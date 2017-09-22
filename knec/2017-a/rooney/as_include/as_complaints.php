<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">	

	  <div id="content"> 
        
		
        <div class="content_item">
		  <br>
		  <div class="left_panel" >
			  <h1>Or Signin Now</h1>
				<?php
				if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
					
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<div class="error" id="error">',$msg,'</div>'; 
				}
				unset($_SESSION['ERRMSG_ARR']);
				} ?>	  
			  <br>		  
			  <hr><br>
			  <form action="index.php?action=login" method="post" >
				<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
				<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
				<input type="submit" id="aalogin-button" name="SignMeIn" value="Sign In" />
			
				</form>
				<br>
			</div>
			<div class="main_body" >
			  <h1>Submit a Quick Complaint</h1>
			  <form role="form" method="post" name="Submit" action="index.php?action=as_complaints" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Complaint Title:<br>
					<input type="text" autocomplete="off" name="title" required></td>
				</tr>
                
                <tr>
					<td>Complaint Description (500 max):<br>
					<textarea name="content" autocomplete="off" rows="4" required></textarea></td>
				</tr>
				<tr>
					<td><br>Full Name:<br>
					<input type="text" autocomplete="off" name="fullname" required></td>
				</tr>
				<tr>
					<td>Email Address:<br>
					<input type="email" autocomplete="off" name="email" required></td>
				</tr>
				</table><br>
                <center><input type="submit" class="submit_this" name="SubmitComplaint" value="Submit Complaint">						
			  </center><br></form>				
			</div>
		</div>
      </div>   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."as_footer.php" ?>