<?php defined('BASEPATH') OR exit('No direct script access allowed');
class escenarioartistamodel extends CI_Model {
function __construct(){
	parent::__construct();        
	$this->load->database();
}/**/
function get_artista($id_artista){
	$query_get ="select *  from artista where idartista =  '".$id_artista ."' limit 1 "; 
	$result  = $this->db->query($query_get); 
	return $result->result_array();
}
/**/
function get_escenario_artista($id_artista , $id_escenario){
	$query_get =  "select * from escenario_artista where idescenario= '". $id_escenario."'  and idartista = '".$id_artista."' ";	
	$result = $this->db->query($query_get);
	return $result->result_array();	
}
/**/
function get_info_artistas_in_escenario($id_escenario){
	$query_get_artistas ="SELECT * FROM artista  a inner join escenario_artista ea 
						ON a.idartista =  ea.idartista 
						left outer join imagen_artista ia  
						on a.idartista =  ia.id_artista 
						left outer join imagen i 
						on ia.id_imagen = i.idimagen
						WHERE ea.idescenario= '". $id_escenario ."' ";

	$result_artistas = $this->db->query($query_get_artistas);
	return $result_artistas ->result_array();
}		 
/*Artistas en escenario */
function get_artistas_inevent($id_escenario){

	$query_get_artistas ="SELECT * FROM artista a 
						 INNER JOIN escenario_artista ea  
						 ON a.idartista =  ea.idartista 
						 WHERE  ea.idescenario= '". $id_escenario ."' ";

	$result_artistas = $this->db->query($query_get_artistas);
	$data_complete =  $result_artistas ->result_array();
	
	return  $data_complete; 
}
/**/
function cargamos_base_img_artistas($tipo , $f  , $_num = 0 ){      
    if($_num == 0 ) {
       $_num = mt_rand();       
      }
	$query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
	$this->db->query($query_procedure);
	return $_num;
}
/**/
function get_artistas_resumen($id_escenario , $data_escenario, $nombre_evento){

	if ( strlen($data_escenario["descripcion"]) > 10 ) {
		
			$query_get ="select '".$nombre_evento."' evento  , 'Si' con_descripcion ,  count(0) artistas,  sum(case when url_social_youtube  is not null then 1 else 0 end) artistas_videos_youtube, 
							 sum(case when  url_sound_cloud    is not null then 1 else 0 end) artistas_pistas_sound,
							 sum(case when   hora_inicio is not null and   hora_termino  is not null  then 1 else 0 end) artistas_con_horario,
							 sum(case when  ea.status_confirmacion  = 'pendiente por confirmar' then 1 else 0 end) artistas_pendientes, 
							 sum(case when  ea.status_confirmacion  = 'Artista confirmado' then 1 else 0 end) artistas_conformado, 
							 sum(case when  ea.status_confirmacion  = 'Promesa de asistencia' then 1 else 0 end) artistas_prometen_asistencia
							 from artista a inner join escenario_artista ea  on a.idartista = ea.idartista where ea.idescenario = '". $id_escenario."' ";		
	 	
	 }else{
	 	$query_get ="select  '".$nombre_evento."' evento  , 'No' con_descripcion ,  count(0) artistas,  sum(case when url_social_youtube  is not null then 1 else 0 end) artistas_videos_youtube, 
							 sum(case when  url_sound_cloud    is not null then 1 else 0 end) artistas_pistas_sound,
							 sum(case when   hora_inicio is not null and   hora_termino  is not null  then 1 else 0 end) artistas_con_horario,
							 sum(case when  ea.status_confirmacion  = 'pendiente por confirmar' then 1 else 0 end) artistas_pendientes, 
							 sum(case when  ea.status_confirmacion  = 'Artista confirmado' then 1 else 0 end) artistas_conformado, 
							 sum(case when  ea.status_confirmacion  = 'Promesa de asistencia' then 1 else 0 end) artistas_prometen_asistencia
							 from artista a inner join escenario_artista ea  on a.idartista = ea.idartista where ea.idescenario = '". $id_escenario."' ";		
	 } 	

	$result_artistas =  $this->db->query($query_get);		
	return $result_artistas ->result_array();
}
/**/
function get_evento_artista($param ){


	$id_evento =  $param["id_evento"];
	$query_get =  "SELECT a.* , i.* , esca.* , esca.idescenario as id_escenario FROM artista a 
					INNER JOIN evento_artista ea 
					ON a.idartista = ea.id_artista 
					AND ea.id_evento = '".$id_evento."' 
					LEFT OUTER JOIN imagen_artista ia 
					ON ia.id_artista = ea.id_artista 
					LEFT OUTER JOIN imagen i 
					ON ia.id_imagen = i.idimagen 
					LEFT OUTER JOIN escenario_artista esca 
					ON ea.id_artista = esca.idescenario
				   ";
	$result = $this->db->query($query_get);				    
	return $result->result_array();
	
	   
}
/**/
function get_list_artistas_evento($id_evento){

	$query_get =  "select a.* , ea.idescenario id_escenario from artista a  
				   inner join  escenario_artista ea  on a.idartista  =  ea.idartista 
				   inner join escenario e on ea.idescenario = e.idescenario where e.idevento =  '". $id_evento."' ";
	$result =  $this->db->query($query_get);
	return $result ->result_array();
}
/**/
function getEventbyid($id_evento){	
	$query_get ="SELECT * FROM evento WHERE idevento = '".$id_evento."' limit 1 ";
	$result = $this->db->query($query_get);
	return $result ->result_array();      
}
/**/
function get_artista_by_id($id_artista){
	
	$query_get = "select * from artista where idartista  = '". $id_artista ."' limit 1 "; 
	$result = $this->db->query($query_get);
	return $result ->result_array();      
}




/**/
function insert_log($tipo_evento , $descripcion , $id_evento , $id_usuario){

	$navegador = navegador();
	$ip =  ip_user(); 
	$modulo =  3;
	$query_insert = "INSERT INTO log(
						navegador,					
						ip,
						modulo,
						tipo_evento,
						descripcion,
						id_modulo
					)VALUES(						
						'$navegador',					
						'$ip',
						'$modulo',
						'$tipo_evento',
						'$descripcion',
						'$id_evento'
					)"; 
	
