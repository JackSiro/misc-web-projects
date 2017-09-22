<?php 

	$catid = $results['bus'];
	$as_db_query = "SELECT * FROM as_bus WHERE catid = '$catid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $catid, $cat_slug, $cat_title, $cat_icon, $cat_content) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1>Edit bus</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostCategory" action="index.php?page=viewcat&&as_catid=<?php echo $catid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Category Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $cat_title ?>"></td>
				</tr>
				<tr>
					<td>Category Icon:</td>
					<td>		
						<input type="hidden" name="caticon" value="<?php echo $cat_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$cat_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $cat_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveCart" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
