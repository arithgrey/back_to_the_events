<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventos extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->helper('eventosh');        
        $this->load->model("eventmodel");        
        $this->load->library("principal");
        $this->load->library('sessionclass');      
    }
    private  function checkifexist($idevento){
        return $this->eventmodel->checkifexist((int)$idevento );        
    }
    /**/
    function nuevo(){



        $param =  $this->input->get();
        $data = $this->val_session("");                
        $id_evento =  $param["q"];
        if (!isset($id_evento)) {
            header('Location:' . url_inicio_eventos());
        }
        $q="";
    
        
            if ($this->checkifexist($id_evento) == 1 ){
                
                $data["evento"] = $id_evento;
                $data["q"] =  $q;                
                $data_evento = $this->eventmodel->getEventbyid($id_evento);
                $data["data_evento"] = $data_evento[0];      
                $data["tipos_accesos"] = $this->eventmodel->get_tipos_accesos();                         
                $nombre_evento = $data_evento[0]["nombre_evento"];
                $data["titulo"] = "evento - $nombre_evento - configuración";
                $data["meta_keywords"]= "evento,$nombre_evento,configuración";
                $data["url_img_post"] = create_url_preview(1 , $id_evento);
                $this->principal->show_data_page($data, 'eventos/publicar');
                $this->principal->crea_historico(18 , $id_evento , $this->sessionclass->getidusuario() );

            }else{
                    header('Location:' . url_inicio_eventos());
            }  
        
                    
    }/*termina la función*/
    function val_session($titulo_dinamico_page ){        
        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["email"]= $this->sessionclass->getemailuser();                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] =1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                $data["id_usuario"] = $this->sessionclass->getidusuario();                     
                $data["id_empresa"] =  $this->sessionclass->getidempresa();                     
                $data["info_empresa"] =  $this->sessionclass->get_info_empresa();                     
                return $data;
        }else{            
            redirect(url_log_out());
        }   
    }      

    /**/

}/*Termina en controlador*/