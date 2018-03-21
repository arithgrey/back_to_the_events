<?php defined('BASEPATH') OR exit('No direct script access allowed');
class tareasmodel extends CI_Model{
	function __construct(){
	    parent::__construct();        
	    $this->load->database();
	}
	/**/    
	function  get_usuarios_venta($type, $id_publicidad , $tipo_publicidad){		
		/**/
		$_num =  get_random();	
		$this->create_tmp_prospecto_venta($_num , 0 , $id_publicidad);
	
		$query_get =  "SELECT id_prospecto_venta  
							  idusuario , 
							  nombre ,   
							  email ,   
							  email  AS email_alterno 							  
							  FROM prospecto_venta  WHERE  status =  1
							  AND  id_prospecto_venta 
							  NOT IN(SELECT id_prospecto_venta FROM tmp_prospecto_venta_$_num )"; 

		
		$result =  $this->db->query($query_get);						
		$data_complete["data_usuarios"] =  $result->result_array();
		$this->create_tmp_prospecto_venta($_num , 1 , $id_publicidad);
		return $data_complete;

		/**/
	}
	/**/
	function create_tmp_prospecto_venta($_num , $flag , $id_publicidad){

		$query_drop =  "DROP TABLE  IF exists tmp_prospecto_venta_$_num";
		$db_response =  $this->db->query($query_drop);

		if ($flag ==  0){
			/**/
			$query_create =  "CREATE TABLE  tmp_prospecto_venta_$_num 
								SELECT * FROM  prospecto_venta_publicidad 
								WHERE id_publicidad = '".$id_publicidad."' ";  
			$db_response =  $this->db->query($query_create);
		}
		return $db_response;
	}

	/**/

	/**/
	function get_imagenes_publicidad($id_publicidad){
		$_num =  get_random();
		$query_create =  "SELECT * FROM imagen_publicidad WHERE id_publicidad = $id_publicidad";
		$this->create_tmp_img(9 , $_num , 0  , $query_create);


		$query_get =  "SELECT im.* FROM tmp_img_$_num im 
						INNER JOIN tmp_tb_intermedia_img_$_num  inter 
						ON im.idimagen =  inter.id_imagen
						WHERE inter.id_publicidad =  '".$id_publicidad."' LIMIT 10";
		
		$result =  $this->db->query($query_get);
		$data_complete = $result->result_array();
		$this->create_tmp_img(9 , $_num , 1  , $query_create);
		return $data_complete;


	}
	/**/
	function create_tmp_img($tipo , $_num , $flag  , $select_tabla_intermedia){


		$query_drop =  "DROP TABLE IF exists tmp_img_$_num"; 
		$db_response =  $this->db->query($query_drop);

		/*Para la tabla intermedia */
		$query_drop = "DROP TABLE IF exists tmp_tb_intermedia_img_$_num";
		$db_response =  $this->db->query($query_drop);

		/**/
		if ($flag == 0 ){
			
			$query_create =  "CREATE TABLE tmp_img_$_num 
							AS 
							SELECT * FROM imagen WHERE type='".$tipo."' ";			

			$db_response =   $this->db->query($query_create);					
			/**/

			$query_create =  "CREATE TABLE  tmp_tb_intermedia_img_$_num AS  ".$select_tabla_intermedia; 
			$this->db->query($query_create);
			/**/
		}

	}
	/**/
	function insert_mail_publicidad($id_usuario ,  $id_publicidad ){

		$query_insert =  "INSERT INTO  
							usuario_mensaje_publicidad( 
							idusuario     ,
				 			id_publicidad) 
							VALUES($id_usuario , $id_publicidad ) "; 
		return  $this->db->query($query_insert);													

	}

