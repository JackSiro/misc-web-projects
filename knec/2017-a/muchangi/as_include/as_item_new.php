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
					<td> Item Title:</td>
					<td><input type="text" autocomplete="off" name="item_title" required></td>
				</tr>
				 <tr>
					<td>Type of Container:</td>
					<td>
						<select name="item_container" style="padding-left:20px;" required >
							<option value="" > - Choose a Container - </option>			
							<option value="packet" > Packet </option>
							<option value="box" > box </option>
							<option value="carton" > Carton </option>
							<option value="can" > Can </option>
							<option value="bottle" > Bottle </option>
						</select>
					</td>
				</tr>
				<tr>
					<td> Item Unit:</td>
					<td><input type="text" autocomplete="off" name="item_unit" required></td>
				</tr>
				<tr>
					<td> Items Per Container:</td>
					<td><input type="text" autocomplete="off" name="item_items"></td>
				</tr>
				<tr>
					<td> Item Price:</td>
					<td><input type="text" autocomplete="off" name="item_price" required></td>
				</tr>
				<tr>
					<td> Item Icon:</td>
					<td><input name="item_icon" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="item_content" autocomplete="off" ></textarea></td>
				</tr>
				</table><br>
                        <input type="submit" class="submit_this" name="AddItem" value="Save and Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save and Close">
			  <br></form>
			</div>
			</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
