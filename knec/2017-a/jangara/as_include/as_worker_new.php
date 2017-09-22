<?php include AS_THEME."as_header.php"; ?>
<div id="content">            <div id="featured">            <h2 class="h2-line-2">Add a worker</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="Postworker" action="index.php?action=worker_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname"></td>
				</tr>
				
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email"></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile"></td>
				</tr>
				
				<tr>
					<td>Physical Address</td>
					<td><input type="text" autocomplete="off" name="address"></td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="readmore" name="Addworker" value="Save and Add Another worker">
						<input type="submit" class="readmore" name="AddClose" value="Save and Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
