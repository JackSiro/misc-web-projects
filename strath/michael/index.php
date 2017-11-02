<?php
/*
	File: index.php
	Description: redirection to core system files

*/

	define('AS_BASE', dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/');
	
	require 'as_content/as_aaindex.php';?>

