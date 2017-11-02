<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_content">	

	  <div id="content">
        <div>
		<center>
		<br>
		  <h1>Welcome to <?php echo as_get_option('as_sitename') ?></h1>
		  <img src="as_media/vote.jpg" />
			<div class="main_content">
				<?php if ($myaccount == 3) { ?>
					<h3>Vote Now</h3>
					<h2><a href="index.php?action=vote_now"> >> Start Voting >> </a></h2>
				<?php } else if ($myaccount == 5) { ?>
					<h3>Votes Analysis</h3>
				<?php } ?>
			</div>
		<br>
		<br>  </center>
		</div><!--close content_client-->
      </div><!--close content-->   
	</div><!--close tooplate_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
