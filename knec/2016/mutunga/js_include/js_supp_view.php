<?php 

	$suppid = $results['supp'];
	$js_db_query = "SELECT * FROM js_supplier WHERE suppid = '$suppid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $suppid, $supp_name, $supp_fullname, $supp_sex, $supp_email, $supp_joined, $supp_mobile) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">

		  <br> 
         <?php include JS_THEME."js_slide.php" ?>
		  <h1>Supplier Profile</h1> 
          <br><hr><br>
			<div class="main_content">
					
			    <div class="detail_info">
					<h2><?php echo $supp_fullname ?></h2>
					<hr class="detail_info_hr"/>
					<h2>Email: <?php echo $supp_email ?></h2>
					<h2>Mobile: <?php echo $supp_mobile ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($supp_joined)); ?><h2>
				</div>
				<h1><a href="index.php?action=supp_edit&&js_suppid=<?php echo $suppid ?>">Edit Supplier</a>
					 | 
					<a href="index.php?action=supp_delete&&js_suppid=<?php echo $suppid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $supp_name ?> from the system? \nBe careful, this action can not be reversed.')">Delete Supplier</a></h1>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
