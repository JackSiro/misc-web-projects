<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">

		  <h1>Add a  Drug</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=drug_new" enctype="multipart/form-data" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<table style="width:100%;font-size:20px;">
				<tr>
					<td> Drug Title:</td>
					<td><input type="text" autocomplete="off" name="drug_title" required></td>
				</tr>
				 <tr>
					<td>Type of Container:</td>
					<td>
						<select name="drug_container" style="padding-left:20px;" required >
							<option value="" > - Choose a Container - </option>			
							<option value="packet" > Packet </option>
							<option value="box" > box </option>
							<option value="carton" > Carton </option>
							<option value="can" > Can </option>
							<option value="bottle" > Bottle </option>
						</select>
					</td>
				</tr>
				<tr>
					<td> Drug Unit:</td>
					<td><input type="text" autocomplete="off" name="drug_unit" required></td>
				</tr>
				<tr>
					<td> Items Per Container:</td>
					<td><input type="text" autocomplete="off" name="drug_items"></td>
				</tr>
				<tr>
					<td> Drug Price:</td>
					<td><input type="text" autocomplete="off" name="drug_price" required></td>
				</tr>
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="drug_content" autocomplete="off" ></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddItem" value="Save and Add">
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
<?php include AS_THEME."as_footer.php" ?>
    
