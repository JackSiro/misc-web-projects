<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();	
	$as_db_query = "SELECT * FROM as_subject ORDER BY subjectid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="tooplate_main">    	        
        <div class="content_box">
		  <h2>Subjects List <div class="button_small" style="float:right;text-align:center;">
			<a href="#"><?php echo $database->as_num_rows( $as_db_query ) ?> Subjects</a>
			<a href="index.php?action=subject_new">New Subject</a></div> </h2> 
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Subject Name</th>
				  <th>Subject Code</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=subject_view&amp;as_subjectid=<?php echo $row['subjectid'] ?>'">
					<td><?php echo $row['subject_title'] ?></td>
					<td><?php echo $row['subject_code'] ?></td>
		        </tr>			
			<?php } ?>			
			  </tbody>
			</table> 
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
