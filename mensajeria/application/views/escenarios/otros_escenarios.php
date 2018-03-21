<div>
  <div class="nav-controller img-down">
    <span class="fa  fa-angle-double-left  controller-open"  >
    </span>
    <span class="fa fa-angle-double-right controller-close" >
    </span>
  </div>
</div>
<nav class="animate seccion_escenarios"  >        
    <div class='contenedor_otros'>

      <div class='panel_escenarios'>                 
              <?=n_row_12("header_otros")?>
                <span class='span_otros'>
                  Escenarios
                  <br> del evento 
                </span>
              <?=end_row()?>    
              <?=n_row_12()?>
                <div class='place_escenarios_disponibles'>
                </div>
              <?=end_row()?>    
      </div> 
    </div>  
    <?=n_row_12()?>
      <span class='nuevo_escenario_text'  data-toggle="modal" data-target="#modal-nuevo-escenario-evento" >
        + Nuevo escenario
      </span>
    <?=end_row()?>                              
    
</nav>

<style type="text/css">
  /**/
  nav > ul > li > a:hover{
      font-size: 1.1em;
      font-weight: 700;
      color: rgb(51, 51, 51);
      text-decoration: none;
  }
  .controller-close{
    display: none;
    color:#428BCA;
  }
  .p_otros_escenarios{  
    padding:10px;   
    background: #f5f5f5;
    border-radius: 1px;
  }

  /*ok*/
  .nuevo_escenario_text:hover{
    cursor: pointer;
  }
  .nav-controller{
      position: fixed;
      top:40%;
      right: 1.5%;            
      font-size: 2em;
      cursor: pointer;
      z-index: 300;
  }
  /**/
  .contenedor_escenarios_evento{
    margin-top: 1%;
  }
  /**/
  .otros_escenarios_lb{
      font-size: 2em;
      font-weight: bold;
      color: white;
  }
  /**/
   nav {
    position: fixed;
    top: 6%;
    right: -100%;    
    padding-bottom: 15px;
    height: 100%;
    max-width: 400px;
    text-align: right;
    z-index: 100;    
    overflow: auto;
  }
  /**/
  .seccion_escenarios{       
      background: #f9f9f9;
  }
  /**/
  .contenedor_otros{    
    padding: 1px;
  }
  /**/
  nav.focus {
      right: 0px;
  }
  /**/
  .contenido_escenario{
    background: #f5f5f5;
    width: 98%;
    margin: 0 auto;
 
  }
  /**/
  .panel_escenarios{
    background: white;
  }
  /**/
  .span_otros{

    text-align: left;
    margin-left: 1%;
    font-size: 2.4em;   
    font-weight: bold;
  }
  /**/
  .nuevo_escenario_text{
    color: white;
    font-size: .95em;
    margin-right: 25px;
    background: #E31F56;
    padding: 10px;
  }
</style>





                                
                            
 