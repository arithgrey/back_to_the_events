<div>
    <div id='contenedor-principal-emp'>               
        <?=$this->load->view("empresa/mision_vision")?>
      
        <div>  
        <center>
          <div class='row'>
            <div class="col-md-3">      
                  <span class="fa-stack fa-3x años-empresa-text" id='años-empresa-text_place' title="Editar Años haciendo historia en la escena musical">
                    <?=$data_empresa["years"];?>                                  
                  </span>
                  <div class='response-update-years'>
                  </div>
                  <div class="input-group" id="años-section" class='años-section'>        
                    <div class="input-group col-sm-12">                                                
                      <select class='form-control col-md-12' id='year-input'  name='años-input'>
                        <?=$years;?>
                      </select>
                    </div>                                        
                  </div>                                   
                  <h4>
                    <strong>
                      Años en la escena
                    </strong>
                  </h4>                                             
            </div>   
            <div class="col-md-3">
                <div class="service-item">
                    <span class="fa-stack fa-3x">
                      <?=$evento_publicados;?>                                  
                    </span>
                    <h4>
                        <strong>
                        Eventos publicados
                        </strong>
                    </h4>                                  
                </div>
            </div>
            <!--TERMINA EVENTOS PUBLICADOS DESDE LA PLATAFORMA -->
            <div class="col-md-3">
                <div class="service-item">
                    <span class="fa-stack fa-3x">                                  
                      <?=$generos_musicales_emp;?>
                    </span>
                    <h4>
                        <strong>
                          Géneros musicales representados
                        </strong>
                    </h4>                                  
                </div>
            </div>
            <!---->
            <div class="col-md-3">
                <div class="service-item">
                    <span class="fa-stack fa-3x" id='artistas-empresa-text'>
                      <?=$data_empresa["artistas"]?>
                    </span>
                    <div class='response-update-artistas' id="response-update-artistas">
                    </div>
                    <div id="artistas-section" class='artistas-section' >
                      <?=create_select_num("artistas_representados")?>
                    </div>
                    <h4>
                      <strong>
                        Artistas de diferentes naciones
                      </strong>
                    </h4>                                                                   
                </div>
            </div>    
          </div>  
        </center>           
      </div>
      <hr>

      <div class='last-seccion'>  
          <section class='row'>                  
            <div class="col-md-8 col-md-offset-2">
              <?=titulo_enid("+  De nosotros")?>
                
              <div class="separator">
              </div>              
              <div class="panel">
                <div class="panel-body">
                    <div class="profile-desk">

                        <?=titulo_enid("Siempre al día de tus expectativas")?>        
                        <!---->      
                        
                        <?=validate_info_emp($data_empresa["mas_info"], $in_session  ,  "mas-info-empresa-text" )?>
                        <div class='response-update-mas-info'>
                        </div>



                        <div id="section-mas-info" class='section-mas-info'>
                          <div class="input-group">               
                            <span class="input-group-addon" id="sizing-addon1">
                                   + Info 
                            </span>
                            <textarea name='mas_info_empresa' class="form-control"   id='mas-info-empresa-input'   rows="3">
                              <?=$data_empresa["mas_info"]?>
                            </textarea>       
                          </div>
                        </div>                                              
                        <a class="btn p-follow-btn pull-left" href="#">
                            <i class="fa fa-check">
                            </i> 
                            Following
                        </a>                      
                    </div>
                </div>
              </div>
            </div>                    
          </section>
      </div>  

    </div>
    <div>        
      <div>

        <?=titulo_enid("Artistas que más nos solicitan")?>          
        <div class='row'>            
            <div class='section-artistas-solicitudes' class='section-artistas-solicitudes'>
            </div>                                
        </div>        
      </div> 
    </div>
    <!--Termina row-->                
  </div>          
