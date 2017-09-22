<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Add a payslip</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostPaySlip" action="index.php?js_pageaction=newpayslip" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname"></td>
				</tr>
                <tr>
					<td>Mobile Number:</td>
					<td><input type="text" autocomplete="off" name="mobile"></td>
				</tr>
                
                <tr>
					<td>Gender:</td>
					<td>
					<table><tr><td><input type="radio" autocomplete="off" name="gender" value="Male"></td>
					<td> Male </td>
					<td><input type="radio" autocomplete="off" name="gender" value="FeMale"></td>
					<td> Female </td></tr></table>
					</td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email"></td>
				</tr>
                
                <tr>
					<td>Physical Address:</td>
					<td><input type="text" autocomplete="off" name="address"></td>
				</tr>
                
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddPaySlip" value="Save New PaySlip">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
