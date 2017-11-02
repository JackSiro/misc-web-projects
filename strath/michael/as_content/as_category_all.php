<?php 
/*
	File: as_content/as_category_all.php
	Description: page for viewing all categories

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Manage Categories :: Administrator';
	$search = isset( $_GET['q'] ) ? $_GET['q'] : "";
	$max = isset( $_GET['as_max'] ) ? $_GET['as_max'] : 10;
	$page = isset( $_GET['as_page'] ) ? $_GET['as_page'] : 1;
	
	$database = new As_Dbconn();
	if ($search) {
		$as_db_query = "SELECT * FROM as_category WHERE category_title LIKE '%".$search."%' ORDER BY categoryid DESC LIMIT $max";
		$count = $database->get_count("as_category", "category_title LIKE '%".$search."%");
	} else {
		$as_db_query = "SELECT * FROM as_category ORDER BY categoryid DESC LIMIT $max";
		$count = $database->get_count('as_category');
	}
	$results = $database->get_results( $as_db_query );
	
	require_once AS_FUNC."as_paging.php";	
	include AS_THEME."as_header.php";
?>
<div id="main_content">
   <div id="admin_header">
      <div class="admin_index_title">Manage Categories (<?php echo $count ?>)</div>
		<div class="right_buttons">
			<div class="right_button"><a href="<?php echo as_menu_handler("category/new") ?>">Add new category</a></div>
			<div class="right_button"><a href="#">Delete Selected</a></div>
		</div>
		<div id="admin_search_tab">
			<form action="<?php echo as_menu_handler("category/search") ?>" method="get">
				<label class="search" style="padding-top:3px;">Search a category: </label>
				<label class="search">
					<input type="text" name="q" class="search_input" value="<?php echo $search ?>" required />
				</label>
				<label class="search">
					<img src="<?php echo as_siteUrl ?>as_themes/images/adminicons/search.png" alt="" border="0" />
				</label>
			</form>
		</div>
    </div>
    <div id="admin_header_border"></div>
   
    <div class="table_grid">
      <table cellspacing="0" cellpadding="0">
	  <thead>
        <tr>
          <th style="width:10px;">Select</th>
          <th style="width:50px;"><a href="#" >Picture</a></th>
          <th style="width:auto;"><a href="#" >Title</a></th>
          <th style="width:auto;"><a href="#" >Description</a></th>
          <th style="width:50px;"><a href="#" >Edit</a></th>
          <th style="width:50px;"><a href="#" >Delete</a></th>
        </tr></thead>
	   <tbody>
		<?php foreach( $results as $row ) { ?>
        <tr class="even">
          <td><input type="checkbox" name="checkbox" /></td>
          <td><img alt="" src="<?php echo as_siteUrl ?>as_media/posts/cat.jpg" width="53" height="39" border="0" /></td>
          <td><?php echo $row['category_title'] ?></td>
          <td><?php echo $row['category_content'] ?></td>
          <td><a href="<?php echo as_menu_handler("category/edit") ?>?as_categoryid=<?php echo $row['categoryid'] ?>"><img alt="" src="<?php echo as_siteUrl ?>as_themes/images/adminicons/edit.png" width="22" height="22" border="0" /></a></td>
          <td><a href="<?php echo as_menu_handler("category/delete") ?>?as_categoryid=<?php echo $row['categoryid'] ?>"><img alt="" src="<?php echo as_siteUrl ?>as_themes/images/adminicons/delete.png" width="24" height="24" border="0" onclick="return confirm('Are you sure you want to delete this record from the system? \nBe careful, this action can not be reversed.')"/></a></td>
        </tr>
		<?php } ?>					
	  </tbody>
      </table>
    </div>
<?php
	echo as_pagination($page, $count, $max, "category/all");
	include AS_THEME."as_footer.php";
?>