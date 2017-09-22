<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_stock_cart($cartno) {
		$my_db_query = "SELECT * FROM my_item WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $item_slug, $item_title) = $database->get_row( $my_db_query );
		    return $item_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_stock_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_item_items(){
		$my_db_query = "SELECT * FROM my_item";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['item_title'].'</option>';		                            
		}			
	}

	function my_latest_catitems($catid){
		$my_db_query = "SELECT * FROM my_item WHERE stock_itemid = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_item_items_home(){
		$my_db_query = "SELECT * FROM my_item";
		$database = new As_Dbconn();
		
		$stock_itemids = $database->get_results( $my_db_query );
		foreach( $stock_itemids as $cat )
		{
		    $stock_itemid = $cat['catid'];
			
			$my_item_items_query = "SELECT * FROM my_item WHERE stock_itemid = '$stock_itemid' LIMIT 4";
			
			if ($my_item_items_query) {
				echo '<hr><h3>'.$cat['item_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$item_items = $database->get_results( $my_item_items_query );
				foreach( $item_items as $row )
				{
					echo '<div class="product menu-category">
									
					<a href="'.my_siteLynk().$row['stock_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['stock_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['stock_slug'].'" class="menu-item list-group-item">'.substr($row['stock_title'],0,20).'<span class="badge">KSh '.$row['stock_quantity'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_item_items(){
	$my_db_query = "SELECT * FROM my_item LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-category">
				<a href="'.my_siteLynk().$row['stock_slug'].'"><div class="menu-category-name list-group-item active">'.my_stock_cart($row['stock_itemid']).'</div></a>
				<a href="'.my_siteLynk().$row['stock_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['stock_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['stock_slug'].'" class="menu-item list-group-item">'.substr($row['stock_title'],0,20).'<span class="badge">KSh '.$row['stock_quantity'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_item LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['item_slug'].'" >
			<div class="item_lynk"><img class="item_icon" src="'.my_siteLynk_icon().$row['item_icon'].'"/>
			'.$row['item_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_item WHERE item_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_user_account WHERE user_name = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_loc($request){
		$my_db_query = "SELECT * FROM my_location WHERE slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_item($request){
		$my_db_query = "SELECT * FROM my_item WHERE stock_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	
	function as_feedback_message()
	{
		if( isset($_SESSION['AS_SUCCMSG_ARR']) && is_array($_SESSION['AS_SUCCMSG_ARR']) && count($_SESSION['AS_SUCCMSG_ARR']) >0 ) 
		{ ?>
		<div class="success_log">
			<ul>									
			<?php foreach($_SESSION['AS_SUCCMSG_ARR'] as $as_succ_msg) { ?>
				<li><?php echo $as_succ_msg ?></li> 
			<?php } ?>
			</ul>
		</div>
		<?php unset($_SESSION['AS_SUCCMSG_ARR']); 
		}
		
		if( isset($_SESSION['AS_ERRMSG_ARR']) && is_array($_SESSION['AS_ERRMSG_ARR']) && count($_SESSION['AS_ERRMSG_ARR']) >0 ) 
		{ ?>
		<div class="error_log">
			<ul>									
			<?php foreach($_SESSION['AS_ERRMSG_ARR'] as $as_error_msg) { ?>
				<li><?php echo $as_error_msg ?></li> 
			<?php } ?>
			</ul>
		</div>
			
		<?php } unset($_SESSION['AS_ERRMSG_ARR']); 
	}
	