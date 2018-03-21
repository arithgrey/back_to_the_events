<?php
class Mailclass extends CI_Controller{

	public function __construct(){	
		parent::__construct();		
	}
	function prospecto_user(){
		$this->load->view("mail/prospectos");
	}
}