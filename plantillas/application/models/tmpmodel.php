<?php 
class tmpmodel extends CI_Model {	
	function __construct(){

		parent::__construct();        
	    $this->load->database();
	}
	function hola(){
		return  "ok";
	}
/**/
}