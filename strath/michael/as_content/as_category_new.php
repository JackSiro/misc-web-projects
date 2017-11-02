<?php
/*
	File: as_content/as_category_new.php
	Description: page for addin a category

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Add a New Category :: Administrator';
	
	if (as_clicked('SaveClose')) {
		as_new_category();
		header('Location: '.as_siteUrl.'category/all'.as_urlExt );
	} else if (as_clicked('SaveAdd')) {
		as_new_category();
		header('Location: '.as_siteUrl.'category/new'.as_urlExt );
	}
	
	require_once AS_FUNC."as_paging.php";
	include AS_THEME."as_header.php";
?>
<div id="main_content">
	<form action="<?php echo as_menu_handler("category/new") ?>" method="post">
    <div id="admin_header">
      <div class="admin_index_title">Add a New Category</div>
      <div class="right_buttons">
		<input type="submit"  class="right_button" name="SaveAdd" value="Save and Add" />
		<input type="submit"  class="right_button" name="SaveClose" value="Save and Close" />
        <div class="right_button"><a href="<?php echo as_menu_handler("category/all") ?>">Back to main</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
    <div class="add_tab">
	  <div id="quicklogin" class="form_admin">
		<div class="adminform_row_input">
          <label class="adminleft">Title: </label>
          <input type="text" class="form_input_general" name="category_title" required autocomplete="off"/>
        </div>
        <div class="adminform_row_input">
          <label class="adminleft">Description: </label>
          <textarea name="category_content" rows="" cols=""></textarea>
        </div>
        </div>
        </div>
      </form>
<?php include AS_THEME."as_footer.php" ?>