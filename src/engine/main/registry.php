<?php
/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/
class Registry {
	private $data = array();
	
	public function __set($key, $val){
		$this->data[$key] = $val;
	}
	
	public function __get($key){
		if(isset($this->data[$key])){
			return $this->data[$key];
		}
		return false;
	}
}
?>
