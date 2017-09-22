<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Add an Item</h2> 
                    <div class="cleaner"></div>
				<form role="form" method="post" action="index.php?action=item_new" enctype="multipart/form-data" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<table style="width:100%;font-size:20px;">
				<tr>
					<td> Item Title:</td>
					<td><input type="text" autocomplete="off" name="item_title" required class="required input_field"></td>
				</tr>
				 <tr>
					<td>Type of Container:</td>
					<td>
						<select name="item_container" style="padding-left:20px;" required  class="required input_field">
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
					<td> Item Unit:</td>
					<td><input type="text" autocomplete="off" name="item_unit" required class="required input_field"></td>
				</tr>
				<tr>
					<td> Items Per Container:</td>
					<td><input type="text" autocomplete="off" name="item_items" class="required input_field"></td>
				</tr>
				<tr>
					<td> Item Price:</td>
					<td><input type="text" autocomplete="off" name="item_price" required class="required input_field"></td>
				</tr>
				<tr>
					<td> Item Icon:</td>
					<td><input name="item_icon" autocomplete="off" type="file" accept="image/*" class="required input_field"></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="item_content" autocomplete="off"  class="required input_field"></textarea></td>
				</tr>
				</table>
					<br>
                        <input type="submit" class="submit_this" name="AddItem" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
					<br>
			  </form>
			</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
