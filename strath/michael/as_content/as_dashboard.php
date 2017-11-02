<?php
/*
	File: as_content/as_dashboard.php
	Description: page for viewing site dashboard

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Administrator';

	//new instance of database class
	$database = new As_Dbconn();
	
	$user_count = $database->get_count('as_user');
	$user_query = "SELECT * FROM as_user ORDER BY userid LIMIT 5";	
	$user_results = $database->get_results( $user_query );
	
	$crime_count = $database->get_count('as_crime');
	$crime_query = "SELECT * FROM as_crime ORDER BY crimeid LIMIT 5";	
	$crime_results = $database->get_results( $crime_query );
	
	$item_count = $database->get_count('as_item');	
	$item_query = "SELECT * FROM as_item ORDER BY itemid LIMIT 5";	
	$item_results = $database->get_results( $item_query );
	
	$cat_count = $database->get_count('as_category');	
	$cat_query = "SELECT * FROM as_category ORDER BY categoryid LIMIT 5";	
	$cat_results = $database->get_results( $cat_query );
	
	require_once AS_FUNC."as_paging.php";	
	include AS_THEME."as_header.php";
?>
<div id="main_content">
    <div id="admin_header">
      <div class="admin_index_title">Site Dashboard</div>
      <div class="right_buttons">
        <div class="right_button"><a href="<?php echo as_menu_handler("settings") ?>">Site Options</a></div>
      </div>
    </div>
    <div id="admin_header_border"></div>
	<div class="table_grid">
		<div class="admin_box_wide"> 
			<a href="<?php echo as_menu_handler("category/all") ?>"><img src="as_media/posts/cat.jpg" width="130" height="98" class="img_left" alt="" border="0"/></a>
			<div class="admin_info"> <span><?php echo $cat_count ?> CATEGORIES</span>
				<p class="item" style="padding-left:10px;">
					<ul>
					<?php foreach ($cat_results as $crow) { ?>
					<li><?php echo $crow['category_title'] ?></li>
					<?php } ?>
					</ul>
				</p>
			</div>
		</div>
		<div class="admin_box_wide"> 
			<a href="<?php echo as_menu_handler("crime/all") ?>"><img src="as_media/posts/crime.jpg" width="130" height="98" class="img_left" alt="" border="0"/></a>
			<div class="admin_info"> <span><?php echo $crime_count ?> CRIMES</span>
				<p class="item" style="padding-left:10px;">
					<ul>
						<?php foreach ($crime_results as $orow) { ?><li><?php echo $orow['crime_title'] ?></li><?php } ?>
					</ul>
				</p>
			</div>
		</div>
		<div class="admin_box_wide"> 
			<a href="<?php echo as_menu_handler("item/all") ?>"><img src="as_media/posts/item.jpg" width="130" height="98" class="img_left" alt="" border="0"/></a>
			<div class="admin_info"> <span><?php echo $item_count ?> LOST ITEMS</span>
				<p class="crime" style="padding-left:10px;">
					<ul>
						<?php foreach ($item_results as $prow) { ?><li><?php echo $prow['item_title'] ?></li><?php } ?>
					</ul>
				</p>
			</div>
		</div>
		<div class="admin_box_wide"> 
			<a href="<?php echo as_menu_handler("officer/all") ?>"><img src="as_media/posts/user.jpg" width="130" height="98" class="img_left" alt="" border="0"/></a>
			<div class="admin_info"> <span><?php echo $user_count ?> OFFICERS</span>
				<p class="item">
					<ul>
					<?php foreach ($user_results as $urow) { ?>
					<li><?php echo $urow['user_fname'].' '.$urow['user_lname'] ?></li>
					<?php } ?>
					</ul>
				</p>
			</div>
		</div>
		
	</div>
<?php include AS_THEME."as_footer.php" ?>