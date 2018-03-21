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
          }(document, 'script', 'facebook-jssdk'));</script>

          <div class="fb-share-button" data-href="<?=create_url_evento_view($evento["idevento"])?>" data-layout="button" data-size="small" data-mobile-iframe="true">
            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fenidservice.com%2Fhome%2F&amp;src=sdkpreparse">
              Compartir
            </a>
          </div>
  </div>
</center>
<?=construye_footer_modal()?>  
