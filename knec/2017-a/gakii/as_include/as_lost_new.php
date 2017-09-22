<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main">
        
        <h2>Found Items</h2>
		<div class="cleaner h30"></div>
		
			<div class="col_hw float_l">        		
				<div id="contact_form">
					<h4>Add a Found Item</h4>
					<form role="form" method="post" name="PostItem" action="index.php?action=lost_new">
						<label for="email">Item Title:</label><input type="text" autocomplete="off" name="title" class="required input_field" /> 
						<div class="cleaner h10"></div>
				
						<label for="email">Place Lost:</label><input type="text" autocomplete="off" name="place" class="required input_field" >
						<div class="cleaner h10"></div>
						
						<label for="email">Description:</label><textarea name="content" class="required input_field" ></textarea>
						<div class="cleaner h10"></div>
				
						<input type="submit" name="SaveItem" id="submit" value="Save Item & Add" class="submit_btn float_l" />
						<input type="submit" name="SaveClose" id="submit" value="Save Item & Close" class="submit_btn float_r" />
					</form>	
				</div>      	
            </div>        
		<div class="cleaner"></div>       
	</div> 
<?php include AS_THEME."as_footer.php" ?>
    
