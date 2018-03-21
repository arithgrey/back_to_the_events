		<header class="site-header">
            <div class="section-container">
                <!-- START CONTAINER -->
                <div class="container text-center">                    
                    <h1 style='color:white;'>
                        Back to the events
                    </h1>     
                    <h4>
                        Publica tus eventos 
                        <strong>,es gratis!</strong>
                    </h4>              
                    


            <form  class='form_prospectos' id='form_prospectos' 
           action="<?=url_registro_nuevo_miembro()?>">                        
            
                <div class='col-lg-6 col-lg-offset-3 col-md-6 col-sm-12'>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                               Usuario (email @ )
                        </span>
                        <input type="mail" name="mail" id="mail" class="mail form-control input-sm" required >
                    </div>
                    <div class='place_mail'>                            
                    </div>



                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            Antro, club, colectivo, organización
                        </span>
                        <input type="text" name="organizacion" id="organizacion" class="organizacion form-control input-sm" required>
                    </div>
                    <div class='place_organizacion'>                            
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                           Contraseña
                        </span>
                        <input type="password"  id="pass" class="pass form-control input-sm" required>
                    </div>
                    <div class='place_pass'>                            
                    </div>

                    <div class='seccion_pass'>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                Confirmar contraseña
                            </span>
                            <input type="password"  id="pass2" class="pass2 form-control input-sm" required>
                        </div>
                        <div class='place_pass2'>                            
                        </div>
                    </div>



                    <button class='btn btn-default '>
                        Registrar!
                    </button>
                    <div class='place_user_registro'>
                    </div>
                    
                </div>                                
            </form>



                </div>
                <!-- END CONTAINER -->
            </div>
            <!-- OVERLAY -->
            <div class="overlay">
                <div class="gradient-overlay gradient-17 opacity-90">
                </div>
            </div>
        </header>
		
		
		

<input type="hidden" name="now" class="now" value="<?=base_url();?>">

<script src="<?=base_url('application/js/sha1.js');?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/prospectos.js')?>"></script>

