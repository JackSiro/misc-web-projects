<?php include JS_THEME."js_header.php";

$database = new Js_Dbconn();			
			
			$js_type_query = "SELECT * FROM js_user";			
			$results = $database->get_results($js_type_query  ); 
 ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1>Add an Complaint</h1> 
          <br><hr><br>
			<div class="main_content">
			
			<form role="form" method="post" name="PostComplaint" action="index.php?action=complaint_new" 
			enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					
                <tr>
					<td>Complainant:</td>
					<td>
					<select name="farmer" style="padding-left:20px;" required >
						<option value="" > - Who is Complaining - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['user_fname'].' '.$row['user_surname'] ?>">  <?php echo $row['user_fname'].' '.$row['user_surname'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				 <tr>
					<td>Title of Complaint:</td>
					<td><input type="text" autocomplete="off" name="title" required ></td>
				</tr>
						
                <tr>
					<td>Content of your Complaint:</td>
					<td><textarea name="content"></textarea></td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddItem" value="Save and Add Another">
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
    
