<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
		
<?php 
	$database = new Js_Dbconn();			
	
	$search = $_GET['js_search'];
	$searchcat = $_GET['js_catid'];
	if ($searchcat<=0){
		$search_cat = "All";
		$js_db_query = "SELECT * FROM js_elibrary
		WHERE item_title like '%$search%'
		OR item_content like '%$search%'
		OR item_publisher like '%$search%'
		OR item_subject like '%$search%'";
	} else {
		$search_cat = js_cat_item($searchcat);
		$js_db_query = "SELECT * FROM js_elibrary
		WHERE item_title like '%$search%'
		OR item_content like '%$search%'
		OR item_publisher like '%$search%'
		OR item_subject like '%$search%' 
		OR item_cat like '%$searchcat%'";
	}
	
	$results = $database->get_results( $js_db_query );
	
?>
	  
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Elibrary Materials found
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newitem">Add New Material</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="js_search" id="js_search" placeholder="Search the library" value="<?php echo $search ?>" />
			</td><td>
				<select name="js_catid">
				<option  value="<?php echo $searchcat ?>"><?php echo $search_cat ?></option>
			<?php $js_cat_qry = "SELECT * FROM js_type ORDER BY cat_title ASC";
				$cat_results = $database->get_results( $js_cat_qry );
				
				foreach( $cat_results as $js_cat ) { ?>
						<option value="<?php echo $js_cat['catid'] ?>">  <?php echo $js_cat['cat_title'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Category</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=viewitem&amp;js_itemid=<?php echo $row['itemid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['item_img'] ?>" /></td>
				   <td><?php echo js_cat_item($row['item_cat']) ?></td>
				   <td><?php echo $row['item_title'] ?></td>
		          <?php //echo substr($row['item_content'],0,100).'...' ?>
				  <td><?php echo $row['item_publisher'] ?></td>
				  <td><?php echo $row['item_subject'] ?></td>
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
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
