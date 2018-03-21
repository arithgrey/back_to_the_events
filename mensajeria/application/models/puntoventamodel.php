<?php defined('BASEPATH') OR exit('No direct script access allowed');
class puntoventamodel extends CI_Model {
/**/
function agreado_evento($id_pv , $id_evento ){

	$query_get =  "SELECT count(0)e FROM evento_punto_venta 
	WHERE idevento =  $id_evento AND       
	 idpunto_venta  =  $id_pv LIMIT 1";
	$result= $this->db->query($query_get); 
	return $result->result_array()[0]["e"];
}
/**/
function get_puntos_venta_disponibles($param){

	$id_empresa =   $param["id_empresa"];
	$_num =  get_random();
	
	$this->create_tmp_agrados( $_num  ,  0 , $param["evento"] );
	$query_get ="SELECT * FROM punto_venta p WHERE p.idempresa = $id_empresa AND  p.idpunto_venta NOT IN (SELECT idpunto_venta  FROM tmp_pvs_agregados_$_num ) LIMIT 20"; 	
	$result =  $this->db->query($query_get);
	$data_complete =  $result->result_array();
	$this->create_tmp_agrados( $_num  ,  1 , $param["evento"] );
	return $data_complete;
	
	/**/

}
/**/
function create_tmp_agrados($_num,  $flag , $id_evento){
	

	$query_drop =  "DROP TABLE IF exists tmp_pvs_agregados_$_num"; 
	$db_response = $this->db->query($query_drop);



	if ($flag ==  0){

		$query_create =  "CREATE TABLE tmp_pvs_agregados_$_num AS 
		select  * from evento_punto_venta where idevento = $id_evento";
		$db_response =  $this->db->query($query_create);
	}
	return $db_response;

}
/**/

/**/
function get_puntos_cargados_evento($param){
	$id_evento =  $param["evento"];
	$query_get =  "SELECT p.*  FROM punto_venta p 
				   INNER JOIN evento_punto_venta epv  
				   ON 
				   p.idpunto_venta = epv.idpunto_venta
				   WHERE epv.idevento =  $id_evento LIMIT 10";
				   

   $result =  $this->db->query($query_get);
   return $result->result_array();

}
/**/
function get_img($param){
	$id_punto_venta = $param["punto_venta"];	
	$query_get = "SELECT i.*  FROM imagen_punto_venta ip 
					INNER JOIN imagen i ON  
					ip.idpunto_venta =  $id_punto_venta
					AND ip.id_imagen  =  i.idimagen
					WHERE ip.idpunto_venta =  $id_punto_venta LIMIT 1";
	
	$result =  $this->db->query($query_get);		
	return $result->result_array();					
}
/**/
function __construct(){
	parent::__construct();        
	$this->load->database();
}
/**/
function get_punto_venta_evento($id_evento){
	$query_get =  "SELECT idpunto_venta FROM evento_punto_venta WHERE idevento = '".$id_evento."'";
	$result =  $this->db->query($query_get);
	return $result->result_array();
}
/**/
function delete_punto_venta_contacto( $punto_venta , $id_contacto){
	$query_delete = "DELETE FROM punto_venta_contacto WHERE idpunto_venta = '". $punto_venta ."' AND  idcontacto = '".$id_contacto."'  "; 
	return $this->db->query($query_delete);
}
/**/
function update_punto_venta_nota($param){
	$query_update ="UPDATE punto_venta set descripcion = '". $param["nota-punto-venta"] ."' WHERE  idpunto_venta = '". $param["punto_venta"]."' limit 1"; 
	return $this->db->query($query_update);				
}
/**/
function get_punto_venta($param){
	$query_get =  "select * from  punto_venta where  idpunto_venta =  " . $param["punto_venta"] . " limit 1 ";		
	$result =  $this->db->query( $query_get );
	return $result->result_array();
}
/**/
function get_contactos($id_punto_venta){
	$query_get =  "select c.*  from punto_venta_contacto pvc  
						inner join contacto c on   pvc.idcontacto =  c.idcontacto
						where pvc.idpunto_venta  ='". $id_punto_venta."'  "; 
	$result = $this->db->query($query_get);					
	return $result->result_array();
}
/**/
function insert_punto_venta_contacto($punto_venta , $id_contacto){

	$query_get="select * from punto_venta_contacto
					where 
					idpunto_venta = '". $punto_venta  ."'  
					and 
					idcontacto ='". $id_contacto ."' limit 1";
		
	$result  = $this->db->query($query_get);		
	$exits = $result->result_array();		
	$query_update ="";

		if (count($exits) > 0){
			$query_update  = "select 1+1";
		}else{
			$query_update = "insert 
							into 
							punto_venta_contacto 
							values('". $punto_venta ."' , '". $id_contacto ."' )";			
		}	
	return $this->db->query($query_update);		
}
/**/
function get_estados_punto_venta(){
	$query_get ="select distinct(status) estado_punto_venta  from punto_venta";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*Actualiza todo los puntos de venta asociados al evento */
function update_all_in_event($id_evento, $id_empresa){
   	$query_exist ="select * from evento_punto_venta where idevento =  '". $id_evento."' ";
	$result = $this->db->query($query_exist);					
	$exist = $result->num_rows();
	$dinamic_query ="";
	if ($exist> 0){			
		$dinamic_query ="DELETE  FROM evento_punto_venta WHERE idevento = '". $id_evento . "' ";
	}else{						
		$dinamic_query ="INSERT INTO evento_punto_venta SELECT  ". $id_evento." ,  p.idpunto_venta   from punto_venta p   where p.status =  'Disponible para todos los colaboradores de la empresa' and p.idempresa = '".$id_empresa."' ";
	}
    return $this->db->query($dinamic_query);
}
/**/
function delete($punto_venta){
	$query_delete ="DELETE FROM punto_venta WHERE idpunto_venta = '". $punto_venta."'  limit 1";		
	return $this->db->query($query_delete);
}
/**/
function valida_input_zona($param){
	$f =  "Zona de la ciudad no definida"; 
	if (isset($param["nzona"])) {
		$f=$param["nzona"];
	}
	return $f; 		
}
/**/
function valida_input($param, $dia ){
	$f =  0; 
	if (isset($param[$dia])) {
		$f=1;
	}
	return $f; 		
}
	/**/
function insert($param , $id_empresa  ){
		
        $status = $param["status"];              
        $descripcion    = $param["descripcion"];
        $zona =  $param["zona"];
        $razon_social = $param["razon_social"];        
       	$hora_inicio =  ""; 
       	$hora_fin =  ""; 
       	$horario_atencion =  $param["horario_atencion"];
       	$sitio_web =  $param["sitio_web"];
       	
       	$L =  $this->valida_input($param, "L" );       
		$M =  $this->valida_input($param, "M" );
		$MM =  $this->valida_input($param, "MM" );
		$J =  $this->valida_input($param, "J" );
		$V =  $this->valida_input($param, "V" );
		$S =  $this->valida_input($param, "S" );
		$D = $this->valida_input($param, "D" );         

	$query_insert = "INSERT INTO  punto_venta (	
				razon_social,
				idempresa,
				descripcion,
				zona,
				hora_inicio,
				hora_fin,
				L,
				M,
				MM,
				J,
				V,
				S,
				D, 
				horario_atencion,
				sitio_web 

			)VALUES(
			'".$razon_social  ."', 
			'$id_empresa' , 
			'".$descripcion ."',
			'".$zona."' ,
			'". $hora_inicio."', 
			'". $hora_fin."',
			'$L',
			'$M',
			'$MM',
			'$J',
			'$V',
			'$S',
			'$D' ,
			'".$horario_atencion."', 
			'".$sitio_web."'
			)"; 	 	 
	return $this->db->query($query_insert);	 	 	 	 	
}
function get_puntos_venta_empresa_usuario($id_empresa, $param ){

	$filtro = $this->filtro_punto_venta($param);		
	$_num = $this->cargamos_base_img_puntos_venta(4 , 0);				

	$this-> tmp_contacos_pv($_num , 0 ); 
	$query_get ="select pv.*,
							pv.fecha_registro fecha_reg, 
							i.* , 
							c.contactos    from punto_venta  pv  
					left outer join imagen_punto_venta ipv  on  pv.idpunto_venta =  ipv.idpunto_venta
					left outer join   tmp_img_$_num  i on  ipv.id_imagen = i.idimagen
					left outer join  tmp_contactos_pv_$_num c 
					on pv.idpunto_venta =  c.idpunto_venta
					where idempresa ='". $id_empresa ."'  ". $filtro;	
		

	$result_db = $this->db->query($query_get);								
	$data_complete =   $result_db->result_array();
	$this-> tmp_contacos_pv($_num , 1 ); 
	$_num = $this->cargamos_base_img_puntos_venta(4 , 1 , $_num);
	return $data_complete;			
}
	/**/
function tmp_contacos_pv($_num , $flag){				
	if ($flag == 0 ){
			$query_drop ="DROP TABLE IF exists tmp_contactos_pv_$_num"; 
			$result_db = $this->db->query($query_drop);					
			/*Creamos ahora */
				$query_create ="CREATE TABLE tmp_contactos_pv_$_num AS 
								SELECT idpunto_venta , count(*) contactos FROM punto_venta_contacto group by idpunto_venta"; 
				$result_db = $this->db->query($query_create);					
	}else{
			$query_drop ="DROP TABLE IF exists tmp_contactos_pv_$_num"; 
			$result_db = $this->db->query($query_drop);			
	}	
}	
	/**/
function filtro_punto_venta($param){
	$filtro =""; 			
	$limit_text ="";		
	if (strlen($param["puntos_venta_b"]) > 0  ) {
		$filtro .=" and  pv.razon_social like '". $param["puntos_venta_b"] ."%'   ";	
	}if ( strlen($param["zona_b"]) > 1)  {
		$filtro .= " and zona ='".$param["zona_b"]."' ";		
	}		
	return $filtro; 
}
/**/
function cargamos_base_img_puntos_venta($tipo , $f  , $_num = 0 ){    
	if($_num == 0 ){
	   $_num = mt_rand();       
	}
	$query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
	$this->db->query($query_procedure);
	return $_num;
}
	/**/
	function get_contactos_in_punto_venta($id_usuario , $id_punto_venta ){

		$query_get="select  c.* , i.*,  pvc.idpunto_venta   puntoventacontacto   from contacto  c
					inner join punto_venta_contacto pvc 
					on c.idcontacto  = pvc.idcontacto and  pvc.idpunto_venta = '".$id_punto_venta."'
					left outer join imagen_contacto ic  
					on c.idcontacto = ic.id_contacto 
					left outer join imagen i 
					on ic.id_imagen = i.idimagen
					where idusuario ='". $id_usuario ."'  ";
		$result_db  = $this->db->query($query_get);								
		return $result_db->result_array();					
	}
	function get_contactos_in_punto_venta_filtro($id_usuario , $id_punto_venta ){

		$query_get="select  
					c.idcontacto , 
					c.nombre , 
					c.organizacion , 
					c.tel  , 
					c.tipo, 
					c.correo , 
					i.*, 
					pvc.idpunto_venta   puntoventacontacto   
					from contacto  c
					inner join punto_venta_contacto pvc 
					on c.idcontacto  = pvc.idcontacto and  pvc.idpunto_venta = '".$id_punto_venta."'
					left outer join imagen_contacto ic  
					on c.idcontacto = ic.id_contacto 
					left outer join imagen i 
					on ic.id_imagen = i.idimagen
					where idusuario ='". $id_usuario ."'  ";
		$result_db  = $this->db->query($query_get);								
		return $result_db->result_array();					
	}
	/*Actualiza el contacto asociado al punto de venta */
	function update_punto_venta_contacto($contacto , $puntoventa){
		$query_get="select * from punto_venta_contacto where idpunto_venta = '". $puntoventa ."'  and idcontacto ='". $contacto ."'";
		$exits = $this->db->query($query_get);
		$num = $exits->num_rows();		
		if ($num>0 ) {
			$query_update ="delete from  punto_venta_contacto where idpunto_venta = '". $puntoventa ."'  and idcontacto ='". $contacto ."'  ";
			return $this->db->query($query_update);
		}else{
			$query_update ="insert into punto_venta_contacto values('".$puntoventa."' , '".$contacto."' )";
			return $this->db->query($query_update);
		}
		
	}
	/**/	
	function get_puntos_venta_cliente($id_evento){		
		/**/
		$_num = $this->cargamos_base_img_puntos_venta(4 , 0);
		$query_get="select 
					pv.* , 
					i.*
					from  evento_punto_venta evp 
					left outer join  punto_venta pv  on  evp.idpunto_venta =  pv.idpunto_venta
					left outer join imagen_punto_venta  imp  on evp.idpunto_venta  =  imp.idpunto_venta 
					left outer join tmp_img_$_num i  on  imp.id_imagen =  i.idimagen 
					where 
					evp.idevento =  '". $id_evento ."' ";
					
		$result = $this->db->query($query_get);			
		$data_complete =   $result->result_array();
		$_num = $this->cargamos_base_img_puntos_venta(4 , 1 , $_num );
		return $data_complete; 

	}
	/**/
	function load_puntos_venta_evento_icon($id_evento){	

		$query_get =  "SELECT p.idpunto_venta FROM  punto_venta p INNER JOIN  evento_punto_venta ep   
						ON p.idpunto_venta =  ep.idpunto_venta 
						WHERE  ep.idevento =" . $id_evento;		
		$result =  $this->db->query($query_get);					
		return $result->result_array();
		/*
			$_num = $this->cargamos_base_img_puntos_venta(4 , 0);
			$query_get ="SELECT 
						p.idpunto_venta ,
						p.razon_social, 					
						i.*					
						FROM punto_venta p 
						INNER JOIN  evento_punto_venta ep 
						ON p.idpunto_venta  =  ep.idpunto_venta
						LEFT OUTER JOIN imagen_punto_venta ip 
						ON p.idpunto_venta =  ip.idpunto_venta 
						LEFT OUTER JOIN tmp_img_$_num i 
						ON ip.id_imagen  = i.idimagen 
						WHERE  ep.idevento =" . $id_punto_venta;

			$result = $this->db->query($query_get);					
			$data_complete =   $result ->result_array();		
			$_num = $this->cargamos_base_img_puntos_venta(4 , 1 , $_num);
			return $data_complete; 
		*/
	}
	/**/
	function load_puntos_venta_evento($id_evento ){

		$query_get ="SELECT *  FROM punto_venta p INNER JOIN  evento_punto_venta ep 
					ON p.idpunto_venta  =  ep.idpunto_venta
					LEFT OUTER JOIN imagen_punto_venta ip 
					ON p.idpunto_venta =  ip.idpunto_venta 
					LEFT OUTER JOIN imagen i 
					ON ip.id_imagen  = i.idimagen 
					WHERE  ep.idevento =  '". $id_evento ."'  ";
		$result = $this->db->query($query_get);					
		return $result ->result_array();

	}
	/*termina la función*/
	function get_puntos_venta_evento( $id_evento ,  $id_empresa){

		$query_get ="select  epv.idpunto_venta  punto_v , p.*   from punto_venta p  
			left outer join evento_punto_venta epv  
			on  p.idpunto_venta =  epv.idpunto_venta  and idevento = '". $id_evento."'
			where p.status =  'Disponible para todos los colaboradores de la empresa'
			and p.idempresa = '". $id_empresa ."'   ";
		
		$result = $this->db->query($query_get);				
		return $result->result_array();
	}
	/**/
	function update_punto_venta_evento($id_evento, $id_punto_venta ){

		$query_exist ="select COUNT(0)e from 
					   evento_punto_venta 
					   where 
					   idevento =  '". $id_evento."' and idpunto_venta = '". $id_punto_venta."'  LIMIT 1";
		$result = $this->db->query($query_exist);					

		$exist =  $result->result_array()[0]["e"];
		
		
		
		$dinamic_query ="";
		if($exist >0 ) {
			 
			$dinamic_query ="DELETE FROM evento_punto_venta WHERE  idevento =  '". $id_evento."' and idpunto_venta = '". $id_punto_venta."' LIMIT 2";
		}else{

			$dinamic_query ="INSERT INTO evento_punto_venta(idevento , idpunto_venta ) VALUES('". $id_evento."'  , '". $id_punto_venta ."') ";
		}
		return $this->db->query($dinamic_query);
		


	}/**/
	function update($param, $id_empresa ){

		$razon_social		= $param["nrazon_social"];
		$status = $param["nstatus"];
		$descripcion= $param["ndescripcion"];
		$zona = $this->valida_input_zona($param) ;				
		$id_punto_venta= $param["punto_venta"];

		$L =   $this->valida_input(  $param, "nL");
		$M =   $this->valida_input(  $param, "nM");
		$MM =   $this->valida_input( $param, "nMM");
		$J =   $this->valida_input(  $param, "nJ");
		$V =   $this->valida_input(  $param, "nV");
		$S =   $this->valida_input(  $param, "nS");
		$D =   $this->valida_input(  $param, "nD");
		$horario_atencion =  $param["nhorario_atencion"];
		$sitio_web =  $param["nsitio_web"];
		
		$query_update ="update punto_venta set 
						razon_social = '". $razon_social ."' ,						 
						status   ='".$status ."'     ,						 
						descripcion   = '".$descripcion."' ,
						zona = '".$zona."' ,
						L = '$L' , 
						M = '$M', 
						MM = '$MM', 
						J = '$J', 
						V = '$V', 
						S = '$S', 
						D = '$D', 
						horario_atencion  = '".$horario_atencion."',
						sitio_web  = '".$sitio_web ."'

						where idempresa  = '".$id_empresa . "' 
						and 
						idpunto_venta = '".$id_punto_venta ."' limit 1";
		return $this->db->query($query_update);						 						 				
	}
	/**/

