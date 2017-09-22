<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_resource_cart($cartno) {
		$my_db_query = "SELECT * FROM my_beneficiary WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $beneficiary_code, $beneficiary_name) = $database->get_row( $my_db_query );
		    return $beneficiary_name;
		} else  {
		    return false;
		}
		
	}
	

	function my_resource_seller($facilitatorid, $infor) {
		$my_db_query = "SELECT * FROM my_facilitator_account WHERE facilitatorid = '$facilitatorid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $facilitatorid, $facilitator_name, $facilitator_fname, $facilitator_surname, $facilitator_sex, $facilitator_password, $facilitator_email, $facilitator_group, $facilitator_points, $facilitator_bio, $facilitator_mailcon, $facilitator_joined, $facilitator_mobile, $facilitator_occupation, $facilitator_location, $facilitator_security_quiz, $facilitator_security_ans, $facilitator_organization) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_beneficiary_beneficiarys(){
		$my_db_query = "SELECT * FROM my_beneficiary";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['beneficiary_name'].'</option>';		                            
		}			
	}

	function my_latest_catbeneficiarys($catid){
		$my_db_query = "SELECT * FROM my_beneficiary WHERE resource_beneficiaryid = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_beneficiary_beneficiarys_home(){
		$my_db_query = "SELECT * FROM my_beneficiary";
		$database = new As_Dbconn();
		
		$resource_beneficiaryids = $database->get_results( $my_db_query );
		foreach( $resource_beneficiaryids as $cat )
		{
		    $resource_beneficiaryid = $cat['catid'];
			
			$my_beneficiary_beneficiarys_query = "SELECT * FROM my_beneficiary WHERE resource_beneficiaryid = '$resource_beneficiaryid' LIMIT 4";
			
			if ($my_beneficiary_beneficiarys_query) {
				echo '<hr><h3>'.$cat['beneficiary_name'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$beneficiary_beneficiarys = $database->get_results( $my_beneficiary_beneficiarys_query );
				foreach( $beneficiary_beneficiarys as $row )
				{
					echo '<div class="product menu-category">
									
					<a href="'.my_siteLynk().$row['resource_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['resource_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['resource_slug'].'" class="menu-item list-group-item">'.substr($row['resource_title'],0,20).'<span class="badge">KSh '.$row['resource_title'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_beneficiary_beneficiarys(){
	$my_db_query = "SELECT * FROM my_beneficiary LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-category">
				<a href="'.my_siteLynk().$row['resource_slug'].'"><div class="menu-category-name list-group-item active">'.my_resource_cart($row['resource_beneficiaryid']).'</div></a>
				<a href="'.my_siteLynk().$row['resource_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['resource_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['resource_slug'].'" class="menu-item list-group-item">'.substr($row['resource_title'],0,20).'<span class="badge">KSh '.$row['resource_title'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_beneficiary LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['beneficiary_code'].'" >
			<div class="beneficiary_lynk"><img class="beneficiary_institution" src="'.my_siteLynk_icon().$row['beneficiary_institution'].'"/>
			'.$row['beneficiary_name'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_beneficiary WHERE beneficiary_code = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_facilitator($request){
		$my_db_query = "SELECT * FROM my_facilitator_account WHERE facilitator_name = '$request'";
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
	
	function my_lookup_beneficiary($request){
		$my_db_query = "SELECT * FROM my_beneficiary WHERE resource_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	
	function as_resourcedback_message()
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
	