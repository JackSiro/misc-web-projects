<?php 

	$suppid = $results['supp'];
	$js_db_query = "SELECT * FROM js_supplier WHERE suppid = '$suppid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $suppid, $supp_name, $supp_fullname, $supp_sex, $supp_email, $supp_joined, $supp_mobile, $supp_address, $supp_web, $supp_avatar) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
            <h2 class="h2-line-2">Supplier Information</h1> 
          <br><hr><br>
			<div class="main_content">
				
					<h2><?php echo $supp_fullname ?></h2>
					<h2>Email: <?php echo $supp_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($supp_joined)); ?><h2>
				<hr class="detail_info_hr"/>
				<h1><a href="index.php?action=editsupp&&js_suppid=<?php echo $suppid ?>">Edit User</a> | 
				<a href="index.php?action=supp_delete&&js_suppid=<?php echo $suppid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $supp_name ?> from the system? \nBe careful, this action can not be reversed.')">Delete User</a></h1>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
