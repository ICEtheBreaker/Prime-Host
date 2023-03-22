<?php
/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/
class Session {
	public $data = array();
			
  	public function __construct() {
		if(!session_id()) session_start();
		$this->data = &$_SESSION;
	}
}
?>
