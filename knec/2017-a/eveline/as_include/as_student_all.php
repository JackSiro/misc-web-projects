<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_student ORDER BY studentid ASC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
<div id="tooplate_main">
	<div class="col_w900">          	
		
		<h3><?php echo $database->as_num_rows( $as_db_query ) ?>  Students <a style="float:right;width:300px;text-align:center;" href="index.php?action=student_new">New Student</a></h3>

			<div id="comment_section">
				<ol class="comments first_level">
				 <?php foreach( $results as $row ) { ?>
					<li>
						<div class="comment_box commentbox1">
								
							<div class="gravatar">
								<img src="as_media/user_default.jpg" alt="author" />
							</div>
							
							<div class="comment_text">
								<div class="comment_author"><?php echo $row['student_name'] ?></div>
								<p>Class: <?php echo $row['student_class'] ?>, Adm. No: <?php echo $row['student_admno'] ?></p>
								<div class="btn_more float_r"><a href="index.php?page=student_edit&&as_studentid=<?php echo $row['studentid'] ?>">Edit Student</a></div>
							</div>
							
							<div class="cleaner"></div>
						</div> 
					</li>
				<?php } ?>		
				</ol>
			</div> <!-- end of comment -->
			
	</div>
        
       
    <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
