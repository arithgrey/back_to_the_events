<center>
	<div class='place_dinamic_registro_incidencia'>
	</div>
</center>
<div class='seccion_form_errores'>
	<div class='col-lg-6 col-md-6  col-sm-8 col-lg-offset-3  col-md-offset-3 col-sm-offset-2  '>		
		<?=get_titulo_form($param["tipo"])?>
		<form class='form-error' id='form-error' action='<?=base_url("index.php/api/reportes/reporteincidencia/format/json/")?>'>
			<div class="form-group">            				
				<div class='row'>
					<div class='col-lg-6'>
						<?=get_title_tipo($param["tipo"])?>
						<?=create_select($tipos_incidencias , "tipo_incidencia", "incidencia form-control input-sm" ,  "incidencia" , "tipo_incidencia" , "idtipo_incidencia" )?>
					</div>
					<div class='col-lg-6'>						
						<?=get_title_afectacion($param["tipo"])?>
						<?=create_select($calificaciones , "afectacion", "afectacion form-control input-sm" ,  "afectacion" , "nombre" , "idcalificacion" )?>
					</div>	
				</div>
				<label>
					Página donde se presentó el error?
				</label>                                
                <input class="form-control input-sm  " name="pagina_error" id="pagina_error" type="" placeholder="enidservice.com">                	
                <label>
                	Reporte
                </label>
                <div class='place_reporte_incidencia'>
                </div>
				<textarea name='descripcion' id='descripcion_incidencia' class='descripcion form-control' rows="6"  placeholder='Reporte de lo sucedido'>
				</textarea>
				<input type='hidden' name='tipo_template' value='<?=$param["tipo"]?>'>					 
             </div>
             <center>
             	<div class='place_registro_incidencia'>
             	</div>
	            <button class='btn_nnuevo'>
	             	+ registrar
	            </button>	             
             </center>
		</form>

	</div>
</div>


