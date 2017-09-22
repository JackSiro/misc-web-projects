<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
	$search = $_GET['js_search'];
	$searchsection = $_GET['js_sectionid'];
	if ($searchsection<=0){
		$search_section = "All";
		$js_db_query = "SELECT * FROM js_book
		WHERE book_title like '%$search%'
		OR book_content like '%$search%'
		OR book_publisher like '%$search%'
		OR book_subject like '%$search%'";
	} else {
		$search_section = js_section_book($searchsection);
		$js_db_query = "SELECT * FROM js_book
		WHERE book_title like '%$search%'
		OR book_content like '%$search%'
		OR book_publisher like '%$search%'
		OR book_subject like '%$search%' 
		OR book_section like '%$searchsection%'";
	}
	
	$results = $database->get_results( $js_db_query );
	
?>
	  <div id="content">
        <div class="content_book">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Books found
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_page=newbook">Add New Book</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="js_search" id="js_search" placeholder="Search the library" value="<?php echo $search ?>" />
			</td><td>
				<select name="js_sectionid">
				<option  value="<?php echo $searchsection ?>"><?php echo $search_section ?></option>
			<?php $js_section_qry = "SELECT * FROM js_section ORDER BY section_title ASC";
				$section_results = $database->get_results( $js_section_qry );
				
				foreach( $section_results as $js_section ) { ?>
						<option value="<?php echo $js_section['sectionid'] ?>">  <?php echo $js_section['section_title'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Section</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?js_page=viewbook&amp;js_bookid=<?php echo $row['bookid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['book_img'] ?>" /></td>
				   <td><?php echo js_section_book($row['book_section']) ?></td>
				   <td><?php echo $row['book_title'] ?></td>
		          <?php //echo substr($row['book_content'],0,100).'...' ?>
				  <td><?php echo $row['book_publisher'] ?></td>
				  <td><?php echo $row['book_subject'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
