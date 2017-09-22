<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_tenant_cart($cartno) {
		$my_db_query = "SELECT * FROM my_house WHERE houseid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $houseid, $house_number, $house_size) = $database->get_row( $my_db_query );
		    return $house_size;
		} else  {
		    return false;
		}
		
	}
	

	function my_tenant_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_house_tenants(){
		$my_db_query = "SELECT * FROM my_house";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['houseid'].'">'.$row['house_size'].'</option>';		                            
		}			
	}

	function my_latest_cattenants($houseid){
		$my_db_query = "SELECT * FROM my_tenant WHERE tenant_house = '$houseid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_house_tenants_home(){
		$my_db_query = "SELECT * FROM my_house";
		$database = new Js_Dbconn();
		
		$tenant_houses = $database->get_results( $my_db_query );
		foreach( $tenant_houses as $cat )
		{
		    $tenant_house = $cat['houseid'];
			
			$my_house_tenants_query = "SELECT * FROM my_tenant WHERE tenant_house = '$tenant_house' LIMIT 4";
			
			if ($my_house_tenants_query) {
				echo '<hr><h3>'.$cat['house_size'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$house_tenants = $database->get_results( $my_house_tenants_query );
				foreach( $house_tenants as $row )
				{
					echo '<div class="product menu-house">
									
					<a href="'.my_siteLynk().$row['tenant_idno'].'"><div class="product-image">
						<img class="product-image menu-tenant list-group-tenant" src="'.my_siteLynk_img().$row['tenant_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['tenant_idno'].'" class="menu-tenant list-group-tenant">'.substr($row['tenant_status'],0,20).'<span class="badge">KSh '.$row['tenant_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_house_tenants(){
	$my_db_query = "SELECT * FROM my_tenant LIMIT 4";
	$database = new Js_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-house">
				<a href="'.my_siteLynk().$row['tenant_idno'].'"><div class="menu-house-name list-group-tenant active">'.my_tenant_cart($row['tenant_house']).'</div></a>
				<a href="'.my_siteLynk().$row['tenant_idno'].'"><div class="product-image">
					<img class="product-image menu-tenant list-group-tenant" src="'.my_siteLynk_img().$row['tenant_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['tenant_idno'].'" class="menu-tenant list-group-tenant">'.substr($row['tenant_status'],0,20).'<span class="badge">KSh '.$row['tenant_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_houses(){
		$my_db_query = "SELECT * FROM my_house LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['house_number'].'" >
			<div class="house_lynk"><img class="house_location" src="'.my_siteLynk_icon().$row['house_location'].'"/>
			'.$row['house_size'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_house WHERE house_number = '$request'";
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
	
	function my_lookup_tenant($request){
		$my_db_query = "SELECT * FROM my_tenant WHERE tenant_idno = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
