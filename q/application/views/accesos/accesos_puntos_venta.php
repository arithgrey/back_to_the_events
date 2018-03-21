<div id="about3" class="tab-pane">    
    <div class='section-nuevo-acceso' >
        <section>                            
            <div>
                <h1>
                    Asociar puntos de venta al evento                             
                </h1>                                                                                        
                <div class="input-group">               
                    <span class="input-group-addon" title='Con ésta opción puedes indicar al público dónde adquirir sus accesos' >
                        Encuentra tu punto de venta 
                    </span>                                                                                
                    <input class="form-control search-punto-venta input-sm"  name='punto_venta' id='search-punto-venta' placeholder='Nombre del punto de venta' title='Con ésta opción puedes indicar al público dónde adquirir sus accesos' >                                                                              
                </div>  
                <div class='list-posibles-puntos' id="list-posibles-puntos"> 
                </div>                                       
                           
            </div>                                                                                            
            <div>
                <div class='puntos-venta-accesos-evento' id="puntos-venta-accesos-evento">
                    <?=$resumen_puntos_venta_asociados;?>                   
                </div>                                                                                             
            </div>
            <div>                
                <!--Aquí Cargamos los puntos de venta asociados al evento -->                                
                <div class='response-puntos-venta' id='response-puntos-venta'>
                </div>
                <div id='response-dinamic-punto-venta'>
                </div> 
                <div class ='list-puntos-venta-icon' id='list-puntos-venta-icon' >
                </div>
                <!--Aquí Cargamos los puntos de venta asociados al evento -->
            </div>       
            
        </section>                                
    </div>                     
</div>