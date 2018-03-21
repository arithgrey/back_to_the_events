
<!--pickers plugins-->
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>

<!--pickers initialization-->
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/estratega/evento/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal.js')?>"></script>





<script type="text/javascript" src="<?=base_url('application/js/Organizacion/incidencias_pricipal.js')?>"></script>
<div class="container-fluid">
	<div class='col-sm-2'></div>	
	<div class='col-sm-8'>
	  <div class="row">
	  	<!--**************************-->
		  <form class="form-incidencia-empresa" id="form-incidencia-empresa" action="<?=base_url('index.php/api/emp/incidencia/format/json/')?>" method="">
		  	<div class="jumbotron">	
	  		  					  		
					<div class='input-group'>
						<span class="input-group-addon" >Tipo de incidencia</span>
						<select class="form-control" name='tipo-incidencia' class='tipo-incidencia' id="tipo-incidencia">
							<?=$tipos_inicidencia;?>
						</select>
					</div>
					
					<div class='input-group'>
						<span class="input-group-addon" >Sub tipo</span>
						<div class='sub-tipo-section' id='sub-tipo-section'>
							<select class="form-control sub-tipo" id='sub-tipo' name='sub-tipo' ></select>
						</div>
					</div>
					
					<!--***********************************************-->

					<div class='input-group'>
						<span class="input-group-addon" >Reportado a: </span>
						<?=$reportados?>
					</div>


					<div class='input-group'>
						<span class="input-group-addon">Forma del reporte: </span>
						<select class="form-control" name='forma-reporte' id="forma-reporte" class='forma-reporte'>
							<option value="Mediante el sistema">Mediante el sistema</option>
							<option value="Via telefónica">via telefónica</option>
							<option value="Correo electrónico">Correo electrónico</option>							
						</select>
					</div>



					<div class='input-group'>
						<span class="input-group-addon">Afectación </span>
						<select class="form-control" name='afectacion' id="afectacion" 
						class='afectacion'>

							<option value="Grave">Grave</option>
							<option value="Grave a corto plazo">Grave a corto plazo </option>
							<option value="Grave a largo plazo">Grave a largo plazo</option>
							<option value="Influyente en el futuro">Influyente en el futuro</option>
							<option value="No grave">No grave</option>
						</select>
					</div>



					
                    <div class="input-group">
                    	<span class="input-group-addon">Reportado el día: </span>
                        <input class="form-control dpd1" id="update_inicio" name="fecha-reporte" type="text" required>
                    
                    
                    </div>

					
					<!--***************************************************-->
					<div class="form-group">
					    <span class="input-group-addon">Descripción de los hechos</span>
					    <textarea class="form-control"  class='descripcion' id='descripcion' 
					    name='descripcion' rows="3"></textarea>
					</div>
					
			  <p id="guardar-info"><a class="btn btn-default btn_save" href="#" role="button">Guardar</a></p>
			</div>
		  </form>

		  <div class='response-save' id='response-save'></div>
	  	<!--**************************-->	 	
	  </div>
	  </div>
	  <div class='col-sm-2'></div>	



	</div>



