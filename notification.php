<?
	function admin_notif ($text) {
		$ini = parse_ini_file('settings.ini');
		$id = explode(",", $ini['chat_id']);
		foreach ($id as $admins_id) {
			$apiToken = $ini['bot_token'];
		  	$bot_data = [
		    	'chat_id' => $admins_id,
		    	'text' => $text
		  	];
  			$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($bot_data));
  			sleep(1);
  		}
	}
?>