<?php
/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/
abstract class Model {
	private $registry;
	
	public function __construct($registry) {
		$this->registry = $registry;
	}
	
	public function __get($key) {
		return $this->registry->$key;
	}
	
	public function __set($key, $value) {
		$this->registry->$key = $value;
	}
}
?>