	function insert_mail_publicidad_prospecto($id_usuario ,  $id_publicidad ){

		$query_insert =  "INSERT INTO  
							prospecto_venta_publicidad( 
							id_prospecto_venta     ,
				 			id_publicidad) 
							VALUES($id_usuario , $id_publicidad ) "; 
		return  $this->db->query($query_insert);													

	}
	/**/
	function get_publicidad($id_publicidad){

		$query_get =  "SELECT * FROM publicidad WHERE id_publicidad =  $id_publicidad LIMIT 1"; 
		$result =  $this->db->query($query_get);
		return $result->result_array();

	}
	/**/
	function get_users_publicidad($type, $id_publicidad , $tipo_publicidad){

		switch ($type) {
			case 1:
				return $this->usuario_prospectos($type, $id_publicidad , $tipo_publicidad);
				break;
	
			case 2:


				$param["tipo"] =  $tipo_publicidad;
				
				return $this->get_organizaciones_con_eventos_prospecto($type, $id_publicidad , $tipo_publicidad);
				break;			


			case 3:
				$param["tipo"] =  $tipo_publicidad;	
				return $this->create_users_enid($type, $id_publicidad , $tipo_publicidad);
				break;		
			default:
				
				break;
		}
	}
	/**/
	function create_users_enid($type, $id_publicidad , $tipo_publicidad){
		
		$_num =  get_random();      
		$this->create_tmp_user_all_user_eni($_num , 0 );
		$this->create_tmp_usuario_mensaje_publicidad($_num , 0  , $id_publicidad );

		$query_get = "SELECT 
					u.* , 
					p.idusuario  existent
					FROM tmp_users_enid_$_num u 
					LEFT OUTER  JOIN
					tmp_usuario_mensaje_publicidad_$_num p 
					ON  
					u.idusuario = p.idusuario 
					WHERE p.idusuario IS NULL";

		$result = $this->db->query($query_get);				
		$data_complete["data_usuarios"] =  $result->result_array();
		$data_complete["sql"] =  $query_get;

		$this->create_tmp_user_all_user_eni($_num , 1 );
		$this->create_tmp_usuario_mensaje_publicidad($_num , 1 , $id_publicidad );

		return $data_complete;
	}
	/**/
	function create_tmp_user_all_user_eni($_num , $flag ){
			
		$query_drop ="DROP TABLE IF exists tmp_users_enid_$_num";		
		$db_response =  $this->db->query($query_drop);


		if ($flag == 0 ) {
			
			$query_create = "CREATE TABLE tmp_users_enid_$_num 
				AS 
					SELECT 			
					u.idusuario ,
					u.nombre ,  
					u.email ,  
					u.email_alterno, 
					u.idempresa 								
				FROM usuario u WHERE status = 1";
				$this->db->query($query_create);
		}
		return $db_response;

	}
	/**/
	function create_tmp_usuario_mensaje_publicidad($_num ,  $flag , $id_publicidad){
		$query_drop = "DROP TABLE IF exists  tmp_usuario_mensaje_publicidad_$_num"; 
		$db_response = $this->db->query($query_drop);
		
		if ($flag == 0 ){
			
			$query_create = "CREATE TABLE tmp_usuario_mensaje_publicidad_$_num  AS 
							SELECT  * FROM  usuario_mensaje_publicidad
							WHERE  id_publicidad = $id_publicidad";
			$db_response = $this->db->query($query_create);
		}
		return $db_response;
	}
	/**/
	function get_organizaciones_con_eventos_prospecto($type, $id_publicidad , $tipo_publicidad){

      $_num =  get_random();      
      $this->create_organizaciones_prospecto($_num , 0 );
      $this->create_empresa_con_eventos($_num , 0 );  
      $this->create_usuarios_prospectos_empresa_evetos( $_num , 0);

        /*Quitamos a los usuarios que estén en usuario_mensaje_publicidad */
        $query_get =  "SELECT * FROM tmp_usuarios_con_evenos_$_num  WHERE idusuario 
        NOT IN( SELECT  idusuario FROM  usuario_mensaje_publicidad WHERE  id_publicidad= $id_publicidad )";
        $result = $this->db->query($query_get);
        
		$data_complete["sql_final"] =  $query_get;		       
        $data_complete["data_usuarios"] =  $result->result_array();
	
	  $this->create_organizaciones_prospecto($_num , 1 );
      $this->create_empresa_con_eventos($_num , 1 );  
      $this->create_usuarios_prospectos_empresa_evetos( $_num , 1 );     

      return  $data_complete;
     
    }
    /**/

