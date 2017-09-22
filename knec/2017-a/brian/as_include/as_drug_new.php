<?php include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Add a Drug</h1>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=drug_new">
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<div class="form_settings">
				<p><span>Drug Title:</span><input type="text" autocomplete="off" name="drug_title" required></p>
				<p><span>Type of Container:</span>
						<select name="drug_container" style="padding-left:20px;" required >
							<option value="" > - Choose a Container - </option>			
							<option value="packet" > Packet </option>
							<option value="box" > box </option>
							<option value="carton" > Carton </option>
							<option value="can" > Can </option>
							<option value="bottle" > Bottle </option>
						</select>
					</p>
				<p><span>Drug Unit:</span><input type="text" autocomplete="off" name="drug_unit" required></p>
				<p><span>Items Per Container:</span><input type="text" autocomplete="off" name="drug_items"></p>
				<p><span>Drug Price:</span><input type="text" autocomplete="off" name="drug_price" required></p>
                <p><span>Description (500 max):</span><textarea name="drug_content" autocomplete="off" ></textarea></p>
				<p style="padding-top: 15px"><span><input type="submit" class="submit" name="AddItem" value="Save and Add"></span><input type="submit" class="submit" name="AddClose" value="Save and Close"></p>
				</div>
			</form>
		</div>
    </div>
    </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>  
