<?=construye_header_modal('asistencia_moal', "Tu asistencia en el evento" );?>                           
  <div class='place_asistencia_user'>  
  </div>
  <center>
    <div>            
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            </script>
            <div class="fb-share-button" data-href="<?=create_url_evento_view($evento["idevento"])?>" data-layout="button" data-size="small" data-mobile-iframe="true">
              <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fenidservice.com%2Fhome%2F&amp;src=sdkpreparse">
                  Compartir
              </a>
            </div>
    </div>
  </center>
<?=construye_footer_modal()?>  

<?=construye_header_modal('reservaciones', "Haz tu reservación" );?>                           
  <div class='place_reservacion_evento'>
  </div>
  <div class='seccion-reservacion-evento-form'>
    <form class='form-reservacion-evento' id='form-reservacion-evento' acction="<?=base_url('index.php/api/enid/evento_reservacion/format/json/')?>">                  
      <div class="form-group">            
          <div class="input-group">
            <span class="input-group-addon">
                                    Nombre 
            </span>                            
            <input id="nombre_contacto" class="form-control input-sm input-sm uppercase_enid " name="a_nombre" placeholder="Nombre" required="" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text">
          </div>                      
          <span class="place_nombre_contacto">
          </span>
          <div class="input-group">
            <span class="input-group-addon">
                  Correo
            </span>
            <input  class="form-control input-sm direccion " id='a_mail' name="a_mail" placeholder="enidservice@enidservice.com "  type="email" required>          
          </div>                      
          <div class="place_mail">
          </div>
          <div class="input-group">
              <span class="input-group-addon">
                Teléfono
              </span>
              <input class="form-control input-sm" name="a_telefono" id="a_telefono" placeholder="Teléfono" maxlength="10" required="" type="tel">                                                                
          </div>
          <span class="place_tel" id="place_tel">
          </span>        
          <div class="input-group">
              <span class="input-group-addon">
                Acompañates
              </span>
              <?=num_asistencia(100 , "a_reservados")?>
          </div>
        </div>
                          
    <div>          
        <button type="submit" id="button-registrar" class="btn btn-default btn_save ">
                                Reservar mi asistencia
        </button>
    </div>                                  
  </form>
</div>
<div>
  <center>
    <span class='mensaje-reservacion' style='display:none'>
      Tus reservación ha quedado registrada con éxito, te esperamos en éste gran evento.!
    </span>
  </center>
  
</div>
<?=construye_footer_modal()?>  