<?php
	function setConfirmationInvitation ($DB, $urlQuery, $confirmation) {
		$query = 'UPDATE fr_invitations SET invitation_confirmation='.$confirmation.' WHERE invitation_url_query="'.$urlQuery.'"';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
	}
?>