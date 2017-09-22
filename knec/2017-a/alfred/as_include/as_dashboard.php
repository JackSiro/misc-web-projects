<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">	
	  <div id="content">
        <div class="content_item">

		  <center> 
         <div class="aboutus">
			<h1><?php echo as_get_option('sitename') ?></h1><hr>
			<p> Welcome to <?php echo as_get_option('sitename') ?>. <?php echo as_get_option('description') ?>. 
			<br><br>
			</p>
			<table class="tt_tb" style="font-size:30px;">
				<thead>
					<tr>
						<th>Quick Navigation</th>
					</tr>
				</thead>
				<tbody>
					<tr onclick="location='index.php?action=drug_all'">
						<td> &raquo; Drug Items</td>
					</tr>
					<tr onclick="location='index.php?action=stock_all'">
						<td> &raquo; Drug Stocks</td>
					</tr>
					<tr onclick="location='index.php?action=sales_all'">
						<td> &raquo; Drug Sales</td>
					</tr>
				<tbody>
			</table>
		</div>
          <div class="mainbody">
			<?php as_feedback_message();
			$database = new As_Dbconn();			
			
			$as_drug_query = "SELECT * FROM as_drug ORDER BY drugid ASC";			
			$results = $database->get_results($as_drug_query  ); 
			
			if ($database->as_num_rows( $as_drug_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Drug Item</h2>
				<ul>
				<h3><li><a href="index.php?action=drug_new">No Drug Item found! Add an Drug Item</a></li><h3>
				
				</ul>
			<?php } else { ?>
			<h2>Sell a Drug Item</h2><hr><br>
			<form role="form" method="post" name="Stock" action="index.php?action=dashboard" >
                <table style="width:100%;font-size:20px;">				
                <tr>
					<td colspan="2"><input type="text" autocomplete="off" name="drugitem" id="drugitem" style="width:90%;">
						<div id="drugitemreslt"></div></td>
				</tr>
				<tr>
					<td>Drug Title:</td>
					<td><input type="text" autocomplete="off" name="drug_title" id="drug_title" required readonly="readonly"></td>
				</tr>	
				<tr>
					<td>Items in Stock:</td>
					<td><input type="text" autocomplete="off" name="drug_stock" id="drug_stock" required readonly="readonly"></td>
				</tr>				
				<tr>
					<td><span id="drug_containers">Number of Containers:</span></td>
					<td><input type="text" autocomplete="off" name="drug_quantity" id="drug_quantity" required ></td>
				</tr>
				<tr> 
					<td><span id="drug_price_per">Drug Price (Kshs):</span></td>
					<td><input type="text" autocomplete="off" name="drug_price" id="drug_price" required readonly="readonly"></td>
				</tr>
				<tr>
					<td>Total Price (Kshs):</td>
					<td><input type="text" autocomplete="off" name="total_price" id="total_price" required readonly="readonly"></td>
				</tr>
								
				</table><br>
				<input type="hidden" name="drug_drugid" id="drug_drugid" >
				<input type="hidden" name="userid" id="userid" >
                        <center><input type="submit" class="submit_this" name="SubmitSales" value="Submit">
			  </center><br>
			  </form>
		<?php } ?>
				
	    </div>
	  </center>
		  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."as_footer.php" ?>
    
