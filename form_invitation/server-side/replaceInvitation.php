<?php
	function replaceInvitation ($DB, $urlQuery, $category, $name, $writtenName, $place, $confirmation) {
		$query = 'REPLACE INTO fr_invitations (invitation_url_query, invitation_category, invitation_name, invitation_written_name, invitation_place, invitation_confirmation) '.
				 'VALUES ("'.$urlQuery.'", "'.$category.'", "'.$name.'", "'.$writtenName.'", "'.$place.'", "'.$confirmation.'")';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
	}
?>