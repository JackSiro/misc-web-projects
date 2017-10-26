<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_voter_cart($cartno) {
		$my_db_query = "SELECT * FROM my_class WHERE classid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $classid, $class_term, $class_title) = $database->get_row( $my_db_query );
		    return $class_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_voter_seller($officialid, $infor) {
		$my_db_query = "SELECT * FROM my_official_account WHERE officialid = '$officialid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $officialid, $official_name, $official_fname, $official_surname, $official_sex, $official_password, $official_email, $official_group, $official_points, $official_bio, $official_mailcon, $official_joined, $official_mobile, $official_web, $official_location, $official_security_quiz, $official_security_ans, $official_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_class_voters(){
		$my_db_query = "SELECT * FROM my_class";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['classid'].'">'.$row['class_title'].'</option>';		                            
		}			
	}

	function my_latest_clasvoters($classid){
		$my_db_query = "SELECT * FROM my_voter WHERE voter_class = '$classid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_class_voters_home(){
		$my_db_query = "SELECT * FROM my_class";
		$database = new As_Dbconn();
		
		$voter_class = $database->get_results( $my_db_query );
		foreach( $voter_class as $class )
		{
		    $voter_class = $class['classid'];
			
			$my_class_voters_query = "SELECT * FROM my_voter WHERE voter_class = '$voter_class' LIMIT 4";
			
			if ($my_class_voters_query) {
				echo '<hr><h3>'.$class['class_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$class_voters = $database->get_results( $my_class_voters_query );
				foreach( $class_voters as $row )
				{
					echo '<div class="product menu-class">
									
					<a href="'.my_siteLynk().$row['voter_course'].'"><div class="product-image">
						<img class="product-image menu-voter list-group-voter" src="'.my_siteLynk_img().$row['voter_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['voter_course'].'" class="menu-voter list-group-voter">'.substr($row['voter_name'],0,20).'<span class="badge">KSh '.$row['voter_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_class_voters(){
	$my_db_query = "SELECT * FROM my_voter LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-class">
				<a href="'.my_siteLynk().$row['voter_course'].'"><div class="menu-class-name list-group-voter active">'.my_voter_cart($row['voter_class']).'</div></a>
				<a href="'.my_siteLynk().$row['voter_course'].'"><div class="product-image">
					<img class="product-image menu-voter list-group-voter" src="'.my_siteLynk_img().$row['voter_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['voter_course'].'" class="menu-voter list-group-voter">'.substr($row['voter_name'],0,20).'<span class="badge">KSh '.$row['voter_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_class(){
		$my_db_query = "SELECT * FROM my_class LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['class_term'].'" >
			<div class="class_lynk"><img class="class_official" src="'.my_siteLynk_icon().$row['class_official'].'"/>
			'.$row['class_title'].'</div></a>';
	   }				
	}

	function my_lookup_class($request){
		$my_db_query = "SELECT * FROM my_class WHERE class_term = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_official($request){
		$my_db_query = "SELECT * FROM my_official_account WHERE official_name = '$request'";
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
	
	function my_lookup_voter($request){
		$my_db_query = "SELECT * FROM my_voter WHERE voter_course = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
