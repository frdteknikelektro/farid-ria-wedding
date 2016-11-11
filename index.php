<?php
	session_start();

	include_once("version.php");
	include_once("server-side/connectToDB.php");
	include_once("server-side/getInvitationByUrlQuery.php");

	/* Create connection to Databases */
	$DB = connectToDB('localhost', $DBUsername, $DBPassword, $DBDatabase);
	if(mysqli_errno($DB))
		die(mysqli_error($DB));

	/* Get URL Query */
	$urlQuery = $_SERVER['QUERY_STRING'];

	$isInvitation = false;
	if($urlQuery != '') {
		/* Get Invitations */
		$invitation = getInvitationByUrlQuery($DB, $urlQuery);
		if($invitation != null)
			$isInvitation = true;
	}

	$isOperaMini = false;
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') > -1)
		$isOperaMini = true;
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Farid & Ria</title>

	<!-- jQuery -->
	<!-- Latest compiled and minified jQuery -->
	<script src="jquery-2.1.4.min.js?<?php echo $version ?>"></script>

	<!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" media="all" href="bootstrap-3.3.5-dist/css/bootstrap.min.css?<?php echo $version ?>">
	<!-- Optional theme -->
	<link rel="stylesheet" media="all" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css?<?php echo $version ?>">
	<!-- Latest compiled and minified JavaScript -->
	<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js?<?php echo $version ?>"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="index.css?v=<?php echo $version ?>">
	<?php if(!$isOperaMini) { ?>
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="header.css?v=<?php echo $version ?>">
	<?php } else { ?>
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="header-opera.css?v=<?php echo $version ?>">
	<?php } ?>
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="section-bride.css?v=<?php echo $version ?>">
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="section-opening.css?v=<?php echo $version ?>">
	<?php if($isInvitation) { ?>
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="section-invite.css?v=<?php echo $version ?>">
	<?php } ?>
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="section-confirmation.css?v=<?php echo $version ?>">
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="section-event.css?v=<?php echo $version ?>">
	<!-- Custom CSS -->
	<link rel="stylesheet" media="all" href="section-bonus.css?v=<?php echo $version ?>">

	<!-- Custom JavaScript -->
	<script type="text/javascript" src="indexJS.js?<?php echo $version ?>"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="headerJS.js?<?php echo $version ?>"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="section-brideJS.js?<?php echo $version ?>"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="section-openingJS.js?<?php echo $version ?>"></script>
	<?php if($isInvitation) { ?>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="section-inviteJS.js?<?php echo $version ?>"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="section-confirmationJS.js?<?php echo $version ?>"></script>
	<?php } ?>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="section-eventJS.js?<?php echo $version ?>"></script>
	<!-- Custom JavaScript -->
	<script type="text/javascript" src="section-bonusJS.js?<?php echo $version ?>"></script>
</head>
<body onload="onLoadBody()">
	<?php include("header.php") ?>
	<?php include("section-invite.php") ?>
	<?php include("section-bride.php") ?>
	<?php include("section-opening.php") ?>
	<?php include("section-event.php") ?>
	<?php include("section-confirmation.php") ?>
	<?php include("section-bonus.php") ?>
</body>
</html>
