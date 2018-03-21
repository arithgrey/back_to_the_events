<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
    /**/
    function get_tags_generos($arreglo_generos , $id_evento  , $in_session ){  

        $url = url_evento_view_config($id_evento)."/generosmusicales/#portlet_tab5'";        
        $btn =  editar_btn($in_session , $url );           
        $tags_generos =  '<ul class="revenue-nav">';
        foreach ($arreglo_generos as $row){              
        
        $tags_generos .=    '<li>
                              <a>
                                '.
                                $row["nombre"]
                                .'
                              </a>
                            </li>';
        }
        $tags_generos .="</ul>";
        return $tags_generos;
    }


    /**/
    function list_generos_musicales($value){

    $table_list ='<table class="table">';                    
                    $table_list .='';                    
    $table_list .= '</tr>';

        $b =1;
        foreach ($value as $row ) {

            $idgenero_musical =  $row["idgenero_musical"];
            $nombre = $row["nombre"];
            $idevento = $row["idevento"];
            $idgenero_musical  =  $row["idgenero_musical"];
            $input_check = '<input type="checkbox" class="genero_musical_input" id="'. $idgenero_musical.'">';


            if ($row["idg"] == $idgenero_musical ) {
                    
                    $input_check = '<input type="checkbox" class="genero_musical_input" id="'. $idgenero_musical.'" checked>';                    
            }

                $table_list .='<tr class="genero_musical_input" id="'. $idgenero_musical.'">                
                <td class="genero_musical_input" id="'. $idgenero_musical.'">'. $nombre.'</td>
                <td class="genero_musical_input" id="'. $idgenero_musical.'">'.$input_check.'</td>';

                $b++;
        }
        $table_list .="
</table>
";
    
        return $table_list;
    }


function list_generos_empresa($value){

    $table_list ='<table class="table  table-bordered" >
                        <tr class="text-center header-table-info">';
                        $table_list .= get_td("#" , "");
                        $table_list .= get_td("Género" , "");
                        $table_list .= get_td( '<i class="fa fa-minus-square"></i>' , "");
    $table_list .='</tr>';

        $b =1;
        foreach ($value as $row ) {
              
            $idgenero_musical= $row["idgenero_musical"];
            $nombre = $row["nombre"];

            $table_list .=  "<tr class='text-center'>";
            $table_list .=  get_td($b , "");
            $table_list .=  get_td($nombre , "");

            $table_list .= get_td( '<div class="delete_genero_empresa" id="'. $idgenero_musical .'" > <i class="fa fa-minus-square" ></i></div>' , "");
            $table_list .=  "</tr>";
            $b++;
           
        }
        $table_list .="</table>";    
        return $table_list;


}

/**/
function get_data_list_generos($data){
    
    $list_data ='<datalist id="generos-list">';
        foreach ($data as $row) {
            $list_data .="<option value='". $row["nombre"]."'>";
        }
        $list_data .="</datalist>";
    return  $list_data;

}
/**/
function registrados_config($data){


    $genero ="<div>
                <div class='resultados-busqueda-enid'>";     
        $genero .= titulo_enid_w("Géneros musicales ");;

    foreach ($data as $row) {
        $posicion_delete =  "delete_genero_".$row["id_genero"]; 
        $delete =  "<div style='display:none;'  title='click para quitar de la lista ' class='delete_genero_evento fa fa-times ".$posicion_delete." ' id='".$row["id_genero"]."'>                      
                    </div>"; 

         $genero .=  $delete ."<span class='genero_registrado' id='".$row["id_genero"]."' title='".$row["genero"]."'>
                                " .$row["genero"]."
                              </span>";    
    }    
    $genero .=  "</div>
                </div>";
    return $genero;
}
/*****************+****************+****************+****************+****************+*/
}/*Termina el helper*/