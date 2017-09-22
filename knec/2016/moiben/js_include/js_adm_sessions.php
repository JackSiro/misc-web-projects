<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	$js_db_query = "SELECT * FROM js_session ORDER BY sessionid DESC LIMIT 20";
	$database = new Js_Dbconn();			
	$results = $database->get_results( $js_db_query );
		
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include JS_THEME."js_sidebar_adm.php";	?>	
          <h2 class="dth1">Daily Doctor Schedules (in minutes)</h2>
          
          <table class="Doctortimes">
			<tr class="firstrow"><th>PATIENT</th><th>DOCTOR</th><th>TIME IN</th><th>TIME OUT</th></tr>
			<?php foreach( $results as $row ) { ?>		        
			  <tr>
				<td><?php echo $row['sess_doctor'] ?></td>
				<td><?php echo $row['sess_patient'] ?></td>
				<td><?php echo $row['sess_timein'] ?></td>
				<td><?php echo $row['sess_timeout'] ?></td>
			  </tr>
			<?php } ?>
			
			
			</table>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
