<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_student_cart($cartno) {
		$my_db_query = "SELECT * FROM my_class WHERE classid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $classid, $class_term, $class_title) = $database->get_row( $my_db_query );
		    return $class_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_student_seller($adminid, $infor) {
		$my_db_query = "SELECT * FROM my_admin_account WHERE adminid = '$adminid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $adminid, $admin_name, $admin_fname, $admin_surname, $admin_sex, $admin_password, $admin_email, $admin_group, $admin_points, $admin_bio, $admin_mailcon, $admin_joined, $admin_mobile, $admin_web, $admin_location, $admin_security_quiz, $admin_security_ans, $admin_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_class_students(){
		$my_db_query = "SELECT * FROM my_class";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['classid'].'">'.$row['class_title'].'</option>';		                            
		}			
	}

	function my_latest_classtudents($classid){
		$my_db_query = "SELECT * FROM my_student WHERE student_class = '$classid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_class_students_home(){
		$my_db_query = "SELECT * FROM my_class";
		$database = new As_Dbconn();
		
		$student_class = $database->get_results( $my_db_query );
		foreach( $student_class as $class )
		{
		    $student_class = $class['classid'];
			
			$my_class_students_query = "SELECT * FROM my_student WHERE student_class = '$student_class' LIMIT 4";
			
			if ($my_class_students_query) {
				echo '<hr><h3>'.$class['class_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$class_students = $database->get_results( $my_class_students_query );
				foreach( $class_students as $row )
				{
					echo '<div class="product menu-class">
									
					<a href="'.my_siteLynk().$row['student_course'].'"><div class="product-image">
						<img class="product-image menu-student list-group-student" src="'.my_siteLynk_img().$row['student_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['student_course'].'" class="menu-student list-group-student">'.substr($row['student_name'],0,20).'<span class="badge">KSh '.$row['student_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_class_students(){
	$my_db_query = "SELECT * FROM my_student LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-class">
				<a href="'.my_siteLynk().$row['student_course'].'"><div class="menu-class-name list-group-student active">'.my_student_cart($row['student_class']).'</div></a>
				<a href="'.my_siteLynk().$row['student_course'].'"><div class="product-image">
					<img class="product-image menu-student list-group-student" src="'.my_siteLynk_img().$row['student_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['student_course'].'" class="menu-student list-group-student">'.substr($row['student_name'],0,20).'<span class="badge">KSh '.$row['student_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_class(){
		$my_db_query = "SELECT * FROM my_class LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['class_term'].'" >
			<div class="class_lynk"><img class="class_admin" src="'.my_siteLynk_icon().$row['class_admin'].'"/>
			'.$row['class_title'].'</div></a>';
	   }				
	}

	function my_lookup_class($request){
		$my_db_query = "SELECT * FROM my_class WHERE class_term = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_admin($request){
		$my_db_query = "SELECT * FROM my_admin_account WHERE admin_name = '$request'";
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
	
	function my_lookup_student($request){
		$my_db_query = "SELECT * FROM my_student WHERE student_course = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
