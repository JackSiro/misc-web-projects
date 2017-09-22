<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_item_cart($cartno) {
		$my_db_query = "SELECT * FROM my_category WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $my_db_query );
		    return $cat_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_item_seller($doctorid, $infor) {
		$my_db_query = "SELECT * FROM my_doctor_account WHERE doctorid = '$doctorid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $doctorid, $doctor_code, $doctor_fname, $doctor_surname, $doctor_sex, $doctor_password, $doctor_email, $doctor_group, $doctor_points, $doctor_bio, $doctor_mailcon, $doctor_joined, $doctor_mobile, $doctor_web, $doctor_location, $doctor_security_quiz, $doctor_security_ans, $doctor_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_cat_items(){
		$my_db_query = "SELECT * FROM my_category";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['cat_title'].'</option>';		                            
		}			
	}

	function my_latest_catitems($catid){
		$my_db_query = "SELECT * FROM my_item WHERE item_cat = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_cat_items_home(){
		$my_db_query = "SELECT * FROM my_category";
		$database = new As_Dbconn();
		
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
				$database = new As_Dbconn();
				
				$cat_items = $database->get_results( $my_cat_items_query );
				foreach( $cat_items as $row )
				{
					echo '<div class="product menu-category">
									
					<a href="'.my_siteLynk().$row['item_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['item_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['item_slug'].'" class="menu-item list-group-item">'.substr($row['item_title'],0,20).'<span class="badge">KSh '.$row['item_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_cat_items(){
	$my_db_query = "SELECT * FROM my_item LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-category">
				<a href="'.my_siteLynk().$row['item_slug'].'"><div class="menu-category-name list-group-item active">'.my_item_cart($row['item_cat']).'</div></a>
				<a href="'.my_siteLynk().$row['item_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['item_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['item_slug'].'" class="menu-item list-group-item">'.substr($row['item_title'],0,20).'<span class="badge">KSh '.$row['item_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_category LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['cat_slug'].'" >
			<div class="cat_lynk"><img class="cat_icon" src="'.my_siteLynk_icon().$row['cat_icon'].'"/>
			'.$row['cat_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_category WHERE cat_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_doctor_account WHERE doctor_code = '$request'";
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
		$my_db_query = "SELECT * FROM my_item WHERE item_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
