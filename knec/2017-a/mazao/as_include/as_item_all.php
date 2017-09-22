<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
		$as_db_query = "SELECT * FROM as_item ORDER BY itemid DESC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?>
	  <div id="content"> 
        <?php include AS_THEME."as_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Cereal Items
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=item_new">New Cereal Item</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<!--<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="as_search" id="as_search" placeholder="Search the warehouse" />
			</td><td>
				<select name="as_catid">
				<option  value=""  > All </option>
			<?php /* $as_type_qry = "SELECT * FROM as_type ORDER BY type_title ASC";
				$type_results = $database->get_results( $as_type_qry );
				
				foreach( $type_results as $as_type ) { ?>
						<option value="<?php echo $as_type['typeid'] ?>">  <?php echo $as_type['type_title'] ?></option>
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
		        <tr onclick="location='index.php?action=item_view&amp;as_itemid=<?php echo $row['itemid'] ?>'">
				   <td><img class="iconic" src="as_media/<?php echo $row['item_img'] ?>" /></td>
				   <td><?php echo as_type_item($row['item_type']) ?></td>
				   <td><?php echo $row['item_quantity'] ?></td>
				  <td><?php echo $row['item_unit'] ?></td>
				  <td><?php echo $row['item_price'] ?>/=</td>
				  <td><?php echo as_supplier_item($row['item_supplier']) ?></td>
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
    
