<?php include AS_THEME."as_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include AS_THEME."as_sidebar_adm.php";	?>	
          <h2>Site Options</h2>
		  <br>
		  	
          <form action="admin.php?action=options" method="post">
		<table style="width:100%;font-size:20px;">
		<tr>
			<td>Site Name:</td>
			<td><input type="text" class="input_form" name="sitename" value="<?php echo as_get_option('sitename') ?>"></td>
		</tr>
		<tr>
			<td>Site Url:</td>
			<td><input type="text" class="input_form" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"></td>
		</tr>
		<tr>
			<td>Keywords:</td>
			<td><input type="text" class="input_form" name="keywords" autocomplete="off" value="<?php echo as_get_option('keywords') ?>"></td>
		</tr>
		<tr>
			<td>Descriptions:</td>
			<td><textarea name="description" class="input_form"><?php echo as_get_option('description') ?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="submit_form_i" name="SaveSite" value="Save Options">
	 
			</td>
		</tr>
		</table><br>
				<br></form></center>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
