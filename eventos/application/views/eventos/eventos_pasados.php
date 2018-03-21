<script type="text/javascript" src="<?=base_url('application/js/evento/pasados/principal.js')?>"></script>


<style type="text/css">

.timeline-icon{
    background: rgb(26, 157, 187) !important;
}
.section_time{
    margin-top:  -100px !important;
}
.new-evento-mod{
    margin-top: 50px;
}
</style>





                <div class="col-sm-12 section_time">
                    <div class='row pull-right new-evento-mod'>
                        <button class='btn_nnuevo' title='Registra un nuevo evento para el público' data-toggle="modal" data-target="#modal-nuevo-evento">+  Nuevo Evento <i class='fa fa-headphones'></i></button>
                    </div>

                    <div class="timeline">
                        <article class="timeline-item alt">
                            <div class="text-right">
                                <div class="time-show first">
                                    <a href="#" class="btn btn-primary">Al día</a>
                                </div>
                            </div>
                        </article>

                        <div class='time_line_events'></div>
                        <?=$time_line;?>
                        <article class="timeline-item alt">
                            <div class="text-right">
                                <div class="time-show">
                                    <a href="#" class="btn btn-primary">Yesterday</a>
                                </div>
                            </div>
                        </article>
                       
                      

                       
                        <article class="timeline-item alt">
                            <div class="text-right">
                                <div class="time-show">
                                    <a href="#" class="btn btn-primary">20 December 2013</a>
                                </div>
                            </div>
                        </article>

                       

                    </div>
                </div>






































<div class="modal fade" id="modal-nuevo-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" >Cargar evento </h4>
            </div>
            <div class="modal-body">
                

                 <div class="row">
                                <div class="">
                                    <form role="form" class="form-inline" method="POST" id="nuevo-evento-form"  action=""> 
                                        <div class="form-group todo-entry">


                                            <div  class='col-md-12'>
                                                <input name='nuevo_evento' placeholder="Evento ejemplo Gala Festival " class="form-control" style="width: 100%" type="text">
                                                <!--Campos ocultos-->
                                            </div>
                                            <div  class='col-md-12'>
                                                <div id='dinamic-field'>
                                                    <input name='nueva_edicion' placeholder="Edición México 2015 " class="form-control" style="width: 100%" type="text">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="input-group">                                                                                                
                                                <div  class='col-md-6'>
                                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                                            <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_inicio"  type="text"  >
                                                    <span class="input-group-btn add-on">
                                                    <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div  class='col-md-6'>
                                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears">
                                                        <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_termino"  type="text"  >
                                                        <span class="input-group-btn add-on">
                                                            <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                    </div>
                                                </div>    
                                                <span class="help-block">Periodo del evento</span>
                                                <button class="btn btn-primary pull-right" type="submit">
                                                   Registrar
                                                </button>                                        
                                                
                                                    
                                            </div>                                         
                                            <!--Termina campos ocultos-->

                                        </div>

                                    </form>
                                </div>





                                        
                                    





                                <div class='alert alert-warning' id='response-event'></div>

                                <div class="alert alert-info" id='success-alert'>
                                    <h2>Registro correcto</h2>
                                </div>    
                                
                            </div>

                            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<!--pickers initialization-->
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />



<script type="text/javascript" src="<?=base_url('application/js/estratega/evento/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal.js')?>"></script>

<style type="text/css">
#dinamic-field , #success-alert{
    display: none;
}
#scroll{
        border:1px solid;            
        overflow-y:scroll;
        overflow-x:hidden;
}
</style>

