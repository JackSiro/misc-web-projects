  <?php include AS_THEME."as_header.php" ?>
      <div id="content">
		<div>
			<h1>Manage Site Options</h1>
				<div id="account">
					<div>
						<form action="index.php?action=options" method="post">
						<table class="form_table">
						
						<tr>
							<td>Site Name:</td>
							<td><input type="text" name="sitename" value="<?php echo as_get_option('sitename') ?>"></td>
						</tr>
						<tr>
							<td>Site Url:</td>
							<td><input type="text" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"></td>
						</tr>
						<tr>
							<td>Keywords:</td>
							<td><input type="text" name="keywords" autocomplete="off" value="<?php echo as_get_option('keywords') ?>"></td>
						</tr>
						<tr>
							<td valign="top">Descriptions:</td>
							<td><textarea name="description"><?php echo as_get_option('description') ?></textarea></td>
						</tr>
						</table><br>
						<input type="submit" class="submitbtn" name="SaveSite" value="Save Options">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
   