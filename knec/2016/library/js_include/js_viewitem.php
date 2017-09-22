<?php 

	$itemid = $results['item'];
	$js_db_query = "SELECT * FROM js_elibrary WHERE itemid = '$itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $itemid, $item_code, $item_cat, $item_slug, $item_title, $item_content, $item_postedby, $item_posted, $item_publisher, $item_subject, $item_img, $item_updated, $item_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_item">
		<br>
		  <h1>Elibrary Item: <?php echo $item_title.' | '.$item_code ?></h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "js_media/".$item_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=edititem&&js_itemid=<?php echo $itemid ?>"><h1>Edit Item</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteitem&&js_itemid=<?php echo $itemid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $item_title ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Item</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $item_title ?></h2>
					<h2>Category: <?php echo js_cat_item($item_cat) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $item_content ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $item_publisher ?></h2>
					<h2>Subject: <?php echo $item_subject ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($item_posted)); ?><h2>
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
    
