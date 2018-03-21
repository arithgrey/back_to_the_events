<?=n_row_12()?>
  <?=template_evento($evento["nombre_evento"] ,  $evento["idevento"] ,  $evento["idempresa"] ,  1 , 1  )?>
<?=end_row()?>    


<?=valida_reservaciones_public(
  $view_public , 
  $evento["reservacion_tel"] , 
  $evento["reservacion_mail"] ,
  url_evento_view_config($evento['idevento']) ."/reservaciones/"  
)?>      

<div class='row'>
  <div class='col-lg-8 col-md-8 col-sm-12'>
    <div class="tab-content" >
      <div class="tab-pane active" id="seccion-principal-info">
        <section  class='seccion-principal-info'>
          <?=$this->load->view("eventos/principal_dia_evento")?>
        </section>
      </div>
      <div class="tab-pane" id="section_dinamic_escenarios">            
        <div class='place_escenarios_public'>
        </div>        
        <div class='seccion_escenarios_public'>
        </div>        

      </div>    
    </div> 
  </div>

  <div class='col-lg-4 col-md-4 col-sm-12'>    
    <div class='place_bloque_extra'>
    </div>  
    <div class='bloque_extra'>
    </div>
    <?=get_tags_generos($list_generosdb , $evento['idevento'] , $view_public ); ?>
  </div>  
</div>

<input type='hidden' class='empresa' id='empresa' value="<?=$evento['idempresa']?>">
<input type='hidden' class='id_empresa' value="<?=$evento['idempresa']?>">
<input type='hidden' class='evento_escenario' value="<?=$evento['idevento']?>">
<input type='hidden' id='idevento' class='id_evento' value="<?=$evento["idevento"];?>">
<input type='hidden' id='descripcion_permitido' class ='descripcion_permitido' value='<?=$evento["permitido"]?>' >
<input type='hidden' id='descripcion_politica' class ='descripcion_politica' value='<?=$evento["politicas"]?>' >
<input type='hidden' id='descripcion_restriccion' class ='descripcion_restriccion' value='<?=$evento["restricciones"];?>' >
<script type="text/javascript" src="<?=base_url('application/js/evento/client/dia_evento.js')?>">
</script>





<style type="text/css">
  .eslogan_evento{
    background: #232c2d;
    font-size: .9em;
    padding: 10px;
    color: #fffdfd;
  }.eslogan_evento .fa-cog{
    color: white !important; 
  }
  .table_objs_permitidos{
    width: 100%;
  }
  .table_objs_permitidos td {
    font-size:  .8em;
  }
  .seccion_table_objs{
    height: 100px;
  }
  .seccion_table_objs_scroll{
    overflow-y:scroll;
  }
  .listado-contente-enid{
    background: whitesmoke;   
  } 
  .blocke-par{
    margin-top: 10px;    
  }
  .btn-text-msj-user , .text-msj-user{  
    display: inline-block;
  }
  .principal-objs{
    margin-top: 10px;
  }
  /*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px){    
    /*Termina  media query*/
    
  }
  </style>
  <?=$this->load->view("eventos/modal/public")?>
