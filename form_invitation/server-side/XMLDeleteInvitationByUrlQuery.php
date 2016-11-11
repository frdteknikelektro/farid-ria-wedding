<?php
	include_once("connectToDB.php");
	include_once("deleteInvitationByUrlQuery.php");
	
	$DB = connectToDB('localhost', $DBUsername, $DBPassword, $DBDatabase);
	if(mysqli_errno($DB))
		die(mysqli_error($DB));
	
	deleteInvitationByUrlQuery($DB, $_POST['url_query']);
?>