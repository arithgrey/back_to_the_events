<?=template_evento($data_evento["nombre_evento"] ,  $data_evento["idevento"]   ,  $data_evento["idempresa"] , 1 ,1 )?>

<div class='row'>
    <div class='col-lg-8 col-md-8 col-sm-12'>        


        <ul class="nav nav-pills"> 
            <li class='pull-left  active tab_enid '>
              <span  href="#tab_accesos" role="tab" data-toggle="tab" >                     
                <strong>
                    Precios
                </strong>         
              </span>
            </li>        
            <!--
            <li class='tab_puntos_venta tab_enid pull-right dinamic_menu_pv'>
              <span  href="#tab_puntos_venta" role="tab" data-toggle="tab" >                              
                Puntos de venta                    
              </span>
            </li>    
        -->

        </ul>
        <div>
            <span class='dias_restantes'>
                <?=$dias_restantes_evento;?>
            </span>                                
            <div class='enid-lg-hidden'>
                <hr>
            </div>    
        </div>  
        <!--Contenido -->
        <div>
          <div class="tab-content clear-style">
            <div class=" tab-pane active " id="tab_accesos">
                <section id='section-slider' class='section-slider'>
                <?=$this->load->view('accesos/principal_public');?>
                </section>
            </div>        
            <div class="tab-pane " id="tab_puntos_venta">
                <?=$this->load->view("accesos/info_user_puntos_venta")?>                                                                                                   
            </div>
            <div class="tab-pane " id="section_dinamic_escenarios">
                <div class='place_escenarios_public'> 
                </div>
                <div class='seccion_escenarios_public'> 
                </div>

            </div>

          </div> 
        </div>

        <?=n_row_12()?>
            <div class='enid-maps' id="enid-maps">
              <?=valida_maps_public($evento['formatted_address'] , $evento['idevento'] )?>    
            </div>
        <?=end_row()?> 
            
        <?=n_row_12()?>
            <ul class="p-social-link pull-right">        
                <?=evalua_social($evento["url_social"] , "fb" , $in_session )?>
                <?=evalua_social($evento["url_social"] , "yt" , $in_session )?>                
            </ul>  
        <?=end_row()?> 

    </div>
    <div class='col-lg-4 col-md-4 col-sm-12'>
        
        <?=valida_reservaciones_public(
            $in_session ,
            $evento["reservacion_tel"] ,
            $evento["reservacion_mail"] ,             
            url_evento_view_config($evento['idevento'])."/reservaciones/"
            
        )?>
        


        <div>
            <div class='place_bloque_extra'>
            </div>    
            <div class='bloque_extra'>
            </div>                    
        </div>
    </div>    

</div>




<input type='hidden' class='empresa' value='<?=$data_evento["idempresa"]?>'>
<input type='hidden' class='id_empresa' value='<?=$data_evento["idempresa"]?>'>
<input type='hidden' class='evento' value='<?=$data_evento["idevento"]?>'>
<input type='hidden' class='id_evento' value='<?=$data_evento["idevento"]?>'>
<input type='hidden' class='evento_escenario' value='<?=$data_evento["idevento"]?>'>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal_cliente.js')?>"></script>



<?=$this->load->view("eventos/modal/public")?>


<style type="text/css">
.contenedor_puntos_venta{
    background: rgb(22, 103, 129);    
}#puntos-venta{
    color: white !important;
}.accesos_seccion{
    background:#fafbf6;
}.accesos_seccion_contenedor{
    width: 90%;
    margin: 0 auto;
}.acceso_listado{
    background: white;
}.btn_more_accesos{
    margin-top: 2px;
    margin-left: 2%;
}.contenedor-config{
  text-align: right;
}.seccion-p-accesos , .seccion-p-puntos-venta{
    margin-top: 10px;
}.link-to-info , .link-to-admin{
    display: inline-block;
    text-align: right;
}.nuevo-pv-text , .nuevo-pv-btn{
    display: inline-table;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
