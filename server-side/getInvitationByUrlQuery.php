<?php
	function getInvitationByUrlQuery ($DB, $urlQuery) {
		$query = 'SELECT * FROM fr_invitations WHERE invitation_url_query="'.$urlQuery.'"';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}

		$invitation = $result->fetch_assoc();

		return $invitation;
	}
?>