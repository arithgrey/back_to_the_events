<?=get_titulo_politicas($data_evento , $in_session );?>

<div class='info_restriccione_principal'>
  <?=titulo_enid_d("Políticas" , "h3" ,  "white strong")?>
  <img src="../img_tema/kassd.jpg" alt="politicas del evento - <?=$data_evento["nombre_evento"]?> " >              
  	<?=get_info_politicas($data_evento , $in_session)?>  
	<div class='place_info_extra'>
	</div>
</div>  
