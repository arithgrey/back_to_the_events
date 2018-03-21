<?=get_titulo_permitido($data_evento , $in_session );?>
<div class='info_restriccione_principal'>
  <?=titulo_enid_d("El día del evento" , "h3" ,  "white strong")?>
  <img src="../img_tema/25.jpg" alt="Objetos permitidos evento - <?=$data_evento["nombre_evento"]?> ">              
  <?=get_info_permitido($data_evento , $in_session)?>
  <?=n_row_12()?>
	  <div class='col-lg-12'>
		  <div class='place_info_obj_permitidos'>
		  </div>
	  </div>
  <?=end_row()?>  
</div>  