	function get_resumen_punto_venta($id_empresa){
		$query_get ='
select count( 0 )puntosventatotal , 
sum(case when CHAR_LENGTH(pv.descripcion) > 0 then 1 else 0  end  )con_descripcion ,
sum(case when pv.status  = "Temporalmente no disponible" then  1 else 0  end) temporal_no_disponible,
sum(case when pv.status  = "Disponible para todos los colaboradores de la empresa" then  1 else 0  end) para_colaboradores,
sum(case when pv.idpunto_venta in(select idpunto_venta from punto_venta_contacto group by idpunto_venta ) then 1 else 0  end ) asociados,
sum(case when c.tel is not null and  CHAR_LENGTH(c.tel)> 3  then 1 else 0 end )con_tel ,
sum(case when c.correo  is not null  and   CHAR_LENGTH(c.correo)> 3  then 1 else 0 end )con_mail ,
sum(case when c.pagina_web    is not null  and  CHAR_LENGTH(c.pagina_web)> 3  then 1 else 0 end )con_paginaweb 
from punto_venta pv 
inner join punto_venta_usuario pvu on pv.idpunto_venta =  pvu.idpunto_venta
inner join usuario u  
on pvu.idusuario = u.idusuario
left outer join  punto_venta_contacto pvc 
on pv.idpunto_venta  =  pvc.idpunto_venta
left outer join contacto c 
on pvc.idcontacto =  c.idcontacto
where  pv.idempresa= "'.$id_empresa.'"
group by  pv.idempresa
';

		$result = $this->db->query($query_get);	
		return $result->result_array();								
	}

