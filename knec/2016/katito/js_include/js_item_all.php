<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_item ORDER BY itemid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Stationery Items
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=item_new">New Stationery Item</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<!--<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="js_search" id="js_search" placeholder="Search the warehouse" />
			</td><td>
				<select name="js_catid">
				<option  value=""  > All </option>
			<?php /* $js_type_qry = "SELECT * FROM js_type ORDER BY type_title ASC";
				$type_results = $database->get_results( $js_type_qry );
				
				foreach( $type_results as $js_type ) { ?>
						<option value="<?php echo $js_type['typeid'] ?>">  <?php echo $js_type['type_title'] ?></option>
				<?php } */?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form> -->
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Type</th>
				  <th>Qty</th>
				  <th>Unit</th>
				  <th>Price @</th>
				  <th>Supplier</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=item_view&amp;js_itemid=<?php echo $row['itemid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['item_img'] ?>" /></td>
				   <td><?php echo js_type_item($row['item_type']) ?></td>
				   <td><?php echo $row['item_quantity'] ?></td>
				  <td><?php echo $row['item_unit'] ?></td>
				  <td><?php echo $row['item_price'] ?>/=</td>
				  <td><?php echo js_supplier_item($row['item_supplier']) ?></td>
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
    
