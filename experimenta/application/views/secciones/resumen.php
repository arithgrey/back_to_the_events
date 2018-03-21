<br>

<?=get_titulo_evento($data_evento , $in_session );?>

        <div class="list-group">               
          <a class="list-group-item active">                

                <div class="col-md-9">
                    <h4 class="list-group-item-heading" style='color:white;'>
                        La experiencia <?=template_editar_s( $in_session,  url_evento_view_config($data_evento["idevento"])  )?>                        
                    </h4>            
                    <?=valida_info_completa_resumen($data_evento["descripcion_evento"] , "" ,  "data-toggle='modal' data-target='#modal_info_evento'")?>

                </div>
                <div class="col-md-3 text-center">                    
                    <button title="Califica nuestro  evento - <?=$data_evento['nombre_evento']?>  "  type="button" class="btn btn-default btn-lg btn-block enlance_next btn_calificacion"  id="<?=url_opiniones($data_evento['idempresa'])?>">                     
                        <i class="fa fa-star" aria-hidden="true">
                        </i>
                        <i class="fa fa-star" aria-hidden="true">
                        </i>
                        <i class="fa fa-star" aria-hidden="true">
                        </i>
                        <i class="fa fa-star" aria-hidden="true">
                        </i>
                        <i class="fa fa-star" aria-hidden="true">
                        </i>
                    </button>
                    
                    <button type="button" class="btn btn-default btn-lg btn-block" title='Tipo de evento - <?=$data_evento["tipo"]?> '>                                     
                        <small class='sub-tipo'>
                            <?=$data_evento["tipo"]?>
                        </small>
                    </button>

                    <span class='place_tematica_evento' style='margin-top: 50px!important;'>
                    </span>
                    
                    <div class="stars">
                        <center>                                  
                        <div class='place_val_estrellas' id='place_val_estrellas'>
                        </div>
                      </center>
                    </div>                    
                </div>
            </a>
            <div class='place_resumen_artistas'>
            </div>
            <div class='place_resumen_accesos'>
            </div>
        </div>        
