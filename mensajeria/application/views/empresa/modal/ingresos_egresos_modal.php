<!--************************************************** NOTA DEL CONTACTO-->
<?=construye_header_modal('agregar-categoria-modal', "+ Agregar categoría" );?>                           
   <form class='form-categoria' id='form-categoria' action="<?=base_url('index.php/api/emp/categoria/format/json')?>">          
        <div class="input-group m-bot15">
	        <span class="input-group-addon">
	           Categoria
	        </span>
	        <input class="form-control input-sm" name="categoria" placeholder="Nombre del producto o servicio" id='categoria-i' type="text">
        </div>

        <div class='place_nombre_categoria'>
        </div>

        <div class="input-group m-bot15">
          <span class="input-group-addon">
             precio
          </span>
          <input class="form-control input-sm" name="precio"  id='precio' type="number" step="any">
        </div>
        <div class='place_precio_categoria'>
        </div>
        <div class="input-group m-bot15">
          <span class="input-group-addon">
             Costo
          </span>
          <input class="form-control input-sm" name="costo"  id='precio' type="number" step="any">
        </div>
        <div class='place_costo_categoria'>
        </div>

        <select class='form-control intpu-sm' name='precio_variable'> 
          
          <option value='1'>
            Editable 
          </option>
          <option value='0'>
            No editable 
          </option>
        </select>
        <label>
          Nota
        </label>
        <textarea class='descripcion form-control input-sm' id='descripcion' name='descripcion'>
        </textarea>
        <br>
        <button  id="button-registrar" class="btn btn-default btn_save ">
            Registrar 
        </button>
   </form>           
   <span class='place_categorias_registro'>   	
   </span>
<?=construye_footer_modal()?>  


<?=construye_header_modal('mover-registro-modal', "Mover registro" );?>                             
  <div class='place_mover_registro'>
  </div>
  <form id='form-mover' action="<?=base_url('index.php/api/emp/mover_registro/format/json')?>">
    <?=create_select($info_cuenta , "cuenta" , "cuenta_select form-control input-sm" , "cuenta_select" , "nombre_cuenta" , "id_cuenta" )?>
    <select name="tipo" class="tipo form-control input-sm" id="tipo_select"> 
      <option value="1">
        Ingreso
      </option>
      <option value="0">
        Gasto
      </option>
    </select>
    <button  id="button-registrar" class="btn btn-default btn_save ">
        Mover
    </button>
  </form>

<?=construye_footer_modal()?>  



<?=construye_header_modal('nueva-cuenta-modal', "Agregar nueva cuenta" );?>                             
  <center>
    <div class='place_registro_cuenta' id='place_registro_cuenta'>
    </div>
  </center>
  <form id='form-cuenta' action="<?=base_url('index.php/api/emp/cuenta/format/json')?>" >
        <div class="input-group m-bot15">
          <span class="input-group-addon">
            Cuenta
          </span>
          <input class="form-control input-sm" name="nombre_cuenta" id='nombre_cuenta' placeholder="Nombre del la cuenta" type="text">
        </div>
        <button  id="button-registrar" class="btn btn-default btn_save ">
          Registrar
        </button>
  </form>
<?=construye_footer_modal()?>  



<?=construye_header_modal('editar-registro-modal', "Editar" );?>                                 
    <center>
      <div class='place_editar_registro' id='place_editar_registro'>
      </div>
    </center>
    <form id='form-editar' class='form-editar' action="<?=base_url('index.php/api/emp/ingreso/format/json')?>">      
      <div class="input-group m-bot15">
          <span class="input-group-addon">
            $
          </span>
          <input class="form-control input-sm" name="valor" id="valor-e" type="number" step="any" placeholder="0">
      </div>
      <div class='place_categocias'>
      </div>          
      <div class='categorias'>
      </div>     
      <div class="input-group m-bot15">         
          <span class="input-group-addon">
                    Cantidad
          </span>
          <?=create_select_cantidad("cantidad")?>
      </div>
      <br>       
      <button  id="button-registrar" class="btn btn-default btn_save ">
          Registrar
      </button>

    </form>
<?=construye_footer_modal()?>  





<?=construye_header_modal('editar-catalogo-registro', "Editar catálogo" );?>                                 
<center>
    <div class='place_info_complete_categoria'>
    </div>
   </center>
<form class='form-categoria' id='form-categoria-editar' action="<?=base_url('index.php/api/emp/categoria/format/json')?>">          
        <div class="input-group m-bot15">
          <span class="input-group-addon">
             Categoria
          </span>
          <input id='categoria-e' class="form-control input-sm" name="categoria" placeholder="Nombre del producto o servicio" id='categoria-i' type="text">
        </div>

        <div class='place_nombre_categoria'>
        </div>

        <div class="input-group m-bot15">
          <span class="input-group-addon">
             precio
          </span>
          <input class="form-control input-sm" name="precio"  id='precio-e' type="number" step="any">
        </div>
        <div class='place_precio_categoria'>
        </div>
        <div class="input-group m-bot15">
          <span class="input-group-addon">
             Costo
          </span>
          <input class="form-control input-sm" name="costo"  id='precio-e' type="number" step="any">
        </div>
        <div class='place_costo_categoria'>
        </div>

        <select class='form-control intpu-sm' name='precio_variable' id='precio_variable-e'>           
          <option value='1'>
            Editable 
          </option>
          <option value='0'>
            No editable 
          </option>
        </select>
        <label>
          Nota
        </label>
        <textarea class='descripcion form-control input-sm' id='descripcion-e' name='descripcion'>
        </textarea>
        <br>
        <button  id="button-registrar" class="btn btn-default btn_save ">
            Registrar 
        </button>
   </form>           
   
<?=construye_footer_modal()?>  



<?=construye_header_modal('registrar-promocion', "Nueva promoción para tu negocio" );?>                                 
<div class='place_promocion_registro'>
</div>
<form id='form_promocion' action="<?=base_url('index.php/api/emp/promociones/format/json/')?>">
  <div class="input-group m-bot15">
    <span class="input-group-addon">
      Promoción
    </span>
    <input class="form-control input-sm nombre_promocion " name="promocion"  id='promocion' type="text" >
  </div>  
  <div class='place_nombre_promocion'>
  </div>
  <div class='place_producto_servicio'>
  </div>
  <br>
  <button  id="button-registrar" class="btn btn-default btn_save ">
      Registrar 
  </button>
</form>
<?=construye_footer_modal()?>  