<?php
/*

* @Developed by Dominator!?
*/
class footerController extends Controller {
	public function index() {
		$this->data['title'] = $this->config->title;
		$this->data['description'] = $this->config->description;
		
		return $this->load->view('common/footer', $this->data);
	}
}
?>
