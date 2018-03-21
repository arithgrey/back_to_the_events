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
                        VALUES( '".$pagina_url."'  , 
                        	'".$ip."'  , '".$dispositivo."'  
                        	, '". $tipo ."'  
                        	,  $id_evento 
                        	, $id_usuario 
                        	, $id_empresa)"; 
      		return  $this->db->query($query_insert);
            
            
            
		}
		/**/
		function show_data_page($data, $center_page , $tema = 0 ){           


	            $this->load->view("../../../view_tema/header_template", $data);
	            $this->load->view($center_page , $data);            
	            $this->load->view("../../../view_tema/footer_template", $data);
	                            
	    }
	    
	
	}
?>