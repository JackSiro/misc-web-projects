<?php 

	$bookid = $results['book'];
	$js_db_query = "SELECT * FROM js_book WHERE bookid = '$bookid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $bookid, $book_code, $book_section, $book_slug, $book_title, $book_content, $book_postedby, $book_posted, $book_publisher, $book_subject, $book_img, $book_file, $book_updated, $book_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_book">
		<br>
		  <h1>Books: <?php echo $book_title.' | '.$book_code ?></h1> 
          <br><br>
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "js_media/".$book_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_page=editbook&&js_bookid=<?php echo $bookid ?>"><h1>Edit Book</h1></a>
					<hr class="detail_info_hr"/>
					<a href="js_uploads/<?php echo $book_file ?>"><h1>Download Book</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_page=deletebook&&js_bookid=<?php echo $bookid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $book_title ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Book</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $book_title ?></h2>
					<h2>Section: <?php echo js_section_book($book_section) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $book_content ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $book_publisher ?></h2>
					<h2>Subject: <?php echo $book_subject ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($book_posted)); ?><h2>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
