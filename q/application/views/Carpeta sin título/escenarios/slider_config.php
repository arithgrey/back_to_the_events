<?php

        $imgs_escenario ="";
        $class_extra ="";
        $flags ="";
        $flag =1; 

        $editacion ="";
        if ($f == 0 ) {
            $editacion = '<div class="form-group">
                                        <div class="section-nombre-evento-in">
                                            <div class="input-group">                    
                                                <span class="input-group-addon">                                                
                                                </span>
                                                <input  class="form-control in-nombre-escenario" id="in-nombre-escenario" value="'. $data_escenario["nombre_escenario"].'" name="nuevo_nombre" type="text">                      
                                                <input type="hidden" name="action" value="carga-imgenes-escenario">                    
                                            </div>
                                        </div>
                                    </div>  
                    ';
                
        }
        $imgs_escenario .= '<div class="item active">

                                <div >
                                    <center>
                                        <label style="font-size:4em;"  title="Actualizar nombre del escenario" class="nombre-escenario-text text-center" >
                                            '. $data_escenario["nombre_escenario"].' 
                                        </label>                                
                                    </center>

                                    '. $editacion .'


                                </div>
                                <div class="carousel-caption">
                                </div>
                            </div>';

        
        $flags .= '<li data-target="#myCarousel" data-slide-to="0" class="active">
                        <a href="#">                            
                            <small>
                            La experiencia 
                            </small>
                        </a>
                    </li>
                    ';                  

                        

        foreach($imagenes as $row){

            $img =  create_icon_img($row , " "  , " " ); 
            
            $imgs_escenario .= '<div class="item ">
                                '. $img .'
                                <div class="carousel-caption">
                                    <h3>
                                        Headline
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
                                        ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                                </div>
                            </div>';

            $flags .= '<li data-target="#myCarousel" data-slide-to="'.$flag.'" class="">
                        <a href="#">
                            About
                            <small>Lorem ipsum dolor sit
                            </small>
                        </a>
                    </li>
                    ';                  


            $flag ++;                       
        }

        $slider = '
        <div id="myCarousel" class="carousel slide" data-ride="carousel">        
        <div class="carousel-inner">           
          '.$imgs_escenario.'  
        </div>        
        <ul class="nav nav-pills nav-justified">
            '. $flags .'
        </ul>
        </div>';

        

?>
<?=$slider;?>