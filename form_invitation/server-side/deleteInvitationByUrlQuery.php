<?php
	function deleteInvitationByUrlQuery ($DB, $urlQuery) {
		$query = 'DELETE FROM fr_invitations '.
				 'WHERE invitation_url_query="'.$urlQuery.'"';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
	}
?>