<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_student_cart($cartno) {
		$my_db_query = "SELECT * FROM my_department WHERE departmentid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $departmentid, $department_slug, $department_title) = $database->get_row( $my_db_query );
		    return $department_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_student_seller($lecturerid, $infor) {
		$my_db_query = "SELECT * FROM my_lecturer_account WHERE lecturerid = '$lecturerid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $lecturerid, $lecturer_name, $lecturer_fname, $lecturer_surname, $lecturer_sex, $lecturer_password, $lecturer_email, $lecturer_group, $lecturer_points, $lecturer_bio, $lecturer_mailcon, $lecturer_joined, $lecturer_mobile, $lecturer_web, $lecturer_lodepartmention, $lecturer_security_quiz, $lecturer_security_ans, $lecturer_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_department_students(){
		$my_db_query = "SELECT * FROM my_department";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['departmentid'].'">'.$row['department_title'].'</option>';		                            
		}			
	}

	function my_latest_departmentstudents($departmentid){
		$my_db_query = "SELECT * FROM my_student WHERE student_department = '$departmentid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_department_students_home(){
		$my_db_query = "SELECT * FROM my_department";
		$database = new Js_Dbconn();
		
		$student_departments = $database->get_results( $my_db_query );
		foreach( $student_departments as $department )
		{
		    $student_department = $department['departmentid'];
			
			$my_department_students_query = "SELECT * FROM my_student WHERE student_department = '$student_department' LIMIT 4";
			
			if ($my_department_students_query) {
				echo '<hr><h3>'.$department['department_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$department_students = $database->get_results( $my_department_students_query );
				foreach( $department_students as $row )
				{
					echo '<div class="product menu-department">
									
					<a href="'.my_siteLynk().$row['student_course'].'"><div class="product-image">
						<img class="product-image menu-student list-group-student" src="'.my_siteLynk_img().$row['student_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['student_course'].'" class="menu-student list-group-student">'.substr($row['student_name'],0,20).'<span class="badge">KSh '.$row['student_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_department_students(){
	$my_db_query = "SELECT * FROM my_student LIMIT 4";
	$database = new Js_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-department">
				<a href="'.my_siteLynk().$row['student_course'].'"><div class="menu-department-name list-group-student active">'.my_student_cart($row['student_department']).'</div></a>
				<a href="'.my_siteLynk().$row['student_course'].'"><div class="product-image">
					<img class="product-image menu-student list-group-student" src="'.my_siteLynk_img().$row['student_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['student_course'].'" class="menu-student list-group-student">'.substr($row['student_name'],0,20).'<span class="badge">KSh '.$row['student_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_departments(){
		$my_db_query = "SELECT * FROM my_department LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['department_slug'].'" >
			<div class="department_lynk"><img class="department_icon" src="'.my_siteLynk_icon().$row['department_icon'].'"/>
			'.$row['department_title'].'</div></a>';
	   }				
	}

	function my_lookup_department($request){
		$my_db_query = "SELECT * FROM my_department WHERE department_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_lecturer($request){
		$my_db_query = "SELECT * FROM my_lecturer_account WHERE lecturer_name = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_loc($request){
		$my_db_query = "SELECT * FROM my_lodepartmention WHERE slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_student($request){
		$my_db_query = "SELECT * FROM my_student WHERE student_course = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
