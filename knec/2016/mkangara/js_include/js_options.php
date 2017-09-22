  <?php include JS_THEME."js_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2><?php echo js_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h3>Please login to continue</h3><br>
				<div>
				<form class='mkangara-form' action="index.php?action=options" method="post">
				<center><h2><b><u>Site Options</u></b></h2></center><br>
				<table class="form_table">
				
				<tr>
					<td>Site Name:</td>
					<td><input type="text" name="sitename" value="<?php echo js_get_option('sitename') ?>"></td>
				</tr>
				<tr>
					<td>Site Url:</td>
					<td><input type="text" name="siteurl" autocomplete="off" value="<?php echo js_get_option('siteurl') ?>"></td>
				</tr>
				<tr>
					<td>Keywords:</td>
					<td><input type="text" name="keywords" autocomplete="off" value="<?php echo js_get_option('keywords') ?>"></td>
				</tr>
				<tr>
					<td>Descriptions:</td>
					<td><textarea name="description"><?php echo js_get_option('description') ?></textarea></td>
				</tr>
				</table><br>
						<center><input type="submit" class="submit_this" name="SaveSite" value="Save Options">
			  </center><br></form>
				</div>
			</div>    
			</div>
		</div>
	</div>
<?php include JS_THEME."js_footer.php" ?>
   