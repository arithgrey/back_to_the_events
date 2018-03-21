
<div class='container'>
  <div class="panel">
      <div class="panel-body">
          <div class="profile-desk">          
              <span class="designation">
                Carga al evento los servicios que disfrutarán los asistentes. 
              </span>
              <a href="<?=url_dia_evento($evento)?>">
                <button class='btn btn-default pull-right'>
                  Ver como el público
                </button>            
              </a>
                                        
              <!--Lista de servicios inicia-->
              <div class='list-servicios' id='list-servicios'>
              </div>
              <!--Lista de servicios termina-->
          </div>
      </div>
  </div>
</div>



<!--Modal configuración eventos -->


<div class="modal fade" id="modal-nota" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title" >
               Cargar nota para el público
            </h4>
        </div>
        <div class="modal-body">                

              <textarea rows="6" name="nota"  id='nota' class="form-control">
              </textarea>
              <br>
              <div class='alert-ok' id='alert-ok-nota'>
              	<em>
              		Nota para el público actualizada
              	</em>
              </div>

              <div class='alert-fail' id='alert-fail-nota'>
              	<em>
              		Error al actualizar nota para el público, reportar al administrador del sistema 
              	</em>
              </div>
              <button class='btn btn-default btn_save' id='actualizar-nota-btn'>
              	Actualizar nota para el público
              </button>
        </div>            
        <div class="modal-footer">                
            <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
            </button>
        </div>
    </div>
  </div>
</div>



<!--Modal configuración eventos -->







<style type="text/css">
.servicio_nota:hover{
	cursor: pointer;
  padding: 10px;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/evento/servicios/principal.js')?>"></script>
<input type='hidden' id="evento" value="<?=$evento;?>">
