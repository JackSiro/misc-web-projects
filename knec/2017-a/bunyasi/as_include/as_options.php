<?php include AS_THEME."as_header.php"; ?>
<div id="content">            <div id="featured">            <h2 class="h2-line-2">Site Options</h1> 
          <br><hr><br>
			<div class="main_content">
				<form action="index.php?action=options" method="post">
				<center><h2><b><u>Site Options</u></b></h2></center><br>
                <table style="width:100%;font-size:20px;">
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
					<td>Descriptions:</td>
					<td><textarea name="description"><?php echo as_get_option('description') ?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveSite" value="Save Options">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
