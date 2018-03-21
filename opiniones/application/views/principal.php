<style type="text/css">

input[type="radio"] {
  display: none;
}
label {
  color: #00bcd4;
  font-size: 1em;
}
.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}
label:hover,
label:hover ~ label {
  color: #E8DBC2;
}
input[type="radio"]:checked ~ label {

  color: #E8DBC2;
}	
.lstart{
	font-size: 3em;
}
</style>

<?=n_row_12()?>
	<div class='col-lg-8 col-lg-offset-2'>
		<?=contenedor_page_start();?>
			
				  <form class='form-historia' id='form-historia'  action="../empresas/index.php/api/opiniones/laexperiencia/format/json/" >                
					<center id="section-cal">		            
						<div class='col-md-12'>			
							
							<?=titulo_enid("Califícanos.!")?>
							<div id='enid-service-start' class='enid-service-start'>
							</div>
							<input type='hidden' value='0' class='calificacion_cliente' name='calificacion_cliente'>
							<input type='hidden' name='emp' id="emp" value="<?=$data_empresa["idempresa"]?>"> 
							<div id="contenidor-ranking" > 
							 <?=get_inputs_starts(5)?>			           
							</div>
							<div class='place_val_estrellas'>
							</div>                                   
					    </div>
					</center>   
						<div>
						    
						    <div class="col-lg-10 col-lg-offset-1 text-center">	              
							    <div class="col-md-4">	                        
							        <input type="text" class="form-control input-sm" name='nombre_cliente' id='nombre_cliente' placeholder="Nombre (opcional)">
							    </div>
							    <div class="col-md-4">	                        
							        <input type="email" class="form-control  input-sm" name='email_cliente' id='email_cliente' placeholder="Tu email" required>
							    </div>
							    <div class="col-md-4">	                        
							        <input type="tel" class="form-control  input-sm " name='tel_cliente'  id='tel_cliente' placeholder="Tel" >
							    </div>
							    <div class='separate-enid'>
							    </div>
							    <div class="col-md-12">	                        
							        <textarea id="descripcion" 
							        		  name="descripcion" 
							        		  id='descripcion'   
							        		  class="form-control" 
							        		  rows="3" 
							        		  placeholder="Cuentanos tu experiencia" 
							        		  required>

							        </textarea>
							        <div class='place_val_descripcion'>
							        </div>
							    </div>
							    <div class="col-md-4 col-md-offset-4">
							        <div class='row'>
							          <div class='place_experiencia'>
							          </div>
							        </div>
							        <div class='separate-enid'>
							        </div>
							        <?=btn_registrar_cambios_enid("" , "" , "" )?>					        
							    </div>
							    <div class='col-lg-12 col-md-12 col-sm-12'>
							        <div>		

										<?=valida_call_comentarios( url_cuenta_tu_historia($data_empresa["idempresa"] ))?>.
									</div>
							    </div>
						    </div>
					    </div>                                                                          
				  </form>	
				<hr>
				
		<?=contenedor_page_end();?>
		<?=n_row_12()?>
			<center>
				<div class='place_comentarios'>
				</div>
			</center>
		<?=end_row()?>	
	</div>
<?=end_row()?>	





<script type="text/javascript" src="<?=base_url('application/js/experiencia.js')?>">
</script>
<?=$this->load->view("socials/template_link_post_fb")?>		
<br>
<br><br><br>