<!--************************************************** NOTA DEL CONTACTO-->
<?=construye_header_modal('reservaciones-modal', "Reservaciones" );?>                           
   <form class='form-servaciones' id='form-servaciones'
    action="<?=base_url('index.php/api/emp/reservacion/format/json/')?>">          
        </label>
        <div class="input-group m-bot15">
            <span class="input-group-addon">
                Tel.
            </span>
            <input class="form-control input-sm" name="reservacion_tel" id="reservacion_tel" placeholder="Teléfono" maxlength="10" required="" type="tel">                                                                
        </div>
        <span class='place_tel'>            
        </span>      
        <div class="input-group m-bot15">
            <span class="input-group-addon">
               Correo @
            </span>
            <input id='reservacion_mail' class="form-control input-sm" name="reservacion_mail" placeholder="arithgrey@gmail.com" type="text">
        </div>
        <br>
        <button  id="button-registrar" class="btn btn-default btn_save ">
            Registrar 
        </button>
        <input type="hidden" name="dinamic_event"  class='dinamic_event' id='dinamic_event' >
   </form>           
   <span class='place_reservaciones'>       
   </span>
<?=construye_footer_modal()?>  





<?=construye_header_modal('modal_tematica_evento', " Temática del evento " );?> 

<div>               
    <form class="form-horizontal" id='form-tematica'>                                   
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-tree">
            </i>
          </span>
          <select class="form-control m-bot15" id="tematica_select" name="tematica_select">
          </select>
        </div>         
    </form>         
    <div class='place_tematica'>
    </div>      
    <br>
  <button class="btn  btn-default btn_save" id='tematica-event-btn'>
      Registrar cambios
  </button>   

</div>            
<?=construye_footer_modal()?>  




<?=construye_header_modal('tipo-evento', " Tipo de evento " );?> 
  <div class="input-group">
      <div class="input-group-addon">
         Tipo
      </div>         
      <?=select_tipo_eventos("tipo-evento" , "form-control" , "tipo-evento-select")?>
  </div>  
  <div class='place_tipo_evento'>
  </div>                        
  <br>
  <button class="btn  btn-default btn_save" id='tipo-event-btn'>
      Registrar cambios
  </button>   
<?=construye_footer_modal()?>



<?=construye_header_modal('serviciosmodal', " Servicios que incluirá el evento" );?>            
  <div class='panel'>
    <input type="hidden" value="<?=$evento;?>" id="eventoservicios"  class='eventoservicios' name='eventoservicios'>    
    <a  class='pull-right' href="<?=url_dia_evento($evento)?>">
    <i class="fa  fa-arrow-circle-o-right"> 
    </i>
      Ver como el público
    </a>
  <form class="form-horizontal" id="form_servicios_b" method="GET" action="<?=base_url('index.php/api/serviciosevento/q/format/json/')?>">  
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="servicio_b">
        <i class="fa fa-search" aria-hidden="true">
        </i>
          Servicio
        </label>  
        <input type="hidden" name="evento_b" value="<?=$evento?>">
        <div class="col-md-4">
        <input id="servicio_b" name="servicio_b" type="text" placeholder="Servicios  del evento" class="form-control input-md">   
        </div>
      </div>  
  </form>
    <div class='servicios_encontrados' id="servicios_encontrados" >
    </div>
    <div class='servicios_in_evento'>
    </div>                                
    <div class='place_servicios_incluidos'>
    </div>
  </div>   
<?=construye_footer_modal()?>  

<!--***********************************Restricciones   *************************-->
<?=construye_header_modal('templa-restricciones', " Restricciones del evento" );?>       
  <div class='panel'>
    <div class='restricciones_tmp_seccion'>
    </div>
    <div class='place_restricciones_tmp_seccion'>
    </div>
  </div>      
<?=construye_footer_modal()?>

<!--**********************************************-->  
<?=construye_header_modal('templa-politicas', "  Políticas del evento" );?>                     
  <div class='panel'>
    <div class='politicas_tmp_seccion'>
    </div>
    <div class='place_politicas_tmp_seccion'>
    </div>
  </div>               
<?=construye_footer_modal()?>


<!--***********************************TERMINA  SERVICIOS MODAL  *************************-->
<?=construye_header_modal('templa-descripcion-contenido', " Usar plantilla de eventos " );?>          
  <div class='panel'>
    <div class='experiencias_tmp_seccion'>
    </div>
    <div class='place_experiencias_tmp_seccion'>
    </div>
    
  </div>              
<?=construye_footer_modal()?>





<!--************************* Modal update fecha del evento    ************************* -->
<?=construye_header_modal('edith_fecha_modal', " Fecha del evento  " );?>     
  <?=n_row_12()?>
    <form method="POST" class='update-fecha-evento-form' id="update-fecha-evento-form">          
        <?=n_row_12()?>
          <div class='calendar-1'>        
              <label class='text-inicio'>
                    Día Inicio    
              </label>                    
              <input  data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  id="update_inicio" 
                    class='form-control input-sm'  name="update_inicio"  size="10" required >                        
          </div>        
          <div class='calendar-2'>    
              <label class='text-termino'>
                    Día  Termino                 
              </label>                                    
              <input   name="update_termino"   data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                    id="update_termino"  class='form-control input-sm' size="10" required>                
          </div>
        <?=end_row()?>             
          <?=n_row_12()?>
            <br>
            <button class="btn btn-default btn_save">
                  Registrar cambios
            </button>                    
          <?=end_row()?>           
      </form>
  <?=end_row()?>   
  <div class='place_fecha_evento'>
  </div>                                
<?=construye_footer_modal()?>















<!---->
<?=construye_header_modal('modal-img-evento-section', " Portada del evento  " );?> 
  <div class='seccion_form_portada'>
  </div>
  <div class='place_form_portada'>
  </div>
<?=construye_footer_modal()?>  
        
<?=construye_header_modal('modal_social_evento', "Redes sociales del evento " );?>         
  <form class="form-horizontal" id='form_social' action="<?=base_url('index.php/api/event/urlbyid/format/json/');?>" >                                                                               
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-facebook ">
        </i> 
      </span>                    
      <input class="form-control input-sm" name='url_social_evento' type="text" id="url_social" placeholder="La url de tu evento en Facebook"  value="<?=$data_evento['url_social']?>">
    </div>  
    <div class='place_social_1'>
    </div>                                                                                             
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-youtube-play">
        </i>
      </span>
      <input class="form-control" name='url_social_evento_youtube' type="text" id="url_social_evento_youtube" placeholder="La url de tu canal en youtube"  value="<?=$data_evento['url_social_youtube']?>">
    </div>  
    <div class='place_social_2'>
    </div>      
    <br> 
    <button class='btn  btn-default btn_save'>
      Registrar cambios
    </button>
  </form>
  <div class='place_social'>
  </div>                                       
<?=construye_footer_modal()?>  









