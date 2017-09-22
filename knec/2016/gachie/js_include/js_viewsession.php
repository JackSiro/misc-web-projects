<?php include JS_THEME."js_header.php"; ?>
<?php 

	$sessionid = $results['session'];
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $sessionid, $session_starttime, $session_endtime, $session_workingperiod) = $database->get_row( $js_db_query );
}
		
?>

	<div id="site_content">	

	  <div id="content">
        <div class="content_session">
		<br>
		  <h1>Edit a Session</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostItem" action="index.php?js_pageaction=viewsession&&js_sessionid=<?php echo $sessionid ?>" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Start Time:</td>
					<td><input type="text" autocomplete="off" name="starttime" value="<?php echo $session_starttime ?>"></td>
				</tr>
				<tr>
					<td>End Time:</td>
					<td><input type="text" autocomplete="off" name="endtime" value="<?php echo $session_endtime ?>"></td>
				</tr>
				<tr>
					<td>Working Period:</td>
					<td>
						<select name="workingperiod">
							<option value="<?php echo $session_workingperiod ?>"> - Working Period - </option>
							<option value="Cost Workers"> Cost Workers </option>
							<option value="Newly Employed Workers"> Newly Employed Workers </option>
							<option value="Continuing Workers"> Continuing Workers </option>
							<option value="Retired Workers"> Retired Workers </option>
							
						</select>
					</td>
				</tr>
				
				</table><br>
                    <center>
						<input type="submit" class="submit_this" name="SaveChanges" value="Save Changes"> 
					</center><br></form>
				<br>
				<center><a href="index.php?js_pageaction=deletesession&&js_sessionid=<?php echo $sessionid ?>" onclick="return confirm('Are you sure you want to delete this session from the system? \nBe careful, this action can not be reversed.')"><h1>Delete This Session</h1></a></center><br>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div></div></div></div>
<?php include JS_THEME."js_footer.php" ?>
    
