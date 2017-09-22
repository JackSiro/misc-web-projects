<?php
    
	include JS_FUNC.'js_install.php';

	// SITE FUNCTIONS 
	// Begin General Functions 
	function js_getUrl() {
	  	if (js_get_option('siteurl') == "") $siteurl = JS_SITEURL;
		else $siteurl = js_get_option('siteurl');
	       return $siteurl;
	}
	
	function js_siteUrl(){
		if (js_get_option('siteurl') == "") $siteurl = JS_SITEURL;
		else $siteurl = js_get_option('siteurl');
	    return $siteurl.'/';
	}

	function js_siteLynk(){
		 return js_siteUrl().'/';
	}
	

   
	function js_siteLynk_img(){
		 return js_siteUrl().'/js_media/image/';
	}


	function js_siteLynk_ava(){
		 return js_siteUrl().'/js_media/avata/';
	}


	function js_siteLynk_icon(){
		 return js_siteUrl().'/js_media/icon/';
	}

	function js_request() {
	  	$siteurl = explode('/',$_SERVER['REQUEST_URI']);
		$the_request = $siteurl[1];	
		return $the_request;
	}
	
	function js_request_part($part) {
		$parts = explode('/', js_request());
		return $parts[$part];
	}

    function js_request_parts($start=0) {
		return array_slice(explode('/', js_request()), $start);
	}

    function js_request_partz($start=0) {
		return array_slice(explode('?', js_request()), $start);
	}
	
	function js_db_query($query) {
                $database = new Js_Dbconn();
                return $database->get_results( $query );
	}
		
	function js_check_admin() {
		$database = new Js_Dbconn();
		$check_column = 'lecturerid';
		$check_for = array( 'lecturer_group' => 'super-admin' );
		$exists = $database->exists( 'js_lecturer', $check_column,  $check_for );
		if( $exists ){ return true; }
	}
	
	function js_check_options() {
		$database = new Js_Dbconn();
		$check_column = 'optid';
		$check_for = array( 'title' => 'sitename' );
		$exists = $database->exists( 'js_options', $check_column,  $check_for );
		if( $exists ){ return true; }
	}
		
	function js_get_option($option) {
		$js_db_query = "SELECT * FROM js_options WHERE title = '$option'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
                    list( $optid, $title, $content) = $database->get_row( $js_db_query );
		    return $content;
		} else  {
		    return false;
		}
		
	}
	
	function js_new_option($title, $content, $lecturerid) {
		$database = new Js_Dbconn();			
		$New_Option_Details = array(
			'title' => $title,
			'content' => $content,
			'createdby' => $lecturerid,
			'created' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->js_insert( 'js_options', $New_Option_Details ); 			
	}

	function js_set_option($option, $value, $lecturerid) {
		$database = new Js_Dbconn();	
		$Update_Site_Details = array(
			'content' => $value,
			'updatedby' => $lecturerid,
			'updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('title' => $option);
		$updated = $database->js_update( 'js_options', $Update_Site_Details, $where_clause, 1 );
	}
	
	function js_new_options(){
	  if ( isset( $_POST['SaveSite'] ) ) {                
		js_new_option('sitename', $_POST['sitename'], '1');
		js_new_option('siteurl', $_POST['siteurl'], '1');
		js_new_option('slogan', $_POST['slogan'], '1');
		js_new_option('description', $_POST['description'], '1');		
	    header("lodepartmention: ".JS_SITEURL);
	        
	    }
	}
	
	function js_new_admin(){
	      if ( isset( $_POST['SetAdministrator'] ) ) {			
			$database = new Js_Dbconn();			
			$New_Lecturer_Details = array(		
    				'lecturer_name' => trim($_POST['username']),
    				'lecturer_fname' => trim($_POST['fname']),
    				'lecturer_surname' => trim($_POST['surname']),
    				'lecturer_password' => md5(trim($_POST['password'])),
    				'lecturer_email' => trim($_POST['email']),
    				'lecturer_group' => 'super-admin',
    				'lecturer_avatar' => 'lecturer_default.jpg',
    				'lecturer_joined' => date('Y-m-d H:i:s'),
    			);
    			
			$add_query = $database->js_insert( 'js_lecturer', $New_Lecturer_Details );
			header("lodepartmention: ".JS_SITEURL);
			
	      }
	
	}
	
	function js_opt($name, $value=null)
	{
		if (isset($value))
		js_set_option($name, $value);
		$options=js_get_options(array($name));
		return $options[$name];
	}
		
	function js_db_set_option($name, $value)
	{
		js_db_query(
			'REPLACE ^options (title, content) VALUES ($, $)', $name, $value
		);
	}
	
		//$js_config = fopen("js_config.php", "w");
		//fwrite($js_config,"hjkjjhj");
			
	function js_database_setup(){		
		if ( isset( $_POST['DatabaseSetup'] ) ) {	    				    			
			$filename = "js_config.php";
			$line_1 = 6;
			$line_2 = 7;
			$line_3 = 8;
			$lines = file($filename, FILE_IGNORE_NEW_LINES );
			
			$lines[$line_1] = '	define( "JS_DB", "'.trim($_POST['database']).'" );';
			$lines[$line_2] = '	define( "JS_USER", "'.trim($_POST['username']).'" );';
			$lines[$line_3] = '	define( "JS_PASS", "'.trim($_POST['password']).'"  );';
			
			file_put_contents($filename, implode("\n", $lines));
			header("lodepartmention: ".JS_SITEURL);
	    }
	}
	
	function js_guest() {
		$results = array();	 
		//$results['pageTitle'] = js_get_option('sitename');
		require( JS_INC."js_guest.php" ); 
	}
		
	function js_time_ago($tm,$rcs = 0) {
	   $cur_tm = time(); $dif = $cur_tm-$tm;
	   $pds = array('second','minute','hour','day','week','month','year','decade');
	   $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	   for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

	   $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	   if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	   return $x.' ago';
	}
	
	function js_is_logged_lecturer(){
		if (js_logged_lecturer('username')) return true;
		else if (!js_logged_lecturer('username')) return false;
	}
	
	function js_logged_admin(){
		if (js_is_logged()) {
			if (js_logged_lecturer('level') == "admin") {
				return true;
			} else return false;
		}
		
	}
	
	function js_homepage(){
		$siteurl = explode('/',$_SERVER['REQUEST_URI']);
	
		$username = isset ( $_COOKIE['tujuane_username']) ? $_COOKIE['tujuane_username'] : "";
		$words = isset ( $_GET["start"]) ? $_GET["start"] : "";
	
		$results = array();	 
		$results['pageTitle'] = js_get_option('sitename');
		$results['startfrom'] = $words;
		//setcookie('temp_task', '', time()+60*60*24*365, '/', js_getUrl());
		//setcookie('temp_word', '', time()+60*60*24*365, '/', js_getUrl());
		//setcookie('temp_plural', '', time()+60*60*24*365, '/', js_getUrl());
		//setcookie('temp_meaning', '', time()+60*60*24*365, '/', js_getUrl());
		//setcookie('temp_swa_word',  '', time()+60*60*24*365, '/', js_getUrl());
		//setcookie('temp_tag_word', '', time()+60*60*24*365, '/', js_getUrl());		
		require( JS_INC."js_homepage.php" );	
	}
		
	function js_error_404(){
		include JS_THEME."js_header.php";
		/*
         	echo '<p style="font-size:72px;">Error 404</p>
		<h1>The page you are looking for can\'t be found</h1><hr>
		<a href="'.js_siteUrl().'"><h1>Go back home</h1></a></p>';
		*/
		include JS_THEME."js_footer.php";
	}
	
	