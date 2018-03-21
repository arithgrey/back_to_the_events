     
      <!--body wrapper end-->       
     </div>
      <!-- main content end-->
      <!--footer section start-->
            <footer>
                <div class="container">                      
                ©2016 ENID SERVICE, ALL RIGHTS RESERVED
              </div>
                
            </footer>
            <!--footer section end-->
    </section>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<input type='hidden' name="in_session" id='in_session' class='in_session' value="<?=$in_session;?>" >
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</body>
</html>
<?=construye_header_modal('modal-version-sistema', " Versión del sistema " );?>        
    <h3>
        Versión 1.0.0
    </h3>
    <div id="masInfo" align="right">
        <a href="<?=url_sugerencias()?>?>">
            Ayudanos a mejorar nuestros servicios
        </a>
    </div>
<?=construye_footer_modal()?>                                  
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">
<?=ini_set('display_errors', '1');?>