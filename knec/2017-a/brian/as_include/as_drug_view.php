<?php 

	$drugid = $results['drugitem'];
	$as_db_query = "SELECT * FROM as_drug WHERE drugid = '$drugid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $drugid, $drug_slug, $drug_title, $drug_icon, $drug_content, $drug_unit, $drug_container, $drug_items, $drug_price, $drug_stock) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Edit this  Drug<a style="float:right;width:300px;text-align:center;" href="index.php?action=drug_delete&&as_drugid=<?php echo $drugid ?>" onclick="return confirm('Are you sure you want to delete: This drug from the system? \nBe careful, this action can not be reversed.')">Delete Drug</a> </h1>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=drug_view&&as_drugid=<?php echo $drugid ?>" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<div class="form_settings">
				<p><span>Drug Title:</span><input type="text" autocomplete="off" name="drug_title" value="<?php echo $drug_title ?>" required></p>
				<p><span>Type of Container:</span>
					<select name="drug_container" style="padding-left:20px;" required >
						<option value="<?php echo $drug_container ?>" ><?php echo $drug_container ?></option>			
						<option value="packet" > Packet </option>
						<option value="box" > box </option>
						<option value="carton" > Carton </option>
						<option value="can" > Can </option>
						<option value="bottle" > Bottle </option>
					</select>
				</p>
				<p><span>Drug Unit:</span><input type="text" autocomplete="off" name="drug_unit" value="<?php echo $drug_unit ?>" required></p>
				<p><span>Items Per Container:</span><input type="text" autocomplete="off" name="drug_items" value="<?php echo $drug_items ?>"></p>
				<p><span>Drug Price:</span><input type="text" autocomplete="off" name="drug_price" value="<?php echo $drug_price ?>" required></p>
                <p><span>Description (500 max):</span><textarea name="drug_content" autocomplete="off" ><?php echo $drug_content ?></textarea></p>
				<p style="padding-top: 15px"><span><input type="submit" class="submit" name="SaveItem" value="Save Changes"></span><input type="submit" class="submit" name="SaveClose" value="Save and Close"></p>
				</div>
			</form>
		</div>
    </div>
    </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
