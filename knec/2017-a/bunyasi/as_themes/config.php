<?php
	ini_set( "display_errors", true );
	date_default_timezone_set( "Australia/Sydney" );  
	define( "DB_DSN", "mysql:host=localhost;dbname=library" );
	define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", "" );
	define( "CLASS_PATH", "classes/" );
	define( "CONTENT", "content/" );
	define( "LOOKS", "looks/" );
	define( "ADMIN_USERNAME", "myadmin" );
	define( "ADMIN_PASSWORD", "mypass" );
	require( CLASS_PATH . "ELibrary.php" );
	require( CLASS_PATH . "Libuser.php" );
	
	function handleException( $exception ) {
	  echo "Sorry, a problem occurred. Please try later.";
	  error_log( $exception->getMessage() );
	}

	set_exception_handler( 'handleException' );
?>
