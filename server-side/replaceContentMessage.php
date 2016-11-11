<?php
	function replaceContentMessage ($DB, $urlQuery, $content) {
		$query = 'REPLACE INTO fr_messages (message_invitation_url_query, message_content) VALUES ("'.$urlQuery.'", "'.$content.'")';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}
	}
?>