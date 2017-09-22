<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_payslip_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_payslip_leave($payslipid){
		$js_db_query = "SELECT * FROM js_payslip WHERE payslipid = '$payslipid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $payslipid, $payslip_slug, $payslip_fullname) = $database->get_row( $js_db_query );
			return $payslip_fullname;
		} else  {
			return false;
		}
	}