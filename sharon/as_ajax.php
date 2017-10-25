<?php

	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	
	$action = $_GET["action"];
	
	if (isset($action)) {
		if ($action == 'getitems') echo as_get_sale_items($_GET["item_image"]);
		else if ($action == 'getdetail') echo as_get_item_details($_GET["itemid"]);
	 } 
	
	function as_get_sale_items($saleitem){
		$database = new As_Dbconn();			
		$as_db_query = "SELECT * FROM as_item WHERE item_image LIKE '%".$saleitem."%' ORDER BY itemid ASC LIMIT 1";			
		$results = $database->get_results($as_db_query  );
		$html = '';
		foreach( $results as $row ) {
			$html .='<h3>'.$row['item_image'].'</h3>';
			$html .='<input type="hidden" name="itemid" id="itemid" value=">'.$row['itemid'].'"/>';
			$html .='<input type="hidden" name="item_image" id="item_image" value="'.$row['item_image'].'"/>';
			$html .='<input type="hidden" name="item_terms" id="item_terms" value="'.$row['item_terms'].'"/>';
			$html .='<input type="hidden" name="item_price" id="item_price" value="'.$row['item_price'].'"/>';
			$html .='<input type="hidden" name="item_stock" id="item_stock" value="'.$row['item_stock'].'"/>';
		}
		return $html;
	}
	
	function as_get_item_details($itemid){
		$database = new As_Dbconn();			
		$as_db_query = "SELECT item_terms, item_price FROM as_items WHERE itemid=$itemid";			
		$matchitem = $database->get_row($as_db_query);
		return $matchitem[0].'||'.$matchitem[1];
	}
	
?>