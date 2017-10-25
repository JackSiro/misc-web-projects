<?php include AS_THEME."as_header.php"; ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>

		  <h1>Add an Item</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=item_new" enctype="multipart/form-data" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<table style="width:100%;font-size:20px;">
				<tr>
					<td> Item Name:</td>
					<td style="width:70%;"><input type="text" autocomplete="off" name="item_name" required></td>
				</tr>
				<tr>
					<td> Item Image:</td>
					<td><input name="item_image" type="file" accept="image/*"></td>
				</tr>
				<tr>
					<td> Item Price:</td>
					<td><input type="number" min="1000" autocomplete="off" name="item_price" required></td>
				</tr>
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="item_content" autocomplete="off" ></textarea></td>
				</tr>
				<tr>
					<td> Hire Purchase Deposit:</td>
					<td><input type="number" min="1000" autocomplete="off" name="item_deposit" required></td>
				</tr>
				<tr>
					<td> Installment Months:</td>
					<td><input type="number" min="5" max="36" autocomplete="off" value="5" name="item_months" required></td>
				</tr>
				<tr>
					<td>Number of Items:</td>
					<td><input type="number" min="1" autocomplete="off" name="item_stock" required></td>
				</tr>
				<!--
				 <tr>
					<td>Mode of Payment</td>
					<td>
						<select name="item_container" style="padding-left:20px;" required >
							<option value="" > - Choose Mode - </option>			
							<option value="Cash" > Cash </option>
							<option value="M-Pesa" > M-Pesa </option>
							<option value="Airtel Money" > Airtel Money </option>
							<option value="VISA Card" > VISA Card </option>
						</select>
					</td>
				</tr>-->
				<tr><td></td><td></td></tr>
				<tr>
					<td></td>
					<td><input type="submit" class="submit_this" name="AddItem" value="Save and Add" />
					<input type="submit" class="submit_this" name="AddClose" value="Save and Close"></td>
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
    
