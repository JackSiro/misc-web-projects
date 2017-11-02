<?php
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
		
	function as_get_option($option) {
		$as_db_query = "SELECT * FROM as_site_options WHERE option_title = '$option'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $optionid, $option_title, $option_content) = $database->get_row( $as_db_query );
		    return $option_content;
		} else  {
		    return false;
		}
		
	}
	
	function as_new_option($title, $content, $userid) {
		$database = new As_Dbconn();			
		$New_Option_Details = array(
			'option_title' => $title,
			'option_content' => $content,
			'option_createdby' => $userid,
			'option_created' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->as_insert( 'as_site_options', $New_Option_Details ); 			
	}
	
	function as_set_option($title, $content, $userid) {
		$database = new As_Dbconn();	
		$as_db_query = "SELECT * FROM as_site_options WHERE option_title = '$title'";		
		if( $database->as_num_rows( $as_db_query ) ==1 ) {
			$Update_Option = array(
				'option_title' => trim($title),
				'option_content' => trim($content),
				'option_updated' => date('Y-m-d H:i:s'),
				'option_updatedby' => $userid,
			);
			$where_clause = array('option_title' => $title);
			$updated = $database->as_update( 'as_site_options', $Update_Option, $where_clause, 1 );
		} else  {
            as_new_option($title, $content, $userid);
        }		
	}
		
	function as_reset_option($title, $content, $userid) {
		$database = new As_Dbconn();	
		$as_check = $database->as_num_rows("SELECT * FROM as_site_options WHERE option_title = '$title'");
        if( $as_check ) {
            $Update_Option_Details = array(
				'option_title' => trim($title),
				'option_content' => trim($content),
				'option_updated' => date('Y-m-d H:i:s'),
				'option_updatedby' => $userid,
			);
			$where_clause = array('option_title' => $title);
			$updated = $database->as_update( 'as_site_options', $Update_Option_Details, $where_clause, 1 );
        }  else  {
            as_new_option($title, $content, $userid);
        }		
	}

	function as_new_admin(){
	      if ( isset( $_POST['SetAdministrator'] ) ) {			
			$database = new As_Dbconn();			
			$New_User_Details = array(		
    				'user_name' => trim($_POST['username']),
    				'user_fname' => trim($_POST['fname']),
    				'user_surname' => trim($_POST['surname']),
    				'user_password' => md5(trim($_POST['password'])),
    				'user_email' => trim($_POST['email']),
    				'user_group' => 'manager',
    				'user_avatar' => 'user_default.jpg',
    				'user_joined' => date('Y-m-d H:i:s'),
    			);
			$add_query = $database->as_insert( 'as_user', $New_User_Details );
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
	
	function as_is_logged_user(){
		if (as_logged_user('username')) return true;
		else if (!as_logged_user('username')) return false;
	}
	
	function as_logged_admin(){
		if (as_is_logged()) {
			if (as_logged_user('level') == "admin") {
				return true;
			} else return false;
		}
		
	}
	
	function as_db_error(){
		$as_err = array();
		$as_err['errno'] = 1;
		$as_err['errtype'] = 'database';
		$as_err['errtitle'] = 'Start Setting Up Things';
		$as_err['errsumm'] = 'Set a few options to start you off... on: '.AS_SITEURL;
		require_once AS_FUNC.'as_install.php';
	}
	
	function as_db_connect() {
        $connect = @mysqli_connect(AS_HOST, AS_USER, AS_PASS, AS_DB);
		if (mysqli_connect_errno())
		{
			as_db_error();
			exit();
		}
    }
	
	as_db_connect();
	
	require_once AS_FUNC.'as_dbconn.php';	
	require_once AS_FUNC.'as_dbcheck.php';

	if (!as_check_db_value('userid', 'user_group', 'super-admin', 'as_user'))  {
		$as_err = array();
		$as_err['errno'] = 2;
		$as_err['errtype'] = 'user';
		$as_err['errtitle'] = 'Create a Super Admin';
		$as_err['errsumm'] = 'There are no users yet! That means you need to set up a Super-Admin first...';
		require_once AS_FUNC.'as_install.php';
		exit(); 
	}
	
	if (!as_check_db_value('optionid', 'option_title', 'as_sitename', 'as_site_options'))  {
		$as_err = array();
		$as_err['errno'] = 3;
		$as_err['errtype'] = 'site';
		$as_err['errtitle'] = 'Set Up Your Site';
		$as_err['errsumm'] = 'Set up a few Options for your site...';
		require_once AS_FUNC.'as_install.php';
		exit(); 
	}
	
    function as_check_db_value($value_id, $value_title, $value_value, $value_table){
		$database = new As_Dbconn();
		$check_column = $value_id;
		$check_for = array( $value_title => $value_value );
		$exists = $database->exists( $value_table, $check_column,  $check_for );
		if( $exists ){ return true; }
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
