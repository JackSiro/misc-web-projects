<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">	
	  <div id="content"> 
        <div class="content_item">

			<?php as_feedback_message();
			$database = new As_Dbconn();			
			
			$as_item_query = "SELECT * FROM as_item ORDER BY itemid ASC";			
			$results = $database->get_results($as_item_query  ); 
			
			if ($database->as_num_rows( $as_item_query)<=0) { ?>
				<h3><a href="index.php?action=item_new">No Item found! Add an Item</a><h3>
			<?php } else { ?>
			<h2>Sell an Item</h2><hr><br>
			<form role="form" method="post" name="Stock" action="index.php?action=dashboard" >
                <table style="width:100%;font-size:20px;">				
                <tr>
					<td colspan="2"><input type="text" autocomplete="off" name="itemitem" id="itemitem" style="width:90%;">
						<div id="itemitemreslt"></div></td>
				</tr>
				<tr>
					<td>Item Title:</td>
					<td><input type="text" autocomplete="off" name="item_title" id="item_title" required readonly="readonly"></td>
				</tr>	
				<tr>
					<td>Items in Stock:</td>
					<td><input type="text" autocomplete="off" name="item_stock" id="item_stock" required readonly="readonly"></td>
				</tr>				
				<tr>
					<td><span id="item_containers">Number of Containers:</span></td>
					<td><input type="text" autocomplete="off" name="item_quantity" id="item_quantity" required ></td>
				</tr>
				<tr> 
					<td><span id="item_price_per">Item Price (Kshs):</span></td>
					<td><input type="text" autocomplete="off" name="item_price" id="item_price" required readonly="readonly"></td>
				</tr>
				<tr>
					<td>Total Price (Kshs):</td>
					<td><input type="text" autocomplete="off" name="total_price" id="total_price" required readonly="readonly"></td>
				</tr>
								
				</table><br>
				<input type="hidden" name="item_itemid" id="item_itemid" >
				<input type="hidden" name="userid" id="userid" >
                        <center><input type="submit" class="submit_this" name="SubmitSales" value="Submit">
			  </center><br>
			  </form>
		<?php } ?>
				
		  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."as_footer.php" ?>
    