	$result =  $this->db->query($query_insert);
	$id_log   = $this->db->insert_id(); 

	$query_insert =  "INSERT INTO usuario_log(id_usuario , id_log) VALUES('$id_usuario' , '$id_log'  )";
	$this->db->query($query_insert);
	return $result;

}
/**/
function nuevoartista($nuevoartista){
	/*Aquí validaremos que no éxista*/
	$query_insert ="INSERT INTO artista (nombre_artista) values ( '$nuevoartista' )";
	$data[0] = $this->db->query($query_insert);
	$idlastelement = $this->db->insert_id(); 							
	$data[1] = $idlastelement;
	return $data;
}
/**/
function registra_artista_escenario($id_escenario , $nuevoartista , $id_empresa, $id_evento , $id_usuario , $param){
	$registroartista = $this->nuevoartista($nuevoartista);
	if ($registroartista[0] ==  true) {
		$idartista = $registroartista[1];
		$result =   $this->nuevo_escenario_artista($id_escenario , $idartista , $id_evento , $nuevoartista , $id_usuario , $id_empresa);	
		if ($result ==  1 ) {

			$log_evento =  "Indicó que el artista " .$nuevoartista . "Se presentará en el evento  ". $param["enid_evento"]." "; 
			$this->insert_log(1 , $log_evento , $id_evento , $id_usuario);
		}
		return $result;
	}else{
		return "Falla al registrar artista";
	}	
}	
/**/
function delete_escenario_artista($id_escenario , $id_artista , $id_empresa , $id_evento , $id_usuario , $param ){

	$delet_escenario_artista ="DELETE FROM escenario_artista  WHERE idescenario = '".$id_escenario."'  and idartista ='".$id_artista."' ";	
	$result_delete =  $this->db->query($delet_escenario_artista);
	$query_delete = "DELETE FROM evento_artista WHERE id_evento = '". $id_evento  ."'  AND id_artista = '". $id_artista ."'  ";
	$result = $this->db->query($query_delete);	
	if ($result == true){
		$log_evento =  "Eliminó al artista -id ".$id_artista."  del escenario ". $param["enid_escenario"]." en el evento ". $param["enid_evento"]."  - ".$id_artista; 
		$this->insert_log(3 , $log_evento , $id_evento , $id_usuario);		
	}	
	return $result; 
}
/**/
function update_fecha_presentacion($id_artista , $idescenario  , $hiartista  , $htartista , $id_empresa , $id_usuario , $id_evento , $param ){
	$query_update ="UPDATE  
					escenario_artista 
					set hora_inicio = '". $hiartista ."' ,
					hora_termino='".$htartista."' 
					WHERE   idescenario ='$idescenario' 
					AND 
					idartista='$id_artista' ";

	$result = $this->db->query($query_update);
	if ($result ==  true ){
		/**/
		$log_evento =  "Indicó que el artista -id ". $id_artista."  se presentará en un horario- ".hora_enid_format($hiartista  , $htartista). " del evento  ". $param["enid_escenario"]." "; 
		$this->insert_log(2 , $log_evento , $id_artista , $id_usuario);				
	}
	return $result;
}
/**/
function update_status($data){		

	$query_update = "update escenario_artista set status_confirmacion = '". $data["nuevo_status"]  ."' where idartista  = '". $data["artista"]."'  and  idescenario = '".$data["escenario"]."' ";
	$result =  $this->db->query($query_update);	
	if($result == 1){
		/**/
		$log_evento =  "Señalo que un artista -id ".$data["artista"]." del artista  del evento ". $data["enid_evento"] ."  ha  -". $data["nuevo_status"]; 
		$this->insert_log(2 , $log_evento ,  $data["artista"] , $data["id_usuario"]);				
	}
	return $result;	
}
/**/
function update_nombre_artista($data){

	$query_update = "UPDATE artista set 
	nombre_artista = '". $data["nuevo_nombre"]  ."' 
	WHERE  idartista  = '". $data["artista"]."'  ";
	$result =  $this->db->query($query_update);
	if ($result == 1 ) {
	
		$log_evento =  "Modificó el nombre del artista ha- ".$data["nuevo_nombre"] . " del evento ". $data["enid_evento"] ."   -id del artista " . $data["artista"]; 
		$this->insert_log(2 , $log_evento ,  $data["artista"] , $data["id_usuario"]);				
		
	}
	return $result;
}
/**/
function update_tipo_artista($param){
	$query_update = "UPDATE escenario_artista 
	SET 
	tipo_artista =  '". $param["tipo_artista"] ."' 
	WHERE idescenario = '". $param["escenario"] ."'  
	AND 
	idartista = '". $param["artista"] ."' LIMIT 1";  

	$result = $this->db->query($query_update);
	if ($result == 1 ) {
	
		$log_evento =  "Señaló que artista del evento evento ". $param["enid_evento"] ."  
						será del tipo- ".$param["tipo_artista"]."-id del artista ".$param["artista"]." escenario ".$param["enid_escenario"].""; 
		$this->insert_log(2 , $log_evento ,  $param["artista"] , $param["id_usuario"]);						
	}
	return $result;
}
/**/
function record_url_artista($id_escenario , $id_artista , $url , $social , $id_usuario , $id_empresa , $id_evento,  $param ){
	
	$query_update ="update escenario_artista set url_sound_cloud = '".$url."' WHERE idescenario = '".$id_escenario."'  AND idartista = '".$id_artista."'  ";	
	if ($social == "youtube"){
		$query_update ="update escenario_artista set url_social_youtube  = '".$url."' WHERE idescenario = '".$id_escenario."'  AND idartista = '".$id_artista."'  ";			
	}	
	$result =  $this->db->query($query_update);	

	if ($result == true  ) {		
		$log_evento =  "Actualizó las redes sociales del artista id- " .$id_artista. " en el evento " .  $param["enid_evento"]; 
		$this->insert_log(2 , $log_evento ,  $id_artista  ,$id_usuario);								
	}
	return  $result;	
}
/*POSIBLES QUE YA NO SE EMPLEEN*/
function nuevo_escenario_artista($id_escenario , $id_artista , $id_evento , $artista , $id_usuario  , $id_empresa ){

		$query_insert ="INSERT INTO escenario_artista (idescenario , idartista ) 
		values ( '$id_escenario', '$id_artista'  )";
		$result =  $this->db->query($query_insert);
		/*Insertamos en la tabla que nos sirve como palabra clave  en el futuro*/
		$query_insert = "INSERT INTO evento_artista(id_evento , id_artista, artista )VALUES( '". $id_evento ."' , '".$id_artista  ."' , '". $artista ."')";
		$result = $this->db->query($query_insert);
		return $result;
}
/*Termina modelo */
}