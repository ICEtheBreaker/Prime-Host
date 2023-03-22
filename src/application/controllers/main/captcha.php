<?php
/*
* @Слито RAG20
*/
class captchaController extends Controller {
	public function index() {
		$this->load->library('captcha');
		
		$captchaLib = new captchaLibrary();
		
		$this->session->data['captcha'] = $captchaLib->getCode();
		$captchaLib->showImage();
		return null;
	}
}
?>