<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	
	$js_db_query = "SELECT * FROM js_patient ORDER BY patid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include JS_THEME."js_sidebar_adm.php";	?>	
          <h2>PATIENTS LIST</h2><hr>
          <ul class="sb_menu">
			<?php foreach( $results as $row ) { ?>
		        <li><a href="time.php"><strong> .:* <?php echo $row['pat_fullname'] ?></strong> -<?php echo $row['pat_sex'] ?> | <?php echo $row['pat_mobile'].' '.$row['pat_address'] ?></a></li>
			<?php } ?>
          </ul><hr>
		  <h4><a href="admin.php?action=newpat">Add a new patient</a> | (<?php echo $database->js_num_rows( $js_db_query ) ?>) Patients</h4>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
