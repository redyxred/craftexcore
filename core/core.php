<?php 
	class Core {

		public static function getJsMessage ($result, $message) {
			return json_encode(array('success' => $result, 'message' => $message));
		}
	}
?>