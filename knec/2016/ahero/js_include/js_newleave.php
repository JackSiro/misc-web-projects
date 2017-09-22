<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Add a Leave</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostItem" action="index.php?js_pageaction=newleave" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Start Time:</td>
					<td><input type="text" autocomplete="off" name="starttime"></td>
				</tr>
				<tr>
					<td>End Time:</td>
					<td><input type="text" autocomplete="off" name="endtime"></td>
				</tr>
				<tr>
					<td>Working Period:</td>
					<td>
						<select name="workingperiod">
							<option value=""> - Working Period - </option>
							<option value="Cost Workers"> Cost Workers </option>
							<option value="Newly Employed Workers"> Newly Employed Workers </option>
							<option value="Continuing Workers"> Continuing Workers </option>
							<option value="Retired Workers"> Retired Workers </option>
							
						</select>
					</td>
				</tr>
				
				</table><br>
                    <center>
						<input type="submit" class="submit_this" name="AddLeave" value="Save Leave"> 
					</center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div></div></div></div>
<?php include JS_THEME."js_footer.php" ?>
    
