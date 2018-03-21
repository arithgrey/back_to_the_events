<?php defined('BASEPATH') OR exit('No direct script access allowed');
class recuperapasswordmodel extends CI_Model {
function __construct(){
    parent::__construct();        
    $this->load->database();

}
function recuperarPassword($email){

	$query_get = "SELECT * FROM usuario WHERE email = '".$email."' ";   
    $result = $this->db->query( $query_get );     
    return $result ->num_rows();
}
/**/
function actualizaPassword($email,$cadena){
	$query_update = "UPDATE usuario SET password = '".$cadena."' WHERE email = '".$email."' limit 1";
	$actualizacion = $this->db->query($query_update);
	return $actualizacion;
}
}/*Termina la función */