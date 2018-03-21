<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8&appId=708127766008103";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type="text/css">

.descripcion-breve{
  background: #074e65;
}
</style>

<style type="text/css">
.btn-busqueda-enid{
    display: none;
}
.icono-g-enid , .login-btn{
  background: #2A8AD8 !important;  
}

.wrapper{
  //background: #040b04;
  background: #0C2635;
}
.span-enid{
    color: white;
}
.titulo_enid_service{
    color: white !important;    
    font-size: 2em;
}
.sub-titulo-enid{
    font-weight: bold;
    color: white;
    font-size: 1.1em;
}
li{
  color: white;
}
</style>

<div class='animated rubberBand'>
    <center>
    <?=titulo_enid("Enid Service")?>

    <span class='sub-titulo-enid'>
        La forma fácil de encontrar los eventos musicales que se ajusten a tus oídos. 
    </span>
    </center>

<?=n_row_12()?>
    
    
      <center>      
          <img src="<?=base_url('application/img/landing/prospectos.jpg')?>" style=' width:100%; opacity: 0.8;' >                        

      </center>
      <br><br>
    
<?=end_row()?>









<?=n_row_12()?>
  <div class='pull-right'>    
      <a class="twitter-follow-button"
      href="https://twitter.com/enidservice"
      data-size="large" style='color:white; font-weight:bold;'>
      Follow @enidservice
      </a>
      <div class="fb-like" data-href="https://www.facebook.com/enidservicemusic/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
      </div>
  </div>  

<?=end_row()?>




<?=n_row_12()?>  
  
  <div class='col-lg-8 col-lg-offset-2'>
      <center>
        <h1 style="color:white; font-size:1.5em; font-weight:bold;">
              Enteraté de los mejores eventos musicales!
        </h1>
      </center>  
      <center>
        <p style="color: white;  font-size: 1.1em;">
          Enid service te hace llegar las mejores experiencias musicales 
          que se ajusten a sus gustos y oidos, con ella podrás  
          encontrar todo lo que querías saber de tus eventos.                            
        </p>
      </center>        
  </div>

  <center>      
      <img src="<?=base_url('application/img/landing/16.jpg')?>" style=' width:100%; opacity: 0.8;' >                              
  </center>
  <br>
  <br>



<?=end_row()?>


<?=n_row_12()?>  
<div class='col-lg-8 col-lg-offset-2'>
  <br>
        <ul>
            <li>

                <h3 style='color:#00080a;'>
                    <strong style='color:white;'>
                        ¿Por qué Enid Service?
                    </strong>
                </h3>
            </li>
            <li>
                No existe un medio centralizado de eventos musicales el cual este dirigido al publico nacional e internacional.
            </li>
            <li>
                Nuestras exigencias musicales van en aumento  y queremos asistir a las mejores experiencias.
            </li>
            <li>
                Por ello llegó Enid Service 
            </li>
            <li>
                Tenemos a los maestros del entretenimiento y ellos marcarán un huella a asistir a sus eventos. 
            </li>
            <li>
                Se parte de la comunidad que ya está asistiendo a los eventos que realmente cumplen con sus expectativas 
            </li>
        </ul>    
    </div>
    <center>
      <img src="<?=base_url('application/img/landing/20.jpg')?>" style=' width:100%; opacity: 0.8;' >                        
    </center>
<?=end_row()?>
          
          









<div class='row'>
    <div class='col-lg-8 col-lg-offset-2'>
        <br>
        <ul>
            <li>
                <strong>
                    ¿Qué ventajas tengo al usar Enid Service?
                </strong>
            </li>
            <li>
                1.-Podrás encontrar los eventos musicales que se ajusten a tus oídos. 
            </li>
            <li>
                2.-El sistema siempre estará al tanto de que nuevos eventos se van lanzando y te informará oportunamente de las promociones que tenga. 
            </li>

            <li>
                3.-Dar seguimiento a tus organizadores favoritos y ser parte de su comunidad. 
            </li>
            <li>
                4.-Solicitar a los organizadores que presenten a tus artistas favoritos en sus eventos.
            </li>
            <li>
                5.-Contar la historia que has vivido a los organizadores de los eventos así como calificarlos.
            </li>
        </ul>
        <br>
    </div>    
</div>


<div id='registro' class='row'>
<div style='background:#04a596;'>
  <center>
    <?=titulo_enid("Haz que los eventos lleguen a ti!")?>
  </center>
  <center>
           
           <form  class='form_prospectos' id='form_prospectos' action="<?=base_url('index.php/api/emp/nuevo_miembro/format/json')?>">                        
            
                <div class='col-lg-6 col-lg-offset-3 col-md-6 col-sm-12'>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                                Email @
                        </span>
                        <input type="mail" name="mail" id="mail" class="mail form-control input-sm" required>
                    </div>
                    <div class='place_mail'>                            
                    </div>

                    <span>
                        <strong>
                            Los datos de tu cuenta serán enviados a tu email 
                        </strong>
                    </span>
                    <br>
                    
                    
                    <a href="<?=url_usos_privacidad_enid_service()?>" style="color:#ffffff">
                        Términos de uso y privacidad
                    </a>
                    <br>
                    <button class='btn btn-default '>
                            Registrar mi cuenta!
                    </button>


                    <div class='place_user_registro'>
                    </div>
                </div>                                
            </form>


            <?=n_row_12()?>
            <br><br><br>
            <strong style='color:#ffffff;'>                
                <?=titulo_enid("¿Ya tienes una cuenta? ")?>                  
                <br>
                <a href="<?=url_inicio_session()?>" style='background: #03564f;padding: 10px;color: white;'>
                    Iniciar sesión
                </a>
            </strong>
            <?=end_row()?>                
        </center>
        <br>
        <br>
        <br>
  </div>
</div> 
</div>


<script type="text/javascript" src="<?=base_url('application/js/Organizacion/prospectos.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">