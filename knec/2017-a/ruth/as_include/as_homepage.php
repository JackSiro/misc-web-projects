<?php include AS_THEME."as_header.php";?>
	<div id="site_content">
	<?php include AS_THEME."as_sidebar.php" ?>
	<h1>Welcome to <?php echo as_get_option('sitename') ?></h1>
		<table>
			<tr>
				<td><img src="as_media/index1.jpeg" /></td>
				<td><img src="as_media/index2.jpeg" /></td>
				<td><img src="as_media/index3.jpeg" /></td>
			</tr>
			<tr>
				<td><img src="as_media/index4.jpeg" /></td>
				<td><img src="as_media/index5.jpeg" /></td>
				<td><img src="as_media/index6.jpeg" /></td>
			</tr>
			<tr>
				<td><img src="as_media/index7.jpeg" /></td>
				<td><img src="as_media/index8.jpeg" /></td>
				<td><img src="as_media/index9.jpeg" /></td>
			</tr>
		</table>
		<h2>Place an Order</h2>
	<form role="form" method="post" action="index.php?action=payment_new" >
		<div class="form_settings">
			<p><span>No. of Customers</span><input type="text" autocomplete="off" name="customers" required></p>
			<p><span>Select First Item</span>
				<select name="itemone" required>
					<option value="Ugali">Ugali</option>
					<option value="Chapati">Chapati</option>
					<option value="Rice">Rice</option>
					<option value="Soda">Soda</option>
					<option value="Tea">Tea</option>
				</select>
			</p>
			<p><span>Select Second Item</span>
				<select name="itemtwo">
					<option value="">None</option>
					<option value="Beans">Beans</option>
					<option value="Beef">Beef</option>
					<option value="Dengu">Dengu</option>
					<option value="Mix">Mix</option>
					<option value="Mandazi">Mandazi</option>
					<option value="Chicken">Chicken</option>
				</select>
			</p>
			<p><span>Date</span><input type="text" autocomplete="off" name="date" required></p>
			<p><span>Time</span><input type="text" autocomplete="off" name="time" required></p>
			<p><span>Bill (kshs)</span><input type="text" autocomplete="off" name="amount" required></p><br>
			<p><span></span><input type="submit" class="readmore" name="PlaceOrder" value="Place Order"></p>
		</div>
	</form>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
