<?php include JS_THEME."js_header.php" ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_session">
		  <center>		  
		  <br>
		  <h1>Sorry for Loosing your username</h1>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
		  <h2>Fill in the form below to get assistance on recovering your username</h2>
          <form action="index.php?js_pageaction=manage_username" method="post" >
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>Enter your email (*required)</td>
					<td><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
				</tr>
				<tr><td>Enter your password (*required)</td>
			</td><td>
			<input type="password" name="password" id="password" autocomplete="off" required maxlength="20" />
			</td></tr>
			</table>
			<input type="submit" id="aalogin-button" name="ForgotEmployeename" value="Manage Employeename" />
        
      </form></center>
		  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include JS_THEME."js_footer.php" ?>
    
