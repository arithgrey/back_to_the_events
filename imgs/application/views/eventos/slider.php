<?php
    $imgs_portada ="";     
    $b = 0;           
    $indicators = slider_ol(count($imagenes_portada)); 
    $items =  slider_item($imagenes_portada , $param  );
?>

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="3000" id="bs-carousel">    
    <?=$indicators;?>
    <?=$items;?>  
</div>
