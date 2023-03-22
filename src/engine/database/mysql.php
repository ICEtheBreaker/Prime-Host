<?php
/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/
final class mysqlDriver {
	private $link;
	private $count = 0;
	public function __construct($hostname, $username, $password, $database) {
		if (!$this->link = @mysqli_connect($hostname, $username, $password)) {
	  		exit('Ошибка: Не удалось соединиться с сервером базы данных!');
	  	}

		if (!mysqli_select_db($this->link, $database)) {
	  		exit('Ошибка: Не удалось соединиться с базой ' . $database);
		}
		
		mysqli_query($this->link, "SET NAMES 'utf8'");
		mysqli_query($this->link, "SET CHARACTER SET utf8");
		mysqli_query($this->link, "SET CHARACTER_SET_CONNECTION=utf8");
		mysqli_query($this->link, "SET SQL_MODE = ''");

		mysqli_set_charset($this->link, 'utf8');
  	}
		
  	public function query($sql) {
  		// var_dump($this->link);
  		// в этой хуйне вся дрочь надо фиксить
		// $resource = mysqli_query($this->link, $sql);

		// var_dump($resource->num_rows);
		
		$this->count++;
		
		if ($resource = mysqli_query($this->link, $sql)) {
			// var_dump('ok1');
			if (is_resource($resource)) {
				var_dump('ok2');
				$i = 0;
				$data = [];
				
				while ($result = mysqli_fetch_assoc($resource)) {
					array_push($data, $result);
				}
				
				mysqli_free_result($resource);
				
				$query = new stdClass;
				$query["row"] = isset($data[0]) ? $data[0] : [];
				$query["rows"] = $data;
				$query["num_rows"] = $i;

				var_dump($query["num_rows"]);

				unset($data);

				return $query;	
			} else {
				return 1;
			}
		} else {
			exit('Ошибка: ' . mysqli_error($this->link) . '<br>Номер ошибки: ' . mysqli_errno($this->link) . '<br/>' . $sql);
		}
  	}
	
	public function escape($value) {
		return mysqli_real_escape_string($this->link, $value);
	}
	
  	public function countAffected() {
		return mysqli_affected_rows($this->link);
  	}

  	public function getLastId() {
		return mysqli_insert_id($this->link);
  	}	
	
  	public function getCount() {
		return $this->count;
  	}
	
	public function __destruct() {
		mysqli_close($this->link);
	}
}
?>
