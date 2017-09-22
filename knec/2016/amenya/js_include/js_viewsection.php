<?php 

	$sectionid = $results['section'];
	$js_db_query = "SELECT * FROM js_section WHERE sectionid = '$sectionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $sectionid, $section_slug, $section_title, $section_icon, $section_content) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_book">
		<br>
		  <h1>Edit section</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostSection" action="index.php?js_page=viewsection&&js_sectionid=<?php echo $sectionid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Section Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $section_title ?>"></td>
				</tr>
				<tr>
					<td>Section Icon:</td>
					<td>		
						<input type="hidden" name="sectionicon" value="<?php echo $section_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$section_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $section_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveSection" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
