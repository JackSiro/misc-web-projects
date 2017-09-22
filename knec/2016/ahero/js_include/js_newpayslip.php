<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_payslip">
		<br>
		  <h1>Add a Payslip</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostItem" action="index.php?js_pageaction=newpayslip" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Payslip Name:</td>
					<td><input type="text" autocomplete="off" name="name"></td>
				</tr>
				<tr>
					<td>Payslip Number:</td>
					<td><input type="text" autocomplete="off" name="number"></td>
				</tr>
				
				</table><br>
                    <center>
						<input type="submit" class="submit_this" name="AddPayslip" value="Save Payslip"> 
					</center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div></div></div></div>
<?php include JS_THEME."js_footer.php" ?>
    
