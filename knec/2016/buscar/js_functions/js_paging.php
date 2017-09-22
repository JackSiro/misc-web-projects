<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_ticket_cart($cartno) {
		$my_db_query = "SELECT * FROM my_bus WHERE catid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $my_db_query );
		    return $cat_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_ticket_seller($employeeid, $infor) {
		$my_db_query = "SELECT * FROM my_employee_account WHERE employeeid = '$employeeid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $employeeid, $employee_name, $employee_fname, $employee_surname, $employee_sex, $employee_password, $employee_email, $employee_group, $employee_points, $employee_bio, $employee_mailcon, $employee_joined, $employee_mobile, $employee_web, $employee_location, $employee_security_quiz, $employee_security_ans, $employee_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_cat_items(){
		$my_db_query = "SELECT * FROM my_bus";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['cat_title'].'</option>';		                            
		}			
	}

	function my_latest_catitems($catid){
		$my_db_query = "SELECT * FROM my_item WHERE ticket_cat = '$catid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_cat_items_home(){
		$my_db_query = "SELECT * FROM my_bus";
		$database = new Js_Dbconn();
		
		$ticket_cats = $database->get_results( $my_db_query );
		foreach( $ticket_cats as $cat )
		{
		    $ticket_cat = $cat['catid'];
			
			$my_cat_items_query = "SELECT * FROM my_item WHERE ticket_cat = '$ticket_cat' LIMIT 4";
			
			if ($my_cat_items_query) {
				echo '<hr><h3>'.$cat['cat_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$cat_items = $database->get_results( $my_cat_items_query );
				foreach( $cat_items as $row )
				{
					echo '<div class="product menu-bus">
									
					<a href="'.my_siteLynk().$row['ticket_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['ticket_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['ticket_slug'].'" class="menu-item list-group-item">'.substr($row['ticket_title'],0,20).'<span class="badge">KSh '.$row['ticket_price'].'</span></a></div>';
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
		echo '<div class="product menu-bus">
				<a href="'.my_siteLynk().$row['ticket_slug'].'"><div class="menu-bus-name list-group-item active">'.my_ticket_cart($row['ticket_cat']).'</div></a>
				<a href="'.my_siteLynk().$row['ticket_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['ticket_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['ticket_slug'].'" class="menu-item list-group-item">'.substr($row['ticket_title'],0,20).'<span class="badge">KSh '.$row['ticket_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_bus LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['cat_slug'].'" >
			<div class="cat_lynk"><img class="cat_icon" src="'.my_siteLynk_icon().$row['cat_icon'].'"/>
			'.$row['cat_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_bus WHERE cat_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_employee_account WHERE employee_name = '$request'";
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
		$my_db_query = "SELECT * FROM my_item WHERE ticket_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
