<?php

	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	
	$action = $_GET["action"];
	
	if (isset($action)) {
		if ($action == 'getitems') echo as_get_item_items($_GET["itemitem"]);
		else if ($action == 'getdetail') echo as_get_item_details($_GET["itemid"]);
	 } 
	
	function as_get_item_items($itemitem){
		$database = new As_Dbconn();			
		$as_db_query = "SELECT * FROM as_item WHERE item_title LIKE '%".$itemitem."%' ORDER BY itemid ASC";			
		$results = $database->get_results($as_db_query  );
		$html = '';
		foreach( $results as $row )
			$html .='<a href="javascript:void(0);" onclick="selectItemsItem('.$row['itemid'].', \''.$row['item_title'].'\');" >'.
				$row['item_title'].'</a>, ';
		return $html;
	}
	
	function as_get_item_details($itemid){
		$database = new As_Dbconn();			
		$as_db_query = "SELECT item_unit, item_price, item_stock FROM as_item WHERE itemid=$itemid";			
		$matchitem = $database->get_row($as_db_query);
		return $matchitem[0].'||'.$matchitem[1].'||'.$matchitem[2];
	}
	
?>