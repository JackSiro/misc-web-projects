<?php
	$database_host = "localhost";
	$database_name = "sharon_db";
	$database_username = "root";
	$database_password = "";

	// Create connection
	$connection = new mysqli($database_host, $database_username, $database_password);
	
	// Check connection
	$output_error = "";
	if ($connection->connect_error) {		
		$connect_state = false;// If database connection failed
		
		//Show this instead of normal content
		$output_error .= "Connection failed: " . $connection->connect_error;
		
	} else {
		$connect_state = true;//otherwise connection if successful
				
		$sql_query = "CREATE DATABASE IF NOT EXISTS " . $database_name . " DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";
		$create_db = $connection->query($sql_query);
		
		//select database
		$db_select = mysqli_select_db($connection, $database_name);
		
		$sql_query = "CREATE TABLE IF NOT EXISTS users (
			userid int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			full_name varchar(100) DEFAULT NULL, 
			email varchar(100) DEFAULT NULL,
			phone_number varchar(100) DEFAULT NULL, 
			user_name varchar(100) DEFAULT NULL,
			password varchar(100) DEFAULT NULL,
			usertype varchar(100) DEFAULT NULL, 
			accesstime varchar(100) DEFAULT NULL,
			Image varchar(100) DEFAULT NULL,
			address varchar(100) DEFAULT NULL )";
		$create_tb = $connection->query($sql_query);
	
	}
	$connection->close();
?>