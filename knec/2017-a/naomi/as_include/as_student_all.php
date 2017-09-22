<?php include AS_THEME."as_header.php"; 
	$as_db_query = "SELECT * FROM as_student ORDER BY studentid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2><?php echo $database->as_num_rows( $as_db_query ) ?> Student</h2> 
						<a href="index.php?action=student_new"><span class="byline">New Student</span></a>
					</header>
					<div class="row">
						<div class="12u">
							<section>
								<ul class="style">
								<?php foreach( $results as $row ) { ?>
									<li>
										<span class="fa fa-user"></span>
										<h3><?php echo $row['student_fname'].' '.$row['student_surname'] ?></h3>
										<span><td><?php echo $row['student_role'] ?> since: <?php echo date("j/m/y", strtotime($row['student_joined'])); ?></span>
									</li>
								<?php } ?>
								</ul>
							</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
