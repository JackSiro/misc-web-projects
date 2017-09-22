<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
                  <h2>Site Options</h2>
                <div id="gallery_container">
                  <div id="contact_form">
                    <form method="post" name="contact" action="index.php?action=options" >
						<label for="email">Site Name:</label><input type="text" class="input_field" name="sitename" value="<?php echo as_get_option('sitename') ?>">
						<div class="cleaner_h10"></div>
					     
						<label for="email">Site Url:</label><input type="text" class="input_field" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>">
						<div class="cleaner_h10"></div>
						
						<label for="email">Site Slogan:</label><input type="text" class="input_field" name="siteurl" autocomplete="off" value="<?php echo as_get_option('slogan') ?>">
						<div class="cleaner_h10"></div>
					  
						<label for="email">Description:</label><textarea class="input_field" name="description"><?php echo as_get_option('description') ?></textarea>
						<div class="cleaner_h10"></div>
					  
					  <div class="cleaner_h10"></div>
					  
                       <input type="submit" class="submit_btn float_l" name="SaveSite" value="Save Options">
					  
                    </form>
                  </div>
                </div>
                
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>