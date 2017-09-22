<?php include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Start a New Topic</h2> 
					</header>
					<div class="row">
						<div class="12u">
							<section>
								<form role="form" method="post" name="PostTopic" action="index.php?action=topic_new" >
									<input type="hidden" name="student" value="<?php echo $_SESSION['school_user'] ?>"/>
									<p><span>Your Topic in one sentence</span><input type="text" autocomplete="off" name="title"></p>
									<p><span>Your Topic in details</span><textarea name="content"></textarea></p>
									
									<p style="padding-top: 15px"></span>
										<input type="submit" id="submitBtn" name="SubmitTopic" value="Submit Topic"></p>		
								</form>
							</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
