<?php
/*
	File: as_content/as_officer_edit.php
	Description: page for editting an officer

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Add a New Officer :: Administrator';
	
	//new instance of database class
	$database = new As_Dbconn();
	$item_query = "SELECT * FROM as_item ORDER BY itemid";	
	$item_results = $database->get_results( $item_query );
	$cat_query = "SELECT * FROM as_category ORDER BY categoryid";	
	$cat_results = $database->get_results( $cat_query );
	
	if (as_clicked('SaveClose')) {
		as_new_officer();
		header('Location: '.as_siteUrl.'officer/all'.as_urlExt );
	} else if (as_clicked('SaveAdd')) {
		as_new_officer();
		header('Location: '.as_siteUrl.'officer/new'.as_urlExt );
	}
	
	require_once AS_FUNC."as_paging.php";
	include AS_THEME."as_header.php";
?>
<div id="main_content">
	<form action="<?php echo as_menu_handler("officer/new") ?>" method="post" enctype="multipart/form-data">
		<div id="admin_header">
			<div class="admin_index_title">Add a New Officer</div> 
			<div class="right_buttons">
				<input type="submit"  class="right_button" name="SaveAdd" value="Save and Add" />
				<input type="submit"  class="right_button" name="SaveClose" value="Save and Close" />
				<div class="right_button"><a href="<?php echo as_menu_handler("officer/all") ?>">Back to main</a></div>
			</div>
		</div>
		<div id="admin_header_border"></div>
		<div class="add_tab">
			<div id="quicklogin" class="form_admin">
				<div class="adminform_row_input">
					<label class="adminleft">Title: </label>
					<input type="text" class="form_input_general" name="officer_title" required autocomplete="off"/>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Price: </label>
					<input type="text" class="form_input_general" name="officer_date" required />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Category: </label>
					<select class="form_select" name="officer_category" required>
						<option value=""> - Select a category -</option>
						<?php foreach( $cat_results as $crow ) { ?>
						<option value="<?php echo $crow['categoryid'] ?>"> <?php echo $crow['category_title'] ?> </option>
						<?php } ?>
					</select>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Place: </label>
					<select class="form_select" name="officer_item">
						<option value=""> - Select a Place -</option>
						<?php foreach( $item_results as $prow ) { ?>
						<option value="<?php echo $prow['itemid'] ?>"> <?php echo $prow['item_title'] ?> </option>
						<?php } ?>
					</select>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Picture 1: </label>
					<input type="file" class="form_input_general" accept="image/*" name="officer_picture1" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Picture 2: </label>
					<input type="file" class="form_input_general" accept="image/*" name="officer_picture2" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Picture 3: </label>
					<input type="file" class="form_input_general" accept="image/*" name="officer_picture3" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Description: </label>
					<textarea name="officer_description" rows="" cols="" ></textarea>
				</div>
			</div>
		</div>
	</form>
<?php include AS_THEME."as_footer.php" ?>