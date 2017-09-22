<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_book ORDER BY bookid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content">
        <div class="content_book">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Books
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_page=newbook">Add New Book</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
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
    
