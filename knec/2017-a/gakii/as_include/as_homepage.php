<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main">
        
        <h2>Welcome Home</h2>
		<div class="cleaner h30"></div>
		
			<div class="col_hw float_r">        		
				<div id="contact_form">
					<h4>Add a Found Item</h4>
					<form role="form" method="post" name="PostItem" action="index.php?action=dashboard">
						<label for="email">Title:</label><input type="text" autocomplete="off" name="title" class="required input_field" /> 
						<div class="cleaner h10"></div>
				
						<label for="email">Place Found:</label><input type="text" autocomplete="off" name="place" class="required input_field" >
						<div class="cleaner h10"></div>
						
						<label for="email">Description:</label><textarea name="content" class="required input_field" ></textarea>
						<div class="cleaner h10"></div>
				
						<input type="submit" value="SaveFound" id="submit" name="Save Found Item" class="submit_btn float_l" />
					</form>	
				</div>      	
            </div>
        
          	<div class="col_hw float_l">
                <div id="contact_form">
            
                    <h4>Add a Lost Item</h4>                    
                    <form role="form" method="post" name="PostItem" action="index.php?action=dashboard">
						<label for="email">Item Title:</label><input type="text" autocomplete="off" name="title" class="required input_field" /> 
						<div class="cleaner h10"></div>
				
						<label for="email">Place Lost:</label><input type="text" autocomplete="off" name="place" class="required input_field" >
						<div class="cleaner h10"></div>
						
						<label for="email">Description:</label><textarea name="content" class="required input_field" ></textarea>
						<div class="cleaner h10"></div>
				
						<input type="submit" value="SaveLost" id="submit" name="Save Lost Item" class="submit_btn float_l" />
					</form> 
            
                </div> 
            </div>	
        
		<div class="cleaner"></div>       
	</div> 
<?php include AS_THEME."as_footer.php" ?>
    
