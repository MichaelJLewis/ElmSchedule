<?php

    $server 	= "localhost"; 
	$user 		= "root";
	$pass 		= "";
    $database 	= "sys"; 
    
	//make the database connection 
	$mysqli = new mysqli($server, $user, $pass, $database);
    $mysqli->select_db("Schedule");

	if ($mysqli->connect_error) 
		die("Connect Error " . $mysqli->connect_errno . ": " . $mysqli->connect_error);

?>