<?php
/*
	File: as_config.php
	Description: Declaration of globally useful constants

*/
	ini_set( "display_errors", true );
	date_default_timezone_set( "Africa/Nairobi" ); 
	$as_site_url = $_SERVER['HTTP_HOST'].strtr(dirname($_SERVER['SCRIPT_NAME']), '\\', '/');

	// declaration of essential site variable
	define( "AS_HOST", 				"localhost" ); 		// server name
	define( "AS_DB", 				"strath_michael" );		// database name
	define( "AS_USER",				"root" );			// database username
	define( "AS_PASS",				""  );		// database password
	define( "AS_ERROR_RECEIVER",	""  );		// email to receive error logs
	define( "AS_ERROR_SENDER",		""  );	// email to send error logs
	define( "AS_SITEURL", 			'http://'.$as_site_url.'/');	// site url

	
	/* * * * * * * * * * * * * * * *\
	*                               *
	*                               *
	*                               *
	\* * * * * * * * * * * * * * * */
	
	
	define( 'as_urlExt', '.html');
	define( 'as_maintainance', '0');
	
?>