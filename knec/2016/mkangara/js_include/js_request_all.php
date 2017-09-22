<?php include JS_THEME."js_header.php"; 
	$database = new Js_Dbconn();			
	$js_db_query = "SELECT * FROM js_request ORDER BY requestid DESC LIMIT 20";
	$results = $database->get_results( $js_db_query );
?>
	<div class="container">                
		<div class="row box-5">
			<h2><?php echo js_get_option('sitename') ?></h2>
			<div class="page_wrap">
				<h2><?php echo $database->js_num_rows( $js_db_query ) ?> Requests | <a href="index.php?action=request_new">New Request</a></h2><br>
				<!--<table class="tb_dashboard">-->
				<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Request</th>
				  <th>Quantity</th>
				  <th>Amount</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=request_view&amp;js_requestid=<?php echo $row['requestid'] ?>'">
				   <td><?php echo $row['request_type'] ?></td>
				  <td><?php echo $row['request_item'] ?></td>
				  <td><?php echo $row['request_payment'] ?>/=</td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>    
              </div>
			</div>
        </div>
    </div>
<?php include JS_THEME."js_footer.php" ?>
   