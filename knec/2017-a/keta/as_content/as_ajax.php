<?php

	require( 'as_config.php' );
	include AS_FUNC.'As_DbConn.php';
	
	$action = $_GET["action"];
	
	 if (isset($action)) {
		if ($action == 'startcomplaint') {
			$client = as_add_new_client();
			as_add_new_complaint($client);
			$clientname = ' '.$_GET['fullname'];
			echo '<input type="hidden" value="'.$client.'" />';
			echo '<table class="complaints_view"><tr><td class="complaint_username" valign="top">Jack: </td>'.
		'<td class="complaint_complaint">Welcome '.trim($clientname).' online. Please proceed to complaint with me!</td></tr></table>';
		}
		
		else if ($action == 'newcomplaint') {
			as_add_new_complaint();
			echo '<table class="complaints_view"><tr><td class="complaint_username" valign="top">You: </td>'.
		'<td class="complaint_complaint">'.$_GET['complaint'].'</td></tr></table>';
		}
	 } 
	
	function as_add_new_client(){
		$database = new As_DbConn();			
		$New_Item_Details = array(
			'client_fullname' => trim($_GET['fullname']),
			'client_name' => trim($_GET['username']),
			'client_email' => trim($_GET['email']),
		    'client_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_client', $New_Item_Details );
		return $database->as_db_lastid();
	}
	
	function as_add_new_complaint($client){
		$database = new As_DbConn();			
		$New_Item_Details = array(
			'complaint_client' => $client,
			'complaint_agent' => 1,
		    'complaint_started' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_complaint', $New_Item_Details ); 
	}
	
	function as_add_new_complaint(){
		$database = new As_DbConn();			
		$New_Item_Details = array(
			'complaint_content' => trim($_GET['complaint']),
			'complaint_createdby' => trim($_GET['client']),
		    'complaint_created' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_complaint', $New_Item_Details ); 
	}
	
?>