<?php 

	$itemid = $results['item'];
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $itemid, $item_name, $item_image, $item_content, $item_price, $item_deposit, $item_instal, $item_months, $item_stock) = $database->get_row( $as_db_query );
	}
include AS_THEME."as_header.php"; ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
					  <h1>Item Sell: <?php echo $item_name ?></h1> 
					  <br><hr><br>
					  <center><h2>Fill in Customer Details</h2></center>
						<div class="main_content">
							<form role="form" method="post" action="index.php?action=item_sell&&as_itemid=<?php echo $itemid ?>" >
							<input type="hidden" name="loginid" value="<?php echo $$_SESSION['siteuser_user'] ?>"/>
							<table style="width:100%;font-size:20px;">
								<tr>
									<td>First  Name:</td>
									<td><input type="text" autocomplete="off" name="fname"></td>
								</tr>
								<tr>
									<td>Second Name:</td>
									<td><input type="text" autocomplete="off" name="surname"></td>
								</tr>
								<tr>
									<td>Email Address:</td>
									<td><input type="text" autocomplete="off" name="email"></td>
								</tr>
								
								<tr>
									<td>Mobile (Optional):</td>
									<td><input type="text" autocomplete="off" name="mobile"></td>
								</tr>
								
								<tr>
									<td>Preferred Username:</td>
									<td><input type="text" autocomplete="off" name="username"></td>
								</tr>
								
								<tr>
									<td>Preferred Password:</td>
									<td><input type="password" autocomplete="off" name="password"></td>
								</tr>
							 <tr>
								<td>Mode of Payment</td>
								<td>
									<select name="paymode" style="padding-left:20px;" required >
										<option value="" > - Choose Mode - </option>			
										<option value="Cash" > Cash </option>
										<option value="M-Pesa" > M-Pesa </option>
										<option value="Airtel Money" > Airtel Money </option>
										<option value="VISA Card" > VISA Card </option>
									</select>
								</td>
							</tr>
				<tr><td></td><td></td></tr>
				<tr>
					<td></td>
					<td><input type="submit" class="submit_this" name="SellItem" value="Sell Item"></td>
				</tr>
                
				</table>
			  <br></form>
			</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
