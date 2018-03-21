<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
    function get_jfunnel($data){   
        
        $table ="<table  class='table table-bordered' id='print-section'>";    
        $table .=  "<tr class='text-center enid-header-table'>";        
        $table .=get_td("#" , "");
        $table .=get_td("Inicio del evento" , "");
        $table .=get_td("Días" , "");
        $table .=get_td("Escenarios" , "");
        $table .=get_td("Artistas" , "");
        $table .=get_td("Géneros musicales" , "");
        $table .=get_td("Puntos de venta" , "");
        $table .=get_td("Accesos propuestos" , "");
        $table .=  "</tr>";
        $b=1;
        $t_duracion =  0;
        $t_escenarios= 0;
        $t_artistas = 0;
        $t_generos = 0;
        $t_puntos_venta =0;
        $t_accesos =0;
        
        foreach ($data as $row) {
        
            $table .="<tr>";
            $table .=  get_td($b , "");
            $table .=  get_td($row["fecha_inicio"] , "");
            
            if ($row["duracion"] ==  0 ) {
                $table .=  get_td(1, "");   
                $t_duracion += 1; 
            }else{
                $table .=  get_td($row["duracion"] , "");
                $t_duracion += $row["duracion"];
            }
            $table .=  get_element_modal($row["escenarios"]  , "ver-escenarios" , $row["idevento"]  );         
            $table .= get_element_modal($row["artistas"] , "ver-artistas" , $row["idevento"] );  
            $table .= get_element_modal($row["generos_musicales"] , "ver-generos" , $row["idevento"]  , $row["idevento"]  ); 
            $table .= get_element_modal($row["evento_punto_venta"]  , "ver-puntos-venta" , $row["idevento"] , $row["idevento"]  );  
            $table .= get_element_modal($row["accesos"]  , "ver-accesos"  , $row["idevento"] , $row["idevento"]  );  
            $table .="</tr>";
            $b++;
            
        }


        $table .=get_td("Totales" , "colspan='2'");
        $table .=get_td($t_duracion , "");
        $table .=get_td($t_escenarios , "");
        $table .=get_td($t_artistas , "");
        $table .=get_td($t_generos , "");
        $table .=get_td($t_puntos_venta , "");
        $table .=get_td($t_accesos, "");

        $table .="</table>";
        return  $table;
    }
    /**/
    function get_element_modal($val , $class , $id ){

            $table =  "";  
            if ($val != null ) {
                $table .=  get_td("<strong data-toggle='modal' data-target='#dinamic_modal_event'  class='$class'  id='$id' >" . $val . "</strong>" , "");                    
            }else{
                $table .=  get_td( "<strong data-toggle='modal' data-target='#dinamic_modal_event'  class='$class' id='$id' >"  . 0  . "</strong>", "");
                
            }
            return $table;

    }
/*******************************************************************/
}/*Termina el helper*/