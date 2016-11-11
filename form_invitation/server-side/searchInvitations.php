<?php
	function searchInvitations($DB, $urlQuery, $category, $name, $writtenName, $place, $confirmation) {
		$query = 'SELECT * FROM fr_invitations WHERE '.
				 'invitation_url_query ="'.$urlQuery.'" OR ('.
				 'invitation_category LIKE "%'.$category.'%" AND '.
				 'invitation_name LIKE "%'.$name.'%" AND '.
				 'invitation_written_name LIKE "%'.$writtenName.'%" AND '.
				 'invitation_place LIKE "%'.$place.'%" AND '.
				 'invitation_confirmation LIKE "%'.$confirmation.'%" )'.
				 'ORDER BY invitation_category, invitation_name';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
		
		$invitations = array();
		for($i = 0; $i < $result->num_rows; $i++)
			$invitations[] = $result->fetch_assoc();
		
		return $invitations;
	}
?>