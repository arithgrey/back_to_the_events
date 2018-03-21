
<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/animations.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/hover/hover-min.css')?>" rel="stylesheet">    
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>



<div class="wrapper">
	
        <div class="row blog">
        <div class="col-md-4">
            







<!--*********************************** Lo que se vivió en eventos pasados   ***************************************-->
<div class="panel">
    <header class="panel-heading blue-col-enid" > 
        La experiencia en eventos pasados
    <span class="tools pull-right">                                                    
        <a class="fa fa-chevron-down" href="javascript:;">
        </a>                                    
    </span>
    </header>
                            
    <div class="panel-body" style="background:  none repeat scroll 0% 0% #124048">                                                                                    
    <!--last 5 -->
        <?=get_last_events_empresa($ultimos_eventos_experiencia, 100);?>
    <!--Termina-->
    </div>
</div>



<!--***********************************  Lo que se vivió en eventos pasados   ***************************************-->
           




        </div>







<!--******************************** Lista de precios y promociones  ***************************-->
        <div class="col-md-8">
           

           <?=$accesos_evento;?>
        	<!--
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5 blue-col-enid">
                            <div class="blog-img-sm blue-col-enid">
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 class=""><a href="#">Neque porro quisquam est qui dolo</a></h1>
                            <p class=" auth-row">
                                By <a href="#">Anthony Jones</a>   |   27 December 2014   | <a href="#">5 Comments</a>
                            </p>

                            <p>Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci.
                            </p>
                            <a href="#" class="more">Continue Reading</a>
                        </div>
                    </div>
                </div>
            </div>
-->


            
            
        </div>

        </div>
        </div>

<!--********************************Termina  Lista de precios y promociones  ***************************-->






