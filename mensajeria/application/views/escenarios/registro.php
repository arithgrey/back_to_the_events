<?php
        $list = "";
        $escenarios_block =  "";    
        $dinamic_class ='no_escenario';
        $style_extra =  "";

        foreach($escenarios as $row) {        

            $nombre =  $row["nombre"];            
            $idevento =  $row["idevento"];
            $f_inicio =  $row["fecha_presentacion_inicio"];
            $f_termino  = $row["fecha_presentacion_termino"];
            $fecha_escenario= fechas_enid_format( $f_inicio  ,$f_termino  );
            $id_escenario =  $row["idescenario"];        
            $tipo_escenario =  $row["tipoescenario"];
            $id_escenario_text =  "escenario_num_";
            $url_escenario = create_url_config_escenario($id_escenario);                                                     
            $url_public_next =$url_escenario;              
            $url = create_url_img_escenario($id_escenario);
            $url_ver_public =  create_url_escenario_in_evento($id_escenario , $idevento);            
            
            $part_ver_publico = '<a class="enid-sub-menu pull-right" href="'.$url_ver_public.'">
                                    <i class="fa  fa-arrow-circle-o-right"> 
                                    </i>
                                    Ver como el público
                                  </a>';


            $part_mas_artistas =  n_row_12()
                                ."<a href='".$url_escenario."'>                                        
                                        + Agregar artistas al escenario
                                  </a>"
                                . 
                                end_row();                    

            if ($param["seccion_public"] ==  1 ){

                $style_extra =  "style='display:none'";    
                $part_ver_publico =  '';
                $part_mas_artistas  = '';                
                
                $url_p_next =  create_url_escenario_in_evento($id_escenario , $idevento);
                $url_public_next = base_url($url_p_next);

            }




            $descripcion =  substr($row["descripcion"] , 0 , 250);
            if (strlen($descripcion) < 5  ) {
                $descripcion = '0';
            }
            if (strlen($fecha_escenario)< 3 ){
                $fecha_escenario = 0;
            }

            $url_aristas_escenario =    url_resumen_artistas_escenario($id_escenario)."/".$tipo_escenario."/".$fecha_escenario."/".$descripcion;                      

            $info_artistas = n_row_12() 
                            ."<iframe width='100%;'  class='frame-artistas' src='".$url_aristas_escenario."'></iframe>"
                            . end_row()
                            . $part_mas_artistas;
            

            
            

            
            $part_imgs =  "<img src='".$url."' width=100%; >";
            
                    $list .= '<div>                                                            
                               '.n_row_12().'
                                   <div class="pull-right">
                                    '.$part_ver_publico.'
                                    '. editar_btn($param["in_session"] , $url_escenario) .'
                                   </div>        
                               '.end_row().'                        

                               '.n_row_12().'
                                    <div class="col-lg-4 col-md-4 col-sm-12" >
                                        <a href="'.$url_public_next.'" class="pull-left">
                                           '.$part_imgs .'
                                        </a>
                                    </div>                            
                                    <div class="col-lg-8 col-md-8 col-sm-12">                                    
                                        '.n_row_12().'
                                                <a href="'.$url_public_next.'">
                                                     '. titulo_enid($nombre).'
                                                </a> 
                                        '.end_row().'


                                        '.n_row_12().'
                                            '.$info_artistas.'
                                        '.end_row().'
                                        
                                    </div>
                                '.end_row().' 
                            </div>
                            
                            ';                    

           
    }        
    
    $escenarios_block .= $list;                   

    if($param["in_session"] ==  0){
        $style_extra =  "style='display:none'";    
    }if ($param["seccion_public"] == 1  ){
        $style_extra =  "style='display:none'";    
    }

    
?>






<div <?=$style_extra?>>

    <?=titulo_enid("Escenarios del evento")?> 
    
    <?=n_row_12();?>        
        <form id="form-escenario" method="POST">
            <h4>         
                <strong>
                    + Nuevo escenario        
                </strong>
            </h4>  
            <div class="form-group todo-entry">
                <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">
                <input placeholder="Añadir escenario" class="form-control nuevo-escenario-input"  id='nuevo-escenario-input' name='nuevoescenario'  required>
            </div>
            <button class="btn btn-primary pull-right" type="submit" id="nuevo-escenario">
                <i class="fa fa-plus">
                </i>
            </button>
        </form>        
    <?=end_row();?>    
</div>

<?=n_row_12();?>
    <?=$escenarios_block;?>                                         
<?=end_row();?>  
<script type="text/javascript" src="<?=base_url('application/js/evento/escenarios.js')?>"></script>              
<br>
<br>
