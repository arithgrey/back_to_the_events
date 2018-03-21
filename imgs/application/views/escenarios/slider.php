<?php
  $imgs_portada ="";     
  $b = 0;           
  $indicators = slider_ol_escenario(count($imgs)); 
  $items =  slider_item_escenario($imgs , $param  );              
?>
<div>  
  <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="3000" id="bs-carousel">    
    <?=$indicators;?>
    <?=$items;?>
  </div>
</div>

