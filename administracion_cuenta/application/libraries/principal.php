<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
	require "interfaces/iRegistro.php";
	class principal extends CI_Model implements  iRegistro{	 			
		
		function crea_historico( $tipo , $id_evento = 0 , $id_usuario = 0  , $id_empresa = 0){

			$pagina_url =  base_url(uri_string());         
	        $ip = $this->input->ip_address();               
	        $dispositivo  = $this->agent->agent_string();        

	        $query_insert =  "INSERT INTO pagina_web(
		                      url,             
		                      ip ,            
		                      dispositivo , 
		                      tipo , 
		                      id_evento , 
		                      id_usuario , 
		                      id_empresa  )
                        VALUES( '".$pagina_url."'  , '".$ip."'  , '".$dispositivo."'  , '". $tipo ."'  ,  $id_evento , $id_usuario , $id_empresa)"; 
      		return  $this->db->query($query_insert);
            
            
            
		}
		/**/
		function show_data_page($data, $center_page , $tema = 0 ){
			$this->load->view("../../../view_tema/header_template", $data);
			$this->load->view($center_page , $data);            
			$this->load->view("../../../view_tema/footer_template", $data);
	       
	    }
	    /**/
	 	function isuserexistrecord($mail, $secret){

		        $responsedb = $this->enidmodel->validauserrecord($mail , $secret);
		        /*Validamos que exista el usuario en la db*/        
		        if (count($responsedb) == 1){
		            /*Crear session*/ 
		                $responsedb =  $responsedb[0];                                
		                $id_usuario = $responsedb["idusuario"];
		                $nombre = $responsedb["nombre"];
		                $email =  $responsedb["email"];                
		                $fecha_registro = $responsedb["fecha_registro"]; 
		            /*Response url*/        
		            return $this->createsession($id_usuario, $nombre , $email);            

		        }else{
		            /*Response data error*/        
		            return "Error en en los datos de acceso"; 
		        }               
	    }   
	    /**/  
	    /*
    	function createsession($id_usuario, $nombre , $email){
	       
	        $id_empresa =  $this->enidmodel->getidempresabyidusuario($id_usuario); 
	        $id_perfil =  $this->enidmodel->getperfiluser($id_usuario); 
	        $perfildata =  $this->enidmodel->getperfildata($id_usuario); 
	        $empresa_permiso =  $this->enidmodel->get_empresa_permiso($id_empresa);
	        $empresa_recurso =  $this->enidmodel->get_empresa_recurso($id_empresa);         
	        $data_navegacion =  $this->enidmodel->display_recursos_by_perfiles($id_perfil); 

	        $newdatasession = array(            
	            "idusuario" => $id_usuario , 
	            "nombre" => $nombre ,
	            "email" => $email ,            
	            "perfiles" => $id_perfil ,  
	            "perfildata" => $perfildata ,
	            "idempresa" => $id_empresa ,
	            "empresa_permiso" => $empresa_permiso , 
	            "empresa_recurso" => $empresa_recurso , 
	            "data_navegacion" =>  $data_navegacion ,            
	            'logged_in' => TRUE
	        );   

	        $this->session->set_userdata($newdatasession);                                          
	        return 1;
	    }    	
	    */	

	}
?>