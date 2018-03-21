

		<header class="site-header"  style="background-image: url('../img_tema/1bg.jp')!important;">
            <div class="section-container">
                <!-- START CONTAINER -->
                <div class="container text-center">                    
                    <h1 style='color:white;'>
                        Back to the events
                    </h1>                   
                    <div class="buttons-group">                        
                        <a href="#layout-1" class="default-button bt-transparent scrollto">                        
                        	Encuentra eventos cerca de ti 
                            <i class="fa fa-angle-down">
                        	</i>
                    	</a>
                    </div>
                </div>
                <!-- END CONTAINER -->
            </div>
            <!-- OVERLAY -->
            <div class="overlay">
                <div class="gradient-overlay gradient-17 opacity-90">
                </div>
            </div>
        </header>


        <br>
		<section id='layout-1'>            
            <div class='container'>
                <div class="row">
                    <div class='col-lg-9'>
                        <h2 style='color:black;style="color:white;'>
                            Próximos eventos
                        </h2>
                        <div class='ultimos_eventos' id='ultimos_eventos'>
                        </div>                           
                    </div>
                    <div class='col-lg-3'>
                        <a class="twitter-timeline" href="https://twitter.com/back_events">                        
                        </a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8">                
                        </script>                        
                    </div>
                </div>                           
            </div>
        </section>
		

<input type='hidden' value='1' class='empresa'>  
<input type="hidden" name="q" class='q' id='q' value="<?=$q?>">
<input type="hidden" value="<?=$perfil?>" class='action_template' id='action_template'>
<script type="text/javascript" src="<?=base_url('application/js/global.js')?>"></script>    

