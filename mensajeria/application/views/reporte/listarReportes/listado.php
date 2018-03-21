<!--
<script src="<?=base_url('application/js/jsapi.js')?>"></script> 
        
       
<script type="text/javascript" src="<?=base_url('application/js/reportes/listarReportes.js')?>"></script>            
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    //google.setOnLoadCallback(drawChart);
</script>

<style type="text/css">

.update-status-repo:hover{
  cursor: pointer;
  padding: 10px;
}
</style>


<div class="container-fluid">   
  <div class='row-fluid'>
                <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                  <div id="metricas-reporte"></div>
                </div>                        
                <section class='col-xs-12  col-sm-12  col-md-12 col-lg-12 centered'>
                    <table id='dynamic-table' class="display table table-bordered table-striped dataTable dynamic-table-enid">
                        <thead class="enid-header-table">                    
                            <tr>
                                <th> ID </th>
                                <th>Reporte</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Registrado</th>                                
                            </tr>
                        </thead>                      
                            <?=getListrepo($list_repo_system);?>                          
                    </table>       
                </section>                                  
  </div>               
</div>   



<div class='row'>
    <div class='error-operation'></div>
</div>



<div class="modal fade" id="basicModalupdatestatus" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            


            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
            </div>
            <div class="modal-body">
                <h3 class='text-center'> Actualizando el estado del reporte</h3>


                <form method="POST" class='form-update-status'>

                      <select class='form-control input-sm m-bot15 text-center select-nuevo-status' name='nuevo_status'>

                        <option value='Atendido'>Atendido</option>
                        <option value='Rechazado'>Rechazado</option>
                        <option value='Pendiente'>Pendiente</option>
                        <option value='En proceso'>En proceso</option>
                      </select>
                      <input type='hidden' name='update_element_id' class='update_element_id'>
                </form>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default update-button-status" data-dismiss="modal">Cancelar</button>
                
            </div>


        </div>
    </div>
</div>


-->