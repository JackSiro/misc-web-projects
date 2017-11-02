<?php
/*
	File: as_content/as_item_edit.php
	Description: page for editting an item
*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Edit a Place :: Administrator';
	$itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid=$itemid";
	//new instance of database class
	$database = new As_Dbconn();
	
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $item_title, $item_value, $item_content, $item_reported, $item_found) = $database->get_row( $as_db_query );
	}
	
	if (as_clicked('SaveClose')) {
		as_edit_item($itemid);
		header('Location: '.as_siteUrl.'item/all'.as_urlExt );
	} else if (as_clicked('SaveAdd')) {
		as_edit_item($itemid);
		header('Location: '.as_siteUrl.'item/edit'.as_urlExt.'?as_itemid='.$itemid );
	}
	
	require_once AS_FUNC."as_paging.php";
	include AS_THEME."as_header.php";
?>
<div id="main_content">
	<form action="<?php echo as_menu_handler("item/new") ?>" method="post">
    <div id="admin_header">
      <div class="admin_index_title">Edit a Place</div>
      <div class="right_buttons">
		<input type="submit"  class="right_button" name="SaveItem" value="Save Only" />
		<input type="submit"  class="right_button" name="SaveClose" value="Save and Close" />
        <div class="right_button"><a href="<?php echo as_menu_handler("item/all") ?>">Back to main</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
    <div class="add_tab">
	  <div id="quicklogin" class="form_admin">
		<div class="adminform_row_input">
          <label class="adminleft">Title: </label>
          <input type="text" class="form_input_general" name="item_title" value="<?php echo $item_title ?>" required autocomplete="off"/>
        </div>
        <div class="adminform_row_input">
          <label class="adminleft">Description: </label>
          <textarea name="item_content" rows="" cols=""><?php echo $item_content ?></textarea>
        </div>
        </div>
        </div>
      </form>
<?php include AS_THEME."as_footer.php" ?>