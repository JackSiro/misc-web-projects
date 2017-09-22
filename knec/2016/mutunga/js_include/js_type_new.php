<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">

		  <br> 
         <?php include JS_THEME."js_slide.php" ?>
		  <h1>Add a Electronics Type</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostElectronics Type" action="index.php?action=type_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Electronics Type Title:</td>
					<td><input type="text" autocomplete="off" name="title"></td>
				</tr>
				<tr>
					<td>Electronics Type Icon:</td>
					<td><input name="filename" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddType" value="Save and Add Another Type">
						<input type="submit" class="submit_this" name="AddClose" value="Save and Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
