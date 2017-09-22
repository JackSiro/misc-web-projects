<?php       
		$siteurl = explode('/',$_SERVER['REQUEST_URI']);

		$username = isset ( $_COOKIE['newsholla_username']) ? $_COOKIE['newsholla_username'] : "";
		$words = isset ( $_GET["start"]) ? $_GET["start"] : "";
	  
		as_homepage();
		
		function as_homepage() {
	  
			$results = array();	 
			$results['pageTitle'] = as_get_option('sitename');
			//$results['startfrom'] = $words;
			setcookie('temp_task', '', time()+60*60*24*365, '/', as_getUrl());
			setcookie('temp_word', '', time()+60*60*24*365, '/', as_getUrl());
			setcookie('temp_meaning', '', time()+60*60*24*365, '/', as_getUrl());
			setcookie('temp_swa_word',  '', time()+60*60*24*365, '/', as_getUrl());
			setcookie('temp_tag_word', '', time()+60*60*24*365, '/', as_getUrl());
		
		  if ( isset( $_POST['DrugThis'] ) ) {
			
			as_drug_this();
	
		  } else {
			require( AS_INC."as_homepage.php" );
		} 
		
	}
	  
?>