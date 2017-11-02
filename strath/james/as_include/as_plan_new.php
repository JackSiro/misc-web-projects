<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_content">	
	<div class="col_w460">
       	<div id="contact_form">
        	<h4>Add a new Plan</h4>
			<form action="index.php?action=plan_new" method="post"  enctype="multipart/form-data">
				<label for="plan_title">Plan Title:</label> <input type="text" id="plan_title" name="plan_title" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_price">Plan Price (Kshs):</label> <input type="text" id="plan_price" name="plan_price" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_irate">Interest Rate (%):</label> <input type="text" id="plan_irate" name="plan_irate" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_benefit">Benefits:</label> <input type="text" id="plan_benefit" name="plan_benefit" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_image">Image Impression:</label> <input type="file" accept="image/*" id="plan_image" name="plan_image" class="input_field" />
					
				<input type="submit" value="Save & Add" id="submit" name="AddItem" class="submit_btn float_l" />
				<input type="submit" value="Save & Close" id="submit" name="AddClose" class="submit_btn float_r" />
			</form>
        </div>
   	</div>
    <div class="cleaner"></div>
</div>     		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>
    
