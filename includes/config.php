<?php

	ob_start();
	session_start();

	// db properties
	define('DBHOST','localhost');
	define('DBUSER','root');
	define('DBPASS','mysql');
	define('DBNAME','waiting_db');

	// make a connection to mysql here
	$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	if(!$conn){
		die( "Sorry! There seems to be a problem connecting to database.");
	};

	// define site path
	define('APP_ROOT','http://localhost/Customer_service_tickets_machine/');

	define('ADMIN','http://localhost/Customer_service_tickets_machine/admin/');

	include('functions.php');
?>