<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	
	$as_db_query = "SELECT * FROM as_stock ORDER BY stock_itemid ASC LIMIT 50";
	$results = $database->get_results( $as_db_query );
?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta"><?php echo $database->as_num_rows( $as_db_query ) ?>  Stock Items
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=stock_new">New Stock Item</a> </h2>
                    <div class="cleaner"></div>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Item</th>
				  <th>Quantity</th>
				  <th>Stock</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$itemid = $row['stock_itemid'];
				?>
					<tr onclick="location='index.php?action=stock_edit&amp;as_stockid=<?php echo $row['stockid'] ?>'">
					   <td></td>
					   <td><?php echo as_item_item($itemid) ?></td>
					   <td><?php echo $row['stock_quantity'].' '.as_item_container($itemid).'s' ?></td>
					   <td><?php echo $row['stock_quantity']*as_item_items($itemid).' '.as_item_unit($itemid).'s' ?></td>
					   <td></td>
					</tr>			
					<?php } ?>			
				  </tbody>
				</table>
			</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
