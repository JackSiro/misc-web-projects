<?php

	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	
	$action = $_GET["action"];
	
	if (isset($action)) {
		if ($action == 'getdrugs') echo as_get_drug_items($_GET["drugitem"]);
		else if ($action == 'getdetail') echo as_get_drug_details($_GET["drugid"]);
	 } 
	
	function as_get_drug_items($drugitem){
		$database = new As_Dbconn();			
		$as_db_query = "SELECT * FROM as_drug WHERE drug_title LIKE '%".$drugitem."%' ORDER BY drugid ASC";			
		$results = $database->get_results($as_db_query  );
		$html = '';
		foreach( $results as $row )
			$html .='<a href="javascript:void(0);" onclick="selectDrugsItem('.$row['drugid'].', \''.$row['drug_title'].'\');" >'.
				$row['drug_title'].'</a>, ';
		return $html;
	}
	
	function as_get_drug_details($drugid){
		$database = new As_Dbconn();			
		$as_db_query = "SELECT drug_unit, drug_price, drug_stock FROM as_drug WHERE drugid=$drugid";			
		$matchitem = $database->get_row($as_db_query);
		return $matchitem[0].'||'.$matchitem[1].'||'.$matchitem[2];
	}
	
?>