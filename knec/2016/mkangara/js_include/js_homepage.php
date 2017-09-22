<?php include JS_THEME."js_header.php" ?>
    <div class="container">                
		<div class="row box-5">
			<h2><?php echo js_get_option('sitename') ?></h2>
			<div class="page_wrap">
				<h3>Site Dashboard</h3><br>
						<table class="tb_dashboard">
				<tr>
				  <td><div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_products = "SELECT * FROM js_product ORDER BY productid DESC LIMIT 5";
						$results_i = $database->get_results( $js_products );
						?>
					<h1><?php echo $database->js_num_rows( $js_products ) ?> Products</h1><hr>
					<?php foreach( $results_i as $row ) { ?>
					<span style="font-size: 15px;"><?php echo $row['product_quantity']." of ".$row['product_title'].' @ '.$row['product_price'].'/=' ?></span><br>			<hr>
					<?php } ?>
					</div>
</td>
				  <td><div class="td_dashboard">
					<?php 
						$js_requests = "SELECT * FROM js_request ORDER BY requestid DESC LIMIT 5";
						$results_ii = $database->get_results( $js_requests );
						?>
					<h1><?php echo $database->js_num_rows( $js_requests ) ?> Requests</h1><hr>
					<?php foreach( $results_ii as $row ) { ?>
					<span style="font-size: 15px;"><?php echo $row['request_type'].' of '.$row['request_item'] ?></span><br><hr>			
					<?php } ?>
					</div></td>
</td>				
				</tr>
				
				<tr>
				  <td>
				  <div class="td_dashboard">
					<?php 
						$js_invoices = "SELECT * FROM js_invoice ORDER BY invoiceid DESC LIMIT 5";
						$results_iii = $database->get_results( $js_invoices );
						?>
					<h1><?php echo $database->js_num_rows( $js_invoices ) ?> Invoices</h1><hr>
					<?php foreach( $results_iii as $row ) { ?>
					<span style="font-size: 15px;"><?php echo $row['invoice_type'].' '.$row['invoice_item'] ?></span><br>			<hr>
					<?php } ?>
					</div>
				  </td>
					<td><div class="td_dashboard">
					<?php 
						$js_schedules = "SELECT * FROM js_schedule ORDER BY scheduleid DESC LIMIT 5";
						$results_iv = $database->get_results( $js_schedules );
						?>
					<h1><?php echo $database->js_num_rows( $js_schedules ) ?> Schedules</h1><hr>
					<?php foreach( $results_iv as $row ) { ?>
					
					<span style="font-size: 15px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden;">
					<?php echo $row['schedule_user']."'s schedule at ".$row['schedule_time'] ?> </span><br>	<hr>		
					<?php } ?>
					</div></td>				
				</tr>
								<tr>
				  <td><div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_users = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 5";
						$results_v = $database->get_results( $js_users );
						?>
					<h1><?php echo $database->js_num_rows( $js_users ) ?> Site Users</h1><hr>
					<?php foreach( $results_v as $row ) { ?>
					<span style="font-size: 15px;"><?php echo $row['user_fname'].' '.$row['user_surname'] ?></span><br>	<hr>		
					<?php } ?>
					</div></td>				

				<td><div class="td_dashboard">
				<h1>Other Links</h1><hr>
					<a href="index.php?action=options"><h2>Go toSite Options</h2></a>
					</div>
					</td>
</td>				
				</tr>

				
			   </table>
				</div>    
              </div>
			</div>
        </div>
    </div>
<?php include JS_THEME."js_footer.php" ?>
   