<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Add an Item</h2>
            <div class="col_w340 float_l">
                <div id="contact_form"> 
				<form role="form" method="post" name="PostItem" action="index.php?action=salesitem_new">
					<label for="text">Item Title:</label> <input type="text" class="required input_field" autocomplete="off" name="title"/>
					<div class="cleaner h10"></div>  
					<label for="text">Item Description: </label> <textarea class="required input_field" name="content"></textarea>
					<div class="cleaner h10"></div>  
					<label for="text">Item Price:</label> <input type="text" class="required input_field" autocomplete="off" name="price"/>
					<div class="cleaner h10"></div>  
					
					<label for="text">Item Type:</label> 
					<select class="required input_field" name="type" >
						<option value="Chicken">Chicken</option>
						<option value="Chicken Feed">Chicken Feed</option>
					</select>
					<div class="cleaner h10"></div>  
					
					<p style="padding-top: 15px"><span><input type="submit" class="submit_btn float_l" id="submitBtn" name="AddItem" value="Save & Add"></label> 
							<input type="submit" class="submit_btn float_l" id="submitBtn" name="AddClose" value="Save & Close"/>
					<div class="cleaner h10"></div>  		
				</form>
               </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
