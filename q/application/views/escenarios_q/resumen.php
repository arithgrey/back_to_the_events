
        <a class="list-group-item">            
                <div class="col-md-3 text-center" >
                    <h2 class='strong'> 
                        <?=$info["num_escenarios"]?> 
                        <small class='strong'>

                            <?=valida_plural("Escenario" , "Escenarios" ,  $info["num_escenarios"])?>
                        </small>
                    </h2>
                    <button type="button" class="btn btn-primary btn-lg btn-block">
                        + info
                    </button>
                    
                </div>
                <div class="col-md-9">
                    <h4 class="list-group-item-heading strong">
                        <?=$info["num_artistas"]?>     Artistas
                    </h4>
                    <?=valida_info_completa_resumen($info["info_escenario"] , "resumen_artistas_enid_ext" ,  "data-toggle='modal' data-target='#modal_info_escenario'" )?>                    
                </div>
          </a>


          
        <?=construye_header_modal('modal_info_escenario', " La experiencia  " );?> 
            <div class='well' style='background:#428BCA'>
                <?=$info["info_escenario"];?>
            </div>
        <?=construye_footer_modal()?>  
        <style type="text/css">
            .resumen_artistas_enid_ext{
                height: 500px !important;
            }
        </style>