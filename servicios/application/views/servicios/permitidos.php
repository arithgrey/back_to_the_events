<hr>
<div class='principal-objs'>
	<div class='row'>
		<div class='col-lg-12 col-md-12 col-sm-12 '>				
			
			<?=titulo_enid("Artículos permitidos")?> 

			<p class='descripcion_permitido'>     
				<?=validacion_objs_permitidos($param["descripcion_permitido"],  $param["in_session"]   , $param["id_evento"]  ,  "ref_1" , "ref_2"  ,  "objs/#portlet_tab2");?>
			</p>
			<div class='listado_permitidos listado-contente-enid' id='listado_obj_permitidos'>
				<?=objs_pemitidos($objs , $param["in_session"] , $param["id_evento"])?>
			</div>
			<hr>
			
			<?=titulo_enid("Políticas")?> 
			


			<p class='descripcion_politica'>     
				<?=validacion_objs_permitidos($param["descripcion_politica"],  $param["in_session"]   , $param["id_evento"] ,  "ref_3" , "ref_4" ,  "politicas/#portlet_tab2");?>
			</p>
			<div class='listado-contente-enid'>
				<div class='place_list_politicas' id='place_list_politicas'>
				</div>                                 
				<div class='list_politicas' id='list_politicas'>
				</div>                                 
			</div>			
			<hr>	
			<?=titulo_enid("Restricciones")?> 

			<p class='descripcion_restricciones'>     
				<?=validacion_objs_permitidos($param["descripcion_restriccion"],  $param["in_session"]   , $param["id_evento"] ,   "ref_5" , "ref_6"  , "restricciones/#portlet_tab2");?>
			</p>
			<div class='listado-contente-enid'>			
				<div class='place_list_restricciones' id='place_list_restricciones'>
				</div>                                 
				<div class='list_restricciones' id='list_restricciones'>
				</div>  	                             		
			</div>
		</div>
	</div>
</div>


