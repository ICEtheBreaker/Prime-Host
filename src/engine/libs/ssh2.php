<?php
/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/
class ssh2Library {
	public function connect($hostname, $username, $password) {
		if($link = ssh2_connect($hostname, 22)) {
			if(ssh2_auth_password($link, $username, $password)) {
				return $link;
			}
		}
		exit("Ошибка: Не удалось соединиться с сервером!");
	}
		
	function execute($link, $cmd) {
		$stream = ssh2_exec($link, $cmd);
		stream_set_blocking($stream, true);
		$output = "";
		while($get = fgets($stream)) {
			$output .= $get;
		}
		fclose($stream);
		return $output;
	}
	
	public function disconnect($link) {
		ssh2_exec($link, "exit");
	}
}
?>
