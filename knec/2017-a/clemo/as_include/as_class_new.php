<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Add a class</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="PostClass" action="index.php?action=class_new" enctype="multipart/form-data" >
                <p><span>Class Title</span><input type="text" autocomplete="off" name="title"></p>
                <p><span>Class Year</span><input type="text" autocomplete="off" name="year"></p>
                <p><span>Class Term</span><input type="text" autocomplete="off" name="term"></p>
				
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="AddClass" value="Save & Add"></span>
						<input type="submit" id="submitBtn" name="AddClose" value="Save & Close"></p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
