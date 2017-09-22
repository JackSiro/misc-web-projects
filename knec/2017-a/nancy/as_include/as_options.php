<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Site Options</h2>
                    <div class="cleaner"></div>
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
					<td>Site Slogan:</td>
					<td><input type="text" name="slogan" autocomplete="off" value="<?php echo as_get_option('slogan') ?>"></td>
				</tr>
                <tr>
					<td>Descriptions:</td>
					<td><textarea name="description"><?php echo as_get_option('description') ?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveSite" value="Save Options">
			  </center><br></form>
			</div>
				</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
