<?php 

	$sessionid = $results['session'];
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $sessionid, $session_code, $session_farmer, $session_slug, $session_title, $session_content, $session_postedby, $session_posted, $session_publisher, $session_subject, $session_img, $session_file, $session_updated, $session_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_session">
		<br>
		  <h1>Sessions: <?php echo $session_title.' | '.$session_code ?></h1> 
          <br><br>
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "js_media/".$session_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_pageaction=editsession&&js_sessionid=<?php echo $sessionid ?>"><h1>Edit Session</h1></a>
					<hr class="detail_info_hr"/>
					<a href="js_uploads/<?php echo $session_file ?>"><h1>Download Session</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_pageaction=deletesession&&js_sessionid=<?php echo $sessionid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $session_title ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Session</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $session_title ?></h2>
					<h2>Farmer: <?php echo js_farmer_session($session_farmer) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $session_content ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $session_publisher ?></h2>
					<h2>Subject: <?php echo $session_subject ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($session_posted)); ?><h2>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
