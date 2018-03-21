


    <header class="site-header">
            <div class="section-container">
                <!-- START CONTAINER -->
                <div class="container text-center">
                    
                    <h1 style="color:white;">
                        Back to the events
                    </h1>                   
                    <div class='col-lg-4 col-lg-offset-4'>                  
                      <form id="in" method="post" action="<?=base_url('index.php/api/sessionrestcontroller/start/format/json')?>">                        
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                              Usuario (@email)
                            </span>
                            <input type="mail" name='mail' id="mail"  class="form-control input-sm" >                                   
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon" >
                              Contraseña
                            </span>
                            <input type="password" class="form-control input-sm"  name='pw' id="pw">
                            <input type='hidden' name='secret' id="secret">
                          </div>                                
                          <div class="control-group">                                                          
                            <label  id="reportesession" class='reportesession'>
                            </label>                                                          
                          </div>                
                          <button id="inbutton" class='btn btn-default btn_save recupera'>
                              Iniciar sesión
                          </button>                          
                          <a  type="button" id='olvide-pass' class="recupara-pass pull-right "  data-toggle="modal" data-target="#recuperacion-pw" >                                                 
                            <strong style='color:white;'>
                              Olvidé mi contraseña
                            </strong>
                          </a>
                          <center>
                              <strong>
                                  <span class='place_status_inicio'> 
                                  </span>
                              </strong>
                          </center>
                      </form>
                </div> 

                    
                </div>
                <!-- END CONTAINER -->
            </div>
            <!-- OVERLAY -->
            <div class="overlay">
                <div class="gradient-overlay gradient-17 opacity-90">
                </div>
            </div>
        </header>
    
    
    
      




  <div class='contenedor-principal'>                    
      <center>          
          <span>
            <?=$mensaje_prospecto?>
          </span>
      </center>        
  </div>









<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<?=$this->load->view("modal/config_inicio_session");?>
<script src="<?=base_url('application/js/sha1.js');?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/ini.js')?>"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">




