<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Australia/Sydney" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=tujuane_kimosop" );
define( "DB_USERNAME", "tujuane_kimosop" );
define( "DB_PASSWORD", "Am2zealous" );
define( "CLASS_DIR", "classes" );
define( "THEME_DIR", "themes" );
define( "PAGE_DIR", "pages" );
define( "ADMIN_USERNAME", "admins" );
define( "ADMIN_PASSWORD", "ad4321" );
require( CLASS_DIR . "/Item.php" );
require( CLASS_DIR . "/Status.php" );
require( CLASS_DIR . "/Category.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
