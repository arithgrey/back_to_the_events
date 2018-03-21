<?=$this->load->view("socials/template_compartir_fb.php")?>
<div>  
  <div>
  <!--SECCIÓN IZQUIERDA-->
    <div  class='col-lg-8 col-md-8 col-sm-12'>                  
      <?=n_row_12()?>
        <form class='form-busqueda' action='<?=base_url("index.php/api/busqueda/eventos_enid/format/json")?>'>              
          <div class="input-group">
              <div class="input-group-btn search-panel">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept" >
                      Palabra clave
                    </span>                             
                  </button>                          
              </div>                       
              <input type="text" value='<?=$q?>' class="form-control q" id="q" name="q" placeholder="Artista , Genero musical , tipo ... ">                  
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class='fa fa-search'>
                        </i>
                      </button>
                  </span>                  
              </div>              
        </form> 
      <?=end_row()?>                       

      <?=n_row_12()?>  
        <div class='place_eventos'>
        </div>
        <div class='eventos'>
        </div>
      <?=end_row()?> 

      
    </div>
  </div>
  <!--SECCIÓN IZQUIERDA TERMINA-->
  <div class='col-lg-4 col-md-4 col-sm-12 seccion_derecha'>
    <?=$this->load->view('busqueda/seccion_extra')?>
  </div>
</div>






























<!--SECCIÓN DERECHA TERMINA-->
<script type="text/javascript" src="<?=base_url('application/js/busquedas/eventos.js')?>"></script>
<input class='qparam' id='qparam' value='<?=$q?>' type='hidden'>




<style type="text/css">
.filtro:hover{
  cursor: pointer;
}
.busqueda_eventos_icon{
  display: none !important;
}
.vive-la-experiencia-pass{
  margin-right: 2%;
  background: #E31F56;
  padding: 3% 1%;
  color: white;
}
.vive-la-experiencia-pass:hover{
    cursor: pointer;        
    background: #046188;
    font-size: .9em;
    color: white;
}
.titulo-tw{
    
    margin-right: 3%;
    padding: 2px 4px;
    font-size: 90%;
    color: #fff;
    background-color: #166781;
    border-radius: 3px;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.25);
}
.slogan-enid{
  font-size: 5em;
  font-weight: bold;
}
.sticky-left-side {
    position: fixed;
    height: 100%;
  
    z-index: 100;
}
.btn-busqueda-enid{
  display: none;

}
</style>

