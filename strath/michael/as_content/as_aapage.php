<?php
/*
	File: as_content/as_aapage.php
	Description: Sets up pages to be displayed based on page requests

*/

	//request manager
	function as_get_request_content()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }
		
		$requestlower = strtolower(as_request());
		$requestparts = as_request_parts();
		$request_one = strtolower($requestparts[0]);
		if (count($requestparts)>1) {
			$request_two = strtolower($requestparts[1]);
		} else $request_two = "";
		
		$loggedin = isset( $_SESSION['siteuser_userid'] ) ? $_SESSION['siteuser_userid'] : "";		  
		$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
		
		switch ( $request_one ) {
			case 'index'.as_urlExt:	
				if ($loggedin ) $as_content = require( "as_dashboard.php" );
				else $as_content = require( "as_account_signin.php" );
				break;
			case 'contactus'.as_urlExt:	
				$as_content = require( "as_page_contact.php" );
				break;
			case 'account': 
				switch ( $request_two ) {	
					case 'logout'.as_urlExt:	
						$as_content = as_logout();
						break;	
					case 'login'.as_urlExt:			
						$as_content = require( "as_account_signin.php" );
						break;
					case 'register'.as_urlExt:			
						$as_content = require( "as_account_signup.php" );
						break;	
					case 'forgotten'.as_urlExt:	
						$as_content = require( "as_account_forgotten.php" );
						break;
					case 'username'.as_urlExt:	
						$as_content = require( "as_account_username.php" );
						break;	
					case 'account'.as_urlExt:	
						$as_content = require( "as_account_account.php" );
						break;			
					default:		
						$as_content = require( "as_page_home.php" );
				}			
				break;
			case 'crime': 
				switch ( $request_two ) {	
					case 'new'.as_urlExt:	
						$as_content = require( "as_crime_new.php" );
						break;		
					case 'edit'.as_urlExt:	
						$as_content = require( "as_crime_edit.php" );
						break;
					case 'delete'.as_urlExt:
						$as_content = as_delete_item('crime', $_GET['as_crimeid']);
						break;			
					default:		
						$as_content = require( "as_crime_all.php" );
				}			
				break;
			case 'category': 
				switch ( $request_two ) {	
					case 'new'.as_urlExt:	
						$as_content = require( "as_category_new.php" );
						break;		
					case 'edit'.as_urlExt:	
						$as_content = require( "as_category_edit.php" );
						break;
					case 'delete'.as_urlExt:
						$as_content = as_delete_item('category', $_GET['as_categoryid']);
						break;			
					default:		
						$as_content = require( "as_category_all.php" );
				}			
				break;
			case 'item': 
				switch ( $request_two ) {	
					case 'new'.as_urlExt:	
						$as_content = require( "as_item_new.php" );
						break;		
					case 'edit'.as_urlExt:	
						$as_content = require( "as_item_edit.php" );
						break;
					case 'delete'.as_urlExt:
						$as_content = as_delete_item('item', $_GET['as_itemid']);
						break;			
					default:		
						$as_content = require( "as_item_all.php" );
				}			
				break;
			default:
				if ($loggedin ) $as_content = require( "as_dashboard.php" );
				else $as_content = require( "as_account_signin.php" );
				
		}
		return $as_content;
	}

	global $as_usage;
	require_once AS_FUNC.'as_users.php';
	require_once AS_FUNC."as_posting.php";
	
	as_get_request_content();
	
?>