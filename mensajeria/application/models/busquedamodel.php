<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
	_e lo que pertenece a una empresa en específico  
	_r registrados ==  todo lo que ya ha pasado  
	_g global 
*/
class busquedamodel extends CI_Model {
function __construct(){
    parent::__construct();        
    $this->load->database();
}
function create_tmp_escenarios_eventos($_num ,  $flag  ){
	
	$query_drop =  "DROP TABLE  IF exists tmp_prox_escenarios_$_num";		
	$db_response = $this->db->query($query_drop);
	
	if ($flag == 0 ){

		$query_create = "CREATE TABLE tmp_prox_escenarios_$_num AS
						select e.idevento,		
						e.nombre_evento,	
						e.status,	
						e.edicion,	
						e.descripcion_evento,    	
						e.idempresa,	
						e.idusuario,
						e.fecha_inicio,	
						e.fecha_termino,	
						e.ubicacion,	
						e.url_social,	
						e.url_social_youtube,	
						e.eslogan,
						e.tipo,
						e.reservacion_tel , 
						e.reservacion_mail ,
						sum(case when es.idescenario is not null then 1 else 0 end) escenarios from
						tmp_prox_eventos_$_num  e
						left outer join
						escenario es ON e.idevento = es.idevento    												
						group by e.idevento";
		
		$db_response =  $this->db->query($query_create);					

	}
	return $db_response; 
}
/**/
function get_t_e($f){

	if ($f == 0) {
		$sql_tiempo_e =  " DATE(e.fecha_inicio) 
						BETWEEN DATE(CURRENT_DATE()) 
						AND 
						DATE_ADD(CURRENT_DATE() ,  INTERVAL 3 MONTH ) ";
		return $sql_tiempo_e;						
	}else{
		$sql_tiempo_e =  " DATE(e.fecha_inicio) 
						BETWEEN DATE_ADD(CURRENT_DATE() ,  INTERVAL 2 MONTH )
						AND 
						DATE(CURRENT_DATE()) ";
		return $sql_tiempo_e;						
	}
}
/**/
function get_t($f){
	if ($f == 0) {
		$sql_tiempo = " DATE(fecha_registro) 
						BETWEEN DATE_ADD(CURRENT_DATE() ,  INTERVAL  -2 MONTH ) 
						AND 
						DATE(CURRENT_DATE()) ";
		return $sql_tiempo;
	}else{
		
		$sql_tiempo = " DATE(fecha_registro) 
						BETWEEN DATE_ADD(CURRENT_DATE() ,  INTERVAL  -2 MONTH ) 
						AND 
						DATE(CURRENT_DATE()) ";
		return $sql_tiempo;

	}
	
}
/**/
function get_t_a($f){
	if ($f == 0) {
		$sql_tiempo_a = " DATE(ea.fecha_registro ) BETWEEN DATE_ADD(CURRENT_DATE() , INTERVAL - 2  MONTH ) 
								 AND DATE(CURRENT_DATE()) ";
		return $sql_tiempo_a;							 
	}else{
		$sql_tiempo_a = " DATE(ea.fecha_registro ) BETWEEN DATE_ADD(CURRENT_DATE() , INTERVAL - 2  MONTH ) 
								 AND DATE(CURRENT_DATE()) ";
		return $sql_tiempo_a;							 
	}
	
}
/**/
function get_t_p($f){
	
	if ($f == 0) {
		$sql_tiempo_p = " DATE(p.fecha_registro) BETWEEN DATE_ADD(CURRENT_DATE() , INTERVAL - 2  MONTH ) 
						AND DATE(CURRENT_DATE()) ";							 
		return 	$sql_tiempo_p;
	}else{
		$sql_tiempo_p = " DATE(p.fecha_registro) BETWEEN DATE_ADD(CURRENT_DATE() , INTERVAL - 2  MONTH ) 
						AND DATE(CURRENT_DATE()) ";							 
		return 	$sql_tiempo_p;
	}						
	
}
/**/
function get_t_ac($f){

	if ($f == 0) {
		$sql_tiempo_ac =  " DATE(a.fecha_registro) BETWEEN DATE_ADD(CURRENT_DATE() , INTERVAL - 2  MONTH ) 
						AND DATE(CURRENT_DATE()) ";					
		return $sql_tiempo_ac;
	}else{
		$sql_tiempo_ac =  " DATE(a.fecha_registro) BETWEEN DATE_ADD(CURRENT_DATE() , INTERVAL - 2  MONTH ) 
						AND DATE(CURRENT_DATE()) ";					
		return $sql_tiempo_ac;

	}
	
}
/**/
function q_eventos($param){

	$_num =  get_random(); 
	$f = $param["f"];
	$sql_tiempo_e = $this->get_t_e($f);
	$sql_tiempo =  $this->get_t($f);	
	$sql_tiempo_a = $this->get_t_a($f);
	$sql_tiempo_p = $this->get_t_p($f);
	$sql_tiempo_ac =  $this->get_t_ac($f);

	$this->create_tmp_eventos_prox_m($_num , 0 , $sql_tiempo_e);
	$this->create_tmp_keyword_eventos($_num , 0 );	
	$this->insert_into_keyword($_num ,  $param ,  $sql_tiempo);
	$this->create_tmp_eventos_prox($_num , 0 );
	$this->create_tmp_escenarios_eventos($_num ,  0 );
	$this->create_tmp_empresa($_num ,  0 );
	$this->create_tmp_artistas_eventos($_num , 0  , $sql_tiempo_a);
	$this->create_tmp_puntos_venta_evento($_num , 0  , $sql_tiempo_p);
	$this->create_tmp_accesos_eventos($_num ,  0 ,  $sql_tiempo_ac);

	
	
					$query_get =" 
					select 
					emp.nombreempresa,
					e.escenarios,
					e.idevento ,
					e.nombre_evento , 
					e.descripcion_evento , 
					e.fecha_inicio, 
					e.fecha_termino, 
					e.descripcion_evento,
					e.eslogan,
					e.idempresa,
					e.edicion, 
					e.tipo,
					e.reservacion_tel  ,
					e.reservacion_mail ,
					ea.artistas , 
					epv.evento_punto_venta, 	
					ra.accesos 					
					from tmp_prox_escenarios_$_num e
					left outer join  tmp_prox_emp_$_num emp 
					on e.idempresa =  emp.idempresa
					left outer join  tmp_prox_artistas_$_num ea 
					on e.idevento = ea.id_evento 					
					left outer join tmp_prox_puntos_venta_g_$_num epv 
					on  e.idevento =  epv.idevento										
					left outer join tmp_accesos_$_num ra 					
					on e.idevento =  ra.idevento										
					GROUP BY e.idevento
					ORDER BY e.fecha_inicio asc ";
					
					
					$result = $this->db->query($query_get);
					$events =  $result->result_array();
					$data_complete["num_eventos"] = count($events);
					$data_complete["eventos"] = $events;


					
					$this->create_tmp_eventos_prox_m($_num , 1 , $sql_tiempo_e);
					$this->create_tmp_keyword_eventos($_num , 1 );		
					$this->create_tmp_eventos_prox($_num , 1 );
					$this->create_tmp_escenarios_eventos($_num ,  1  );
					$this->create_tmp_empresa($_num ,  1);
					$this->create_tmp_artistas_eventos($_num , 1 ,  $sql_tiempo_a);
					$this->create_tmp_puntos_venta_evento($_num , 1 , $sql_tiempo_p );
					$this->create_tmp_accesos_eventos($_num ,  1 , $sql_tiempo_ac);
					
				return $data_complete;				
	
}

function create_tmp_accesos_eventos($_num ,  $flag ,  $sql_tiempo_ac){

	$query_drop =  "DROP TABLE IF exists tmp_accesos_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0 ){

		$query_create= "
		CREATE TABLE tmp_accesos_$_num AS 
		SELECT e.idevento ,  count(*)accesos  FROM tmp_prox_eventos_$_num  e 
		INNER JOIN acceso a ON e.idevento =  a.idevento 
		WHERE $sql_tiempo_ac
		GROUP BY e.idevento"; 
		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 

}
/**/
function create_tmp_empresa($_num ,  $flag ){

	$query_drop = "DROP TABLE IF exists tmp_prox_emp_$_num";
	$db_response =  $this->db->query($query_drop);
	if ($flag ==  0 ){
		
		$query_create = "CREATE TABLE tmp_prox_emp_$_num AS  
						SELECT  
						e.idempresa ,  em.nombreempresa 
						FROM empresa em INNER JOIN tmp_prox_eventos_$_num e ON em.idempresa =  e.idempresa GROUP BY e.idevento";
		$db_response = $this->db->query($query_create); 			
	}
	return $db_response;



}
/**/
function create_tmp_artistas_eventos($_num ,  $flag ,  $sql_tiempo ){

	$query_drop =  "DROP TABLE IF exists tmp_prox_artistas_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0  ) {
		$query_create = "
			CREATE TABLE tmp_prox_artistas_$_num AS  
			SELECT 
			ea.id_evento  ,  count(*)artistas 
			FROM tmp_prox_eventos_$_num e 
			INNER JOIN evento_artista ea  ON  e.idevento =  ea.id_evento 
			WHERE $sql_tiempo
			GROUP BY id_evento "; 	

		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 

}
/**/
function create_tmp_puntos_venta_evento($_num , $flag ,  $sql_tiempo_p){

	$query_drop =  "DROP TABLE IF exists tmp_prox_puntos_venta_g_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 
	if ($flag ==  0  ){

		$query_create = "
						CREATE TABLE  tmp_prox_puntos_venta_g_$_num AS  
						SELECT e.idevento  , count(*)evento_punto_venta from tmp_prox_eventos_$_num e 
						INNER JOIN evento_punto_venta p 
						ON e.idevento =  p.idevento 
						WHERE  $sql_tiempo_p 
						GROUP BY  e.idevento
						";
		$db_response  =  $this->db->query($query_create);				
	}
	return $db_response; 
}

/**/

/**/
function insert_into_keyword( $_num , $param , $sql_tiempo ){

	$q = $param["q"];
	


				$sql = "SELECT id_evento , genero  FROM evento_genero WHERE  $sql_tiempo AND genero LIKE   '%$q%' 
						GROUP BY id_evento 
						UNION 
						SELECT id_evento , artista  FROM  evento_artista WHERE $sql_tiempo AND artista 
						LIKE   '$q%' GROUP BY id_evento 
						UNION
						SELECT idevento , precio 
						FROM  acceso 
						WHERE  $sql_tiempo AND  precio  LIKE   '%$q%'  GROUP BY idevento 
						UNION 
						SELECT idevento , nombre_evento  FROM tmp_prox_eventos_origen_$_num WHERE
						nombre_evento LIKE '%$q%' 
						OR  ubicacion LIKE '%$q%' 
						OR formatted_address LIKE '%$q%'  
						OR edicion  LIKE '%$q%' 
						OR fecha_inicio  LIKE '%$q%' 
						OR fecha_termino  LIKE '%$q%' 
						OR eslogan LIKE '%$q%'  
						OR reservacion_tel LIKE '%$q%'  					
						"; 	

	$query_insert =  "INSERT INTO evento_palabra_clave_$_num(id_evento , palabra_clave  ) ". $sql;						
	return $this->db->query($query_insert);
	

}

/**/
function create_tmp_eventos_prox_m($_num , $flag , $sql_tiempo ){

	$query_drop = "DROP TABLE IF exists tmp_prox_eventos_origen_$_num";
	$db_response= $this->db->query($query_drop);

	if ($flag == 0 ){
		
		$query_create = "CREATE TABLE tmp_prox_eventos_origen_$_num AS 
						SELECT 
						 		e.idevento,		
								e.nombre_evento,	
								e.status,	
								e.edicion,	
								e.descripcion_evento,    	
								e.idempresa,	
								e.idusuario,
								e.fecha_inicio,	
								e.fecha_termino,	
								e.ubicacion,	
								e.url_social,	
								e.url_social_youtube,	
								e.eslogan,
								e.tipo ,
								e.reservacion_tel ,
								e.reservacion_mail, 
								e.formatted_address
						FROM  
						evento e
						WHERE 
						$sql_tiempo GROUP BY e.idevento"; 
			$db_response = $this->db->query($query_create);
	}

	return $db_response;

}
/**/
function create_tmp_eventos_prox($_num , $flag ){

	$query_drop = "DROP TABLE IF exists tmp_prox_eventos_$_num";
	$db_response =  $this->db->query($query_drop); 
	
	if ($flag == 0 ){
		
		$query_create = "CREATE TABLE tmp_prox_eventos_$_num  
		AS  
		SELECT e.* FROM  tmp_prox_eventos_origen_$_num e
		INNER JOIN evento_palabra_clave_$_num  p ON e.idevento = p.id_evento GROUP BY e.idevento";
		$db_response =  $this->db->query($query_create);
	}
	return $db_response;

}
/**/
function create_tmp_keyword_eventos($_num , $flag ){

	$query_drop = "DROP TABLE  IF exists evento_palabra_clave_$_num"; 
	$db_response =  $this->db->query($query_drop);
	
	if ($flag == 0 ){
	
		$query_create = "CREATE TABLE evento_palabra_clave_$_num  
						AS 
						SELECT * FROM event_palabra_clave_default";

		$db_response  =  $this->db->query($query_create);
	
	}	
	return $db_response;
}
/**/
/**/
function create_tmp_keyword($_num ,  $flag  , $sql ){
	
	$query_drop = "DROP TABLE  IF exists evento_palabra_clave_$_num"; 
	$this->db->query($query_drop);

	$result = ''; 
	if ($flag == 0 ){
	
		$query_create = "CREATE TABLE evento_palabra_clave_$_num  
						AS 
						SELECT 
						* 
						FROM event_palabra_clave_default";
		$result  =  $this->db->query($query_create);

		$sql_key = "INSERT INTO evento_palabra_clave_$_num(id_evento , palabra_clave )" . $sql;
		$this->db->query($sql_key);

	}
	
	return $result;

}


/**/
function construye_info_eventos( $flag ,  $extra = '' ,  $extra2 = '' ,  $_num = 0 ){

	if($_num == 0 ) {
       $_num = mt_rand();       
    }      					
    
    $query_temporal_tables =  "call repo_eventos_public($flag , $_num ,  '".$extra."' , '". $extra2 ."' );"; 

	$this->db->query($query_temporal_tables);	
	return $_num;
}

/**/
function carga_img($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
}
/*********************************************************/

function eventos_e($param){	

	$_num =  get_random(); 
	$data_complete["num_eventos"] =  $this->create_tmp_registrados_e( $_num,  0 , $param["id_empresa"] );	
	$f_enid =0; 
	if ($data_complete["num_eventos"] > 0 ) {
		$f_enid = $this->crea_temporales($_num ,  0);	
			
				$query_get ="select 
					e.escenarios,
					e.idevento ,
					e.nombre_evento , 
					e.descripcion_evento , 
					e.fecha_inicio, 
					e.fecha_termino, 
					e.descripcion_evento,
					e.eslogan,
					e.edicion, 
					e.tipo,
					e.reservacion_tel  ,
					e.reservacion_mail ,
					ea.artistas , 
					epv.evento_punto_venta, 	
					ra.accesos 					
					from repo_eventos_escenarios_$_num e
					left outer join  repo_escenarios_artistas_$_num ea 
					on e.idevento = ea.id_evento 
					left outer join repo_evento_puntos_venta_$_num epv 
					on  e.idevento =  epv.idevento					
					left outer join reporte_evento_accesos_$_num ra 
					on e.idevento =  ra.idevento
					group by e.idevento
					ORDER by e.fecha_inicio desc";

				$result = $this->db->query($query_get);
				$data_complete["eventos"]  =   $result ->result_array();      
				$data_complete["sql"] =  $query_get;
			
			

			
			
		$this->crea_temporales($_num ,  1);
	}
	$this->create_tmp_registrados_e( $_num,  1 , $param["id_empresa"]);
	
	return $data_complete;
	
}
/**/
function crea_temporales($_num ,  $flag){

	$f_escenarios =  $this->create_tmp_escenarios($_num ,  $flag ); 
	$f_artista =  $this->create_tmp_artistas($_num ,  $flag ); 
	$f_punto_venta =  $this->create_tmp_puntos_venta($_num ,  $flag ); 
	$f_accesos = $this->create_tmp_accesos($_num ,  $flag ); 
	return $f_accesos;
}
/*simula procedimiento almacenado */
function create_tmp_registrados_e($random , $flag ,  $id_empresa ){
	/*Eliminamos antes de crear */
	$query_drop =  "DROP  TABLE  IF exists tmp_evento_r_e_".$random;

	$this->db->query($query_drop);
	$db_response = 0; 
	/*--*/
	if ($flag == 0 ) {		

		$query_create =  "CREATE TABLE 
						  tmp_evento_r_e_".$random ." AS  
						  SELECT e.idevento,		
								e.nombre_evento,	
								e.status,	
								e.edicion,	
								e.descripcion_evento,    	
								e.idempresa,	
								e.idusuario,
								e.fecha_inicio,	
								e.fecha_termino,	
								e.ubicacion,	
								e.url_social,	
								e.url_social_youtube,	
								e.eslogan,
								e.tipo ,
								e.reservacion_tel ,
								e.reservacion_mail
								FROM evento e
								WHERE idempresa = '$id_empresa' ";
		
		$this->db->query($query_create);					  				
		



		/*ahora la consulto para saber cuando eventos hay */
			$query_get =  "SELECT COUNT(*)num_eventos FROM tmp_evento_r_e_".$random;
			$result =  $this->db->query($query_get);
			$db_response =  $result->result_array()[0]["num_eventos"];

	}
	return $db_response;
}
/**/
function create_tmp_escenarios($_num ,  $flag ){
	
	
	$query_drop =  "DROP  TABLE  IF exists repo_eventos_escenarios_$_num";		
	$db_response =  $this->db->query($query_drop);	
	if ($flag == 0 ){

		$query_create = "CREATE TABLE  repo_eventos_escenarios_$_num AS
						select e.idevento,		
						e.nombre_evento,	
						e.status,	
						e.edicion,	
						e.descripcion_evento,    	
						e.idempresa,	
						e.idusuario,
						e.fecha_inicio,	
						e.fecha_termino,	
						e.ubicacion,	
						e.url_social,	
						e.url_social_youtube,	
						e.eslogan,
						e.tipo,
						e.reservacion_tel ,   
						e.reservacion_mail ,  
						sum(case when es.idescenario is not null then 1 else 0 end) escenarios from
						tmp_evento_r_e_$_num  e
						left outer join
						escenario es ON e.idevento = es.idevento            
						group by e.idevento";
		
		$db_response =  $this->db->query($query_create);					

	}
	return $db_response; 
}
/**/
function create_tmp_artistas($_num ,  $flag ){

	$query_drop =  "DROP TABLE IF exists repo_escenarios_artistas_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0  ) {
		$query_create = "
			CREATE TABLE repo_escenarios_artistas_$_num AS  
			SELECT 
			ea.id_evento  ,  count(*)artistas 
			FROM tmp_evento_r_e_$_num e 
			INNER JOIN evento_artista ea  ON  e.idevento =  ea.id_evento GROUP BY id_evento"; 	

		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 	
}
/**/
function create_tmp_puntos_venta($_num ,  $flag ){
	
	$query_drop =  "DROP TABLE IF exists repo_evento_puntos_venta_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0  ){

		$query_create = "
						CREATE TABLE  repo_evento_puntos_venta_$_num AS  
						SELECT e.idevento  , count(*)evento_punto_venta from tmp_evento_r_e_$_num  e 
						INNER JOIN evento_punto_venta p 
						ON e.idevento =  p.idevento ";
		$db_response  =  $this->db->query($query_create);				
	}
	return $db_response; 
}
/**/
function create_tmp_accesos($_num ,  $flag){

	$query_drop =  "DROP TABLE IF exists reporte_evento_accesos_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0 ){

		$query_create= "
		CREATE TABLE reporte_evento_accesos_$_num AS 
		SELECT e.idevento ,  count(*)accesos  FROM tmp_evento_r_e_$_num e 
		INNER JOIN acceso a ON e.idevento =  a.idevento GROUP BY e.idevento"; 
		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 

}
/**/
function get_eventos_enid_user($param){

	$_num =  get_random(); 
	$data_complete["num_eventos"] =  $this->create_tmp_registrados_g( $_num,  0  ,  $param );
	$f_enid =0; 
	if ($data_complete["num_eventos"] > 0 ) {
		$f_enid = $this->crea_temporales_g($_num ,  0);	
			$_num_img  =  $this->carga_img( 1 , 0 ); 		


				$query_get ="
					select 
					emp.nombreempresa,
					e.escenarios,
					e.idevento ,
					e.nombre_evento , 
					e.descripcion_evento , 
					e.fecha_inicio, 
					e.fecha_termino, 
					e.descripcion_evento,
					e.eslogan,
					e.idempresa,
					e.edicion, 
					e.tipo,
					e.reservacion_tel  ,
					e.reservacion_mail ,
					ea.artistas , 
					epv.evento_punto_venta, 	
					ra.accesos 
					
					from tmp_prox_escenarios_$_num e
					left outer join  empresa emp 
					on e.idempresa =  emp.idempresa
					left outer join  tmp_prox_artistas_$_num ea 
					on e.idevento = ea.id_evento 					
					left outer join tmp_prox_puntos_venta_g_$_num epv 
					on  e.idevento =  epv.idevento										
					left outer join tmp_accesos_$_num ra 					
					on e.idevento =  ra.idevento										
					group by e.idevento
					ORDER by e.idevento desc
				";
				$result = $this->db->query($query_get);
				$data_complete["eventos"]  =   $result ->result_array();      
			
			$this->carga_img( 1 , 1 , $_num_img); 	
		$this->crea_temporales_g($_num ,  1);
	}
	$this->create_tmp_registrados_g( $_num,  1  , $param);
	return $data_complete;

}
/*Termina modelo */
}