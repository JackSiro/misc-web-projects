<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Add a Subject</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="PostSubject" action="index.php?action=subject_new" >
                <label for="text">Subject Name</label> <input type="text" class="required input_field" name="title"/>
						<div class="cleaner h10"></div>  
				<label for="text">Subject Code</label> <input type="text" class="required input_field" name="code"/>
						<div class="cleaner h10"></div>  
				<p style="padding-top: 15px"><span><input type="submit" class="submit_btn float_l" id="submitBtn" name="AddSubject" value="Save & Add"></label> <input type="submit" class="submit_btn float_l" id="submitBtn" name="AddClose" value="Save & Close">
			  </p>		
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