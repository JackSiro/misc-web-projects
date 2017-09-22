<?php
    
	include AS_FUNC.'as_install.php';

	// SITE FUNCTIONS 
	// Begin General Functions 
	function as_getUrl() {
	  	if (as_get_option('siteurl') == "") $siteurl = AS_SITEURL;
		else $siteurl = as_get_option('siteurl');
	       return $siteurl;
	}
	
	function as_siteUrl(){
		if (as_get_option('siteurl') == "") $siteurl = AS_SITEURL;
		else $siteurl = as_get_option('siteurl');
	    return $siteurl.'/';
	}

	function as_siteLynk(){
		 return as_siteUrl().'/';
	}
	

   
	function as_siteLynk_img(){
		 return as_siteUrl().'/as_media/image/';
	}


	function as_siteLynk_ava(){
		 return as_siteUrl().'/as_media/avata/';
	}


	function as_siteLynk_icon(){
		 return as_siteUrl().'/as_media/icon/';
	}

	function as_request() {
	  	$siteurl = explode('/',$_SERVER['REQUEST_URI']);
		$the_request = $siteurl[1];	
		return $the_request;
	}
	
	function as_request_part($part) {
		$parts = explode('/', as_request());
		return $parts[$part];
	}

    function as_request_parts($start=0) {
		return array_slice(explode('/', as_request()), $start);
	}

    function as_request_partz($start=0) {
		return array_slice(explode('?', as_request()), $start);
	}
	
	function as_db_query($query) {
                $database = new As_Dbconn();
                return $database->get_results( $query );
	}
		
	function as_check_admin() {
		$database = new As_Dbconn();
		$check_column = 'teacherid';
		$check_for = array( 'teacher_group' => 'super-admin' );
		$exists = $database->exists( 'as_teacher', $check_column,  $check_for );
		if( $exists ){ return true; }
	}
	
	function as_check_options() {
		$database = new As_Dbconn();
		$check_column = 'optid';
		$check_for = array( 'title' => 'sitename' );
		$exists = $database->exists( 'as_options', $check_column,  $check_for );
		if( $exists ){ return true; }
	}
		
	function as_get_option($option) {
		$as_db_query = "SELECT * FROM as_options WHERE title = '$option'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
                    list( $optid, $title, $content) = $database->get_row( $as_db_query );
		    return $content;
		} else  {
		    return false;
		}
		
	}
	
	function as_new_option($title, $content, $teacherid) {
		$database = new As_Dbconn();			
		$New_Option_Details = array(
			'title' => $title,
			'content' => $content,
			'createdby' => $teacherid,
			'created' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->as_insert( 'as_options', $New_Option_Details ); 			
	}

	function as_set_option($option, $value, $teacherid) {
		$database = new As_Dbconn();	
		$Update_Site_Details = array(
			'content' => $value,
			'updatedby' => $teacherid,
			'updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('title' => $option);
		$updated = $database->as_update( 'as_options', $Update_Site_Details, $where_clause, 1 );
	}
	
	function as_new_options(){
	  if ( isset( $_POST['SaveSite'] ) ) {                
		as_new_option('sitename', $_POST['sitename'], '1');
		as_new_option('siteurl', $_POST['siteurl'], '1');
		as_new_option('slogan', $_POST['slogan'], '1');
		as_new_option('description', $_POST['description'], '1');		
	    header("location: ".AS_SITEURL);
	        
	    }
	}
	
	function as_new_admin(){
	      if ( isset( $_POST['SetAdministrator'] ) ) {			
			$database = new As_Dbconn();			
			$New_Teacher_Details = array(		
    				'teacher_name' => trim($_POST['username']),
    				'teacher_fname' => trim($_POST['fname']),
    				'teacher_surname' => trim($_POST['surname']),
    				'teacher_password' => md5(trim($_POST['password'])),
    				'teacher_email' => trim($_POST['email']),
    				'teacher_group' => 'super-admin',
    				'teacher_joined' => date('Y-m-d H:i:s'),
    			);
    			
			$add_query = $database->as_insert( 'as_teacher', $New_Teacher_Details );
			header("location: ".AS_SITEURL);
			
	      }
	
	}
	
	function as_opt($name, $value=null)
	{
		if (isset($value))
		as_set_option($name, $value);
		$options=as_get_options(array($name));
		return $options[$name];
	}
		
	function as_db_set_option($name, $value)
	{
		as_db_query(
			'REPLACE ^options (title, content) VALUES ($, $)', $name, $value
		);
	}
	
		//$as_config = fopen("as_config.php", "w");
		//fwrite($as_config,"hjkjjhj");
			
	function as_database_setup(){		
		if ( isset( $_POST['DatabaseSetup'] ) ) {	    				    			
			$filename = "as_config.php";
			$line_1 = 6;
			$line_2 = 7;
			$line_3 = 8;
			$lines = file($filename, FILE_IGNORE_NEW_LINES );
			
			$lines[$line_1] = '	define( "AS_DB", "'.trim($_POST['database']).'" );';
			$lines[$line_2] = '	define( "AS_USER", "'.trim($_POST['username']).'" );';
			$lines[$line_3] = '	define( "AS_PASS", "'.trim($_POST['password']).'"  );';
			
			file_put_contents($filename, implode("\n", $lines));
			header("location: ".AS_SITEURL);
	    }
	}
	
	function as_guest() {
		$results = array();	 
		//$results['pageTitle'] = as_get_option('sitename');
		require( AS_INC."as_guest.php" ); 
	}
		
	function as_time_ago($tm,$rcs = 0) {
	   $cur_tm = time(); $dif = $cur_tm-$tm;
	   $pds = array('second','minute','hour','day','week','month','year','decade');
	   $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	   for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

	   $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	   if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	   return $x.' ago';
	}
	
	function as_is_logged_teacher(){
		if (as_logged_teacher('username')) return true;
		else if (!as_logged_teacher('username')) return false;
	}
	
	function as_logged_admin(){
		if (as_is_logged()) {
			if (as_logged_teacher('level') == "admin") {
				return true;
			} else return false;
		}
		
	}
	
	function as_homepage(){
		$siteurl = explode('/',$_SERVER['REQUEST_URI']);
	
		$username = isset ( $_COOKIE['tujuane_username']) ? $_COOKIE['tujuane_username'] : "";
		$words = isset ( $_GET["start"]) ? $_GET["start"] : "";
	
		$results = array();	 
		$results['pageTitle'] = as_get_option('sitename');
		$results['startfrom'] = $words;
		//setcookie('temp_task', '', time()+60*60*24*365, '/', as_getUrl());
		//setcookie('temp_word', '', time()+60*60*24*365, '/', as_getUrl());
		//setcookie('temp_plural', '', time()+60*60*24*365, '/', as_getUrl());
		//setcookie('temp_meaning', '', time()+60*60*24*365, '/', as_getUrl());
		//setcookie('temp_swa_word',  '', time()+60*60*24*365, '/', as_getUrl());
		//setcookie('temp_tag_word', '', time()+60*60*24*365, '/', as_getUrl());		
		require( AS_INC."as_homepage.php" );	
	}
		
	function as_error_404(){
		include AS_THEME."as_header.php";
		/*
         	echo '<p style="font-size:72px;">Error 404</p>
		<h1>The page you are looking for can\'t be found</h1><hr>
		<a href="'.as_siteUrl().'"><h1>Go back home</h1></a></p>';
		*/
		include AS_THEME."as_footer.php";
	}
	
	