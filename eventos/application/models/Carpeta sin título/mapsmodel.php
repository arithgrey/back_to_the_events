<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mapsmodel extends CI_Model{
function __construct(){
	parent::__construct();        
    $this->load->database();
}
/**/
function get_registro_user($param){	
	$query_get =  "SELECT SUM(CASE WHEN  formatted_address IS NOT NULL  THEN 1 ELSE 0 END)num , formatted_address ,  place_id, lat , lng   FROM usuario 
					WHERE 
					idusuario = '". $param["identificador"]."' LIMIT 1"; 
	$result =  $this->db->query($query_get);	
	return  $result->result_array();
}
/**/
function get_registro_contacto($param){
	
	$query_get =  "SELECT SUM(CASE WHEN  formatted_address IS NOT NULL  THEN 1 ELSE 0 END)num , formatted_address ,  place_id, lat , lng   FROM contacto 
					WHERE 
					idcontacto = '". $param["identificador"]."' LIMIT 1"; 
	$result =  $this->db->query($query_get);	
	return  $result->result_array();	

}
/**/
function get_registro_evento($param){
	$query_get =  "SELECT SUM(CASE WHEN  formatted_address IS NOT NULL  THEN 1 ELSE 0 END)num , formatted_address ,  place_id, lat , lng   FROM evento 
					WHERE 
					idevento = '". $param["identificador"]."' LIMIT 1"; 
	$result =  $this->db->query($query_get);	
	return  $result->result_array();	
}
/**/
function get_registro_empresa($param){
	$query_get =  "SELECT 
				SUM(CASE WHEN  formatted_address IS NOT NULL  THEN 1 ELSE 0 END)
				num , formatted_address ,  place_id, lat , lng   FROM empresa
					WHERE 
					idempresa = '". $param["identificador"]."' LIMIT 1"; 
	$result =  $this->db->query($query_get);	
	return  $result->result_array();	
}
/**/
function get_registro_pv($param){
	
	$query_get =  "SELECT SUM(CASE WHEN  formatted_address IS NOT NULL  THEN 1 ELSE 0 END)num , formatted_address ,  place_id, lat , lng   FROM punto_venta
					WHERE 
					idpunto_venta = '". $param["identificador"]."' LIMIT 1"; 
	$result =  $this->db->query($query_get);
	
	return  $result->result_array();	
}
/**/
function delete_genero($param){  	
  	$query_delete =  "DELETE FROM  evento_genero  WHERE  id_genero = '".$param["genero"] ."'  and  id_evento = '". $param["evento"]."' LIMIT 1"; 
	$r1 =  $this->db->query($query_delete);	
  	$query_delete =  "DELETE FROM  evento_genero_musical WHERE  idgenero_musical = '".$param["genero"] ."' and  idevento = '". $param["evento"]."' LIMIT 1"; 
	$r2 = $this->db->query($query_delete);  		
	
	if ($r == 1){
		$log_evento =  "Quitó un genero musical del evento ". $param["enid_evento"]." ";
		$this->insert_log(3, $log_evento ,  $param["evento"] ,  $param["id_usuario"] );												
	}
	return $r1;   		
}
/**/
/*Termina modelo */
}