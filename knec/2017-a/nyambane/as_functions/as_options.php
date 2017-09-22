<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	function as_navigation() {	
		$as_nav_items = array();					
		$myaccount = isset( $_SESSION['appsmata_account'] ) ? $_SESSION['appsmata_account'] : null;
		
		/*$as_nav_items['home']=array(
			'label' => 'Home',
			'url' => '.',
		);
		*/
		if ($myaccount){ 
			$as_nav_items['visitor_all']=array(
				'label' => 'Visitors',
				'url' => 'index.php?action=visitor_all',
			);
			$as_nav_items['user_all']=array(
				'label' => 'Users',
				'url' => 'index.php?action=user_all',
			);
			$as_nav_items['options']=array(
				'label' => 'Site Options',
				'url' => 'index.php?action=options',
			);
			$as_nav_items['logout']=array(
				'label' => 'Logout?',
				'url' => 'index.php?action=logout',
			);
		
		}  else {
			$as_nav_items['register']=array(
				'label' => 'Register',
				'url' => 'index.php?action=register',
			);
			$as_nav_items['forgot_password']=array(
				'label' => 'Forgot Password',
				'url' => 'index.php?action=forgot_password',
			);
			$as_nav_items['forgot_username']=array(
				'label' => 'Forgot Username',
				'url' => 'index.php?action=forgot_username',
			);
		}
		return $as_nav_items;
	}
	
	function as_total_cat_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_type_item($typeid){
		$as_db_query = "SELECT * FROM as_type WHERE typeid = '$typeid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $typeid, $type_slug, $type_title) = $database->get_row( $as_db_query );
			return $type_title;
		} else  {
			return false;
		}
	}
	
	function as_visitor_item($visitorid){
		$as_db_query = "SELECT * FROM as_visitor WHERE visitorid = '$visitorid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $visitorid, $visitor_name, $visitor_fullname) = $database->get_row( $as_db_query );
			return $visitor_fullname;
		} else  {
			return false;
		}
	}
	
	function as_visit_paidby($visitorid){
		$as_db_query = "SELECT * FROM as_visitor WHERE visitorid = '$visitorid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $visitid, $visit_amount, $visit_date, $visit_session, $visit_paidby, $visit_paid) = $database->get_row( $as_db_query );
			return $visit_paidby;
		} else  {
			return false;
		}
	}
	