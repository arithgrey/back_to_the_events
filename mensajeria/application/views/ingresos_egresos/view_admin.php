<div class="tab-pane active" id="registro_cuentas">
  <div class='cuentas-menu'>
    <?=n_row_12()?> 
      <?=create_tmp_cuentas($info_cuenta)?>    
    <?=end_row()?>    
  </div>

  <?=n_row_12()?> 
    <div>              
      <span href="#pill-1" role="tab" title='Registra nuevo ingreso' data-toggle="tab" class='ingresos-btn active' id='ingresos-btn'>
        <i class=" icon-up-1">
        </i> 
          Ingresos
      </span>
      <span href="#pill-2" role="tab" title='Registra nuevo gasto' data-toggle="tab" class='egresos-btn' id='egresos-btn'>
        <i class="icon-heart">
        </i> 
         Gastos
      </span>          
    </div>  
  <?=end_row()?>    
  



<div class='contenedor-info-cuenta'>
      <?=n_row_12()?>	
        <br>	
        <div class="tab-content">
        	<div class="tab-pane active" id="pill-1">  		
        		<?=titulo_enid("Registrar Ingreso")?>  		
        	</div>	
        	<div class="tab-pane " id="pill-2">
        		<?=titulo_enid("Registrar  gasto")?>
        	</div>	
        </div>
        <br>
      <?=end_row()?>





      <?=n_row_12()?>
        <form  method='POST' class='form-ingresos'  id='form-ingresos' action='<?=base_url('index.php/api/emp/registro/format/json/')?>'>
          <div class='i-categorias'>          
              <div class="input-group m-bot15">
                <span class="input-group-addon">
                    $
                </span>


                <input class="form-control input-sm" name="valor" id='valor' type="number" step="any" placeholder='0'>
            </div>
            <div class='place_valor'>
            </div>
          </div>
          <div class='c-categorias'>
            <div class="input-group m-bot15">         
              <span class="input-group-addon">
                    Cantidad
              </span>
              <?=create_select_cantidad("cantidad")?>
            </div>
          </div>
          <input name="tipo" value='1' id='tipo' type='hidden'>
          <input type='hidden' id='cuenta' name='cuenta' value='<?=$info_cuenta[0]["id_cuenta"]?>'> 
          <div class='s-categorias'>                      
            <div class='place_categocias'>
            </div>          
            <div class='categorias'>
            </div>
            <span class='agregar-categoria' data-toggle="modal" data-target="#agregar-categoria-modal"> 
              + agregar categoría
            </span>
          <br>
          <span class='place_registro_nueva_categoria'>
          </span>
        </div>
        <div>
          <button class='btn_nuevo_link' type='submit'>
            Registrar
          </button>
        </div>
        </form>
      <?=end_row()?>


  <?=n_row_12()?>
    <center>
      <div class='place_registro_almacenado'>
      </div>
    </center>
  <?=end_row()?>


  <?=n_row_12()?>	
    <div class='contendor-cuenta-info'>
      <?=n_row_12()?>
        <div class='place_ultimos_registros'>
        </div>
      <?=end_row()?>	
    </div>
  <?=end_row()?>
  <div class='empresa' cuenta-empresa='<?=$id_empresa?>'>
  </div>

</div>


  
</div>