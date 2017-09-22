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
	//member_fullname, member_status, member_occupation, member_children, member_dob, member_email, member_joined, member_mobile, member_address, member_avatar
	
	function as_new_member(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'member_fullname' => trim($_POST['fullname']),
			'member_status' => trim($_POST['status']),
			'member_occupation' => trim($_POST['occupation']),
			'member_children' => trim($_POST['children']),
			'member_dob' => trim($_POST['birthdate']),
			'member_email' => trim($_POST['email']),
			'member_joined' => date('Y-m-d H:i:s'),
			'member_mobile' => trim($_POST['mobile']),
			'member_address' => trim($_POST['address']),
		);
			
		$add_query = $database->as_insert( 'as_member', $New_Item_Details ); 
	}
			
	function as_update_member($memberid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'member_fullname' => trim($_POST['fullname']),
			'member_status' => trim($_POST['status']),
			'member_occupation' => trim($_POST['occupation']),
			'member_children' => trim($_POST['children']),
			'member_dob' => trim($_POST['birthdate']),
			'member_email' => trim($_POST['email']),
			'member_mobile' => trim($_POST['mobile']),
			'member_address' => trim($_POST['address']),
		);
		$where_clause = array('memberid' => $memberid);
		$updated = $database->as_update( 'as_member', $Update_Item_Details, $where_clause, 1 );
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
 	//contributionid, contribution_paidby, contribution_amount, contribution_paid, contribution_item, contribution_stoptime, contribution_place, contribution_paidby, contribution_paid, 
	
	function as_add_new_contribution(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'contribution_amount' => trim($_POST['amount']),
			'contribution_item' => trim($_POST['session']),
			'contribution_date' => trim($_POST['date']),
		    'contribution_paid' => date('Y-m-d H:i:s'),
			'contribution_paidby' => trim($_POST['memberid']),
		);
			
		$add_query = $database->as_insert( 'as_contribution', $New_Item_Details ); 
	}
			
	function as_update_contribution($contributionid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'contribution_amount' => trim($_POST['amount']),
			'contribution_item' => trim($_POST['session']),
		);
		$where_clause = array('contributionid' => $contributionid);
		$updated = $database->as_update( 'as_contribution', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>