    /**/
    function create_organizaciones_prospecto($_num , $flag){

        $query_drop =  "DROP TABLE IF exists tmp_emp_prospecto_$_num";
        $db_response = $this->db->query($query_drop);

        if ($flag == 0 ){
          
          $query_create =  "CREATE TABLE tmp_emp_prospecto_$_num AS  
                            SELECT 
                            idempresa  ,     
                            nombreempresa ,   
                            idCountry      , 
                            fecha_registro 
                            FROM empresa WHERE status =  1"; 
          $db_response =  $this->db->query($query_create);

        }
        return $db_response;
    }
    /**/
    function create_empresa_con_eventos($_num , $flag ){        

      $query_drop =  "DROP TABLE IF exists tmp_empresa_eventos_$_num";
      $db_response =  $this->db->query($query_drop);

      if ($flag == 0 ){

            $query_get ="CREATE TABLE tmp_empresa_eventos_$_num   AS 
            	  SELECT emp.idempresa , 
                  SUM(CASE WHEN  e.idempresa > 0 then 1 else 0  end)eventos  
                  FROM tmp_emp_prospecto_$_num emp 
                  INNER JOIN
                  evento e 
                  ON emp.idempresa =  e.idempresa GROUP BY  
                  emp.idempresa";
            
            $db_response =  $this->db->query($query_get);


      }

      return $db_response;

    } 
    function create_usuarios_prospectos_empresa_evetos( $_num , $flag){

    	$query_drop = "DROP TABLE  IF exists tmp_usuarios_con_evenos_$_num"; 
    	$db_response =  $this->db->query($query_drop);

    		if ($flag ==0 ){
    			
    			$query_create =  "CREATE TABLE tmp_usuarios_con_evenos_$_num AS 
					    			SELECT   
							    	u.idusuario , 
							    	u.nombre ,   
							    	u.email ,   
							    	u.email_alterno,  
							    	u.idempresa 
							    	FROM  
							    	usuario u 
							    	INNER JOIN     	
							    	tmp_empresa_eventos_$_num
							    	emp  ON  u.idempresa =  emp.idempresa";
				$db_response =  $this->db->query($query_create);
    		}
    		return $db_response;
    	

    }





















	/**/
	function usuario_prospectos($type, $id_publicidad , $tipo_publicidad){


		$_num =  get_random();
		/*Aquí ta tengo las empresas que no han registrado eventos*/
		$sql_empresas  = $this->create_tmp_empresas_eventos($_num , 0 );
		$sql_usuarios = $this->create_tmp_usuario_prospecto($_num , 0 ,  $id_publicidad , $tipo_publicidad);

		$query_get =  "SELECT * FROM tmp_usuario_prospecto_$_num";
		$result = $this->db->query($query_get);


		$data_complete["sql_empresas"] =  $sql_empresas;
		$data_complete["sql_usuarios"] =  $sql_usuarios;
		$data_complete["sql_final"] =  $query_get;
		$data_complete["data_usuarios"] =  $result->result_array();

		$this->create_tmp_empresas_eventos($_num , 1 );
		$this->create_tmp_usuario_prospecto($_num , 1 ,  $id_publicidad , $tipo_publicidad);


		return $data_complete;

	}
	/**/

