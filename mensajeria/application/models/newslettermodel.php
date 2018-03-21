<?php defined('BASEPATH') OR exit('No direct script access allowed');
class newslettermodel extends CI_Model {
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function registrarCorreo($correo, $seccion)
{
	


	$query_get ="SELECT * FROM newsletters  WHERE mail='".$correo."' ";
	$resultselect = $this->db->query($query_get);
	$exist = $resultselect->num_rows();

	if ($exist > 0 ) {
		return true;
	}else{

	  	$consulta = "INSERT INTO newsletters (mail, seccion) VALUES ('".$correo."','".$seccion."') ";
	  	$resultado = $this->db->query($consulta);
	  	return $resultado;
  		
	}

}
}/*Termina la función */