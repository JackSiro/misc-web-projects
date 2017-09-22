<?php 
	$topicid = $results['topic'];
	$as_db_query = "SELECT * FROM as_topic WHERE topicid = '$topicid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $topicid, $topic_title, $topic_content, $topic_participants) = $database->get_row( $as_db_query );
	}
	include AS_THEME."as_header.php";
	
	$as_dis_query = "SELECT * FROM as_discuss
					LEFT JOIN as_student ON as_discuss.discuss_postedby = as_student.studentid
					WHERE discuss_topic='$topicid'
					ORDER BY as_discuss.discussid  ASC LIMIT 20";
	$discussions = $database->get_results( $as_dis_query );
?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major" style="text-align: left;">
						<h2><?php echo $topic_title ?></h2> 
						<span class="byline"><?php echo $topic_content ?></span>
					</header>
					<div class="row">
						<div class="12u">
							<section>
							<form role="form" method="post" name="PostTopic" action="index.php?action=topic_view&&as_topicid=<?php echo $topicid ?>" >
									<input type="hidden" name="student" value="<?php echo $_SESSION['school_user'] ?>"/>
									<p><span>Your reply on this</span><textarea name="content"></textarea></p>
									
									<p style="padding-top: 15px"></span>
										<input type="submit" id="submitBtn" name="SubmitReply" value="Post Reply"></p>		
								</form>
							<span><?php echo $database->as_num_rows( $as_dis_query ) ?> replies</span>
								<ul class="style">
								<?php foreach( $discussions as $row ) { ?>
									<li>
										<span class="fa fa-inbox"></span>
										<span><?php echo $row['discuss_content'] ?><br>by <b><?php echo $row['student_fname'].' '.$row['student_surname'] ?></b> 
										<?php echo as_timeago($row['discuss_posted']) ?></span>
									</li>
								<?php } ?>
								</ul>
							</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
