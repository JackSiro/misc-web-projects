<?php include AS_THEME."as_header.php" ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
						<h1>Sell an Item</h1><hr>
						<?php as_feedback_message();
						$database = new As_Dbconn();			
						
						$as_item_query = "SELECT * FROM as_item ORDER BY itemid ASC";			
						$results = $database->get_results($as_item_query ); 
						
						if ($database->as_num_rows( $as_item_query)<=0) { ?>
							<h2 style="color:#000">You need to fix the following errors before you add a Item</h2>
							<ul>
							<h3><li><a href="index.php?action=item_new">No Items found! Add an Item</a></li><h3>
							
							</ul>
						<?php } else { ?>
						<form role="form" method="post" name="Stock" action="index.php?action=sales_new" >
						<table class="tt_tb">
							<thead>
								<tr class="tt_tr">
									<th class="my_th">Title</th>
									<th class="my_th">Stock</th>
									<th class="my_th">Quantity</th>
									<th class="my_th">Price (Kshs)</th>
								</tr>
							</thead>
						</table>
						<table class="tt_tb" id="saleNow"></table>
						<input type="hidden" name="total_price" id="total_price" value="">
						<table class="tt_tb">
							<thead>
								<tr class="tt_tr">
									<th class="my_th"></th>
									<th class="my_th"></th>
									<th class="my_th">TOTAL</th>
									<th class="my_th" id="total_pricenow">.00</th>
								</tr>
							</thead>
						</table>
						</form>
						 
						<table class="my_data">
							<tr id="itemsselling">
								<td><input type="text" name="getItemTitle" id="getItemTitle"/></td>
								<td id="itemsearchreslt"></td>
							</tr>
						</table>
						<!--
							Total Price (Kshs):
							<input type="text" name="total_price" id="total_price" readonly="readonly">
							<input type="hidden" name="itemid" id="itemid" >
							<input type="hidden" name="userid" id="userid" >
									<center><input type="submit" class="submit_this" name="SubmitSales" value="Submit">
						 </center><br>
						 -->
					<?php } ?>
				</div>
				</div>
			</div>
		</div>
	</div>
 <?php include AS_THEME."as_footer.php" ?>
  
