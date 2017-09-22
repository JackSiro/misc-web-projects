<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_fee_cart($cartno) {
		$my_db_query = "SELECT * FROM my_student WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $student_admno, $student_name) = $database->get_row( $my_db_query );
		    return $student_name;
		} else  {
		    return false;
		}
		
	}
	

	function my_fee_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_student_students(){
		$my_db_query = "SELECT * FROM my_student";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['student_name'].'</option>';		                            
		}			
	}

	function my_latest_catstudents($catid){
		$my_db_query = "SELECT * FROM my_student WHERE fee_studentid = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_student_students_home(){
		$my_db_query = "SELECT * FROM my_student";
		$database = new As_Dbconn();
		
		$fee_studentids = $database->get_results( $my_db_query );
		foreach( $fee_studentids as $cat )
		{
		    $fee_studentid = $cat['catid'];
			
			$my_student_students_query = "SELECT * FROM my_student WHERE fee_studentid = '$fee_studentid' LIMIT 4";
			
			if ($my_student_students_query) {
				echo '<hr><h3>'.$cat['student_name'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$student_students = $database->get_results( $my_student_students_query );
				foreach( $student_students as $row )
				{
					echo '<div class="product menu-category">
									
					<a href="'.my_siteLynk().$row['fee_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['fee_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['fee_slug'].'" class="menu-item list-group-item">'.substr($row['fee_title'],0,20).'<span class="badge">KSh '.$row['fee_amount'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_student_students(){
	$my_db_query = "SELECT * FROM my_student LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-category">
				<a href="'.my_siteLynk().$row['fee_slug'].'"><div class="menu-category-name list-group-item active">'.my_fee_cart($row['fee_studentid']).'</div></a>
				<a href="'.my_siteLynk().$row['fee_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['fee_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['fee_slug'].'" class="menu-item list-group-item">'.substr($row['fee_title'],0,20).'<span class="badge">KSh '.$row['fee_amount'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_student LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['student_admno'].'" >
			<div class="student_lynk"><img class="student_class" src="'.my_siteLynk_icon().$row['student_class'].'"/>
			'.$row['student_name'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_student WHERE student_admno = '$request'";
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
	
	function my_lookup_student($request){
		$my_db_query = "SELECT * FROM my_student WHERE fee_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	
	function as_feedback_message()
	{
		if( isset($_SESSION['AS_SUCCMSG_ARR']) && is_array($_SESSION['AS_SUCCMSG_ARR']) && count($_SESSION['AS_SUCCMSG_ARR']) >0 ) 
		{ ?>
		<div class="success_log">
			<ul>									
			<?php foreach($_SESSION['AS_SUCCMSG_ARR'] as $as_succ_msg) { ?>
				<li><?php echo $as_succ_msg ?></li> 
			<?php } ?>
			</ul>
		</div>
		<?php unset($_SESSION['AS_SUCCMSG_ARR']); 
		}
		
		if( isset($_SESSION['AS_ERRMSG_ARR']) && is_array($_SESSION['AS_ERRMSG_ARR']) && count($_SESSION['AS_ERRMSG_ARR']) >0 ) 
		{ ?>
		<div class="error_log">
			<ul>									
			<?php foreach($_SESSION['AS_ERRMSG_ARR'] as $as_error_msg) { ?>
				<li><?php echo $as_error_msg ?></li> 
			<?php } ?>
			</ul>
		</div>
			
		<?php } unset($_SESSION['AS_ERRMSG_ARR']); 
	}
	