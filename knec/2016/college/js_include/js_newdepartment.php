<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Add a department</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostDepartment" action="index.php?action=newdepartment" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Department Title:</td>
					<td><input type="text" autocomplete="off" name="title"></td>
				</tr>
				
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddDepartment" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
