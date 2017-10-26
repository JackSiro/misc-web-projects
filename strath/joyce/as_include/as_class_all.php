<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
		<?php $as_db_query = "SELECT * FROM as_class ORDER BY classid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Classes
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=class_new">New Class</a> </h1> 
         
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Title</th>
				  <th>Code</th>
				  <th>Term</th>
				  <th>Year</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=class_view&amp;as_classid=<?php echo $row['classid'] ?>'">
				   <td><?php echo $row['class_title'] ?></td>
				   <td><?php echo $row['class_code'] ?></td>
		          <td><?php echo $row['class_term'] ?></td>
		          <td><?php echo $row['class_year'] ?></td>
		          
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_voter-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
