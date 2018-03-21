<?=get_titulo_reglamento($data_evento , $in_session );?>
<div class='info_restriccione_principal'>
  <?=titulo_enid_d("Restricciones" , "h3" ,  "white strong")?>
  <img src='../img_tema/pal.jpg' alt="Reglas del evento - <?=$data_evento["nombre_evento"]?> ">              
  <?=get_info_restricciones($data_evento , $in_session)?>
  <div class='place_info_extra'>
  </div>
</div>  


