<?php defined('BASEPATH') OR exit('No direct script access allowed');
class activitymodel extends CI_Model {	
function __construct(){

        parent::__construct();        
        $this->load->database();
}


function get_actividades_evento_admin($id_empresa , $id_usuario ){
	
	$query_get =  "SELECT DATEDIFF( date(l.fecha_registro) , CURRENT_DATE() )dias , 
					TIMESTAMPDIFF(HOUR, l.fecha_registro  , CURRENT_DATE()) horas ,
					TIMESTAMPDIFF(second , l.fecha_registro  , CURRENT_DATE()) segundos, 
					l.* 
					FROM  log_evento l  WHERE idempresa = ". $id_empresa ." ORDER BY  l.fecha_registro DESC LIMIT 10"; 
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*Termina modelo */
}