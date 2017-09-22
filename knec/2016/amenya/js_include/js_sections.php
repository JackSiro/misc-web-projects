<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_section ORDER BY sectionid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content">
        <div class="content_book">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Books Sections
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_page=newsection">Add New Section</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Section</th>
				  <th>Description</th>
				  <th>No of Items</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?js_page=viewsection&amp;js_sectionid=<?php echo $row['sectionid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['section_icon'] ?>" /></td>
				   <td><?php echo $row['section_title'] ?></td>
		          <td style="max-width: 300px;"><?php echo $row['section_content'] ?></td>
		          <td>
				  <?php 
					$sectionid = $row['sectionid'];
					$js_db_qry = "SELECT * FROM js_book WHERE book_section = '$sectionid'";
					echo $database->js_num_rows( $js_db_qry )
					?>
				  </td>
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
    
