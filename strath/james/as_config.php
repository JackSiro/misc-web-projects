<?php
	ini_set( "display_errors", true );
	date_default_timezone_set( "Africa/Nairobi" ); 
	$as_site_url = $_SERVER['HTTP_HOST'].strtr(dirname($_SERVER['SCRIPT_NAME']), '\\', '/');

	define( "AS_HOST", "localhost" );
	define( "AS_DB", "strath_james" );
	define( "AS_USER", "root" );
	define( "AS_PASS", ""  );
	define( "AS_ACC", "as_account/" );
	define( "AS_INC", "as_include/" );
	define( "AS_THEME", "as_themes/" );
	define( "AS_CONT", "as_content/" );
	define( "AS_APP", "as_apps/" );
    define( "AS_FUNC", "as_functions/" );
	define( "AS_SITEURL", 'http://'.$as_site_url); 
	define( "SEND_ERRORS_TO", "johndoe@example.com" );
	define( "DISPLAY_DEBUG", true );

?>