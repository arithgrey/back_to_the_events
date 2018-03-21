<form accept-charset="utf-8" method="POST" id="form_img_enid_acceso"  class="form_img_enid_acceso" enctype="multipart/form-data" >      
    <input type="file" id='imagen_acceso' class='imagen_acceso ' name="imagen"/>
    <input type='hidden' name='q' value='acceso' >    
    <input name='id_acceso' type='hidden' value="<?=$param["id_acceso"]?>">         
    
    <button type="submit" class='btn btn btn-sm guardar_img_enid pull-right'  id='guardar_img_acceso' style='color:white;'>
        <i class='fa fa-check'>
        </i>
    </button>               
    <center>        
        <div class='lista_imagenes_acceso' id='lista_imagenes_acceso'>
        </div>              
    </center>           
</form>


<center>
    <span class='place_load_img_acceso'>
    </span>
</center>
<style type="text/css">
.guardar_img_enid{
    display: none;
}
</style>