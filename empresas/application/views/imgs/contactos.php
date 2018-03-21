<form accept-charset="utf-8" method="POST" id="form_img_enid_contacto"  class="form_img_enid_contacto" enctype="multipart/form-data" >      
    	<input type="file" id='imagen_contacto' class='imagen_contacto' name="imagen"/>
		<!--<input type='hidden' name='q' value='contacto_cliente'>-->
		<input type='hidden' name='q' value='contacto_cliente'>		
		<input class='dinamic_contacto' id='dinamic_contacto' name='dinamic_contacto' type='hidden' value="<?=$param['contacto']?>">
		<div class='separate-enid'>
		</div>
		<button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_contacto' style='color:white;'>
			<i class='fa fa-check'>
        	</i>
		</button>			
		<div class='separate-enid'>
		</div>
		<center>			
			<div class='lista_imagenes_contacto' id='lista_imagenes_contacto'>
			</div>					
		</center>       	
</form>
<style type="text/css">
.guardar_img_enid{
	display: none;
}
</style>
