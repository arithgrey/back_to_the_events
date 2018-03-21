<?php defined('BASEPATH') OR exit('No direct script access allowed');
class accesosmodel extends CI_Model {	
function __construct(){

        parent::__construct();        
        $this->load->database();
}
/**/
function get_tmp_accesos(){
	
	$query_get =  "SELECT precio , concat(precio , ' (' , moneda , ')')tipo_moneda  FROM  acceso WHERE  DATE(termino_acceso) >= CURRENT_DATE()  GROUP BY  precio"; 
	$result =  $this->db->query($query_get);
	return $result ->result_array();
}
/**/
function getDataByidEvent($idempresa, $evento){	

	$query_get ="SELECT * FROM acceso, tipo_acceso WHERE 
	 tipo_acceso.idtipo_acceso= acceso.idtipo_acceso AND acceso.idevento='". $evento . "' order by termino_acceso desc";
	$result_acceso = $this->db->query($query_get); 		 
	return $result_acceso->result_array();

}
/**/
function get_acceso_by_event($id_evento){	
	$query_get ="SELECT 	
	a.idacceso , 
	a.nombre ,   
	a.descripcion as nota , 
	a.moneda , 
	FORMAT(a.precio , 2) as precio, 
	a.inicio_acceso, 
	a.termino_acceso, 
	a.status,  
	a.idevento , 
	DATE_FORMAT(a.fecha_registro , '%d/%m/%Y' ) as fecha_registro , 
	t.idtipo_acceso , 
	t.tipo ,  
	t.descripcion ,  
	t.status  
	FROM acceso a 
	INNER JOIN tipo_acceso  t
	on a.idtipo_acceso = t.idtipo_acceso	
	WHERE 	a.idevento='". $id_evento ."' order by a.termino_acceso desc";
	$result_acceso = $this->db->query($query_get); 
	$data_complete =   $result_acceso ->result_array();	
	return $data_complete;	
}	
function load_tipo_accesos(){
	
	$query_get ="SELECT * FROM tipo_acceso";	
	$result = $this->db->query($query_get);       
	return $result ->result_array();
}
/*Tipos de accesos */
function get_tipos_accesos(){

	$query_get ="select * from tipo_acceso";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/**/
function get_by_id($id_acceso){

	$query_get = "SELECT a.idacceso, a.descripcion as nota  , a.precio , a.inicio_acceso , a.termino_acceso , a.status, a.idevento , a.idtipo_acceso                      	
	, a.fecha_registro  , a.moneda  ,   t.idtipo_acceso , t.tipo , t.descripcion  , t.status        
 	FROM acceso as a , tipo_acceso  as  t WHERE
	t.idtipo_acceso= a.idtipo_acceso AND a.idacceso =   '".$id_acceso."' ";
	$result = $this->db->query($query_get);
	return $result ->result_array();
}
/**/
function get_accesos_tipo_evento($id_evento){
	$query_get = "select  nombre, precio , moneda,    tipo,  idacceso  from tipo_acceso  inner join acceso on tipo_acceso.idtipo_acceso= acceso.idtipo_acceso and idevento='".$id_evento."'   ";
	$result = $this->db->query($query_get);	
	return $result ->result_array();	
}
/**/
function get_data_acceso_public($id_evento){

	//$_num  =  $this->carga_base_img(5 , 0); 	
	/*
	$query_get ="select 
				a.idacceso, 
				a.inicio_acceso , 
				a.termino_acceso , 
				(case 					
					when (a.termino_acceso) < CURRENT_DATE() then 'La oferta ha terminado' 
					when (a.inicio_acceso )  > CURRENT_DATE() then  'Próximamente'	
					else 'Actual' end) stado_oferta
				, 
				a.* , 

				t.tipo , 
				i.*  
				from  acceso a 
				inner  join  tipo_acceso t  on  a.idtipo_acceso =  t.idtipo_acceso
				left outer join imagen_acceso ia  on ia.id_acceso =  a.idacceso
				left  outer join  tmp_img_$_num  i on   ia.id_imagen  = i.idimagen  
				where a.idevento = '". $id_evento ."' ";
	
	*/
	$query_get ="select 
a.idacceso, 
a.inicio_acceso , 
a.termino_acceso , 
(case when (a.termino_acceso) < CURRENT_DATE() then 'La oferta ha terminado' when (a.inicio_acceso )  >CURRENT_DATE() then  'Próximamente'	else 'Actual' end) stado_oferta, 
a.* , t.tipo  from  acceso a  inner  join  tipo_acceso t  on  a.idtipo_acceso =  t.idtipo_acceso where a.idevento = '". $id_evento ."' ";

	$result =  $this->db->query($query_get);			
	$data_complete =   $result->result_array();
	//$_num  =  $this->carga_base_img(5 ,  1, $_num ); 	
	return $data_complete;
	
}
/**/

function load_estado_countries($id_country){
	$query_get ="SELECT * FROM estado  WHERE idCountry = '". $id_country ."' ";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*Termina modelo */
function carga_base_img($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
}


function insert_log($tipo_evento , $descripcion , $id_evento , $id_usuario){
	$navegador = navegador();
	$ip =  ip_user(); 
	$modulo =  4;
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
function insert( $nombre_acceso  , $precio , $inicio_acceso , $termino_acceso , $id_evento , $idtipo_acceso, $descripcion=''  , $id_empresa , $id_usuario , $nombre_usuario , $moneda , $param  ){

	if ($precio< 1 ){$precio = 0;}	

	$query_insert ="INSERT INTO acceso( nombre  , precio , inicio_acceso ,  termino_acceso , idevento ,idtipo_acceso , descripcion ,  moneda  ) VALUES ( '$nombre_acceso' ,  $precio , '$inicio_acceso' , '$termino_acceso' , '$id_evento' , '$idtipo_acceso'  , '$descripcion' , '$moneda')";			
	$result  =  $this->db->query($query_insert);
	
	
	return $this->db->insert_id(); 
	
}
/**/
/*********************/
function delete( $evento , $id_acceso , $id_usuario  , $param){

	$query_delete ="DELETE FROM imagen_acceso WHERE id_acceso = '". $id_acceso ."' ";	
	$this->db->query($query_delete);
	$query_delete ="DELETE FROM acceso WHERE idacceso = '".$id_acceso."'  limit 1";
	$result =  $this->db->query($query_delete);	
	if ($result ==  true ){				
		$log_evento =  "Eliminó un acceso del evento ". $param["enid_evento"] ."- id ".$id_acceso; 
		$this->insert_log(3 , $log_evento , $id_acceso ,  $id_usuario);
	}
	return $result; 
}
/**/
function update($id_acceso , $nuevo_precio , $nuevo_inicio_acceso , $nuevo_termino_acceso , $nueva_descripcion , $nuevo_tipo_acceso, $moneda  ,$id_usuario , $param ){	
	$query_update ="UPDATE acceso SET 
					descripcion= '".$nueva_descripcion."'  ,  
					precio = '".$nuevo_precio. "' , 
					inicio_acceso   = '".$nuevo_inicio_acceso."' ,  
					termino_acceso  ='".$nuevo_termino_acceso."' , 
					idtipo_acceso  = '". $nuevo_tipo_acceso ."' ,
					moneda = '".$moneda."'
					WHERE idacceso = '". $id_acceso ."'  limit 1 ";
	$result  =  $this->db->query($query_update);	
	if ($result ==  true ){				
		$log_evento =  "Modifico la información del acceso - ". $id_acceso."  del evento   ". $param["enid_evento"]."   "; 
		$this->insert_log(2 , $log_evento , $id_acceso ,  $id_usuario);
	}
	return $result;
}
}