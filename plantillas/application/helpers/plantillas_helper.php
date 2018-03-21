<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/**/
function valida_selector_restriccines($identificador , $flag ,  $texto , $class ,  $id ){
    $btn =  "";  
    if ($flag == 1 && $identificador =="new_restricciones_templ") {
          $btn =  btn_carga_todos_los_eventos($flag , $texto , $class , $id );
    }
    return $btn;        
}
/**/
function valida_btn_agregar($check , $identificador , $id_contenido ){    
    $btn = ""; 
    if ($check!= '' ) {
        $btn = n_row_12(). 
                    '<button class="'. $identificador .' btn btn-default btn_templates" id="'. $id_contenido . '" >
                        + agregar 
                    </button>';                              
        $btn.= end_row();
    }
    return  $btn;

}

/**/
function msj_url_template($template , $flag ){

    $mensaje = "";
    $modal =  ""; 
    switch ($template) {
        case 'contenido-text-templ':
            $mensaje =  "Registrar nueva plantilla, que describe como se vivirá la experiencia en los eventos";    
            $modal =  "experiencia"; 
            break;
            
        case 'new_politica_template':
            $mensaje =  "Registrar nueva plantilla de politicas en los eventos";       
            $modal =  "politica"; 
            break;
        
        case 'new_restricciones_templ':
            $mensaje =  "Registrar nueva registricción para los eventos";       
            $modal =  "restriccion"; 
            break;

        case 'escenarios':
             $mensaje =  "Registra una nueva plantilla para los escenarios";       
                $modal =  "escenario";                 
            break;    

        default:
            break;


    }

    $url =  url_templates($modal);     

    if ($flag ==  1) {
        return "<a title='Cargar más plantillas a tu cuenta' class='url_templates' href='".$url."'>                
                + " . $mensaje ."            
            </a>";    
    }else{
        return "";
    }
    
}   

/**/
function politicas_contenido($data){

    $class_enid  = "scroll-horizontal-enid";
    if (count($data) > 5 ) {
        $class_enid  = "scroll-enid";
    }

    $list = "<div class='". $class_enid ."'> <ul class='activity-list'>";  
    $flag =  1; 
    foreach ($data as $row) {
        
        $nombre_contenido   =  $row["nombre_contenido"];
        $descripcion_contenido =  $row["descripcion_contenido"];

        $list .=  '
            <li>
                <div class="avatar">
                    '. $flag .'
                </div>
                <div class="activity-desk">
                    <h5>
                        <a>
                        '. $nombre_contenido .'
                        </a>                                                 
                    </h5>
                    <p class="text-muted">
                        '. $descripcion_contenido .'
                    </p>
                </div>
            </li>';                      
                
            $flag ++;
    }
    
    $list .=  "</ul></div>";
    return $list;
    
    return $data;

}

/**/
function get_porcentaje_templates_eventos($contenidos , $val ){

        $result =0;
        if ($val>0 ) {

            $result =  ($val/ $contenidos )* (100);
            $result =   number_format( $result , 2, '.', ' ')."%";              
        }

        return $result;
}
/**/
function get_class_template($data_contenido){

    $class_enid =""; 
    if(count($data_contenido)> 5) {
        $class_enid = 'scroll-vertical-enid scroll-enid-public';
    }

}
/*Desplegamos las listas de restricciones*/ 
function get_status_text($status){
    switch ($status) {
        case 1:
            return "Plantilla tipo, descripción de evento";
            break;
        
        default:
            return "";
            break;
    }
}
    /**/
    function btn_delete_template($flag ,  $id_contenido ,  $extra = "" ){
        $btn =  '';
        if ($flag == 1 ){
            $btn .='
                    <div class="pull-right clearfix">
                        <i class="delete_contenido_template fa fa-times white" id="'. $id_contenido .'"  '. $extra .' >
                        </i>
                         
                     </div>
            ';  
        }
        return $btn;    
    }
/*****************+****************+****************+****************+****************+*/
}/*Termina el helper*/