<?php 

	$leaveid = $results['leave'];
	$js_db_query = "SELECT * FROM js_leave WHERE leaveid = '$leaveid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $leaveid, $leave_code, $leave_payslip, $leave_slug, $leave_title, $leave_content, $leave_postedby, $leave_posted, $leave_publisher, $leave_subject, $leave_img, $leave_file, $leave_updated, $leave_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Leaves: <?php echo $leave_title.' | '.$leave_code ?></h1> 
          <br><br>
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "js_media/".$leave_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_pageaction=editleave&&js_leaveid=<?php echo $leaveid ?>"><h1>Edit Leave</h1></a>
					<hr class="detail_info_hr"/>
					<a href="js_uploads/<?php echo $leave_file ?>"><h1>Download Leave</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_pageaction=deleteleave&&js_leaveid=<?php echo $leaveid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $leave_title ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Leave</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $leave_title ?></h2>
					<h2>PaySlip: <?php echo js_payslip_leave($leave_payslip) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $leave_content ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $leave_publisher ?></h2>
					<h2>Subject: <?php echo $leave_subject ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($leave_posted)); ?><h2>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
