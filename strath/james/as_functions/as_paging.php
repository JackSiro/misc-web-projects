<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_client_cart($cartno) {
		$my_db_query = "SELECT * FROM my_plan WHERE planid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $planid, $plan_price, $plan_irate) = $database->get_row( $my_db_query );
		    return $plan_irate;
		} else  {
		    return false;
		}
		
	}
	

	function my_client_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_plan_clients(){
		$my_db_query = "SELECT * FROM my_plan";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['planid'].'">'.$row['plan_irate'].'</option>';		                            
		}			
	}

	function my_latest_clasclients($planid){
		$my_db_query = "SELECT * FROM my_client WHERE client_mobile = '$planid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_plan_clients_home(){
		$my_db_query = "SELECT * FROM my_plan";
		$database = new As_Dbconn();
		
		$client_mobile = $database->get_results( $my_db_query );
		foreach( $client_mobile as $class )
		{
		    $client_mobile = $class['planid'];
			
			$my_plan_clients_query = "SELECT * FROM my_client WHERE client_mobile = '$client_mobile' LIMIT 4";
			
			if ($my_plan_clients_query) {
				echo '<hr><h3>'.$class['plan_irate'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$plan_clients = $database->get_results( $my_plan_clients_query );
				foreach( $plan_clients as $row )
				{
					echo '<div class="product menu-class">
									
					<a href="'.my_siteLynk().$row['client_course'].'"><div class="product-image">
						<img class="product-image menu-client list-group-client" src="'.my_siteLynk_img().$row['client_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['client_course'].'" class="menu-client list-group-client">'.substr($row['client_email'],0,20).'<span class="badge">KSh '.$row['client_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_plan_clients(){
	$my_db_query = "SELECT * FROM my_client LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-class">
				<a href="'.my_siteLynk().$row['client_course'].'"><div class="menu-class-name list-group-client active">'.my_client_cart($row['client_mobile']).'</div></a>
				<a href="'.my_siteLynk().$row['client_course'].'"><div class="product-image">
					<img class="product-image menu-client list-group-client" src="'.my_siteLynk_img().$row['client_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['client_course'].'" class="menu-client list-group-client">'.substr($row['client_email'],0,20).'<span class="badge">KSh '.$row['client_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_plan(){
		$my_db_query = "SELECT * FROM my_plan LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['plan_price'].'" >
			<div class="plan_lynk"><img class="plan_user" src="'.my_siteLynk_icon().$row['plan_user'].'"/>
			'.$row['plan_irate'].'</div></a>';
	   }				
	}

	function my_lookup_plan($request){
		$my_db_query = "SELECT * FROM my_plan WHERE plan_price = '$request'";
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
	
	function my_lookup_client($request){
		$my_db_query = "SELECT * FROM my_client WHERE client_course = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
