<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tareas_enid extends CI_Controller{
    function __construct(){
       parent::__construct();            
       $this->load->library('mensajeria');    
       $this->load->model("tareasmodel");
    }
    /**/
    function index(){

    	$db_response =$this->tareasmodel->get_tareas_disponibles();
    	
    	$sql = $db_response["query_get"];
    	$publicidad_disponible =  $db_response["publicidad_info"];
    	if (count($publicidad_disponible) > 0 ){
   			echo $this->construye_mail($publicidad_disponible ).$sql;
    	}else{
    		echo "No hay publicaciones dispoonibles" . $sql ;
    	}		
    }
    /**/

    /**/
    function construye_mail($publicidad_disponible ){

    	$dispoonibles = [];
        $users_disponibles = [];
        $b = 0;
        $flag_usuarios = 0;
        $response_info = [];

        $r =  ""; 
    	foreach ($publicidad_disponible as $row){

            $id_tipo_publicidad = $row["id_tipo_publicidad"];
            $id_publicidad  = $row["id_publicidad"];
            switch ($id_tipo_publicidad){

                /*Para cuando es usuario con cuenta pero sin eventos + un día */
                case 1:

                    $response_info = $this->tareasmodel->get_users_publicidad( 1 , $id_publicidad , $id_tipo_publicidad );                    
                    $r .= $this->evalua_envio_mail($response_info ,  $id_publicidad );
                    break;                

                /*Para cuando es usuario ya tiene registrados eventos pero es prospecto*/
                case 2:

                    $response_info = $this->tareasmodel->get_users_publicidad(2 , $id_publicidad , $id_tipo_publicidad );                    
                    $r .= $this->evalua_envio_mail($response_info ,  $id_publicidad );

                    break;    

                /*Todos los usuarios */
                case 3:

                    $response_info = $this->tareasmodel->get_users_publicidad(3 , $id_publicidad , $id_tipo_publicidad );                    
                    $r .= $this->evalua_envio_mail($response_info ,  $id_publicidad );                    
                    
                    break;   


                /*Todos los usuarios de usuario venta*/
                case 4:
                    $response_info = $this->tareasmodel->get_usuarios_venta(4 , $id_publicidad , $id_tipo_publicidad );                    
                    $r .= $this->evalua_envio_mail($response_info ,  $id_publicidad  , 1);                    
                    break;
                

                    
                    
                default:                    

                    break;
            }

            $b++;
    	}

        
        return $r;
    }


    /**/
    function evalua_envio_mail($response_info ,  $id_publicidad ,  $camp_venta = 0 ){

        $r = "" ;
        $data_usuarios =  $response_info["data_usuarios"];        
           
            if(count($data_usuarios ) > 0){

                $r .=  $this->construye_mail_complete($data_usuarios ,  $id_publicidad  , $camp_venta  )
                    ."<pre> " . print_r($response_info). "</pre>";

                
            }else{
                $r .=  "<pre> " . print_r($response_info). "</pre>";
            } 
        return $r;

    }
    /**/
    function construye_mail_complete($usuarios , $id_publicidad , $camp_venta ){
        
        /**/
        $imgs  =  $this->tareasmodel->get_imagenes_publicidad($id_publicidad);
        /**/
        $publicidad =  $this->tareasmodel->get_publicidad($id_publicidad)[0];     
        $p_nombre = $publicidad["nombre"];
        $p_descripcion =  $publicidad["descripcion"];
        $id_tipo_publicidad = $publicidad["id_tipo_publicidad"];
        $lista_reporte =  ""; 
        $test =""; 

        $plantilla =$camp_venta;
    
        foreach ($usuarios as $row){
        
            $id_usuario =  $row["idusuario"];
            $nombre =  $row["nombre"];
            $email =  trim($row["email"]);
            $email_alterno =  $row["email_alterno"];            

            $lista_reporte .=  "Esto se enviará .-
            " . $this->mensajeria->notifica_mail_marketing( $plantilla , $p_nombre, $p_descripcion , $id_tipo_publicidad  , $email , $nombre ,  $email  , $email_alterno , $imgs  ) ."<br><br><br><br>";
            
            if ($email !=  "enidservice@gmail.com"){
                
                if ($camp_venta == 0) {
                    $test .=  $this->tareasmodel->insert_mail_publicidad($id_usuario ,  $id_publicidad );        
                }else{
                    $test .=  $this->tareasmodel->insert_mail_publicidad_prospecto($id_usuario ,  $id_publicidad );        
                }
            }
            

        }
        return $lista_reporte;
        //return $test;
        
    }   
    /**/
}/*Termina el controlador */