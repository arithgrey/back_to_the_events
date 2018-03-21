            <section style="background:#052136 none repeat scroll 0% 0% !important;" id="get-in-touch" class="tint-bg">
                <div class="container inner-sm">
                    <div class="row">
                        <div data-aos="fade-up" class="col-sm-10 center-block text-center aos-init aos-animate">
                            <h1 class="single-block">                               

                                <a href="../ultimos_eventos" class="btn btn-large" style='color:white !important;'>
                                    Lugares y eventos  
                                </a>
                                <a href="../paseo_guiado" class="btn btn-large" style='color:white !important;'>
                                    Paseo guiado
                                </a>
                                <?php
                                if ($in_session ==  0 ) {
                                                                        
                                ?>                        
                                <a href="../registro" class="btn btn-large" style='color:white !important; background:#057BC6;'>
                                   Publica tus eventos
                                </a>
                                <a href="../login" class="btn btn-large" style='color:white !important;'>
                                    Iniciar 
                                </a>

                                <?php }?>
                                

                            </h1>

                        </div>
                    </div>
                </div>
            </section>




<!-- END SECTION 1 -->
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92462312-1', 'auto');
  ga('send', 'pageview');

</script>
        <footer>
            <div class="container text-center">
                © 2017
                <a href="http://enidservice.com/" target="_blank">             
                    Enid Service
                </a>
                 All rights reserved.
            </div>
        </footer>
    <input type="hidden" name="now" class="now" value="<?=base_url();?>">
<input type='hidden' name="in_session" id='in_session' class='in_session' value="<?=$in_session;?>" >
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">        
        
    </body>
</html>