	/**/

	function get_resumen_accesos($id_evento){

		$query_get ="select sum(case when tipo  in ('Día del evento'  , 'General M' , 'General H & M'  )then 1 else 0 end )ventas_unicas,
						sum(case when tipo in ('Preventa 1' , 'Preventa 2',  'Preventa 3' , 'Preventa 4' , 'Preventa 5' , 'Preventa 6'  )  then 1 else 0 end )preveentas,
						sum(case when tipo in ('Único día', 'Promoción' , 'Promoción mujeres' , 'Promoción hombres')  then 1 else 0 end )promociones
						from acceso a inner join  tipo_acceso ta on a.idtipo_acceso =  ta.idtipo_acceso
						where a.idevento  =  '". $id_evento."' ";

		$result =  $this->db->query($query_get);				
		return $result->result_array();
	}
	/**/	
	function get_puntos_venta_asociadas($id_evento){


		$query_get ="select  
					(select count(*) from evento_punto_venta where idevento= '".$id_evento."' ) asociados,					
					count(0) contactos_asociados,
					sum(case when c.tel is not null and  CHAR_LENGTH(c.tel)>3 then 1 else 0  end ) con_tel,
					sum(case when c.movil is not null and  CHAR_LENGTH(c.movil)>3 then 1 else 0  end ) con_tel_movil,
					sum(case when c.correo is not null and  CHAR_LENGTH(c.correo)>3 then 1 else 0  end ) con_tel_movil,
					sum(case when c.direccion is not null and  CHAR_LENGTH(c.direccion)>3 then 1 else 0  end ) con_locacion,
					sum(case when c.pagina_web  is not null and  CHAR_LENGTH(c.pagina_web)>3 then 1 else 0  end ) con_web 
					from  punto_venta p 
					inner join evento_punto_venta
					evp 
					on p.idpunto_venta =  evp.idpunto_venta
					left outer join 
					punto_venta_contacto pvc on 
					p.idpunto_venta = pvc.idpunto_venta
					left outer join contacto c 
					on pvc.idcontacto =  c.idcontacto
					where evp.idevento = '".$id_evento."'
					group  by p.idempresa";

		$result =  $this->db->query($query_get);				
		return $result->result_array();
	}
	/*Búsqueda de los puntos de venta por nombre y de una empresa en específico*/
	function busqueda_empresa($param , $limit){

		$_num = $this->cargamos_base_img_puntos_venta( 4 , 0 );		
		$query_get ="
					select 
					pv.idpunto_venta,
					pv.razon_social, 
					i.* 
					from punto_venta pv 
					left outer join imagen_punto_venta ipv 
					on  pv.idpunto_venta =  ipv.idpunto_venta
					left outer join   tmp_img_$_num  i 
					on  ipv.id_imagen = i.idimagen
					where  pv.idempresa= '".$param["empresa"]."'					
					and pv.razon_social  
					like  '%".$param["punto_venta"]."%' limit ". $limit;					

		$result =  $this->db->query( $query_get );
		$data_complete =  $result->result_array();
		$this->cargamos_base_img_puntos_venta(4 , 1 , $_num);
		return $data_complete;			
	}
	/**/
	function asociar_evento_empresa($param){
		/**/			
		$punto_venta = $this->busqueda_empresa($param , 1); 						
		if(count($punto_venta)> 0 ){			
			$id_punto_venta =   $punto_venta[0]["idpunto_venta"];
			$id_evento =  $param["evento"];
			return $this->insert_evento_punto_venta($id_evento , $id_punto_venta );

		}else{
			return 0; 
		}

	}
	/**/
	function insert_evento_punto_venta($id_evento , $id_punto_venta ){

		$query_get =  "SELECT * FROM  evento_punto_venta WHERE idevento  =  '". $id_evento . "'  AND  idpunto_venta= '". $id_punto_venta."'  "; 
		$result =  $this->db->query($query_get);
		$data_exist =  $result ->result_array();
		if (count($data_exist) > 0 ){
			return true; 
			
		}else{
			
			$query_insert ="INSERT INTO  evento_punto_venta VALUES ('".$id_evento."' , '". $id_punto_venta."' )";
			return $this->db->query($query_insert);			
		}
	}
	/**/
	function q_evento($id_evento , $q){

		$query_get ="SELECT ". $q ."  FROM punto_venta p 
					INNER JOIN  evento_punto_venta ep  ON p.idpunto_venta  =  ep.idpunto_venta					
					WHERE  ep.idevento =  '". $id_evento ."'  ";
		$result = $this->db->query($query_get);					
		return $result ->result_array();
	}
	/**/
	function info($param){

		$query_get =  "SELECT  p.* , i.*  FROM  punto_venta p 
					   LEFT OUTER JOIN imagen_punto_venta ip  
					   ON  p.idpunto_venta  = ip.idpunto_venta 
					   LEFT OUTER JOIN imagen i 
					   on ip.id_imagen =  i.idimagen 
					   WHERE 
					   p.idpunto_venta = '".$param["punto_venta"]."'  "; 
		$result =  $this->db->query($query_get);
		return $result ->result_array();
	}


/**/
function insert_log($tipo_evento , $descripcion , $id_evento , $id_usuario){

	$navegador = navegador();
	$ip =  ip_user(); 
	$modulo =  1;

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
function asocia_evento($param){

	$id_evento   =  $param["evento"];
	$id_punto_venta =  $param["puntoventa"];
	$query_exist ="select * from evento_punto_venta  where idevento =  '". $id_evento."' and idpunto_venta = '". $id_punto_venta."' limit 1";
	$result = $this->db->query($query_exist);					
	$exist = $result->num_rows(); 		
	$dinamic_query = "SELECT 1 ";		
	if($exist ==  0 ){
		$dinamic_query ="INSERT INTO evento_punto_venta VALUES('". $id_evento."'  , '". $id_punto_venta ."') ";
	}	
	$result =   $this->db->query($dinamic_query);		
	if ($result ==  true) {		
		$log_evento =  "Cargo un punto de venta al evento ". $param ["enid_evento"] ." id- ".$id_punto_venta;
		$this->insert_log(1 , $log_evento , $id_punto_venta , $param["id_usuario"]);
	}
	return $result;
}
/**/
function delete_punto_venta_evento($id_evento , $id_punto_venta , $id_usuario, $param ){
	$query_delete = "DELETE FROM evento_punto_venta 
					 WHERE idevento = '". $id_evento."' 
					 AND 
					 idpunto_venta = '". $id_punto_venta."' ";

	$result =   $this->db->query($query_delete);
	if ($result ==  true ){
		$log_evento =  "Indicó que el punto de venta id- ".$id_punto_venta ." ya no está disponible para el evento ". $param["enid_evento"];
		$this->insert_log(1 , $log_evento , $id_punto_venta , $id_usuario);		
	}
	return $result;
}
/**/
function update_locacion_maps($param){	
	
	$place_id =  $param["place_id"];
	$formatted_address =  $param["formatted_address"];
	$punto_venta =  $param["identificador"];
	$lat = $param["lat"]; 
	$lng = $param["lng"]; 
	$query_update = "UPDATE punto_venta 
					SET  					
					place_id = '".$place_id ."'  ,  
					formatted_address = '". $formatted_address  ."', 					
					lat =  '".$lat."' , 
					lng = '".$lng."' 
					WHERE idpunto_venta = '".$punto_venta."' limit 1"; 
	return $this->db->query( $query_update);	
}
/*Termina modelo */
}