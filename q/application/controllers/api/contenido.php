<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Contenido extends REST_Controller{	
	function __construct(){
	  parent::__construct();       
        $this->load->model("templmodel");
        $this->load->library('sessionclass');    	  
	}   
	/*      
	function tipo_cliente_GET(){
		
		$this->response("okoaskdokasdaksd m");
	}
	*/		
	/*Termina rest*/
}