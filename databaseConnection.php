<?php
	$databaserUsername = "root";
	$databasePassword = "root";
	$databaseName = "Be_in_touch";
	$serverName = "localhost";
	
	$con = new mysqli ($serverName, $databaserUsername, $databasePassword, $databaseName);
		
	if ($con->connection_error){
		die ("Connection Error : " .$con->connection_error);
	}
?>
