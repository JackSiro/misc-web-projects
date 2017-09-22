<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_item ORDER BY itemid ASC";
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
					<h2 class="meta"><?php echo $database->as_num_rows( $as_db_query ) ?> Sales List </h2> 
                    <div class="cleaner"></div>
			   <table class="tt_tb">
                <?php foreach( $results as $row ) { ?>
		        <tr>
				   <td>
				   	
			   <table class="tt_tb" border="1">
				<thead><tr class="tt_tr"><th colspan="3"><?php echo $row['item_title'] ?></th></tr></thead>
                <tbody>
                <?php
					$itemid = $row['itemid'];
					$as_db_query_i = "SELECT * FROM as_stock WHERE stock_itemid = '$itemid'";
					$results_i = $database->get_results( $as_db_query_i );
					foreach( $results_i as $row ) { ?>
		        <tr>
				   <td style="width:70px;"><img class="iconic" src="as_media/<?php echo $row['stock_img'] ?>" /></td>
				   <td><h4><?php echo $row['stock_unit'] ?></h4></td>
				   <td style="text-align:right;">
				   <?php 
						$as_salescount = "SELECT * FROM as_sales WHERE sales_stockid = ".$row['stockid'];
						$results_ii = $database->get_results( $as_salescount );
						echo $database->as_num_rows( $as_salescount );  ?>
				   </td>
		        </tr>				
				<?php } ?>
                    
					</tbody>
				</table>
				  </td>
		        </tr>
			
			<?php } ?>
			 
			  </table>
			</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
