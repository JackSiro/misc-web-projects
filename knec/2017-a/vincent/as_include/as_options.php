<?php include AS_THEME."as_header.php" ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Manage Site Options</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
					<form action="index.php?action=options" method="post">
						<label for="text">Site Name</label> 
						<input type="text" class="required input_field" name="sitename" value="<?php echo as_get_option('sitename') ?>"/>
						<div class="cleaner h10"></div>  
						<label for="text">Site Url</label> 
						<input type="text" class="required input_field" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"/>
						<div class="cleaner h10"></div>  
						<label for="text">Site slogan</label> 
						<input type="text" class="required input_field" name="slogan" autocomplete="off" value="<?php echo as_get_option('slogan') ?>"/>
						<div class="cleaner h10"></div>  
						<label for="text">Descriptions</label> 
						<textarea name="description"><?php echo as_get_option('description') ?></textarea>
						<div class="cleaner h10"></div>    
						<input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveSite" value="Save Options">
					  </p>		
					</form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div> <!-- end of a content box -->
        
	</div>
<?php include AS_THEME."as_footer.php" ?>