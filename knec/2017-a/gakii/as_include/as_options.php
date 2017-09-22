<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main">        
	<h2>Sign in to Your Account</h2>
	<div id="contact_form">            
		<form action="index.php?action=options" method="post" >
			
		<label for="text">Site Name:</label> <input type="text" name="sitename" value="<?php echo as_get_option('sitename') ?>"> 
		<div class="cleaner h10"></div>
		
		<label for="text">Site Url:</label> <input type="text" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"> 
		<div class="cleaner h10"></div>
		
		<label for="text">Keywords:</label> <input type="text" name="keywords" autocomplete="off" value="<?php echo as_get_option('keywords') ?>"> 
		<div class="cleaner h10"></div>
		
		<label for="text">Descriptions:</label> <textarea name="description"><?php echo as_get_option('description') ?></textarea> 
		<div class="cleaner h10"></div>
			
		<input type="submit" value="Save Options" id="submit" name="SaveSite" class="submit_btn float_l" />			
		</form>	
	</div>          	
	<div class="cleaner"></div>       
</div>
<?php include AS_THEME."as_footer.php" ?>   
