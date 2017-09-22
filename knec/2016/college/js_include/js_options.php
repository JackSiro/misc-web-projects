<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Site Options</h1> 
          <br><hr><br>
			<div class="main_content">
				<form action="index.php?action=options" method="post">
				<center><h2><b><u>Site Options</u></b></h2></center><br>
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Site Name:</td>
					<td><input type="text" name="sitename" value="<?php echo js_get_option('sitename') ?>"></td>
				</tr>
                <tr>
					<td>Site Url:</td>
					<td><input type="text" name="siteurl" autocomplete="off" value="<?php echo js_get_option('siteurl') ?>"></td>
				</tr>
                <tr>
					<td>Site slogan:</td>
					<td><input type="text" name="slogan" autocomplete="off" value="<?php echo js_get_option('slogan') ?>"></td>
				</tr>
                <tr>
					<td>Descriptions:</td>
					<td><textarea name="description"><?php echo js_get_option('description') ?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveSite" value="Save Options">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
