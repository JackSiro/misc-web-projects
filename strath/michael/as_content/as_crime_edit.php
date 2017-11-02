<?php
/*
	File: as_content/as_crime_edit.php
	Description: page for ediiting a crime

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Edit Crime :: Administrator';
	$crimeid = isset( $_GET['as_crimeid'] ) ? $_GET['as_crimeid'] : "";
	$as_db_query = "SELECT * FROM as_crime WHERE crimeid=$crimeid";
		
	//new instance of database class
	$database = new As_Dbconn();
	$item_query = "SELECT * FROM as_item ORDER BY itemid";	
	$item_results = $database->get_results( $item_query );
	$cat_query = "SELECT * FROM as_category ORDER BY categoryid";	
	$cat_results = $database->get_results( $cat_query );
	
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $crimeid, $crime_category, $crime_item, $crime_title, $crime_description, $crime_date, $crime_picture1, $crime_picture2, $crime_picture3, $crime_time, $crime_suspect, $crime_views, $crime_state, $crime_posted, $crime_postedby, $crime_updated, $crime_updatedby) = $database->get_row( $as_db_query );
	}
	
	
	if (as_clicked('SaveItem')) {
		as_edit_crime($crimeid);
		header('Location: '.as_siteUrl.'crime/all'.as_urlExt );
	} else if (as_clicked('SaveAdd')) {
		as_edit_crime($crimeid);
		header('Location: '.as_siteUrl.'crime/edit'.as_urlExt.'?as_crimeid='.$crimeid );
	}
	
	require_once AS_FUNC."as_paging.php";
	include AS_THEME."as_header.php";
?>
<div id="main_content">
	<form action="<?php echo as_menu_handler("crime/new") ?>" method="post" enctype="multipart/form-data">
		<div id="admin_header">
			<div class="admin_index_title"Edit an Crime</div> 
			<div class="right_buttons">
				<input type="submit"  class="right_button" name="SaveItem" value="Save Only" />
				<input type="submit"  class="right_button" name="SaveClose" value="Save and Close" />
				<div class="right_button"><a href="<?php echo as_menu_handler("crime/all") ?>">Back to main</a></div>
			</div>
		</div>
		<div id="admin_header_border"></div>
		<div class="add_tab">
			<div id="quicklogin" class="form_admin">
				<div class="adminform_row_input">
					<label class="adminleft">Title: </label>
					<input type="text" class="form_input_general" name="crime_title" value="<?php echo $crime_title ?>" required autocomplete="off"/>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Price: </label>
					<input type="text" class="form_input_general" name="crime_date" value="<?php echo $crime_date ?>" required autocomplete="off"/>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Category: </label>
					<select class="form_select" name="crime_category" required>
						<option value="<?php echo $crime_category ?>" > - Select a category -</option>
						<?php foreach( $cat_results as $crow ) { ?>
						<option value="<?php echo $crow['categoryid'] ?>"> <?php echo $crow['category_title'] ?> </option>
						<?php } ?>
					</select>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Place: </label>
					<select class="form_select" name="crime_item">
						<option value="<?php echo $crime_item ?>" > - Select a Place -</option>
						<?php foreach( $item_results as $prow ) { ?>
						<option value="<?php echo $prow['itemid'] ?>"> <?php echo $prow['item_title'] ?> </option>
						<?php } ?>
					</select>
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Picture 1: </label>
					<input type="hidded" value="<?php echo $crime_picture1 ?>" name="crime_pictured1" />
					<input type="file" class="form_input_general" accept="image/*" name="crime_picture1" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Picture 2: </label>
					<input type="hidded" value="<?php echo $crime_picture2 ?>" name="crime_pictured2" />
					<input type="file" class="form_input_general" accept="image/*" name="crime_picture2" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Picture 3: </label>
					<input type="hidded" value="<?php echo $crime_picture3 ?>" name="crime_pictured3" />
					<input type="file" class="form_input_general" accept="image/*" name="crime_picture3" />
				</div>
				<div class="adminform_row_input">
					<label class="adminleft">Description: </label>
					<textarea name="crime_description" rows="" cols="" ><?php echo $crime_content ?></textarea>
				</div>
			</div>
		</div>
	</form>
<?php include AS_THEME."as_footer.php" ?>