<center>
<div class='col-lg-10 col-lg-offset-1'>
<?=n_row_12()?>	
		    	<div class='place_registro_contacto'>
		    	</div>		     
		        <div >
		          <form id='form_contacto' class="form-horizontal" action="<?=base_url('index.php/api/emp/contacto/format/json')?>" method="post">	    
		            <div class="form-group">
			          <div class='col-md-4'>			          
			              <label class="col-md-2 control-label input-sm" for="name" >
			                Nombre
			              </label>
			              <div class="col-md-10">
			                <input id="name" name="nombre" type="text" placeholder="Tu nombre" class="form-control input-sm" >
			              </div>
		              </div>	
		              <div class='col-md-4'>
		              		<label class="col-md-2 control-label input-sm" for="email">
				                E-mail
				            </label>
				            <div class="col-md-10">
				              <input id="emp_email" 
				                name="email" type="text" placeholder="Tu email" 
				                class="form-control input-sm" required>
				            </div>
				            <div class='place_mail_contacto'>
				            </div>
		              </div>	
		              	<div class='col-md-4'>
			              <label class="col-md-2 control-label input-sm" for="emp_tel">
			                Teléfono
			              </label>
			              <div class="col-md-10">
			                <input id="emp_tel" name="tel" type="tel" placeholder="Número telefónico" class="form-control input-sm" required>
			              </div>
			              <div class='place_tel_contacto'>
			              </div>
		              	</div>

		            </div>    
		           
		            <!-- Message body -->
		            <div class="form-group">		              
		              <div class="col-md-12">
		                <textarea class="form-control" id="message" name="mensaje" placeholder="Mensaje aquí" rows="4">
		                </textarea>
		              </div>
		            </div>	            
		            <!-- Form actions -->
		            <div class="form-group">

		              <div class="col-md-12 ">		              	
			                <button type="submit" class="btn-enviar btn btn-primary btn-lg">
			                	Reservar
			                </button>		                
		              </div>

		            </div>	          
		          </form>
		        </div>
	
<?=end_row()?>		
<?=titulo_enid("También puedes reservar  por estos medios.")?>
	<?=btn_cargar_elementos($in_session , "btn_configurar_enid_w" , "btn_configurar_enid_w"  , "data-toggle='modal' data-target='#reservaciones-modal' " ,  "+ Reserva al " )?>
	<?=n_row_12()?>
		<center>
			<div class='text-reservaciones' id='text-reservaciones'>
				RESERVACIONES 
				<br>
				<?=$data_empresa["reservacion_tel"]?>
				<br>
				<?=$data_empresa["reservacion_mail"]?>	
			</div>
		</center>
	<?=end_row()?>


