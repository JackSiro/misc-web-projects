<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_marks ORDER BY marksid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="site_content">	
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Marks
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=marks_new">Enter Marks</a> </h1> 
          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Adm No.</th>
				  <th>Gender</th>
				  <th>Class</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=marks_view&amp;as_marksid=<?php echo $row['marksid'] ?>'">
					<td><?php echo $row['marks_class'] ?></td>
					<td><?php echo $row['marks_student'] ?></td>
					<td><?php echo $row['marks_subject'] ?></td>
					<td><?php echo $row['marks_marks'] ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_marks-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
