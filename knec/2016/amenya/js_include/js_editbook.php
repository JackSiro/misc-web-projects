<?php 

	$bookid = $results['book'];
	$js_db_query = "SELECT * FROM js_book WHERE bookid = '$bookid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $bookid, $book_code, $book_section, $book_slug, $book_title, $book_content, $book_postedby, $book_posted, $book_publisher, $book_subject, $book_img, $book_updated, $book_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_book">
		<br>
		  <h1>Edit an Books Book</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?js_page=editbook&&js_bookid=<?php echo $bookid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Section:</td>
					<td><select name="section" style="padding-left:20px;">
						<option value="<?php echo $bookid ?>" > - Choose a Section - </option>
			<?php $js_db_query = "SELECT * FROM js_section ORDER BY section_title ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['sectionid'] ?>">  <?php echo $row['section_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Book:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $book_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Book:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $book_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td>
					<input type="hidden" name="bookimg" value="<?php echo $book_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$book_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $book_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Book:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $book_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Book:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $book_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
