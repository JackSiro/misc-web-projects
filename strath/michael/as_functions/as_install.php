<?php
/*
	File: as_functions/as_install.php
	Description: checking for errors in database such as missing tables, as well as site requirements

*/
	//Check for errors in database
	require AS_FUNC.'as_dbcheck.php';
	
	//Check if Super-Admin exists
	if (!as_check_db_value('userid', 'user_level', 5, 'as_user'))  {
		$as_err = array();
		$as_err['errno'] = 2;
		$as_err['errtype'] = 'user';
		$as_err['errtitle'] = 'Create a Super Admin';
		$as_err['errsumm'] = 'There are no users yet! That means you need to set up a Super-Admin first...';
		require_once AS_CONT.'as_page_error.php';
		exit(); 
	}
	
	//Check if simple site options like sitename exists
	if (!as_check_db_value('optionid', 'option_title', 'as_sitename', 'as_site_options'))  {
	   $as_err = array();
		$as_err['errno'] = 3;
		$as_err['errtype'] = 'site';
		$as_err['errtitle'] = 'Set Up Your Site';
		$as_err['errsumm'] = 'Set up a few Options for your site...';
		require_once AS_CONT.'as_page_error.php';
		exit(); 
	}
	