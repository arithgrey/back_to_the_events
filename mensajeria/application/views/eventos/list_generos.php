<?php

    $table_list ='';                    
        $b =1;
        foreach ($generos as $row ) {

            $idgenero_musical =  $row["idgenero_musical"];
            $nombre = $row["nombre"];
            $idevento = $row["idevento"];
            $idgenero_musical  =  $row["idgenero_musical"];

            $input_check = '<input type="checkbox" class="genero_musical_input" id="'. $idgenero_musical.'">';
            if ($row["idg"] == $idgenero_musical ) {                
                $input_check = '<input type="checkbox" class="genero_musical_input form-control" id="'. $idgenero_musical.'" checked>';                    
            }
            $eventos= ' class="genero_musical_input" id="'. $idgenero_musical.'"  '; 
            $table_list .=  "<tr>";
            $table_list .=  get_td($b);
            $table_list .=  get_td($nombre , $eventos );
            $table_list .=  get_td($input_check );
            $table_list .=  "</tr>";
               
            $b++;
        }
       
    
        


?>

<div class='contenedor_generos'>
    <table class='table_enid_service'>
        <?=$table_list?>
    </table>
</div>
<style type="text/css">
.contenedor_generos{
    margin-top: 10px;
    border-bottom:1px dashed #e6e6e6;
    border-top:1px dashed #e6e6e6;
    color: #003;   
    font-weight: normal;
    background-color: #EFF8FB;
    padding-left: 10px;
    padding-top: 10px;
    padding-bottom: 10px;    
    padding: 10px;
}
</style>