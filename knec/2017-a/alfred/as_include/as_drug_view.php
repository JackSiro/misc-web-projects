<?php 

	$drugid = $results['category'];
	$as_db_query = "SELECT * FROM as_drug WHERE drugid = '$drugid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $drugid, $drug_slug, $drug_title, $drug_icon, $drug_content) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Edit drug</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=drug_view&&as_drugid=<?php echo $drugid ?>" enctype="multipart/form-data" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<table style="width:100%;font-size:20px;">
				<tr>
					<td>Drug Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $drug_title ?>"></td>
				</tr>
				<tr>
					<td> Drug Unit:</td>
					<td><input type="text" autocomplete="off" name="unit" value="<?php echo $drug_unit ?>"></td>
				</tr>
				<tr>
					<td> Drug Price:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $drug_price ?>"></td>
				</tr>
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $drug_content?></textarea></td>
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
    
