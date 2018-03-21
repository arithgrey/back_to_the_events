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

</style>

<style type="text/css">
        
        .enid-service{
            margin-top: 9%;
            margin-left: 5%;
            font-size: 6em;
            font-weight: bold;
            color: #223c48;
        }
        .desc-enid{
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.5em;

        }
        .registra-evento{
            display: none;
        }
        @media only screen and (max-width: 991px) {
            .btn-inicio{
                display: none;
            }    
        }
        .login-btn , .registra-evento{
            display: none;
        }        
        .seccion-l{
            //background: rgb(0, 194, 255);
            //background: rgb(4, 97, 136);
            background: #008DFF;
            
        }        
        
        #myCarousel .nav a small {
            display:block;
        }
        #myCarousel .nav {
          background:#eee;
        }
        #myCarousel .nav a {
            border-radius:0px;
        }
        .mensaje_presentacion{
            font-weight: bold;
            font-size: 2em;
            color: #03a9f4;
        }


</style>

<div class='contenedor-principal'>                    
    <center>
        <h1 class='enid-service'>                                    
            <div class='text-service'>
                Enid Service     
            </div>                   
        </h1>                                        
    </center>        
</div>

<div class='row seccion-text'>
    <div class='col-lg-8 col-lg-offset-2'>
        <div class='text-center'>
            <span class='mensaje_presentacion'>
                La forma fácil  de promocionar tus eventos musicales desde tu propia página web y al público que desea asistir a tus eventos. 
            </span>                            
        </div>      
        
            
        <center>
            <br>                
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
                        <strong>
                            Registra tu email  y te envíamos tu contraseña
                        </strong>
                    </span>
                    <br>
                    
                    <a href="<?=base_url('index.php/home/usos_privacidad_enid_service')?>">
                        Términos de uso y privacidad
                    </a>
                    <br>
                    <button class='btn btn-default '>
                            Registrar mi cuenta!
                    </button>
                </div>                                
            </form>

            <?=n_row_12()?>
            <br><br><br>
            <strong>
                ¿Ya tienes una cuenta? 
                <br>
                <a href="<?=base_url('index.php/startsession')?>">
                    Iniciar sesión
                </a>
            </strong>
            <?=end_row()?>
                
        </center>
            

    </div>        
</div>


<br>
    





       




<div class='row'>

        <div class='seccion-l col-lg-12 col-md-12 col-sm-12' >
            <div class='contenedor-l'>


                <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2'>
                        <center>
                        <h1 style="color:white;">
                            Conoce nuestra plataforma!
                        </h1>
                        <p style="color: white;font-size: 1.1em;">
                            Enid service es una herramienta intuitiva que potencia la promoción de eventos musicales, con ella podrás añadir tantos eventos como se necesite y a cada uno de ellos agregar información de interés, incluyendo artistas, escenarios, puntos de venta, promociones y mucho más, por otro lado hacer accesible a los espectadores las experiencias musicales que se ajusten a sus gustos y oidos. 
                        </p>
                        </center>
                    </div>
                </div>


<br>                
                <div class='row contenedor-slider'>                                    
                  <div>





                    <div class='col-lg-8 col-lg-offset-2'>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">    
                          <div class="carousel-inner">  
                                                    
                            <div class="item active">
                              <img src="<?=base_url('application/img/landing/1.jpg')?>" width="100%">                        
                               <div class="carousel-caption">                                
                              </div>
                            </div><!-- End Item -->

                            <div class="item">
                              <img src="<?=base_url('application/img/landing/16.jpg')?>" width="100%">                        
                               <div class="carousel-caption">                                           
                              </div>
                            </div><!-- End Item -->
                     
                             <div class="item">
                              <img src="<?=base_url('application/img/landing/prospectos.jpg')?>" width="100%">                        
                               <div class="carousel-caption">                                                               
                              </div>
                            </div><!-- End Item -->
                            

                            <div class="item">
                              <img src="<?=base_url('application/img/landing/10.png')?>" width="100%">
                               <div class="carousel-caption">
                                
                                
                              </div>
                            </div><!-- End Item -->
                            

                            <div class="item">
                              <img src="<?=base_url('application/img/landing/2.jpg')?>" width="100%">                        
                               <div class="carousel-caption">                                           
                              </div>
                            </div><!-- End Item -->

                            
                                    
                          </div><!-- End Carousel Inner -->
                        </div><!-- End Carousel -->
                    </div>


                    <div class='col-lg-8 col-lg-offset-2'>
                        
                    </div>    
                    

                  </div>

                </div>
                <br>    

            </div>                    
        </div>

</div>


<div class='row pull-right'>    
    <a class="twitter-follow-button"
    href="https://twitter.com/enidservice"
    data-size="large">
    Follow @enidservice
    </a>
    <div class="fb-like" data-href="https://www.facebook.com/enidservicemusic/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
    </div>
</div>    


<br>
<br>
<div class='row' >
    <div class='col-lg-8 col-lg-offset-2'>
        <ul>
            <li>
                <strong>
                    ¿Por qué Enid Service?
                </strong>
            </li>
            <li>
                No existe un medio centralizado de eventos musicales el cual este dirigido al publico nacional e internacional.
            </li>
            <li>
                Esto implica un costo elevado en la promoción de cada experiencia musical y para los consumidores la falta de un mecanismo el cual le permita encontrar lugares que atiendan sus mejores expectativas.
            </li>
            <li>
                Por ello llegó Enid Service 
            </li>
            <li>
                Nos encontramos reclutando a los mejores organizadores de eventos y estamos potenciando ya sus mejores eventos musicales. 
            </li>
            <li>
                Se parte de este proyecto y has que miles de personas te encuentren fácilmente! 
            </li>
        </ul>    
    </div>
</div>

<br>
<br>



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
          


<div class='row seccion-promo-prospectos' style='background:#01151f;'>
    <br><br>

    <div class='col-lg-8 col-lg-offset-2'>
        <center>
            <h1 style="color:white">
                ¿Quieres enterarte de las mejores promociones?
            </h1>
            <span class='des-nuevo-prospecto' style='color:white;'>
                Enid Service te notificará de las mejores promociones oportunamente.
            </span>                            
            <h4>
                <a style='background: #0890fd;
    padding: 10px;
    color: white;' href="<?=base_url('index.php/home/nuevo_miembro')?>" class='title-promo'>
                    Click aquí!
                </a>
            </h4>
            </center>                        
        <br><br>
        <br><br>
    </div>    
   
</div>


<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/prospectos.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">





<script type="text/javascript">
$(document).ready( function() {
    $('#myCarousel').carousel({
    interval:   4000
  });
  
  var clickEvent = false;
  $('#myCarousel').on('click', '.nav a', function() {
      clickEvent = true;
      $('.nav li').removeClass('active');
      $(this).parent().addClass('active');    
  }).on('slid.bs.carousel', function(e) {
    if(!clickEvent) {
      var count = $('.nav').children().length -1;
      var current = $('.nav li.active');
      current.removeClass('active').next().addClass('active');
      var id = parseInt(current.data('slide-to'));
      if(count == id) {
        $('.nav li').first().addClass('active');  
      }
    }
    clickEvent = false;
  });
});
</script>
