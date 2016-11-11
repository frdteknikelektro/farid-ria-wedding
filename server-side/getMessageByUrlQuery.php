<?php
	function getMessageByUrlQuery ($DB, $urlQuery) {
		$query = 'SELECT * FROM fr_messages WHERE message_invitation_url_query="'.$urlQuery.'"';
		$result = $DB->query($query);
		if(mysqli_errno($DB)) {
			die(mysqli_error($DB));
		}

		$message = $result->fetch_assoc();

		return $message;
	}
?>