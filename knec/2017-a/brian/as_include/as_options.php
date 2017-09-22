<?php include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Site Options</h1>
			<div class="main_content">
				<form action="index.php?action=options" method="post">
					<center><h2><b><u>Site Options</u></b></h2>
					<div class="form_settings">
					<p><span>Site Name:</span><input type="text" name="sitename" value="<?php echo as_get_option('sitename') ?>"></p>
					<p><span>Site Url:</span><input type="text" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"></p>
					<p><span>Site Slogan:</span><input type="text" name="slogan" autocomplete="off" value="<?php echo as_get_option('slogan') ?>"></p>
					<p><span>Descriptions:</span><textarea name="description"><?php echo as_get_option('description') ?></textarea></p>
					<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" class="submit" name="SaveSite" value="Save Options"></p>
				</form>
      </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
