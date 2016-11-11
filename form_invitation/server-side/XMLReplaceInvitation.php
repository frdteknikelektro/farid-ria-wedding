<?php
	include_once("connectToDB.php");
	include_once("replaceInvitation.php");
	include_once("getInvitationByUrlQuery.php");
	
	$DB = connectToDB('localhost', $DBUsername, $DBPassword, $DBDatabase);
	if(mysqli_errno($DB))
		die(mysqli_error($DB));
	
	replaceInvitation($DB, $_POST['url_query'], $_POST ['category'], $_POST ['name'], $_POST ['written_name'], $_POST ['place'], $_POST ['confirmation']);
	$invitation = getInvitationByUrlQuery($DB, $_POST['url_query']);
	
	header('Content-type: text/xml');
	
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	$xml = $xml.'<invitations>'."\n";
	$xml = $xml.'<invitation>'."\n";
	$xml = $xml.'<invitation_url_query>';
	$xml = $xml.$invitation['invitation_url_query'];
	$xml = $xml.'</invitation_url_query>'."\n";
	$xml = $xml.'<invitation_category>';
	$xml = $xml.$invitation['invitation_category'];
	$xml = $xml.'</invitation_category>'."\n";
	$xml = $xml.'<invitation_name>';
	$xml = $xml.$invitation['invitation_name'];
	$xml = $xml.'</invitation_name>'."\n";
	$xml = $xml.'<invitation_written_name>';
	$xml = $xml.$invitation['invitation_written_name'];
	$xml = $xml.'</invitation_written_name>'."\n";
	$xml = $xml.'<invitation_place>';
	$xml = $xml.$invitation['invitation_place'];
	$xml = $xml.'</invitation_place>'."\n";
	$xml = $xml.'<invitation_confirmation>';
	$xml = $xml.$invitation['invitation_confirmation'];
	$xml = $xml.'</invitation_confirmation>'."\n";
	$xml = $xml.'</invitation>'."\n";
	$xml = $xml.'</invitations>';

	echo $xml;
	
/* 	
	Structure of XML Set Confirmation Invitation
	
	invitations
		invitation
			invitation_url_query
			invitation_category
			invitation_name
			invitation_written_name
			invitation_place
			invitation_confirmation
*/	
?>