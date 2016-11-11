<?php
	$DBUsername = 'root';
	$DBPassword = 'root';
	$DBDatabase = 'wedding_faridnria';
	
	function connectToDB($server, $username, $password, $DBname) {
		$DB = new mysqli($server, $username, $password, $DBname);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
		
		$query = "SET time_zone = '+07:00'";
		$result = $DB->query($query);	
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
		
		return $DB;
	}
?>