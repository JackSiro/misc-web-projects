<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_leave_cart($cartno) {
		$my_db_query = "SELECT * FROM my_payslip WHERE payslipid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $payslipid, $payslip_slug, $payslip_fullname) = $database->get_row( $my_db_query );
		    return $payslip_fullname;
		} else  {
		    return false;
		}
		
	}
	

	function my_leave_seller($employeeid, $infor) {
		$my_db_query = "SELECT * FROM my_employee_account WHERE employeeid = '$employeeid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $employeeid, $employee_name, $employee_fullname, $employee_number, $employee_sex, $employee_password, $employee_email, $employee_group, $employee_points, $employee_bio, $employee_mailcon, $employee_joined, $employee_mobile, $employee_web, $employee_location, $employee_security_quiz, $employee_security_ans, $employee_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_payslip_leaves(){
		$my_db_query = "SELECT * FROM my_payslip";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['payslipid'].'">'.$row['payslip_fullname'].'</option>';		                            
		}			
	}

	function my_latest_payslipleaves($payslipid){
		$my_db_query = "SELECT * FROM my_leave WHERE leave_payslip = '$payslipid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_payslip_leaves_home(){
		$my_db_query = "SELECT * FROM my_payslip";
		$database = new Js_Dbconn();
		
		$leave_payslips = $database->get_results( $my_db_query );
		foreach( $leave_payslips as $payslip )
		{
		    $leave_payslip = $payslip['payslipid'];
			
			$my_payslip_leaves_query = "SELECT * FROM my_leave WHERE leave_payslip = '$leave_payslip' LIMIT 4";
			
			if ($my_payslip_leaves_query) {
				echo '<hr><h3>'.$payslip['payslip_fullname'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$payslip_leaves = $database->get_results( $my_payslip_leaves_query );
				foreach( $payslip_leaves as $row )
				{
					echo '<div class="product menu-payslip">
									
					<a href="'.my_siteLynk().$row['leave_slug'].'"><div class="product-image">
						<img class="product-image menu-leave list-group-leave" src="'.my_siteLynk_img().$row['leave_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['leave_slug'].'" class="menu-leave list-group-leave">'.substr($row['leave_title'],0,20).'<span class="badge">KSh '.$row['leave_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_payslip_leaves(){
	$my_db_query = "SELECT * FROM my_leave LIMIT 4";
	$database = new Js_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-payslip">
				<a href="'.my_siteLynk().$row['leave_slug'].'"><div class="menu-payslip-name list-group-leave active">'.my_leave_cart($row['leave_payslip']).'</div></a>
				<a href="'.my_siteLynk().$row['leave_slug'].'"><div class="product-image">
					<img class="product-image menu-leave list-group-leave" src="'.my_siteLynk_img().$row['leave_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['leave_slug'].'" class="menu-leave list-group-leave">'.substr($row['leave_title'],0,20).'<span class="badge">KSh '.$row['leave_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_payslips(){
		$my_db_query = "SELECT * FROM my_payslip LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['payslip_slug'].'" >
			<div class="payslip_lynk"><img class="payslip_icon" src="'.my_siteLynk_icon().$row['payslip_icon'].'"/>
			'.$row['payslip_fullname'].'</div></a>';
	   }				
	}

	function my_lookup_payslip($request){
		$my_db_query = "SELECT * FROM my_payslip WHERE payslip_slug = '$request'";
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
	
	function my_lookup_leave($request){
		$my_db_query = "SELECT * FROM my_leave WHERE leave_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
