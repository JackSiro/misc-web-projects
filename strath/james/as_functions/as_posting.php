<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
	}
	
	function as_add_new_plan(){
		$database = new As_Dbconn();
		$plan_price = trim($_POST['plan_price']);
		$plan_irate = trim($_POST['plan_irate']);
		$plan_image = as_new_upload("plan_image", 1, "no_image.jpg");
		
		$New_Item_Details = array(		
			'plan_title' 		=> trim($_POST['plan_title']),
			'plan_price' 		=> $plan_price,
			'plan_instal' 		=> $plan_irate / 100 * $plan_price,	
			'plan_irate' 		=> $plan_irate,
			'plan_benefit' 		=> trim($_POST['plan_benefit']),
			'plan_image' 		=> $plan_image,
			'plan_created' 		=> date('Y-m-d H:i:s'),
			'plan_createdby' 	=> "1",
		);
			
		$add_query = $database->as_insert( 'as_plan', $New_Item_Details ); 
	}
			
	function as_edit_plan($planid) {
		$database = new As_Dbconn();
		$plan_price = trim($_POST['plan_price']);
		$plan_irate = trim($_POST['plan_irate']);
		$plan_image = as_new_upload("plan_imaged", 1, trim($_POST['plan_image']));
		
		$Update_Item_Details = array(		
			'plan_title' 		=> trim($_POST['plan_title']),
			'plan_price' 		=> $plan_price,
			'plan_instal' 		=> $plan_irate / 100 * $plan_price,	
			'plan_irate' 		=> $plan_irate,
			'plan_benefit' 		=> trim($_POST['plan_benefit']),
			'plan_image' 		=> $plan_image,
			'plan_updated' 		=> date('Y-m-d H:i:s'),
			'plan_updatedby' 	=> "1",
		);
		$where_clause = array('planid' => $planid);
		$updated = $database->as_update( 'as_plan', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	}
	
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'user_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->as_update( 'as_user', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}

	function as_add_new_client(){
		$database = new As_Dbconn();			
		$New_Voter_Details = array(
			'client_name' 			=> trim($_POST['client_name']),
			'client_email' 			=> trim($_POST['client_email']),
			'client_mobile' 		=> trim($_POST['client_mobile']),
			'client_location' 		=> trim($_POST['client_location']),
			'client_cyear' 			=> trim($_POST['client_cyear']),
			'client_cvalue' 		=> trim($_POST['client_cvalue']),
			'client_cmodel' 		=> trim($_POST['client_cmodel']),
			'client_cirate' 		=> trim($_POST['client_cirate']),
		    'client_registered' 	=> date('Y-m-d H:i:s'),
		    'client_registeredby' 	=> "1",
		);			
		$add_query = $database->as_insert( 'as_client', $New_Voter_Details ); 
		return $database->lastid();
	}
	
	function as_edit_client($clientid) {
		$database = new As_Dbconn();	
		$Update_Voter_Details = array(
			'client_name' 			=> trim($_POST['client_name']),
			'client_email' 			=> trim($_POST['client_email']),
			'client_mobile' 		=> trim($_POST['client_mobile']),
			'client_location' 		=> trim($_POST['client_location']),
			'client_cyear' 			=> trim($_POST['client_cyear']),
			'client_cvalue' 		=> trim($_POST['client_cvalue']),
			'client_cmodel' 		=> trim($_POST['client_cmodel']),
			'client_cirate' 		=> trim($_POST['client_cirate']),
		);
		$where_clause = array('clientid' => $clientid);
		$updated = $database->as_update( 'as_client', $Update_Voter_Details, $where_clause, 1 );
	}
	
	function as_new_upload($filename, $i, $default){
		$raw_file_name = basename($_FILES[$filename]["name"]);
		$temp_file_name = $_FILES[$filename]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'image'. $i.'_'.time().'.'.$upload_file_ext[1];
		$target_file = "./as_media/" .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (copy($temp_file_name, $target_file)) return $finalname;
		else return $default;
	}
	