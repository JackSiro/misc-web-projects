<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_department">
		<br>
		  <h1>Add a Department</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostItem" action="index.php?js_pageaction=newdepartment" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Department Name:</td>
					<td><input type="text" autocomplete="off" name="name"></td>
				</tr>
				<tr>
					<td>Department Number:</td>
					<td><input type="text" autocomplete="off" name="number"></td>
				</tr>
				
				</table><br>
                    <center>
						<input type="submit" class="submit_this" name="AddDepartment" value="Save Department"> 
					</center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div></div></div></div>
<?php include JS_THEME."js_footer.php" ?>
    
