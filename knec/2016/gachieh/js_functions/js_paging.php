<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_session_cart($cartno) {
		$my_db_query = "SELECT * FROM my_farmer WHERE farmerid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $farmerid, $farmer_slug, $farmer_fullname) = $database->get_row( $my_db_query );
		    return $farmer_fullname;
		} else  {
		    return false;
		}
		
	}
	

	function my_session_seller($employeeid, $infor) {
		$my_db_query = "SELECT * FROM my_employee_account WHERE employeeid = '$employeeid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $employeeid, $employee_name, $employee_fullname, $employee_number, $employee_sex, $employee_password, $employee_email, $employee_group, $employee_points, $employee_bio, $employee_mailcon, $employee_joined, $employee_mobile, $employee_web, $employee_location, $employee_security_quiz, $employee_security_ans, $employee_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_farmer_sessions(){
		$my_db_query = "SELECT * FROM my_farmer";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['farmerid'].'">'.$row['farmer_fullname'].'</option>';		                            
		}			
	}

	function my_latest_farmersessions($farmerid){
		$my_db_query = "SELECT * FROM my_session WHERE session_farmer = '$farmerid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_farmer_sessions_home(){
		$my_db_query = "SELECT * FROM my_farmer";
		$database = new Js_Dbconn();
		
		$session_farmers = $database->get_results( $my_db_query );
		foreach( $session_farmers as $farmer )
		{
		    $session_farmer = $farmer['farmerid'];
			
			$my_farmer_sessions_query = "SELECT * FROM my_session WHERE session_farmer = '$session_farmer' LIMIT 4";
			
			if ($my_farmer_sessions_query) {
				echo '<hr><h3>'.$farmer['farmer_fullname'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$farmer_sessions = $database->get_results( $my_farmer_sessions_query );
				foreach( $farmer_sessions as $row )
				{
					echo '<div class="product menu-farmer">
									
					<a href="'.my_siteLynk().$row['session_slug'].'"><div class="product-image">
						<img class="product-image menu-session list-group-session" src="'.my_siteLynk_img().$row['session_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['session_slug'].'" class="menu-session list-group-session">'.substr($row['session_title'],0,20).'<span class="badge">KSh '.$row['session_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_farmer_sessions(){
	$my_db_query = "SELECT * FROM my_session LIMIT 4";
	$database = new Js_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-farmer">
				<a href="'.my_siteLynk().$row['session_slug'].'"><div class="menu-farmer-name list-group-session active">'.my_session_cart($row['session_farmer']).'</div></a>
				<a href="'.my_siteLynk().$row['session_slug'].'"><div class="product-image">
					<img class="product-image menu-session list-group-session" src="'.my_siteLynk_img().$row['session_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['session_slug'].'" class="menu-session list-group-session">'.substr($row['session_title'],0,20).'<span class="badge">KSh '.$row['session_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_farmers(){
		$my_db_query = "SELECT * FROM my_farmer LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['farmer_slug'].'" >
			<div class="farmer_lynk"><img class="farmer_icon" src="'.my_siteLynk_icon().$row['farmer_icon'].'"/>
			'.$row['farmer_fullname'].'</div></a>';
	   }				
	}

	function my_lookup_farmer($request){
		$my_db_query = "SELECT * FROM my_farmer WHERE farmer_slug = '$request'";
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
	
	function my_lookup_session($request){
		$my_db_query = "SELECT * FROM my_session WHERE session_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
