<a target="_blank"  href="http://www.facebook.com/sharer.php?u=<?=base_url(uri_string())."?q=".$data_evento["idevento"];?>">
  <i id="social-fb" class="fa fa-facebook-square fa-2x social">
  </i>
</a>
<a id='ir_encuesta_tw'
          href="https://twitter.com/share" 
          class="twitter-share-button fa fa-twitter-square fa-2x social" 
          data-url="<?=base_url(uri_string())."?q=".$data_evento["idevento"];?>" 
          data-size="large"
          data-text="Me encantará asistir!">
</a> 

<div class="g-plus" data-action="share" data-height="15" data-href="?=base_url(uri_string())."?q="<?=base_url(uri_string())."?q=".$data_evento["idevento"];?>">
</div>  

<button title='califica este evento' type="button" class="btn btn-primary btn-block enlance_next" id="<?=url_solicita_artista($data_evento['idempresa'])?>">                               
  	Solicita tu artista
    <i class='fa fa-headphones'>                                
    </i>
</button>
                        
              

      
<script>
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'es'}
</script>