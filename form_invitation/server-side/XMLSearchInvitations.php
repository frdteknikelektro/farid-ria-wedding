<?php
	include_once("connectToDB.php");
	include_once("searchInvitations.php");
	
	$DB = connectToDB('localhost', $DBUsername, $DBPassword, $DBDatabase);
	if(mysqli_errno($DB))
		die(mysqli_error($DB));
	
	$invitations = searchInvitations($DB, $_POST['url_query'], $_POST ['category'], $_POST ['name'], $_POST ['written_name'], $_POST ['place'], $_POST ['confirmation']);
	
	header('Content-type: text/xml');
	
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	$xml = $xml.'<invitations>'."\n";
	for($i=0; $i < count($invitations); $i++) {
		$xml = $xml.'<invitation>'."\n";
		$xml = $xml.'<invitation_url_query>';
		$xml = $xml.$invitations[$i]['invitation_url_query'];
		$xml = $xml.'</invitation_url_query>'."\n";
		$xml = $xml.'<invitation_category>';
		$xml = $xml.$invitations[$i]['invitation_category'];
		$xml = $xml.'</invitation_category>'."\n";
		$xml = $xml.'<invitation_name>';
		$xml = $xml.$invitations[$i]['invitation_name'];
		$xml = $xml.'</invitation_name>'."\n";
		$xml = $xml.'<invitation_written_name>';
		$xml = $xml.$invitations[$i]['invitation_written_name'];
		$xml = $xml.'</invitation_written_name>'."\n";
		$xml = $xml.'<invitation_place>';
		$xml = $xml.$invitations[$i]['invitation_place'];
		$xml = $xml.'</invitation_place>'."\n";
		$xml = $xml.'<invitation_confirmation>';
		$xml = $xml.$invitations[$i]['invitation_confirmation'];
		$xml = $xml.'</invitation_confirmation>'."\n";
		$xml = $xml.'</invitation>'."\n";
	}
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
		...
*/	
?>