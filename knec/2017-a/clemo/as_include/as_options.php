<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
	  <div id="content">
        <div>
			<h1>Manage Site Options</h1>
			<form action="index.php?action=options" method="post">
				<p><span>Site Name</span>
				<input type="text" name="sitename" value="<?php echo as_get_option('sitename') ?>"></p>
				<p><span>Site Url</span>
				<input type="text" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"></p>
				<p><span>Site slogan</span>
				<input type="text" name="slogan" autocomplete="off" value="<?php echo as_get_option('slogan') ?>"></p>
				<p><span>Descriptions</span>
				<textarea name="description"><?php echo as_get_option('description') ?></textarea></p>
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SaveSite" value="Save Options">
			  </p>		
			</form>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
