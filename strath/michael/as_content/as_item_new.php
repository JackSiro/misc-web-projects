<?php
/*
	File: as_content/as_item_new.php
	Description: page for adding a new item

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Add a New Item :: Administrator';
	
	if (as_clicked('SaveClose')) {
		as_new_item();
		header('Location: '.as_siteUrl.'item/all'.as_urlExt );
	} else if (as_clicked('SaveAdd')) {
		as_new_item();
		header('Location: '.as_siteUrl.'item/new'.as_urlExt );
	}
	
	require_once AS_FUNC."as_paging.php";
	include AS_THEME."as_header.php";
?>
<div id="main_content">
	<form action="<?php echo as_menu_handler("item/new") ?>" method="post" enctype="multipart/form-data">
		<div id="admin_header">
			<div class="admin_index_title">Add a New Item</div> 
			<div class="right_buttons">
				<input type="submit"  class="right_button" name="SaveAdd" value="Save and Add" />
				<input type="submit"  class="right_button" name="SaveClose" value="Save and Close" />
				<div class="right_button"><a href="<?php echo as_menu_handler("item/all") ?>">Back to main</a></div>
			</div>
		</div>
		<div id="admin_header_border"></div>
		<div class="add_tab">
			<div id="quicklogin" class="form_admin">
				<div class="adminform_row_input">
					<label class="adminleft">Item Title: </label>
					<input type="text" class="form_input_general" name="item_title" required autocomplete="off"/>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Item Value: </label>
					<input type="text" class="form_input_general" name="item_value" required autocomplete="off"/>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Item Date: </label>
					<input type="text" class="form_input_general" name="item_date" value="<?php echo date('d/m/Y') ?>" required />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Item Time: </label>
					<input type="text" class="form_input_general" name="item_time" name="item_date" value="<?php echo date('H:i') ?>" required />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Owner's Name: </label>
					<input type="text" class="form_input_general" name="item_person" required />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">ID. Number: </label>
					<input type="text" class="form_input_general" name="item_idnumber" required autocomplete="off"/>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Item Image: </label>
					<input type="file" class="form_input_general" accept="image/*" name="item_image" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Description: </label>
					<textarea name="item_content" rows="" cols="" ></textarea>
				</div>
			</div>
		</div>
	</form>
<?php include AS_THEME."as_footer.php" ?>