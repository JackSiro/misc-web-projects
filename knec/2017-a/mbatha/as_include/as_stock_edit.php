<?php 

	$stockid = $results['shopitem'];
	$as_db_query = "SELECT * FROM as_stock WHERE stockid = '$stockid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $stockid, $stock_itemid, $stock_unit, $stock_postedby, $stock_posted, $stock_quantity, $stock_img, $stock_updated, $stock_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Edit a Item</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?action=stock_edit&&as_stockid=<?php echo $stockid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
								
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname" value="<?php echo $stock_unit ?>" required ></td>
				</tr>
				<tr>
					<td>Item Item:</td>
					<td><select name="category" style="padding-left:20px;" required>
						<option value="<?php echo $stock_itemid ?>" ><?php echo as_item_item($stock_itemid) ?></option>
					<?php $as_db_query = "SELECT * FROM as_item ORDER BY itemid ASC";
						$database = new As_Dbconn();			
						$results = $database->get_results( $as_db_query );
					
						foreach( $results as $row ) { ?>
						  <option value="<?php echo $row['itemid'] ?>">  <?php echo $row['item_title'] ?></option>
					<?php } ?>
						</select>
					</td>
				</tr>
                <tr>
					<td>Item Slogan:</td>
					<td><input type="text" autocomplete="off" name="slogan" value="<?php echo $stock_quantity ?>" required ></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br>
			  </form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
