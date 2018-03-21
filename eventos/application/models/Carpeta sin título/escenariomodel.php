<?php defined('BASEPATH') OR exit('No direct script access allowed');
class escenariomodel extends CI_Model {
function __construct(){
        parent::__construct();        
        $this->load->database();
}
/**/
function get_artistas($id_escenario , $limit=5 ){

	$query_get =  "SELECT ea.*, a.nombre_artista  
					FROM escenario_artista ea 
					INNER JOIN artista a 
					ON ea.idartista = a.idartista 
					WHERE ea.idescenario=$id_escenario LIMIT $limit;";
	
	$result =  $this->db->query($query_get);					
	return$result->result_array();

}
/**/
function update_nota_escenario_artista($param){

	$query_update =  "update escenario_artista 
	set nota ='". $param["nota_artista"] ."'
	where 
	idartista = '". $param["artista"] ."' 
	and  
	idescenario = '". $param["escenario"] ."'  "; 
	return  $this->db->query($query_update);	
}
/**/
function get_artista_in_escenario($data){
	
	$query_get ="select * from escenario_artista where idescenario = '". $data["escenario"] ."' and idartista = '". $data["artista"]  ."'  ";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/**/
function get_escenarios_byidevent($id_evento){
	/**/	
	$_num =  $this->carga_base_img_escenario(2 , 0);   
	$query_get ="select e.* , 
						e.idescenario id_escenario,  
						e.descripcion  as descripcion_escenario , 
						count(a.idartista) as num_artistas  
						, ea.* 
						, i.* 
						from escenario as e
						left outer join escenario_artista as ea 
						on e.idescenario = ea.idescenario 
						left outer join artista as a 
						on ea.idartista = a.idartista
						left outer join imagen_escenario ie on 
						e.idescenario  =  ie.id_escenario 
						left outer join  tmp_img_$_num  i on 
						ie.id_imagen =  i.idimagen 
						where e.idevento = '". $id_evento ."'
						group by e.idescenario order by tipoescenario  desc";
	
	$result= $this->db->query($query_get);
	$data_complete =   $result-> result_array();
	$_num =  $this->carga_base_img_escenario(2 , 1 , $_num );    
	return $data_complete;

}

/************************RETORNA LOS DATOS DE UN ESCENARIO POR MEDIO DE SI ID**************************************/
function load_escenario_byid( $idescenario,  $idempresa ){

	$query_get ="SELECT * FROM escenario WHERE idescenario = '".$idescenario."' ";
	$result = $this->db->query($query_get);
	$data["general"] =  $result->result_array();

	$query_get_artistas = "SELECT * FROM artista as a , escenario_artista as ea WHERE  
	 ea.idartista =  a.idartista and ea.idescenario='". $idescenario."' ";

	$resultartistas = $this->db->query($query_get_artistas);
	$data["artistas"] =  $resultartistas->result_array();
	return $data;

}	
/******************************RETORNA EL RESUMEN DE LOS ESCENARIOS DE A CUERDO AL EVENTO ********************************/
function load_by_event( $id_evento ){
	//2 para escenario 	
	$query_get ="SELECT 
					e.idescenario , 
					e.nombre , 
					e.descripcion ,   
					e.idevento , 
					e.tipoescenario , 
					e.status , 
					e.fecha_presentacion_inicio , 
					e.fecha_presentacion_termino 					
					FROM escenario  e 					
					WHERE e.idevento='".$id_evento ."'
					GROUP BY e.idescenario";

	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();   	
	return $data_complete;	   

}	

function carga_base_img_escenario($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
}


function deleteescenariobyid( $idescenario,  $idempresa ){
	
	$query_delete ="call delete_escenacio_evento('". $idescenario ."');";	
	return $this->db->query($query_delete);
	 
}

/**/
function construye_text_log($campo){

	if ($campo =='nombre'|| $campo ='status'  ) {
		return "el ". $campo;
	}else{
		return "la " . $campo;
	}
}
/************************************************************************/

/*************************************** ****************************************/
function get_escenariobyId($id_escenario){

	$query_get ="SELECT * FROM escenario WHERE idescenario ='".$id_escenario."' LIMIT 1 ";
	$result = $this->db->query($query_get);
	return $result->result_array();	
}
/*Todos los escenarios menos uno*/
function get_escenarios_byidevent_menosuno($id_evento, $id_escenario){

	$query_get ="select e.idescenario id_escenario,  e.descripcion  as descripcion_escenario , 
e.nombre, e.tipoescenario,  
count(a.idartista) as num_artistas , e.* ,  ea.* , i.* 
from escenario as e
left outer join escenario_artista as ea 
on e.idescenario = ea.idescenario and ea.url_sound_cloud is not null 
left outer join artista as a 
on ea.idartista = a.idartista
left outer join imagen_escenario ie on 
e.idescenario  =  ie.id_escenario 
left outer join  imagen i on 
ie.id_imagen =  i.idimagen 
where e.idevento = '".$id_evento."' and e.idescenario != '". $id_escenario ."'
group by e.idescenario order by tipoescenario  desc
";

	$result= $this->db->query($query_get);
	return $result-> result_array();
}
/*retorna la data de los escenarios dentro de un evento */
function get_escenarios_evento($id_evento){

	$_num =  $this->carga_base_img_escenario(2 , 0);  
	$query_get ="SELECT e.* , i.*   FROM escenario e 
				LEFT  OUTER JOIN imagen_escenario   ie 
				ON e.idescenario =  ie.id_escenario
				LEFT OUTER JOIN tmp_img_$_num  i 
				ON ie.id_imagen  =  i.idimagen 
				WHERE idevento = '". $id_evento ."'  group by idescenario";

	$result= $this->db->query($query_get);
	$data_complete =  $result->result_array();
	$this->carga_base_img_escenario(2 , 1 ,  $_num );  
	return $data_complete;
	

}
/**/
function get_campo_escenario($campo , $id_escenario){

	$query_get ='select '.$campo .'  from escenario  where idescenario = "'.$id_escenario.'" ' ;
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*retorna los generos del evento y si así se decea solo los del escenario */

function get_generos($id_escenario, $id_evento){
	$query_get = 'select g.*, gm.* from genero_musical g  inner join evento_genero_musical  gm on g.idgenero_musical = gm.idgenero_musical where gm.idevento ="'.$id_evento.'" ';
	$result = $this->db->query($query_get);
	return $result ->result_array();
}
/**/
function insert_log($tipo_evento , $descripcion , $id_evento , $id_usuario){
	$navegador = navegador();
	$ip =  ip_user(); 
	$modulo =  2;

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
function nuevo( $nombre , $evento ,  $id_empresa  , $id_usuario , $nombre_usuario , $param ){

	$query_insert ="INSERT INTO escenario (nombre , idevento  ) values ('$nombre' , '$evento' )";		
	$this->db->query($query_insert);
	$id_escenario = $this->db->insert_id(); 							

	if ($id_escenario > 0 ){
		$log_evento =  "Cargo un nuevo escenario con nombre $nombre  al evento ". $evento ." - id ". $id_escenario;
		$this->insert_log(1, $log_evento , $id_escenario , $id_usuario);
	}
	return $id_escenario;

}	
/**/
function update_descripcion_escenario_template($param , $id_escenario ,  $id_artista  , $id_usuario  , $id_empresa , $param ){	

	$contenido =  $param["contenido"];
	$escenario  =  $param["escenario"];
	$query_update ="update escenario set descripcion = (select descripcion_contenido from contenido where idcontenido='".$contenido ."') where  idescenario = '". $escenario ."' limit  1";
	
	$result =  $this->db->query($query_update);
	if ($result  == true){
		$log_evento =  "Actualizó la experiencia que vivirá el público al asistir al escenario ".$param["enid_escenario"]."  - " . $id_escenario;
		$this->insert_log(2, $log_evento , $id_escenario , $id_usuario);
	}
	return $result; 
}
/**/
function update_tipo($id_escenario , $tipo_escenario , $id_empresa ,  $id_usuario ,  $id_evento  , $param ){
	
	$query_upload ="UPDATE  escenario set tipoescenario = '$tipo_escenario' 
	WHERE   idescenario ='$id_escenario' limit 1";
	$result = $this->db->query($query_upload);
	/*Log*/	
	if($result == true){
		$log_evento =  "Indicó que el escenario  ". $param["enid_escenario"] ." del evento ". $param["enid_evento"]."  pertenecerá a la categoría- " . $tipo_escenario;
		$this->insert_log(2, $log_evento , $id_escenario , $id_usuario);
	}
	return $result;	
}
/**/
function update_campo($id_escenario , $nuevonombre, $campo ,  $idempresa , $id_usuario , $id_evento  , $param ){ 

	$query_update ="UPDATE  
					escenario 
					SET ". $campo ." = '". $nuevonombre ."' 
					WHERE   
					idescenario ='$id_escenario' ";					
	$result = $this->db->query($query_update);
	/*Log*/	
	if($result == true){
		$log_evento =  "Actualizón la información del esceario  ". $param["enid_escenario"] ." del evento ". $param["enid_evento"]."  - ".$nuevonombre;
		$this->insert_log(2, $log_evento , $id_escenario , $id_usuario);
	}

	return $result;		
}
/**/
function update_fecha($id_escenario , $fecha_inicio , $fecha_termino, $id_usuario , $param ){
	
	$query_update ="UPDATE  escenario 
	SET 
	fecha_presentacion_inicio = '$fecha_inicio' , 
	fecha_presentacion_termino='$fecha_termino' 
	WHERE   idescenario ='$id_escenario' LIMIT 1";
	$result = $this->db->query($query_update);
	if ($result ==  1) {
		$log_evento =  "Indicó que la fecha que la fecha para el escenario ". $param["enid_escenario"] ." del evento ". $param["enid_evento"]." será- " .fechas_enid_format( $fecha_inicio , $fecha_termino);
		$this->insert_log(2, $log_evento , $id_escenario , $id_usuario);
	}
	return $result;	

}
/*POSIBLES FUNCIONES QUE NO SE EMPLEAN  */
/**/
function updatedescripcion( $nueva_descripcion , $evento , $idescenario,  $idempresa ) {

	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE idevento = '".$evento."' and  idescenario ='$idescenario' ";
	$result = $this->db->query($query_upload);
	return $result;	
}
function updatedescripcionbyid( $nueva_descripcion , $idescenario,  $idempresa ){
	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE   idescenario ='$idescenario' limit 1";
	$result = $this->db->query($query_upload);
	return $result;	

}
/*Termina modelo */
}