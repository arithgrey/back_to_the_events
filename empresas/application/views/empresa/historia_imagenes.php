<?=n_row_12()?>


            <a class="list-group-item">            
                    <div class="col-md-3 text-center">
                        <h2>
                            Califícanos                            
                        </h2>
                        
                            <button type="button" class="btn btn-primary btn-lg btn-block enlance_next" id="<?=url_opiniones($data_empresa['idempresa'])?>">
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
                        
                        
                    </div>
                    <div class="col-md-9">
                        <h4 class="list-group-item-heading">
                           Misión
                        </h4>
                        <p class="list-group-item-text"> 
                            <?=template_editar_def( $in_session)?>
                            <?=validate_info_emp($data_empresa["mision"], $in_session  ,  "mision-empresa-text" )?>
                            <div class='response-update-mision'>
                            </div>
                        </p>
                        <div id="section-mision-empresa" class='section-mision-empresa' >      
                            <span>
                                Misión 
                                <?=$data_empresa["nombreempresa"]?>
                            </span>
                            <div class="form-group">                                     
                                <textarea  class="form-control mision-empresa-input  input-sm" id='mision-empresa-input' 
                                                rows="4" > 
                                        <?=$data_empresa["mision"]?>
                                </textarea>                       
                            </div>                                                                  
                        </div>

                    </div>
              </a>
          
    





            <a class="list-group-item">            
                    <div class="col-md-3 text-center">
                        <h2>
                            Solicita tu artista 
                        </h2>                        
                        <button type="button" class="btn btn-primary btn-lg btn-block enlance_next" id="<?=url_solicita_artista($data_empresa['idempresa'])?>">                               
                            <i class='fa fa-headphones'>                                
                            </i>
                        </button>
                        
                        
                    </div>
                    <div class='contenedor-vision'>          
                        <div class="col-md-9">
                            <h4 class="list-group-item-heading">
                               Visión
                            </h4>
                            <p class="list-group-item-text"> 
                                <?=template_editar_def( $in_session)?>
                                <?=validate_info_emp($data_empresa["vision"], $in_session  ,  "vision-empresa-text" )?>
                                <div class='response-update-vision'>
                                </div>                      
                            </p>
                            <div id="section-vision-empresa" class='section-vision-empresa'>  
                                <label class='h_emp'>
                                      Visión 
                                    <?=$data_empresa["nombreempresa"]?>
                                </label>
                                <div class="form-group">                     
                                    <textarea   class="form-control descripcion-vision-input  input-sm"  id='descripcion-vision-input' rows="4">        
                                        <?=$data_empresa["vision"]?>
                                    </textarea>                       
                                </div>                                                                          
                            </div>

                            
                        </div>
                    </div>
              </a>
          




    <div class="">
        <img src="http://tympanus.net/Blueprints/FullWidthTabs/img/04.png" alt="img04" />
        <h3>
            Origen 
            <?=modal_localizacion($in_session, $data_empresa["countryName"])?>                        
        </h3>            
        <span class='place_empresa_locacion'>                      
        </span>              
    </div>
<?=end_row()?>