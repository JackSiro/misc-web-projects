<?php 

	$farmerid = $results['farmer'];
	$js_db_query = "SELECT * FROM js_farmer WHERE farmerid = '$farmerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $farmerid, $farmer_slug, $farmer_fullname, $farmer_icon, $farmer_content) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_session">
		<br>
		  <h1>Edit farmer</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostFarmer" action="index.php?js_pageaction=viewfarmer&&js_farmerid=<?php echo $farmerid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Farmer Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $farmer_fullname ?>"></td>
				</tr>
				<tr>
					<td>Farmer Icon:</td>
					<td>		
						<input type="hidden" name="farmericon" value="<?php echo $farmer_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$farmer_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $farmer_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveFarmer" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
