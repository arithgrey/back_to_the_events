<!DOCTYPE html>
<html>
  <head>
    <?=link_tag('application/css/css/style.css');?> 
    <meta charset="utf-8">
    <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
    <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$key_enid?>&signed_in=true&libraries=places" async defer>
    </script>  
    <script type="text/javascript" src="<?=base_url('application/js/maps/principal.js')?>">
    </script>
    <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>  
    <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
  </head>
  <body>    
    



    <div class='row place_maps_enid'>  
      
      <div class='col-lg-12 col-md-12 col-sm-12'>        

          <input 
          id="origin-input" 
          value="<?=$info_locacion['formatted_address']?>" 
          class="form-control input-sm input-nuevo"
          type="text" 
          placeholder="La dirección">

          <button type="submit" class="btn btn-default btn_new_pv btn-nuevo " id='btn-registrar'>
            Registrar
          </button>                

      </div>
    </div>    
    
    <div class='place_nueva_locacion' id='place_nueva_locacion'>
    </div>    
    <div id="map">
    </div>    
    <br>   
    <form class='form-registro-direccion' id='form-registro-direccion' 
    action="<?=base_url('index.php/api/'.$modulo.'/locacion/format/json/')?>">
      <input type='hidden' class='identificador' id='identificador' name='identificador' value="<?=$identificador?>"> 
      <input type='hidden' class='new_place_id' name='place_id' value="<?=$info_locacion['place_id']?>">
      <input type='hidden' class='new_formatted_address' id='new_formatted_address' name='formatted_address'  value="<?=$info_locacion['formatted_address']?>"  >      
      <input type='hidden' class='flag_default_map' id='flag_default_map' value="<?=$info_locacion['num']?>">
      <input type='hidden' class='new_lat' id='new_lat' value='<?=$info_locacion['lat']?>' name='lat'>
      <input type='hidden' class='new_lng' id='new_lng' value='<?=$info_locacion['lng']?>' name='lng'>
      <input type='hidden' class='public' id='public' value='<?=$public?>' name='public'> 
      <input type='hidden' class='destination' id='destination' value="<?=$destination?>">
    </form>
  </body>
</html>
<style>
html, body{
  height: 100%;
  margin: 0;
  padding: 0;
}
#map{
  height: 100%;
  width: 100%;
}
.input-nuevo,
.btn-nuevo{
  display: inline-table !important; 
}
.input-nuevo{
  width: 80%;
}
.btn-nuevo{
  width: 19%;
}
.error_enid{
  background: red;
  color: white;
}
.response_ok_enid{            
  background: #357ebd !important;
  width: 25%;
  padding: 2px;
  color: white !important;
}
.alerta_enid{
  background: #ba6d78;
  width: 25%;
  padding: 2px;
  color: white;   
  font-size: .9em;
  border-radius: 1px;
}
</style>