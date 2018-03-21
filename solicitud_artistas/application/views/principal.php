<section>

<?=n_row_12();?>
<div class='col-lg-8 col-lg-offset-2'>
  <?=contenedor_page_start();?>
    
    <?=n_row_12()?>
      <center>
        <span class='nombre_empresa'>
          <?=$data_empresa["nombreempresa"]?>
        </span>
        <?=titulo_enid("Solicítanos tus artista preferidos")?>
      </center>
    <?=end_row()?>
    <?=n_row_12()?>
      <center>
        <form action="../empresas/index.php/api/solicitud_artistas/artistas/format/json/" method="post" id='solicitud-ciudad-form' >                                        
                <div class='col-lg-4 col-md-4 col-sm-12 '>                            
                  <div class="input-group">
                    <span class="input-group-addon">
                      Ciudad
                    </span>                                   
                    <?=create_select($ciudades_list , 'ciudad' , 'form-control input-sm' , 'ciudad_select' , 'countryName' , 'idCountry' );  ?>                                                        
                  </div>                                                        
                </div>
                
                <div class='col-lg-4 col-md-4 col-sm-12'>
                  <input type="hidden" class='empresa' name='empresa' value="<?=$data_empresa["idempresa"]?>">                                    
                  <div class="input-group">
                    <span class="input-group-addon">
                      Email
                    </span>                            
                    <input type="email" class='form-control input-sm' id="email" name="email" placeholder="@">
                    <datalist id="posibles-artistas">                               
                    </datalist>
                  </div>
                  <div class='place_email'>
                  </div>
                </div>  

                <div class='col-lg-4 col-md-4 col-sm-12'>
                  <input type="hidden" class='empresa' name='empresa' value="<?=$data_empresa["idempresa"]?>">                                    
                  <div class="input-group">
                    <span class="input-group-addon">
                      Artista
                    </span>                            
                    <input type="text" list="posibles-artistas" class='form-control input-sm' id="artista-solicitud" name="artista-solicitud" placeholder="Artista">
                    <datalist id="posibles-artistas">                               
                    </datalist>
                  </div>
                  <div class='place_val_artista'>
                  </div>
                </div>                                                      
                <?=n_row_12()?>              
                  <?=btn_registrar_cambios_enid("" , "" , "" )?>
                  
                <?=end_row()?>
        </form>
      </center>
    <?=end_row()?>
    <?=n_row_12()?>  
      <div class='separate-enid'>
      </div>
      <div class="place_registro" id="place_registro">
      </div>  
    <?=end_row()?>
      
    <?=n_row_12()?>  
      <center>      
          <?=valida_call_comentarios( url_solicita_artista($data_empresa["idempresa"]))?>.      
      </center>
    <?=end_row()?>   
    <!---->
  <?=contenedor_page_end();?>  
  <?=n_row_12()?>
    <center>
      <div class='col-lg-4 col-lg-offset-4'>
        <div class='seccion-solicitudes-registradas'>      
            <div class='place_artistas'>
            </div>    
        </div>
      </div>
    </center>
  <?=end_row()?>
</div>
<?=end_row()?>

</section>
<?=$this->load->view("socials/template_link_post_fb")?>
<script type="text/javascript" src="<?=base_url('application/js/principal.js')?>"></script>
<input name='nombre_empresa' value="<?=$data_empresa["nombreempresa"]?>" class='nombre_empresa' type='hidden'> 
