<?php
	include_once("connectToDB.php");
	include_once("getMessageByUrlQuery.php");
	include_once("replaceContentMessage.php");
	
	$DB = connectToDB('localhost', $DBUsername, $DBPassword, $DBDatabase);
	if(mysqli_errno($DB))
		die(mysqli_error($DB));
	
	replaceContentMessage($DB, $_POST['url_query'], $_POST ['content']);
	$message = getMessageByUrlQuery($DB, $_POST['url_query']);
	
	header('Content-type: text/xml');
	
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	$xml = $xml.'<messages>'."\n";
	$xml = $xml.'<message>'."\n";
	$xml = $xml.'<message_invitation_url_query>';
	$xml = $xml.$message['message_invitation_url_query'];
	$xml = $xml.'</message_invitation_url_query>'."\n";
	$xml = $xml.'<message_content>';
	$xml = $xml.$message['message_content'];
	$xml = $xml.'</message_content>'."\n";
	$xml = $xml.'</message>'."\n";
	$xml = $xml.'</messages>';

	echo $xml;
	
/* 	
	Structure of XML Replace Content Message
	
	messages
		message
			message_invitation_url_query
			message_content
*/	
?>