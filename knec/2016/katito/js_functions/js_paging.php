<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_item_cart($cartno) {
		$my_db_query = "SELECT * FROM my_type WHERE catid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $my_db_query );
		    return $cat_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_item_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_cat_items(){
		$my_db_query = "SELECT * FROM my_type";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['cat_title'].'</option>';		                            
		}			
	}

	function my_latest_catitems($catid){
		$my_db_query = "SELECT * FROM my_item WHERE item_cat = '$catid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_cat_items_home(){
		$my_db_query = "SELECT * FROM my_type";
		$database = new Js_Dbconn();
		
		$item_cats = $database->get_results( $my_db_query );
		foreach( $item_cats as $cat )
		{
		    $item_cat = $cat['catid'];
			
			$my_cat_items_query = "SELECT * FROM my_item WHERE item_cat = '$item_cat' LIMIT 4";
			
			if ($my_cat_items_query) {
				echo '<hr><h3>'.$cat['cat_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$cat_items = $database->get_results( $my_cat_items_query );
				foreach( $cat_items as $row )
				{
					echo '<div class="product menu-type">
									
					<a href="'.my_siteLynk().$row['item_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['item_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['item_slug'].'" class="menu-item list-group-item">'.substr($row['item_title'],0,20).'<span class="badge">KSh '.$row['item_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_cat_items(){
	$my_db_query = "SELECT * FROM my_item LIMIT 4";
	$database = new Js_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-type">
				<a href="'.my_siteLynk().$row['item_slug'].'"><div class="menu-type-name list-group-item active">'.my_item_cart($row['item_cat']).'</div></a>
				<a href="'.my_siteLynk().$row['item_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['item_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['item_slug'].'" class="menu-item list-group-item">'.substr($row['item_title'],0,20).'<span class="badge">KSh '.$row['item_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_type LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['cat_slug'].'" >
			<div class="cat_lynk"><img class="cat_icon" src="'.my_siteLynk_icon().$row['cat_icon'].'"/>
			'.$row['cat_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_type WHERE cat_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_user_account WHERE user_name = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_loc($request){
		$my_db_query = "SELECT * FROM my_location WHERE slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_item($request){
		$my_db_query = "SELECT * FROM my_item WHERE item_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
