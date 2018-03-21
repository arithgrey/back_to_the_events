<form accept-charset="utf-8" method="POST" id="form_img_enid_publicidad"  class="form_img_enid_publicidad" enctype="multipart/form-data" >      
    <input type="file" id='imagen_publicidad' class='imagen_publicidad' name="imagen"/>	
	<input type='hidden' name='q' value='publicidad'>		
	<input class='dinamic_publicidad' id='dinamic_publicidad' name='dinamic_publicidad' type='hidden' value="<?=$param['id_publicidad']?>">
	<div class='separate-enid'>
	</div>
	<button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_publicidad' style='color:white;'>
		<i class='fa fa-check'>
        </i>
	</button>			
	<div class='separate-enid'>
	</div>
	<center>			
		<div class='lista_imagenes_publicidad' id='lista_imagenes_publicidad'>
		</div>					
	</center>       	
</form>
<style type="text/css">
.guardar_img_enid{
	display: none;
}
</style>
