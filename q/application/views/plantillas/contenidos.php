<?php 
    /*Declaramos variables */
    $class_enid = '';  
    $list_templa_contenido='';  
    $total = 0;  
    $del = 0; 
    $check =  0;  
    $identificador = $param["identificador"];     
    if ($param["public"] == 0 ) { $del = 0; $check =  1;}
    if (count($contenidos)> 2) {$class_enid = 'scroll-vertical-enid scroll-enid-public';}

        $list_templa_contenido='';
        $flag = 1;                                       

        foreach ($contenidos as $row) {
           
           $total ++; 
           $idcontenido = $row["idcontenido"];
           $nombre_contenido =  $row["nombre_contenido"];
           $descripcion_contenido = $row["descripcion_contenido"];
           $status = $row["status"];
            

            $list_templa_contenido.= '<li class="clearfix" title="Click para cargar " >
                                        <span class="drag-marker">                                        
                                        </span> 
                                        '.$flag .'.-                                     
                                        <a class="'.$identificador.'" id="'. $idcontenido .'" >
                                            '. $nombre_contenido .'
                                        </a>                                    
                                        <p class="'.$identificador.' todo-title"  id="'. $idcontenido .'" >
                                            '.$descripcion_contenido .'
                                        </p>';
                                        $list_templa_contenido .= btn_delete_template($del); 
                                        
                                        
                            if ($check!= '' ) {
                                $list_templa_contenido.= '<button class="'. $identificador .' btn btn-default btn_templates" id="'. $idcontenido . '" >
                                                            + agregar
                                                        </button>';                              
                            }
                            
                                    $list_templa_contenido.='</li>';
                                    $flag++;
        }
        $list_templa_contenido .= '' ;                   
    
    $total_resumen =  "<em class='total_table'> Mostrando " . $total . "</em>"; 
    $total_resumen .=  $list_templa_contenido;
  

?>


<div class='row'>

    <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='url_template_mov'>
            <div class='panel'>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <span class='desc_plantilla'>
                            Una plantilla es un tipo de documento o contenido que crea una copia de sí misma al abrirla, evita escribir miles de veces las descripciones de tus eventos, redacta una plantilla y utilizala cuando te sea necesario. 
                        </span>
                    </div>
                </div>    
                <?=msj_url_template($identificador);?>
            </div>
        </div>
        <div class="<?=$class_enid;?> ">
            <div class="panel-body">
                <ul class="to-do-list ui-sortable" id="sortable-todo">
                <?=$total_resumen?>
                </ul>
            </div> 
        </div>

        <div class='url_template'  >
            <div class='panel'>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <span class='desc_plantilla'>
                            Una plantilla es un tipo de documento o contenido que crea una copia de sí misma al abrirla, evita escribir miles de veces las descripciones de tus eventos, redacta una plantilla y utilizala cuando te sea necesario. 
                        </span>
                    </div>    
                </div>
                <?=msj_url_template($identificador);?>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .delete_contenido_templ{
        background: rgb(62, 178, 192) !important;
        color: white !important;
    }
    .clearfix:hover{
        cursor: pointer;
    } 
    .url_template_mov{
        display:  none;
    }
    /**/
    .url_templates{
        font-size: .8em;
        background: #3C5E79;
        width: 100%;
        text-decoration: none !important;
        color: white;    
        padding: 10px;
    }
    .url_templates:hover{    
        font-size: .8em;
        background: #3C5E79;
        width: 100%;
        text-decoration: none !important;
        color: white;           
        padding: 10px;
    }   
    .desc_plantilla{
        font-size: .8em;
    }

</style>
<style type="text/css">
  
   /*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {    
    .url_template_mov{
        display:  block;
    }
    .url_template{
        display: none;
    }
  }

</style>