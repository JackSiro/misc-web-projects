<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_group_cart($cartno) {
		$my_db_query = "SELECT * FROM my_topic WHERE topicid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $topicid, $topic_title, $topic_participants) = $database->get_row( $my_db_query );
		    return $topic_participants;
		} else  {
		    return false;
		}
		
	}
	

	function my_group_seller($studentid, $infor) {
		$my_db_query = "SELECT * FROM my_student_account WHERE studentid = '$studentid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $studentid, $student_name, $student_fname, $student_surname, $student_sex, $student_password, $student_email, $student_role, $student_points, $student_bio, $student_mailcon, $student_joined, $student_mobile, $student_web, $student_location, $student_security_quiz, $student_security_ans, $student_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_topic_groups(){
		$my_db_query = "SELECT * FROM my_topic";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['topicid'].'">'.$row['topic_participants'].'</option>';		                            
		}			
	}

	function my_latest_clasgroups($topicid){
		$my_db_query = "SELECT * FROM my_group WHERE group_content = '$topicid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_topic_groups_home(){
		$my_db_query = "SELECT * FROM my_topic";
		$database = new As_Dbconn();
		
		$group_content = $database->get_results( $my_db_query );
		foreach( $group_content as $class )
		{
		    $group_content = $class['topicid'];
			
			$my_topic_groups_query = "SELECT * FROM my_group WHERE group_content = '$group_content' LIMIT 4";
			
			if ($my_topic_groups_query) {
				echo '<hr><h3>'.$class['topic_participants'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$topic_groups = $database->get_results( $my_topic_groups_query );
				foreach( $topic_groups as $row )
				{
					echo '<div class="product menu-class">
									
					<a href="'.my_siteLynk().$row['group_course'].'"><div class="product-image">
						<img class="product-image menu-group list-group-group" src="'.my_siteLynk_img().$row['group_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['group_course'].'" class="menu-group list-group-group">'.substr($row['group_name'],0,20).'<span class="badge">KSh '.$row['group_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_topic_groups(){
	$my_db_query = "SELECT * FROM my_group LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-class">
				<a href="'.my_siteLynk().$row['group_course'].'"><div class="menu-class-name list-group-group active">'.my_group_cart($row['group_content']).'</div></a>
				<a href="'.my_siteLynk().$row['group_course'].'"><div class="product-image">
					<img class="product-image menu-group list-group-group" src="'.my_siteLynk_img().$row['group_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['group_course'].'" class="menu-group list-group-group">'.substr($row['group_name'],0,20).'<span class="badge">KSh '.$row['group_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_topic(){
		$my_db_query = "SELECT * FROM my_topic LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['topic_title'].'" >
			<div class="topic_lynk"><img class="topic_student" src="'.my_siteLynk_icon().$row['topic_student'].'"/>
			'.$row['topic_participants'].'</div></a>';
	   }				
	}

	function my_lookup_topic($request){
		$my_db_query = "SELECT * FROM my_topic WHERE topic_title = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_student($request){
		$my_db_query = "SELECT * FROM my_student_account WHERE student_name = '$request'";
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
	
	function my_lookup_group($request){
		$my_db_query = "SELECT * FROM my_group WHERE group_course = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
