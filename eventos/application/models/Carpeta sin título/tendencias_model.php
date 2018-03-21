<?php defined('BASEPATH') OR exit('No direct script access allowed');
class tendencias_model extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }


function global_eventos($id_empresa){

	  $query_procedure  ='call funnel("'. $id_empresa .'")';
	  $this->db->query($query_procedure );   

	  /**/
	  $query_get ="select  
e.idevento,
e.nombre_evento,
e.fecha_inicio,
e.fecha_termino, e.escenarios
,(e.fecha_termino  - e.fecha_inicio)duracion
, ea.artistas , epv.evento_punto_venta,

acc.accesos , gm.generos_musicales
from r_eventos_escenarios e
left outer join r_escenarios_artistas ea 
on  e.idevento =  ea.idevento
left outer join r_evento_puntos_venta epv 
on e.idevento =  epv.idevento 
left outer join rrte_evento_accesos acc  on 
e.idevento =  acc.idevento
left outer join r_evento_generos_musicales gm  
on e.idevento = gm.idevento order by artistas asc";


	$result = $this->db->query($query_get);
	return $result->result_array();

}
/*Termina modelo */
}