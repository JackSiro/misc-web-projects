<?php include AS_THEME."as_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<?php $as_db_query = "SELECT * FROM as_doctor ORDER BY doctorid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	<div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>DOCTOR LIST</h2><hr>
          <ul class="sb_menu">
			<?php foreach( $results as $row ) { ?>
		        <li><a href="time.php"><strong> .:* Doctor <?php echo $row['doctor_name'] ?></strong> -<?php echo $row['doctor_email'] ?> | <?php echo $row['doctor_mobile'] ?></a></li>
			<?php } ?>
          </ul><hr>
		  <h4><a href="admin.php?action=newdoc">Add a new Doctor</a> | (<?php echo $database->as_num_rows( $as_db_query ) ?>) Doctors</h4>
        </div>
      </div>
		<?php// include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
