<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
	$search = $_GET['as_search'];
	$searchcategory = $_GET['as_itemid'];
	if ($searchcategory<=0){
		$search_item = "All";
		$as_db_query = "SELECT * FROM as_stock
		WHERE stock_title like '%$search%'
		OR stock_content like '%$search%'
		OR stock_publisher like '%$search%'
		OR stock_subject like '%$search%'";
	} else {
		$search_item = as_item_item($searchcategory);
		$as_db_query = "SELECT * FROM as_stock
		WHERE stock_title like '%$search%'
		OR stock_content like '%$search%'
		OR stock_publisher like '%$search%'
		OR stock_subject like '%$search%' 
		OR stock_itemid like '%$searchcategory%'";
	}
	
	$results = $database->get_results( $as_db_query );
	
?>
	  <div id="content"> 
       
        <div class="content_item">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Materials found
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newitem">Add New Material</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="as_search" id="as_search" placeholder="Search the library" value="<?php echo $search ?>" />
			</td><td>
				<select name="as_itemid">
				<option  value="<?php echo $searchcategory ?>"><?php echo $search_item ?></option>
			<?php $as_item_qry = "SELECT * FROM as_item ORDER BY item_title ASC";
				$item_results = $database->get_results( $as_item_qry );
				
				foreach( $item_results as $as_item ) { ?>
						<option value="<?php echo $as_item['itemid'] ?>">  <?php echo $as_item['item_title'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Item</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=viewitem&amp;as_stockid=<?php echo $row['stockid'] ?>'">
				   <td><img class="iconic" src="as_media/<?php echo $row['stock_img'] ?>" /></td>
				   <td><?php echo as_item_item($row['stock_itemid']) ?></td>
				   <td><?php echo $row['stock_title'] ?></td>
		          <?php //echo substr($row['stock_content'],0,100).'...' ?>
				  <td><?php echo $row['stock_publisher'] ?></td>
				  <td><?php echo $row['stock_subject'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
