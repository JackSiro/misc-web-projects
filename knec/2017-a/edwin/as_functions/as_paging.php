<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_worker_cart($cartno) {
		$my_db_query = "SELECT * FROM my_type WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $my_db_query );
		    return $cat_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_worker_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_cat_workers(){
		$my_db_query = "SELECT * FROM my_type";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['cat_title'].'</option>';		                            
		}			
	}

	function my_latest_catworkers($catid){
		$my_db_query = "SELECT * FROM my_worker WHERE worker_cat = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_cat_workers_home(){
		$my_db_query = "SELECT * FROM my_type";
		$database = new As_Dbconn();
		
		$worker_cats = $database->get_results( $my_db_query );
		foreach( $worker_cats as $cat )
		{
		    $worker_cat = $cat['catid'];
			
			$my_cat_workers_query = "SELECT * FROM my_worker WHERE worker_cat = '$worker_cat' LIMIT 4";
			
			if ($my_cat_workers_query) {
				echo '<hr><h3>'.$cat['cat_title'].'</h3>
				   <div class="row">
					<div class="workersrow">';
			}	
				$database = new As_Dbconn();
				
				$cat_workers = $database->get_results( $my_cat_workers_query );
				foreach( $cat_workers as $row )
				{
					echo '<div class="worker menu-type">
									
					<a href="'.my_siteLynk().$row['worker_slug'].'"><div class="worker-image">
						<img class="worker-image menu-worker list-group-worker" src="'.my_siteLynk_img().$row['worker_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['worker_slug'].'" class="menu-worker list-group-worker">'.substr($row['worker_name'],0,20).'<span class="badge">KSh '.$row['worker_dept'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_cat_workers(){
	$my_db_query = "SELECT * FROM my_worker LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="worker menu-type">
				<a href="'.my_siteLynk().$row['worker_slug'].'"><div class="menu-type-name list-group-worker active">'.my_worker_cart($row['worker_cat']).'</div></a>
				<a href="'.my_siteLynk().$row['worker_slug'].'"><div class="worker-image">
					<img class="worker-image menu-worker list-group-worker" src="'.my_siteLynk_img().$row['worker_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['worker_slug'].'" class="menu-worker list-group-worker">'.substr($row['worker_name'],0,20).'<span class="badge">KSh '.$row['worker_dept'].'</span></a>

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
	
	function my_lookup_worker($request){
		$my_db_query = "SELECT * FROM my_worker WHERE worker_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
