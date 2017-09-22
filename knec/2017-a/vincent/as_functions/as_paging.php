<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_customer_cart($cartno) {
		$my_db_query = "SELECT * FROM my_class WHERE salesitemid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $salesitemid, $salesitem_title, $salesitem_content) = $database->get_row( $my_db_query );
		    return $salesitem_content;
		} else  {
		    return false;
		}
		
	}
	

	function my_customer_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_salesitem_customers(){
		$my_db_query = "SELECT * FROM my_class";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['salesitemid'].'">'.$row['salesitem_content'].'</option>';		                            
		}			
	}

	function my_latest_clascustomers($salesitemid){
		$my_db_query = "SELECT * FROM my_customer WHERE customer_sex = '$salesitemid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_salesitem_customers_home(){
		$my_db_query = "SELECT * FROM my_class";
		$database = new As_Dbconn();
		
		$customer_sex = $database->get_results( $my_db_query );
		foreach( $customer_sex as $class )
		{
		    $customer_sex = $class['salesitemid'];
			
			$my_salesitem_customers_query = "SELECT * FROM my_customer WHERE customer_sex = '$customer_sex' LIMIT 4";
			
			if ($my_salesitem_customers_query) {
				echo '<hr><h3>'.$class['salesitem_content'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$salesitem_customers = $database->get_results( $my_salesitem_customers_query );
				foreach( $salesitem_customers as $row )
				{
					echo '<div class="product menu-class">
									
					<a href="'.my_siteLynk().$row['customer_course'].'"><div class="product-image">
						<img class="product-image menu-customer list-group-customer" src="'.my_siteLynk_img().$row['customer_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['customer_course'].'" class="menu-customer list-group-customer">'.substr($row['customer_address'],0,20).'<span class="badge">KSh '.$row['customer_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_salesitem_customers(){
	$my_db_query = "SELECT * FROM my_customer LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-class">
				<a href="'.my_siteLynk().$row['customer_course'].'"><div class="menu-class-name list-group-customer active">'.my_customer_cart($row['customer_sex']).'</div></a>
				<a href="'.my_siteLynk().$row['customer_course'].'"><div class="product-image">
					<img class="product-image menu-customer list-group-customer" src="'.my_siteLynk_img().$row['customer_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['customer_course'].'" class="menu-customer list-group-customer">'.substr($row['customer_address'],0,20).'<span class="badge">KSh '.$row['customer_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_class(){
		$my_db_query = "SELECT * FROM my_class LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['salesitem_title'].'" >
			<div class="salesitem_lynk"><img class="salesitem_user" src="'.my_siteLynk_icon().$row['salesitem_user'].'"/>
			'.$row['salesitem_content'].'</div></a>';
	   }				
	}

	function my_lookup_class($request){
		$my_db_query = "SELECT * FROM my_class WHERE salesitem_title = '$request'";
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
	
	function my_lookup_customer($request){
		$my_db_query = "SELECT * FROM my_customer WHERE customer_course = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
