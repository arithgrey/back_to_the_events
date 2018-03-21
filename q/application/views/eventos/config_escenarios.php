<!--INICIA SECCIÓN DE 4****************************************************** -->
<div class="col-lg-4  col-md-4 col-sm-4">            
  <div class="panel">
    <div class="panel-body">



      <h1  class='nombre-evento-h1' style='font-size:3.7em;'>
        <strong>
          <?=$data_evento['nombre_evento'];?>
        </strong>
      </h1>
      <a href="<?=create_url_evento_view($data_evento['idevento'])?>">
        <i class='fa  fa-arrow-circle-o-right'> </i>
        Ver como el público 
      </a>
      <div class="form-group nombre" >
        <input placeholder="Nombre del evento" class="form-control"  type="text" value="<?=$data_evento['nombre_evento'];?>"  id="nombre-input" name='nombre-input' >
      </div>
      <span class="designation edicion-evento" style='font-size:2em;'>
        <?=valida_text_replace($data_evento['edicion'] , "<i class='fa fa-plus'></i> Edicioón del evento" , "<i class='fa fa-plus'></i> Edición del evento" );?>
      </span>              
      <div class="form-group">
        <input placeholder="Edición del evento" class="form-control"  type="text" id="edicion-input" name='edicion-input' value="<?=$data_evento['edicion'];?>">
      </div>

      <div class="profile-desk" style='background:red;'>      
        <div class="panel">
          <div class="panel-body">
              <div class="profile-desk">
                <!--***************LO QUE PERTENECE A ESCENARIOS -->
                  <h1>            
                    <div class="numero_escenarios" id="numero_escenarios">
                    </div>                                                                   
                  </h1>
                  <span class="designation">
                    <span>
                      Artistas 
                    </span>
                    <?=$resumen_evento["artistas"];?>                                  
                   
                  </span>
                  <div id="list_escenarios">
                  </div>

                  <form id="form-escenario" method="POST">
                    <h1 style='font-size: .9em!important;'> 
                      <i class="fa fa-plus">
                      </i> 
                      Cargar Escenario
                    </h1>  
                    <div class="form-group todo-entry">
                      <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">
                      <input placeholder="Añadir escenario" class="form-control nuevo-escenario-input" style="width: 100%" type="text" id='nuevo-escenario-input' name='nuevoescenario'  required>
                    </div>
                    <button style="background:black !important" class="btn btn-primary pull-right" type="submit" id="nuevo-escenario">
                      <i class="fa fa-plus">
                      </i>
                    </button>
                  </form>
                  <div>
                    <div class='panel  alert-ok' id="alert-escenario-ok"> 
                      <em>
                        Escenario cargado correctamente 
                      </em>
                    </div>
                    <div class='panel alert-fail' id="alert-escenario-fail">
                      <em>
                        Falla al registrar escenario 
                      </em>
                    </div>
                  </div>    
                  <!--******************TERMINA LO QUE PERTENECE A ESCENARIOS -->

              </div>
          </div>
        </div>
      </div>



    </div>
  </div>                
</div>
