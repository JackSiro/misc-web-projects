<?php


function class_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Class";  
	require( AS_INC . "as_class_all.php" );
}

function class_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "class_new"; 
	
	if ( isset( $_POST['AddClass'] ) ) {
		as_add_new_class();
		header( "Location: index.php?action=class_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_class();
		header( "Location: index.php?action=class_all");						
	}  else {
		require( AS_INC . "as_class_new.php" );
	}	
	
}

function class_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "class_view"; 
	$as_classid = isset( $_GET['as_classid'] ) ? $_GET['as_classid'] : "";
	
	$as_db_query = "SELECT * FROM as_class WHERE classid = '$as_classid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $classid, $class_term) = $database->get_row( $as_db_query );
		$results['class'] = $classid;
	} else  {
		return false;
		header( "Location: index.php?action=class");	
	}
	
	if ( isset( $_POST['SaveClass'] ) ) {
		as_edit_class($as_classid);
		header( "Location: index.php?action=class_all");
	}  else {
		require( AS_INC . "as_class_view.php" );
	}
}
	  
function candidate_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Candidate";  
	require( AS_INC . "as_candidate_all.php" );
}

function candidate_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "candidate_new"; 
	
	if ( isset( $_POST['AddCandidate'] ) ) {
		as_add_new_candidate();
		header( "Location: index.php?action=candidate_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_candidate();
		header( "Location: index.php?action=candidate_all");						
	}  else {
		require( AS_INC . "as_candidate_new.php" );
	}	
	
}

function candidate_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "candidate_view"; 
	$as_candidateid = isset( $_GET['as_candidateid'] ) ? $_GET['as_candidateid'] : "";
	
	$as_db_query = "SELECT * FROM as_mark WHERE candidateid = '$as_candidateid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $candidateid, $candidate_term) = $database->get_row( $as_db_query );
		$results['mark'] = $candidateid;
	} else  {
		return false;
		header( "Location: index.php?action=mark");	
	}
	
	if ( isset( $_POST['SaveCandidate'] ) ) {
		as_edit_candidate($as_candidateid);
		header( "Location: index.php?action=candidate_all");
	}  else {
		require( AS_INC . "as_candidate_view.php" );
	}
}

function elecpost_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Post";  
	require( AS_INC . "as_elecpost_all.php" );
}

function elecpost_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "elecpost_new"; 
	
	if ( isset( $_POST['AddPost'] ) ) {
		as_add_new_elecpost();
		header( "Location: index.php?action=elecpost_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_elecpost();
		header( "Location: index.php?action=elecpost_all");						
	}  else {
		require( AS_INC . "as_elecpost_new.php" );
	}
}

function elecpost_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "elecpost_view"; 
	$as_elecpostid = isset( $_GET['as_elecpostid'] ) ? $_GET['as_elecpostid'] : "";
	
	$as_db_query = "SELECT * FROM as_elecpost WHERE elecpostid = '$as_elecpostid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $elecpostid, $elecpost_term) = $database->get_row( $as_db_query );
		$results['elecpost'] = $elecpostid;
	} else  {
		return false;
		header( "Location: index.php?action=elecpost");	
	}
	
	if ( isset( $_POST['SavePost'] ) ) {
		as_edit_elecpost($as_elecpostid);
		header( "Location: index.php?action=elecpost_all");				
	}  else {
		require( AS_INC . "as_elecpost_view.php" );
	}	
	
}
	
function voter_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Voters"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_classid = $_POST['as_classid'];
		
		header( "Location: index.php?action=search&&as_search=".$as_search."&&as_classid=".$as_classid);
								
	}  else {	
		require( AS_INC . "as_voter_all.php" );
	}
}

function voter_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "voter_new"; 
	
	if ( isset( $_POST['AddVoter'] ) ) {
		as_add_new_voter();
		header( "Location: index.php?action=voter_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_voter();
		header( "Location: index.php?action=voter_all");						
	}  else {
		require( AS_INC . "as_voter_new.php" );
	}	
	
}

function voter_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewvoter"; 
	$as_voterid = isset( $_GET['as_voterid'] ) ? $_GET['as_voterid'] : "";
	
	$as_db_query = "SELECT * FROM as_voter WHERE voterid = '$as_voterid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $voterid, $official_name) = $database->get_row( $as_db_query );
		$results['voter'] = $voterid;
	} else  {
		return false;
		header( "Location: index.php?action=voter_all");	
	}
	
	require( AS_INC . "as_voter_view.php" );
	
}

function voter_edit() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Editvoter"; 
	$as_voterid = isset( $_GET['as_voterid'] ) ? $_GET['as_voterid'] : "";
	
	$as_db_query = "SELECT * FROM as_voter WHERE voterid = '$as_voterid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $voterid) = $database->get_row( $as_db_query );
		$results['voter'] = $voterid;
	} else  {
		return false;
		header( "Location: index.php?action=voter_all");	
	}
	
	if ( isset( $_POST['SaveVoter'] ) ) {
		as_edit_voter($as_voterid);
		header( "Location: index.php?action=voter_edit&&as_voterid=".$as_voterid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_voter($as_voterid);
		header( "Location: index.php?action=voter_view&&as_voterid=".$as_voterid);					
	}  else {
		require( AS_INC . "as_voter_edit.php" );
	}	
	
}

function official_delete() {
	$as_officialid = isset( $_GET['as_officialid'] ) ? $_GET['as_officialid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_official WHERE officialid = '$as_officialid'";
	$delete = array(
		'officialid' => $as_officialid,
	);
	$deleted = $database->delete( 'as_official', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=official_all");	
	}
}

function official_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Officials";  
	require( AS_INC . "as_official_all.php" );
}

function official_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newofficial"; 
	
	if ( isset( $_POST['AddOfficial'] ) ) {
		as_add_new_official();
		header( "Location: index.php?action=official_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_official();
		header( "Location: index.php?action=official_all");						
	}  else {
		require( AS_INC . "as_official_new.php" );
	}	
	
}
function official_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewofficial"; 
	$as_officialid = isset( $_GET['as_officialid'] ) ? $_GET['as_officialid'] : "";
	
	$as_db_query = "SELECT * FROM as_official WHERE officialid = '$as_officialid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $officialid, $official_name) = $database->get_row( $as_db_query );
		$results['official'] = $officialid;
	} else  {
		return false;
		header( "Location: index.php?action=official_all");	
	}
	
	require( AS_INC . "as_viewofficial.php" );
		
}

?>