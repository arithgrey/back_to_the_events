
<script type="text/javascript" src="<?=base_url('application/js/evento/client/principal.js')?>"></script>
<div id="programa-evento" class="modal fade">  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Estado del evento</h4>
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                                
          <h3><?=get_statusevent($evento["status"])?></h3>                
          <!--*********************Estado del evento en edición ******************** -->             
          <div class="full-text-container light-gray-bg border-bottom-clear">          
            
            <div>
              <h2>Edición</h2>
              <div class="separator-2 visible-lg"></div>
              <p>
                Esta es la opción  permite observar  y  configurar  unicamente a  las  personas que cuenten  con los privilegios suficientes, ésta opción permite mantener la información del evento registrada sin la posibilidad de ser vista por el público.  
              </p>
              <div class="separator-3 visible-lg"></div>
              <a id="0" class="update-status-evento btn btn-default btn-hvr hvr-sweep-to-left">Actualizar<i class="pl-5 icon-basket-1"></i></a>
            </div>
          <!--*********************TERMINA Estado del evento en edición ******************** -->             
          

            <!--***************************VISIBLE **************************************-->
            <div>
              <h2>Visible</h2>
              <div class="separator-2 visible-lg"></div>
              <p>
               Al configurar el evento de ésta forma el público en general podrá observar la información del evento, incluyendo escenarios, horarios, artistas y puntos de venta, cabe mencionar que aún cuando la fecha del evento sea posterior a la actual, será visible y de igual manera si el evento ya sucedió podrá ser visto. 
              </p>
              <div class="separator-3 visible-lg"></div>
              <a id="1" class="update-status-evento btn btn-default btn-hvr hvr-sweep-to-left">Actualizar<i class="pl-5 icon-basket-1"></i></a>
            </div>
            <!--***************************TERMINA VISIBLE **************************************-->



             <div>
              <h2>Visible cancelado</h2>
              <div class="separator-2 visible-lg"></div>
              <p>
                Al configurar el evento de ésta forma el público en general podrá observar la información 
                del evento con un mensaje el cual indique que el mismo fue  cancelado   incluyendo escenarios, horarios, artistas y puntos de venta, cabe mencionar que aún cuando la fecha del evento sea posterior a la actual, será visible y de igual manera si el evento ya sucedió podrá ser visto. 
              </p>
              <div class="separator-3 visible-lg"></div>
              <a id="2" class="update-status-evento btn btn-default btn-hvr hvr-sweep-to-left">Actualizar<i class="pl-5 icon-basket-1"></i></a>
            </div>



            <div>
              <h2>Visible pospuesto</h2>
              <div class="separator-2 visible-lg"></div>
              <p>
                Al configurar el evento de ésta forma el público en general podrá observar la información 
                del evento con un mensaje el cual indique que el mismo fue  pospuesto. 
              </p>
              <div class="separator-3 visible-lg"></div>
              <a id="3" class="update-status-evento btn btn-default btn-hvr hvr-sweep-to-left">Actualizar<i class="pl-5 icon-basket-1"></i></a>
            </div>




            <div>
              <h2>Cancelado</h2>
              <div class="separator-2 visible-lg"></div>
              <p>
                Sólo los miembros con derechos a ver y
                configurar el evento podrán ver que el mismo
                fue cancelado y ninguna persona ajena a la cuenta podrá saber de este evento. 
              </p>
              <div class="separator-3 visible-lg"></div>
              <a id="4" class="update-status-evento btn btn-default btn-hvr hvr-sweep-to-left">Actualizar<i class="pl-5 icon-basket-1"></i></a>
            </div>




            <div>
              <h2>Programado para el día</h2>
              <div class="separator-2 visible-lg"></div>
              <p>
                El evento será publicado automáticamente por el sistema una vez la 
                fecha indicada llegue y pasando dicha fecha cambiará al  estado  visible. 
              </p>
              <div class="separator-3 visible-lg"></div>
              <a id="5" class="update-status-evento btn btn-default btn-hvr hvr-sweep-to-left">Actualizar<i class="pl-5 icon-basket-1"></i></a>
            </div>
            <input type='hidden' id="id-evento" value="<?=$evento["idevento"];?>">

      </div><!--*********************Termina body modal ******************* -->             
      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>
</div>