<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
		$js_db_query = "SELECT * FROM js_staff ORDER BY staffid DESC LIMIT 20";
	$database = new Js_Dbconn();			
	$results = $database->get_results( $js_db_query );
	?>
	
	<div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <center><h2>Staff on Duty</h2>
          
          <table class="staff_t" cellspacing='0'> 
		  <tr><th>STAFF NAME</th><th>MOBILE</th><th>STATION</th><th>VITAL TASK</th></tr>

		  <?php foreach( $results as $row ) { ?>		        
			  <tr>
				<td><?php echo $row['staff_fullname'] ?></td>
				<td><?php echo $row['staff_mobile'] ?></td>
				<td><?php echo $row['staff_station'] ?></td>
				<td><?php echo $row['staff_task'] ?></td>
			  </tr>
			<?php } ?>
			
			</table></center>
        </div>
      </div>
      <?php include JS_THEME."js_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
