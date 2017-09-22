<?php 

	$houseid = $results['house'];
	$js_db_query = "SELECT * FROM js_house WHERE houseid = '$houseid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $houseid, $house_number, $house_size, $house_location, $house_type) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_tenant">
		<br>
		  <h1>Edit house</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostHouse" action="index.php?action=viewcat&&js_houseid=<?php echo $houseid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>House Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $house_size ?>"></td>
				</tr>
				<tr>
					<td>House Icon:</td>
					<td>		
						<input type="hidden" name="caticon" value="<?php echo $house_location ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$house_location ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $house_type?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveCart" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_tenant-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
