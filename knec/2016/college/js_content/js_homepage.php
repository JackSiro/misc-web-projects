<?php       
		$siteurl = explode('/',$_SERVER['REQUEST_URI']);

		$username = isset ( $_COOKIE['newsholla_username']) ? $_COOKIE['newsholla_username'] : "";
		$words = isset ( $_GET["start"]) ? $_GET["start"] : "";
	  
		js_homepage();
		
		function js_homepage() {
	  
			$results = array();	 
			$results['pageTitle'] = js_get_option('sitename');
			//$results['startfrom'] = $words;
			setcookie('temp_task', '', time()+60*60*24*365, '/', js_getUrl());
			setcookie('temp_word', '', time()+60*60*24*365, '/', js_getUrl());
			setcookie('temp_meaning', '', time()+60*60*24*365, '/', js_getUrl());
			setcookie('temp_swa_word',  '', time()+60*60*24*365, '/', js_getUrl());
			setcookie('temp_tag_word', '', time()+60*60*24*365, '/', js_getUrl());
		
		  if ( isset( $_POST['PostThis'] ) ) {
			
			js_post_this();
	
		  } else {
			require( JS_INC."js_homepage.php" );
		} 
		
	}
	  
?>