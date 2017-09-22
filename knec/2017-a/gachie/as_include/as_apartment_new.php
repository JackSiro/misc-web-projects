<?php include AS_THEME."as_header.php"; ?>
    <div id="tooplate_main">                        <h1>Add an apartment</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="Postapartment" action="index.php?action=apartment_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Apartment Location:</td>
					<td><input type="text" autocomplete="off" name="location"></td>
				</tr>
				
				<tr>
					<td>Apartment Number:</td>
					<td><input type="text" autocomplete="off" name="number"></td>
				</tr>
				
				<tr>
					<td>Apartment Description:</td>
					<td><textarea name="description"></textarea></td>
				</tr>
							
				</table><br>
                        <center><input type="submit" class="submit" name="Addapartment" value="Save and Add Another apartment">
						<input type="submit" class="submit" name="AddClose" value="Save and Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
