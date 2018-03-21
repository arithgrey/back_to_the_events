<?=contruye_ubicacion($param["ubicacion"] , $param["in_session"] , $param["id_evento"] );?>
<div  class='col-lg-12 col-md-12 col-sm-12' id="mapgooglemap">          
    <h1 class='titulo_maps'>
      <strong class='titulo_maps'>
            Locación del evento
      </strong>
    </h1>        
    <span class='descripcion_ubicacion'>
      <?=$param["ubicacion"]?>
    </span>  

    <div id="mapsection">
      <div id="map-canvas">
      </div>
      <div class='textnotfound-location'>
      </div>  
    </div> 
</div>
<style type="text/css">
.text_ubicacion{

}
</style>