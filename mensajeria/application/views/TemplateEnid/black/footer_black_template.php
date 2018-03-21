<!--     
     </div>
            <footer>
              <center>

                
                  
              	<div class="container">                      
                  ©2016 ENID SERVICE, ALL RIGHTS RESERVED                  
                </div>
                <div class='container'>                  
                </div>  
              </center>
                <script src="<?=base_url('application/js/js/scripts.js')?>">
                </script>
            </footer>
            
    </section>
  -->

<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<input type='hidden' name="in_session" id='in_session' class='in_session' value="<?=$in_session;?>" >
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<style type="text/css">
.enlace-info-emp{
  margin-left: 10px;    
  font-weight: bold;
  color: #166781;
}
</style>
</body>
</html>
<?=construye_header_modal('modal-version-sistema', " Versión del sistema " );?>        
    <h3>
        Versión 1.0.0
    </h3>
    <div id="masInfo" align="right">
        <a href="<?=url_sugerencias()?>">
            Ayudanos a mejorar nuestros servicios
        </a>
    </div>
<?=construye_footer_modal()?>                                  
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/animate.css')?>">
<?=ini_set('display_errors', '1');?>