<?php
	session_start();
	
	include_once("version.php");
	include_once("server-side/connectToDB.php");
	
	/* Create connection to Databases */
	$DB = connectToDB('localhost', $DBUsername, $DBPassword, $DBDatabase);	
	if(mysqli_errno($DB))
		die(mysqli_error($DB));
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Farid & Ria | Form Invitation</title>
	
	<!-- jQuery -->
	<!-- Latest compiled and minified jQuery -->
	<script src="jquery-2.1.4.min.js?<?php echo $version ?>"></script>
	
	<!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css?<?php echo $version ?>">
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css?<?php echo $version ?>">
	<!-- Latest compiled and minified JavaScript -->
	<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js?<?php echo $version ?>"></script>
	
	<!-- Custom CSS -->
	<link rel="stylesheet" href="index.css?v=<?php echo $version ?>">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="section.css?v=<?php echo $version ?>">
	
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="indexJS.js?<?php echo $version ?>"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="sectionJS.js?<?php echo $version ?>"></script>
</head>
<body onload="onLoadBody()">
	<?php include("section.php") ?>
</body>
</html>