	/**/
	function create_tmps_users_publicidad($_num , $flag ,  $type , $extra_sql , $id_publicidad ){

		$query_drop =  "DROP TABLE IF exists usuario_publicidad_$_num"; 
		$db_response = $this->db->query($query_drop);	

		$query_create =  "CREATE TABLE usuario_publicidad_$_num AS  
							  SELECT  * FROM  
							  usuario_publicidad 
							  WHERE 
							  tipo_publicidad = '".$type."' AND id_publicidad = '".$id_publicidad."'  ". $extra_sql;
		
		if ($flag == 0 ){			
			$db_response = $this->db->query($query_create);				
		}
		//return $db_response;
		return $query_create;

	}
	/**/
	function create_tmp_empresas_eventos($_num , $flag ){

		$query_drop =  "DROP TABLE IF exists tmp_empresas_prospecto_registrantes_evento_$_num";
		$db_response = $this->db->query($query_drop);
		$query_drop =  "DROP TABLE IF exists tmp_empresas_prospecto_evento_$_num";
		$db_response = $this->db->query($query_drop);

		$query_create =  "";
		if ($flag == 0 ) {
				
			/*Aquí estan las que si registrarín*/
			$query_create =  "CREATE TABLE tmp_empresas_prospecto_registrantes_evento_$_num  AS 
							  SELECT  idempresa FROM evento 
							  WHERE DATE(fecha_registro) 
							  BETWEEN  DATE_ADD(CURRENT_DATE() , INTERVAL -1 MONTH) AND
							  DATE(current_date())   GROUP BY idempresa"; 			
			$this->db->query($query_create);

				/*Ahora saco quienes son cero eventos*/

				$query_create =  "CREATE TABLE tmp_empresas_prospecto_evento_$_num AS 
									SELECT  idempresa , status ,  fecha_registro  FROM empresa 
									WHERE 
									idempresa NOT IN(SELECT idempresa FROM  tmp_empresas_prospecto_registrantes_evento_$_num  )
									AND status =  1"; 
									$this->db->query($query_create);


			

		}
		return $query_create;

	}
	/**/
	function create_tmp_usuario_prospecto($_num , $flag , $id_publicidad , $tipo_publicidad  ){

		$query_drop =  "DROP TABLE IF exists usuarios_empresas_prospectos_$_num";
  		$db_response =  $this->db->query($query_drop);    
		  	
  			$query_drop =  "DROP TABLE IF exists tmp_usuario_prospecto_$_num";
		  	$db_response =  $this->db->query($query_drop);  								


		$query_create =  "";
  		
  		if ($flag == 0 ){  			

  			/*Creamos lista de usuarios */  			  			
  			$query_create =  "CREATE TABLE usuarios_empresas_prospectos_$_num AS 
					  			SELECT  
								u.idusuario ,
								u.nombre ,  
								u.email ,  
								u.email_alterno, 
								u.idempresa 								
								FROM  usuario u INNER JOIN  tmp_empresas_prospecto_evento_$_num e
								on u.idempresa = e.idempresa"; 
			$db_response =  $this->db->query($query_create);			
			
			/*Ahora verificamos mandamos a los usuarios que ya se les envió un mail*/
			$query_create =  "CREATE TABLE  tmp_usuario_prospecto_$_num AS  
								SELECT * FROM usuarios_empresas_prospectos_$_num up  WHERE 
								up.idusuario NOT IN(SELECT idusuario FROM usuario_mensaje_publicidad WHERE id_publicidad = $id_publicidad )";
			$this->db->query($query_create);					

  		}
  		return $query_create;
	}
	/**/
	function get_tareas_disponibles(){

		$query_get =  "SELECT 
						DAYOFWEEK(current_date())dia_semana , 
						hour(curTime())hora_dia ,  
						minute(curTime())munito_dia";
		$result =  $this->db->query($query_get);	
		$data_date =  $result->result_array()[0];
		$dia_semana = $data_date["dia_semana"]; 
		$hora_dia = $data_date["hora_dia"]; 
		$minuto_dia = $data_date["munito_dia"];
		
		$publicaciones_response =  $this->gestion_publicidad($dia_semana , $hora_dia , $minuto_dia );		
		return $publicaciones_response;
	}
	
	/**/
	function gestion_publicidad($dia_semana , $hora_dia , $minuto_dia ){


		$dias_select= ["" , "", "L",  "M" , "MM", "J", "V", "S", "D" ];
		$horas_select = ["" , "", "hl", "hm" , "hmm" , "hj" , "hv" , "hs" , "h"];

		$dia_seleccionado =  $dias_select[$dia_semana];
		$hora_seleccionada  =   $horas_select[$dia_semana];


		if ($hora_dia > 12 ){
			$hora_dia =  $hora_dia -12;
		}
		/*
		$query_get =  "SELECT id_publicidad , id_tipo_publicidad  FROM publicidad WHERE $dia_seleccionado =  1
					   AND  
					   LEFT($hora_seleccionada , 2) =  $hora_dia 
					   AND 
					   SUBSTRING($hora_seleccionada , 4 , 2) = $minuto_dia";					   
		
		*/
		$query_get =  "SELECT id_publicidad , id_tipo_publicidad FROM publicidad 
					   WHERE
					   status =  1 AND  
					   $dia_seleccionado =  1
					   AND  
					   LEFT($hora_seleccionada , 2) =  $hora_dia 
					   ";					   
		
					   

		$data_info["query_get"] =  $query_get;
		$result = $this->db->query($query_get);	
		$data_info["publicidad_info"] =  $result->result_array();
		return $data_info;
		
	}
}