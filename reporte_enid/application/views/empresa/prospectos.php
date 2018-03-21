<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8&appId=708127766008103";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type="text/css">
.btn-busqueda-enid , .icono-g-enid{
    display: none;
}
.descripcion-breve{
  background: #074e65;
}
</style>

<style type="text/css">
.btn_inicio_session_enid , .registra-evento , .btn-busqueda-enid , .icono-g-enid , .login-btn{
    display: none;
}
.wrapper{
    background: #040b04;
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
</style>

<div class='animated rubberBand'>
    <?=titulo_enid("Enid Service")?>

    <span class='sub-titulo-enid'>
        La forma fácil  de promocionar tus eventos musicales.
    </span>


<?=n_row_12()?>
    
    
      <center>      
          <img src="<?=base_url('application/img/landing/21.jpg')?>" style=' width:100%; opacity: 0.8;' >                        
      </center>
      <br><br>
    
<?=end_row()?>









<?=n_row_12()?>
  <div class='pull-right'>    
      <a class="twitter-follow-button"
      href="https://twitter.com/enidservice"
      data-size="large" style='color:#b0a8cb; font-weight:bold;'>
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
              Conoce nuestra plataforma!
        </h1>
      </center>  
      <center>

        <p style="color: white;  font-size: 1.1em;">
          Enid service es una herramienta intuitiva que potencia la promoción de eventos musicales del tipo que sea, con ella podrás añadir tantos eventos como lo necesites y a cada uno de ellos agregar información de interés, incluyendo artistas, escenarios, puntos de venta, promociones y mucho más, por otro lado hacer accesible a los espectadores las experiencias musicales que se ajusten a sus gustos y oidos. 
        </p>
      </center>        
  </div>
  <br>
  <br>
<?=end_row()?>



<div class='row' style='background:#ddf3f7;'>
    <div class='col-lg-8 col-lg-offset-2'>
        <br>
        <ul>
            <li>
                <strong>
                    ¿Qué ventajas tengo al promocionar mis eventos con Enid Service?
                </strong>
            </li>
            <li>
                <strong>
                    1.- Mide la actividad de tus eventos musicales.
                </strong>

                <br>
                Podrás  dar seguimiento a los aspectos que claves de éxito en tus eventos, analizar y evaluar las fortalezas, oportunidades, riesgos y debilidades que tiene tu negocio a través del tiempo.
                <br>
            </li>
            <li>
                <strong>
                    2.- Entiende a tu público 
                </strong>
                <br>
                Determina las expectativas y demandas de servicios por parte de los consumidores.
                
            </li>
            <li>
                <strong>
                    3.- Potencia la imagen de tu marca. 
                </strong>                
                <br>
                Identifica las tendencias de éstos mercados y potencia tu imagen como marca. 
                
            </li>
            <li>
                <strong>
                    4.-Agiliza tu marketing
                </strong>
                <br>
                Capta a tu a tus consumidores frecuentes y enviales tus eventos con un sólo botón. 
                <br>
            </li>
            <li>
                <strong>
                    5.- Que ahora ellos te encuentren
                </strong>
                <br>
                Que ahora el publico llegue a ti, el sistema identifica en todo momento usuarios que pueden identificarse con tu marca.
                <br>
            </li>
            <li>
                <strong>
                    6.-Agiliza la promoción de tus eventos musicales 
                </strong><br>
                Crea plantillas y deja de escribir miles de veces el mismo mensaje para todos tus eventos.
            </li>
            <li>
                <strong>
                    7.-Que el público pueda hacer las reservaciones  a tus eventos 
                </strong><br>
                Podrás brindar el sistema de reservaciones a tu público y con ello conocer que personas piensan asistir a tus eventos para ajustarlos a sus necesidades.
            </li>

        </ul>
        <br>
        
    </div>
</div>
          
          

<div class='row'>
<div style='background:#04a596;'>
  <center>
    <?=titulo_enid("Registra tu cuenta")?>
  </center>
  <center>
           
            <form  class='form_prospectos' id='form_prospectos' action="<?=base_url('index.php/api/emp/prospectos_enid/format/json')?>">                        
            <br>
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
                        <strong style="color:black;">
                            Registra tu email para que te enviemos tu contraseña
                        </strong>
                    </span>
                    <br>
                    
                    <a href="<?=url_usos_privacidad_enid_service()?>" style='text-decoration:none; color:#f8feff;'>
                        Términos de uso y privacidad
                    </a>
                    <br>
                    <button style='background: #5fc6f5;
    padding: 10px;
    color: white;'>
                            Registrar mi cuenta!
                    </button>
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

<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/prospectos.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">