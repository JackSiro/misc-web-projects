<?php 

	$itemid = $results['category'];
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $itemid, $item_slug, $item_title, $item_icon, $item_content) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
              <div class="panel" id="home">
                <div class="content_section">
                  <h2>Edit item</h2> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=item_view&&as_itemid=<?php echo $itemid ?>" enctype="multipart/form-data" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<table style="width:100%;font-size:20px;">
				<tr>
					<td>Item Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $item_title ?>"></td>
				</tr>
				<tr>
					<td> Item Unit:</td>
					<td><input type="text" autocomplete="off" name="unit" value="<?php echo $item_unit ?>"></td>
				</tr>
				<tr>
					<td> Item Price:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $item_price ?>"></td>
				</tr>
				<tr>
					<td>Item Icon:</td>
					<td>		
						<input type="hidden" name="categoryicon" value="<?php echo $item_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$item_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $item_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveCart" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
			</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
