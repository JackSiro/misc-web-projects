<?php

function payslips() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "PaySlips";  
	require( JS_INC . "js_payslips.php" );
}

function newpayslip() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Newpayslip"; 
	
	if ( isset( $_POST['AddPaySlip'] ) ) {
		js_add_new_payslip();
		header( "Location: index.php?js_pageaction=payslips");					
	}  else {
		require( JS_INC . "js_newpayslip.php" );
	}	
	
}

function viewpayslip() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Viewpayslip"; 
	$js_payslipid = isset( $_GET['js_payslipid'] ) ? $_GET['js_payslipid'] : "";
	
	$js_db_query = "SELECT * FROM js_payslip WHERE payslipid = '$js_payslipid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $payslipid, $payslip_slug) = $database->get_row( $js_db_query );
		$results['payslip'] = $payslipid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=payslip");	
	}
	
	if ( isset( $_POST['SavePaySlip'] ) ) {
		js_edit_payslip($js_payslipid);
		header( "Location: index.php?js_pageaction=viewpayslip&&js_payslipid=".$js_payslipid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_payslip($js_payslipid);
		header( "Location: index.php?js_pageaction=payslip");						
	}  else {
		require( JS_INC . "js_viewpayslip.php" );
	}	
	
}
	  
function leaves() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "ELibrary"; 
	require( JS_INC . "js_leaves.php" );
}

function newleave() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Newleave"; 
	
	if ( isset( $_POST['AddLeave'] ) ) {
		js_add_new_leave();
		header( "Location: index.php?js_pageaction=leaves");						
	}  else {
		require( JS_INC . "js_newleave.php" );
	}		
}

function viewleave() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Viewleave"; 
	$js_leaveid = isset( $_GET['js_leaveid'] ) ? $_GET['js_leaveid'] : "";
	
	$js_db_query = "SELECT * FROM js_leave WHERE leaveid = '$js_leaveid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $leaveid, $employee_name) = $database->get_row( $js_db_query );
		$results['leave'] = $leaveid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=leaves");	
	}
	
	require( JS_INC . "js_viewleave.php" );
	
}

function editleave() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Editleave"; 
	$js_leaveid = isset( $_GET['js_leaveid'] ) ? $_GET['js_leaveid'] : "";
	
	$js_db_query = "SELECT * FROM js_leave WHERE leaveid = '$js_leaveid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $leaveid) = $database->get_row( $js_db_query );
		$results['leave'] = $leaveid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=leaves");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_leave($js_leaveid);
		header( "Location: index.php?js_pageaction=editleave&&js_leaveid=".$js_leaveid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_leave($js_leaveid);
		header( "Location: index.php?js_pageaction=viewleave&&js_leaveid=".$js_leaveid);					
	}  else {
		require( JS_INC . "js_editleave.php" );
	}	
	
}

function deleteleave() {
	$js_leaveid = isset( $_GET['js_leaveid'] ) ? $_GET['js_leaveid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_leave WHERE leaveid = '$js_leaveid'";
	$delete = array(
		'leaveid' => $js_leaveid,
	);
	$deleted = $database->delete( 'js_leave', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?js_pageaction=leaves");	
	}
}

	
function employees() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Employees";  
	require( JS_INC . "js_employees.php" );
}

function newemployee() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Newemployee"; 
	
	if ( isset( $_POST['AddEmployee'] ) ) {
		js_add_new_employee();
		header( "Location: index.php?js_pageaction=employees");						
	}  else {
		require( JS_INC . "js_newemployee.php" );
	}	
	
}
function viewemployee() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Viewemployee"; 
	$js_employeeid = isset( $_GET['js_employeeid'] ) ? $_GET['js_employeeid'] : "";
	
	$js_db_query = "SELECT * FROM js_employee WHERE employeeid = '$js_employeeid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
		$results['employee'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=employees");	
	}
	
	require( JS_INC . "js_viewemployee.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Profile"; 
	$js_employeename = $_SESSION['employeename_loggedin'];
	
	$js_db_query = "SELECT * FROM js_employee WHERE employee_name = '$js_employeename'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
		$results['employee'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=employees");	
	}
	
	require( JS_INC . "js_viewemployee.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Options"; 
	$js_loggedin = isset( $_SESSION['js_aheroemployee'] ) ? $_SESSION['js_aheroemployee'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loggedin);	
		js_set_option('slogan', $_POST['slogan'], $js_loggedin);
		js_set_option('description', $_POST['description'], $js_loggedin);
		js_set_option('siteurl', $_POST['siteurl'], $js_loggedin);
		
		header( "Location: index.php?js_pageaction=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?js_pageaction=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}


function newdepartment() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Newdepartment"; 
	
	if ( isset( $_POST['AddDepartment'] ) ) {
		js_add_new_department();
		header( "Location: index.php?js_pageaction=departments");						
	}  else {
		require( JS_INC . "js_newdepartment.php" );
	}		
}

function viewdepartment() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Viewdepartment"; 
	$js_departmentid = isset( $_GET['js_departmentid'] ) ? $_GET['js_departmentid'] : "";
	
	$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$js_departmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $departmentid, $employee_name) = $database->get_row( $js_db_query );
		$results['department'] = $departmentid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=departments");	
	}
	
	require( JS_INC . "js_viewdepartment.php" );
	
}

function editdepartment() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Editdepartment"; 
	$js_departmentid = isset( $_GET['js_departmentid'] ) ? $_GET['js_departmentid'] : "";
	
	$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$js_departmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $departmentid) = $database->get_row( $js_db_query );
		$results['department'] = $departmentid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=departments");	
	}
	
	if ( isset( $_POST['SaveDepartment'] ) ) {
		js_edit_department($js_departmentid);
		header( "Location: index.php?js_pageaction=editdepartment&&js_departmentid=".$js_departmentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_department($js_departmentid);
		header( "Location: index.php?js_pageaction=viewdepartment&&js_departmentid=".$js_departmentid);					
	}  else {
		require( JS_INC . "js_editdepartment.php" );
	}	
	
}

function deletedepartment() {
	$js_departmentid = isset( $_GET['js_departmentid'] ) ? $_GET['js_departmentid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_department WHERE departmentid = '$js_departmentid'";
	$delete = array(
		'departmentid' => $js_departmentid,
	);
	$deleted = $database->delete( 'js_department', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?js_pageaction=departments");	
	}
}
	  
function departments() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Payslips"; 
	require( JS_INC . "js_departments.php" );
}


?>