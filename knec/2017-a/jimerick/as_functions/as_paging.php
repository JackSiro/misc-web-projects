<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_patient_cart($cartno) {
		$my_db_query = "SELECT * FROM my_type WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $my_db_query );
		    return $cat_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_patient_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_cat_patients(){
		$my_db_query = "SELECT * FROM my_type";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['cat_title'].'</option>';		                            
		}			
	}

	function my_latest_catpatients($catid){
		$my_db_query = "SELECT * FROM my_patient WHERE patient_cat = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_cat_patients_home(){
		$my_db_query = "SELECT * FROM my_type";
		$database = new As_Dbconn();
		
		$patient_cats = $database->get_results( $my_db_query );
		foreach( $patient_cats as $cat )
		{
		    $patient_cat = $cat['catid'];
			
			$my_cat_patients_query = "SELECT * FROM my_patient WHERE patient_cat = '$patient_cat' LIMIT 4";
			
			if ($my_cat_patients_query) {
				echo '<hr><h3>'.$cat['cat_title'].'</h3>
				   <div class="row">
					<div class="patientsrow">';
			}	
				$database = new As_Dbconn();
				
				$cat_patients = $database->get_results( $my_cat_patients_query );
				foreach( $cat_patients as $row )
				{
					echo '<div class="patient menu-type">
									
					<a href="'.my_siteLynk().$row['patient_slug'].'"><div class="patient-image">
						<img class="patient-image menu-patient list-group-patient" src="'.my_siteLynk_img().$row['patient_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['patient_slug'].'" class="menu-patient list-group-patient">'.substr($row['patient_name'],0,20).'<span class="badge">KSh '.$row['patient_location'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_cat_patients(){
	$my_db_query = "SELECT * FROM my_patient LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="patient menu-type">
				<a href="'.my_siteLynk().$row['patient_slug'].'"><div class="menu-type-name list-group-patient active">'.my_patient_cart($row['patient_cat']).'</div></a>
				<a href="'.my_siteLynk().$row['patient_slug'].'"><div class="patient-image">
					<img class="patient-image menu-patient list-group-patient" src="'.my_siteLynk_img().$row['patient_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['patient_slug'].'" class="menu-patient list-group-patient">'.substr($row['patient_name'],0,20).'<span class="badge">KSh '.$row['patient_location'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_type LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['cat_slug'].'" >
			<div class="cat_lynk"><img class="cat_icon" src="'.my_siteLynk_icon().$row['cat_icon'].'"/>
			'.$row['cat_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_type WHERE cat_slug = '$request'";
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
	
	function my_lookup_patient($request){
		$my_db_query = "SELECT * FROM my_patient WHERE patient_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
