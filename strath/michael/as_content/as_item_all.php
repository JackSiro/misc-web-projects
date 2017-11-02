<?php
/*
	File: as_content/as_item_all.php
	Description: page for viewing all items

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Manage Lost Items :: Administrator';
	$search = isset( $_GET['q'] ) ? $_GET['q'] : "";
	$max = isset( $_GET['as_max'] ) ? $_GET['as_max'] : 10;
	$page = isset( $_GET['as_page'] ) ? $_GET['as_page'] : 1;
	
	$database = new As_Dbconn();
	if ($search) {
		$as_db_query = "SELECT * FROM as_item WHERE item_title LIKE '%".$search."%' ORDER BY itemid DESC LIMIT $max";
		$count = $database->get_count("as_item", "item_title LIKE '%".$search."%");
	} else {
		$as_db_query = "SELECT * FROM as_item ORDER BY itemid DESC LIMIT $max";
		$count = $database->get_count('as_item');
	}
	$results = $database->get_results( $as_db_query );
	
	require_once AS_FUNC."as_paging.php";	
	include AS_THEME."as_header.php";
?>
<div id="main_content">
   <div id="admin_header">
      <div class="admin_index_title">Manage Items (<?php echo $count ?>)</div>
		<div class="right_buttons">
			<div class="right_button"><a href="<?php echo as_menu_handler("item/new") ?>">Add new item</a></div>
			<div class="right_button"><a href="#">Delete Selected</a></div>
		</div>
		<div id="admin_search_tab">
			<form action="<?php echo as_menu_handler("item/search") ?>" method="get">
				<label class="search" style="padding-top:3px;">Search a item: </label>
				<label class="search">
					<input type="text" name="q" class="search_input" value="<?php echo $search ?>" required />
				</label>
				<label class="search">
					<!--<input type="image" name="SearchNow"  src="<?php // echo as_siteUrl ?>as_themes/images/adminicons/search.png"/> -->
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
          <th style="width:auto;"><a href="#" >Value</a></th>
          <th style="width:auto;"><a href="#" >Date</a></th>
          <th style="width:auto;"><a href="#" >Time</a></th>
          <th style="width:auto;"><a href="#" >Place</a></th>
          <th style="width:auto;"><a href="#" >Person</a></th>
          <th style="width:auto;"><a href="#" >ID. Number</a></th>
          <th style="width:50px;"><a href="#" >Edit</a></th>
          <th style="width:50px;"><a href="#" >Delete</a></th>
        </tr></thead>
	   <tbody>
		<?php foreach( $results as $row ) { ?>
        <tr class="even">
          <td><input type="checkbox" name="checkbox" /></td>
          <td><img alt="" src="<?php echo as_siteUrl ?>as_media/posts/item.jpg" width="53" height="39" border="0" /></td>
          <td><?php echo $row['item_title'] ?></td>
          <td><?php echo $row['item_value'] ?>/=</td>
          <td><?php echo $row['item_date'] ?></td>
          <td><?php echo $row['item_time'] ?></td>
          <td><?php echo $row['item_place'] ?></td>
          <td><?php echo $row['item_person'] ?></td>
          <td><?php echo $row['item_idnumber'] ?></td>
          <td><a href="<?php echo as_menu_handler("item/edit") ?>?as_itemid=<?php echo $row['itemid'] ?>"><img alt="" src="<?php echo as_siteUrl ?>as_themes/images/adminicons/edit.png" width="22" height="22" border="0" /></a></td>
          <td><a href="<?php echo as_menu_handler("item/delete") ?>?as_itemid=<?php echo $row['itemid'] ?>"><img alt="" src="<?php echo as_siteUrl ?>as_themes/images/adminicons/delete.png" width="24" height="24" border="0" onclick="return confirm('Are you sure you want to delete this record from the system? \nBe careful, this action can not be reversed.')"/></a></td>
        </tr>
		<?php } ?>					
	  </tbody>
      </table>
    </div>
<?php
	echo as_pagination($page, $count, $max, "item/all");
	include AS_THEME."as_footer.php";
?>