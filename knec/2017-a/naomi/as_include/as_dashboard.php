<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_topic
					LEFT JOIN as_student ON as_topic.topic_createdby = as_student.studentid
					ORDER BY as_topic.topic_createdby  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
					<div id="banner">
							<div class="container">
								<section>
									<header class="major">
										<h2><?php echo $database->as_num_rows( $as_db_query ) ?> Ongoing Discussions</h2> 
									</header>
									<a href="index.php?action=topic_new" class="button alt">Start a Discussion</a>
								</section>			
							</div>
						</div>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<div class="row">
						<div class="12u">
							<section>
								<ul class="style">
								<?php foreach( $results as $row ) { ?>
									<li>
										<span class="fa fa-inbox"></span>
										<a href="index.php?action=topic_view&&as_topicid=<?php echo $row['topicid'] ?>"><h3><?php echo $row['topic_title'] ?></h3></a>
										<span><?php echo substr($row['topic_content'], 0, 100) ?> by <b><?php echo $row['student_fname'].' '.$row['student_surname'] ?></b>
										<?php echo as_timeago($row['topic_created']) ?>
										</span>
									</li>
								<?php } ?>
								</ul>
							</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
