<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	function as_navigation() {	
		$as_nav_items = array();					
		$myaccount = isset( $_SESSION['appsmata_account'] ) ? $_SESSION['appsmata_account'] : null;
		$as_nav_items['home']=array(
			'label' => 'Home',
			'url' => '.',
		);
		
		if ($myaccount){ 
			$as_nav_items['lost_all']=array(
				'label' => 'Lost Items',
				'url' => 'index.php?action=lost_all',
			);
			$as_nav_items['found_all']=array(
				'label' => 'Found Items',
				'url' => 'index.php?action=found_all',
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
	
	function as_lost_item($lostid){
		$as_db_query = "SELECT * FROM as_lost WHERE lostid = '$lostid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $lostid, $lost_title, $lost_content) = $database->get_row( $as_db_query );
			return $lost_content;
		} else  {
			return false;
		}
	}
	
	function as_found_postedby($lostid){
		$as_db_query = "SELECT * FROM as_lost WHERE lostid = '$lostid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $foundid, $found_title, $found_content, $found_place, $found_postedby, $found_posted) = $database->get_row( $as_db_query );
			return $found_postedby;
		} else  {
			return false;
		}
	}
	