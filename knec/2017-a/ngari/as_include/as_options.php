<?php include AS_THEME."as_header.php"; ?>
<div id="site_content">
	<h1>Site Options</h1> 
    <form action="index.php?action=options" method="post" >
		<div class="form_settings">
			<p><span>Site Name</span><input type="text" name="sitename" value="<?php echo as_get_option('sitename') ?>"></p>
            <p><span>Site Url</span><input type="text" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"></p>
            <p><span>Keywords</span><input type="text" name="keywords" autocomplete="off" value="<?php echo as_get_option('keywords') ?>"></p>
            <p><span>Descriptions</span><textarea name="description"><?php echo as_get_option('description') ?></textarea></p>
			<br><p><input type="submit" class="submit_this" name="SaveSite" value="Save Options">
			</p></div></form>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
