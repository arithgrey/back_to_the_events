<?=titulo_enid("Precios del evento")?>                                    
                                                                                                                 
<span class='place_registro_acceso'>
</span>
<div class='well background_panel_enid'>
    <form id="form-new-acceso" action="<?=base_url('../accesos/index.php/api/accesos/acceso/format/json')?>" method="post">
        <?=n_row_12()?>                                      
          <div class='row'>
            <input type ='hidden'  name='moneda' value="MXN"> 
            <input type ='hidden'  name='descripcion' value="">                                             
            <div class='col-lg-4 col-md-4 col-sm-12'>
              <div class="input-group">
                  <span class="input-group-addon">
                    Tipo
                  </span>                                 
                  <?=create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');?>                
          </div>                              
        </div>                                
          <div class='col-lg-4 col-md-4 col-sm-12'>
          <div class="input-group">
              <span class="input-group-addon">
                                                              Acceso
              </span>
              <input  type="text" class='form-control input-sm acceso_input' name='acceso_nombre' id='acceso_nombre' required >
          </div>
          <span class='place_nombre_promo_vali validado'>
          </span>                    
        </div>


        <div class='col-lg-4 col-md-4 col-sm-12'>
          <div class="input-group">
              <span class="input-group-addon">
                                                              $
              </span>
              <input maxlength="10"  class="form-control input-sm" type="number" name='precio' id='precio-acceso-record' step="any" required >
              <span class="input-group-addon ">
                                                              .00
              </span>                    
          </div>            
          <div class='place_msj_precio'>
          </div>                        
        </div>                                            
        </div>        
      <?=end_row()?>

      <br>
      <?=n_row_12()?>                                              

          <button class='btn btn-default btn_save  acceso-registro-button'>
            Registrar acceso
          </button>
                                                  
      <?=end_row()?>
  </form>   
</div>

<br>
                                      
<?=n_row_12()?>                         
    <div class='place_list_accesos'>
    </div>
    <div class='list-accesos'>
    </div>                                                                
<?=end_row()?>