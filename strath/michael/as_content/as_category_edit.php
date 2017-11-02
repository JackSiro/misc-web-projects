<?php
/*
	File: as_content/as_category_edit.php
	Description: page for editting a category

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Edit a Category :: Administrator';
	$categoryid = isset( $_GET['as_categoryid'] ) ? $_GET['as_categoryid'] : "";
	
	$as_db_query = "SELECT * FROM as_category WHERE categoryid=$categoryid";
	//new instance of database class
	$database = new As_Dbconn();
	
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $categoryid, $category_title, $category_code, $category_content, $category_created, $category_scount, $category_active ) = $database->get_row( $as_db_query );
	}
	
	if (as_clicked('SaveClose')) {
		as_edit_category($categoryid);
		header('Location: '.as_siteUrl.'category/all'.as_urlExt );
	} else if (as_clicked('SaveItem')) {
		as_edit_category($categoryid);
		header('Location: '.as_siteUrl.'category/edit'.as_urlExt.'?as_categoryid='.$categoryid );
	}
	
	require_once AS_FUNC."as_paging.php";
	include AS_THEME."as_header.php";
?>
<div id="main_content">
	<form action="<?php echo as_menu_handler("category/new") ?>" method="post">
    <div id="admin_header">
      <div class="admin_index_title">Edit a Category</div>
      <div class="right_buttons">
		<input type="submit"  class="right_button" name="SaveItem" value="Save Only" />
		<input type="submit"  class="right_button" name="SaveClose" value="Save and Close" />
        <div class="right_button"><a href="<?php echo as_menu_handler("category/all") ?>">Back to main</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
    <div class="add_tab">
	  <div id="quicklogin" class="form_admin">
		<div class="adminform_row_input">
          <label class="adminleft">Title: </label>
          <input type="text" class="form_input_general" name="category_title" value="<?php echo $category_title ?>" required autocomplete="off"/>
        </div>
        <div class="adminform_row_input">
          <label class="adminleft">Description: </label>
          <textarea name="category_content" rows="" cols=""><?php echo $category_content ?></textarea>
        </div>
        </div>
        </div>
      </form>
<?php include AS_THEME."as_footer.php" ?>