<?php defined('BASEPATH') OR exit('No direct script access allowed');
class eventos_model_cliente extends CI_Model{
function __construct(){
    parent::__construct();        
    $this->load->database();
}
/**/
function crea_tmp_prox_eventos( $f  , $condicion_extra ,  $_num = 0 ){
	
    if($_num == 0 ){
       $_num = mt_rand();       
    }    
    $query_procedure = "CALL  proximos_eventos(  $_num , $f   ,  '". $condicion_extra  ."' );"; 
    $this->db->query($query_procedure);
    return $_num;

}
/*Pŕoximos eventos de la organización */
function get_proximos($param){
	
	/**/
	$id_empresa =  $param["id_empresa"];
	$id_evento =  $param["id_evento"];	
	
	$_num =  get_random();	
	
	$condicion_extra =  " WHERE 
						idempresa != $id_empresa 
						AND  
						date(e.fecha_inicio) 
						BETWEEN DATE(CURRENT_DATE() ) 
						AND   
						DATE_ADD(CURRENT_DATE() , INTERVAL 2 MONTH) 
						ORDER BY e.fecha_inicio  ASC LIMIT 50"; 
	$this->create_data_otros($_num , 0  , $condicion_extra); 	
	$query_get =  "SELECT *  FROM  tmp_proximos_eventos_$_num"; 
	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();	
	$this->create_data_otros($_num , 1  , $condicion_extra); 


	if (count($data_complete) > 0 ){

		return $data_complete;

	}else{

		$condicion_extra =  " WHERE idempresa != $id_empresa 
								AND DATE_ADD(CURRENT_DATE() , INTERVAL -1 MONTH) 
								AND DATE(e.fecha_inicio) 
								ORDER BY e.fecha_inicio desc
								LIMIT 50"; 

		$this->create_data_otros($_num , 0  , $condicion_extra); 	
		$query_get =  "SELECT *  FROM  tmp_proximos_eventos_$_num"; 
		$result = $this->db->query($query_get);
		$data_complete =  $result->result_array();	
		$this->create_data_otros($_num , 1  , $condicion_extra); 

		return $data_complete;
	}

}
/**/

/**/
function create_data_otros($_num , $flag , $condicion_extra){	


	$query_drop =  "DROP TABLE IF exists tmp_proximos_eventos_$_num";
	$db_response =  $this->db->query($query_drop);
	if ($flag == 0 ){
		
		$query_create = "CREATE TABLE tmp_proximos_eventos_$_num AS SELECT 
            idevento,
            nombre_evento, 
            edicion,
            fecha_inicio,
            fecha_termino,            
            ubicacion,
            eslogan,
            tipo 
            FROM evento e  ".$condicion_extra; 
            $db_response   = $this->db->query($query_create);
	}
	return $db_response;
			
}
/**/
function construye_data_complete_img($_num){
	/**/
	$_num2 =  $this-> base_img_eventos(1  , 0 ); 	
	$query_get =  "select e.* , i.*  from  tmp_proximos_eventos_$_num  e    
	left outer join imagen_evento ie 
	on ie.id_evento =  e.idevento
	left outer join tmp_img_$_num2  i 
	on ie.id_imagen =  i.idimagen  group by  e.idevento"; 
	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();	
	$this-> base_img_eventos(1  , 1  , $_num2 ); 	
	return $data_complete; 
}
/**/
/**/
function get_dias_faltantes($id_evento){

	$query_get ="select fecha_inicio , fecha_termino  from evento where idevento = '". $id_evento ."'  ";	
	$result = $this->db->query($query_get);
	$result_evento  = $result->result_array();		

	if ($result_evento[0]["fecha_inicio"] ==  $result_evento[0]["fecha_termino"] ) {
		$query_get ="select datediff(date(fecha_inicio) , CURRENT_DATE()   ) dias ,  date(fecha_inicio)fecha_inicio ,   date(fecha_termino) fecha_termino from evento where idevento = '". $id_evento ."'  ";	
	}else{
		$query_get ="select datediff(date(fecha_inicio) , CURRENT_DATE()   ) dias ,   date(fecha_inicio)fecha_inicio ,  date(fecha_termino) fecha_termino  from evento where idevento = '". $id_evento ."'  ";			
	}
	$result = $this->db->query($query_get);
	return $result->result_array();		
}
/**/
function base_img_eventos($tipo , $f  , $_num = 0 ){      
    if($_num == 0 ){    	
       $_num = mt_rand();       
    }
	$query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
	$this->db->query($query_procedure);
	return $_num;
}
/*Termina modelo */
}