<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_salesitem ORDER BY salesitemid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div id="tooplate_main">    	        
        <div class="content_box">
		  <h2>Items List <div class="button_small" style="float:right;text-align:center;">
			<a href="#"><?php echo $database->as_num_rows( $as_db_query ) ?> Items</a>
			<a href="index.php?action=item_new">New Item</a></div></h2> 
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Class</th>
				  <th>Term</th>
				  <th>Year</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
					<tr onclick="location='index.php?action=salesitem_view&amp;as_salesitemid=<?php echo $row['salesitemid'] ?>'">
					   <td><?php echo $row['salesitem_content'] ?></td>
					  <td><?php echo $row['salesitem_title'] ?></td>
					  <td><?php echo $row['salesitem_price'] ?></td>		          
					</tr>			
				<?php } ?>			
                </tbody>
              </table>  
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
