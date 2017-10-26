<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">
	  <div id="content">
        <div>
		<br>
		  <h1>Add a Post</h1> 
          <hr>
			<div class="main_content">
				<form role="form" method="post" name="PostPost" action="index.php?action=elecpost_new" >
                <p><span>Post Name</span><input type="text" name="title"></p>
				<p><span>Post Code</span><input type="text" name="code"></p>
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="AddPost" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close">
			  </p>		
			</form>
		</div><!--close content_voter-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
