<?php defined('BASEPATH') OR exit('No direct script access allowed');
class generosmusicalesmodel extends CI_Model {
function __construct(){
        parent::__construct();        
        $this->load->database();
}	
function getDataByidEvent($idempresa, $idevento){
	
	
	$query_get ="SELECT gm.idgenero_musical , gm.nombre , egm.idgenero_musical as idg , egm.idevento  FROM  
	genero_musical as gm  left outer join evento_genero_musical  as egm  
	on gm.idgenero_musical = egm.idgenero_musical and egm.idevento = '".$idevento."' ";

	$result  = $this->db->query($query_get);
	return $result->result_array();

}
/**/

/**/
function update_genero_evento($param){

	$query_exist ="SELECT * FROM  evento_genero_musical  WHERE 
	idevento='".$param["id_evento"]."' 
	AND   
	idgenero_musical='". $param["id_genero"] ."' limit 1";

	$result  = $this->db->query($query_exist);
	$num = $result->num_rows();	
	$dinamic_query ="";

		if ($num > 0 ) {			

			$dinamic_query ="DELETE FROM evento_genero_musical 
			WHERE idevento='".$param["id_evento"]."' 
			AND  
			idgenero_musical='".$param["id_genero"]."' limit 1";			
			$this->delete_evento_genero($param["id_evento"] , $param["id_genero"]); 


			$actividad = "el genero musical ";			
			$this->record_log($actividad , $param["id_user"] , $param["id_empresa"] , $param["id_evento"] , 5 , "DELETE" , $param["id_genero"]);
			/**/
			
		}else {

			$dinamic_query ="INSERT INTO evento_genero_musical VALUES( 
				'".$param["id_evento"]."' ,
				 '".$param["id_genero"]."') ";
			$this->insert_evento_genero_text($param["id_genero"] , $param["id_evento"]);		

			$actividad = "el genero musical ";			
			$this->record_log($actividad , $param["id_user"] , $param["id_empresa"] , $param["id_evento"] , 5 , "INSERT" , $param["id_genero"]);
			
		}		
	$result_dinamic_query = $this->db->query($dinamic_query);	
	return $result_dinamic_query;
}

function get_genero_musical_by_id($id_genero){
	
	$query_get ="SELECT * FROM  genero_musical WHERE idgenero_musical = '". $id_genero ."' "; 
	$result =  $this->db->query($query_get);
	return $result->result_array();
}
/*Creamos tabla que nos servirá como soporte del sistema, búsqueda palabra clave  */
function insert_evento_genero_text($id_genero , $id_evento ){

	$query_get ="SELECT nombre FROM  genero_musical WHERE idgenero_musical = '". $id_genero ."' "; 
	$result =  $this->db->query($query_get);
	$genero_data =  $result->result_array();

	$genero_text =  $genero_data[0]["nombre"];
	$query_insert =  "INSERT INTO  evento_genero (id_evento, genero , id_genero )
	 VALUES('". $id_evento."' , '". $genero_text ."' , '". $id_genero ."'  )";  
	return  $this->db->query($query_insert);	
}
/**/
function delete_evento_genero($id_evento , $id_genero){

	$query_delete = "DELETE FROM evento_genero WHERE id_evento = '".$id_evento ."'  AND  id_genero = '". $id_genero ."' ";
	return 	$this->db->query($query_delete);
}

/**/
function get_geros_empresa($id_empresa){

	$query_get = "SELECT g.* , egm.* FROM genero_musical g inner join  empresa_genero_musical egm on g.idgenero_musical = egm.idgenero_musical  and  egm.id_empresa =  '". $id_empresa."' ";
	$result =  $this->db->query($query_get);	
	return $result->result_array();
}
/**/
function get_generos_musicales(){
	$query_get =  "SELECT *  FROM genero_musical"; 	
	$result =  $this->db->query($query_get);	
	return $result->result_array();

}
/**/
function insert_genero_empresa($id_empresa , $param ){
	
	/**/
	$query_get ="SELECT * FROM genero_musical WHERE nombre ='". $param["genero_musical"]."' ";	
	$result =  $this->db->query($query_get);
	$id_genero = $result->result_array()[0]["idgenero_musical"];

		/*Verifica si existe*/
		$query_exist =  "SELECT *  FROM empresa_genero_musical WHERE id_empresa   ='". $id_empresa ."'  AND idgenero_musical = '". $id_genero."'  "; 
		$result_exist =  $this->db->query($query_exist);
		$re = $result_exist ->result_array();

		if(count($re) > 0 ){
			return 1;
		}else{
			/*Insertamos en la base de datos*/
			$query_insert = "INSERT INTO empresa_genero_musical VALUES('". $id_empresa ."' , '".  $id_genero  ."'   )";
			return $this->db->query($query_insert);

		}


}
/**/
function delete_genero_empresa($id_empresa , $id_genero){

	$query_delete ="DELETE FROM empresa_genero_musical WHERE id_empresa   ='". $id_empresa ."' AND idgenero_musical = '". $id_genero."' ";
	return $this->db->query($query_delete);
}
/*Termina modelo */
function record_log($actividad , $idusuario , $idempresa , $id_evento , $tipo , $accion  , $id_genero = 0 ){

	$query_insert="INSERT INTO  log_evento(
				actividad  , 
				id_usuario , 
				idempresa , 
				id_evento  , 
				tipo , 
				accion,
				id_genero ) 
				VALUES(
					'". $actividad."' , 
					'". $idusuario  ."' ,  
					'". $idempresa ."' , 
					'". $id_evento ."' , 
					'". $tipo ."' , 
					'". $accion ."' ,
					'". $id_genero  ."'
					 )";

	$this->db->query($query_insert);						
}	
}