<span aria-expanded="true" href="#templates" role="tab" data-toggle="tab" class='tab_enid active r_plantilla'>                         
    Registrar plantilla |
</span>
<span class='tab_enid p_plantilla' id='programadas' aria-expanded="true" href="#registros" role="tab" data-toggle="tab" >                              
    Programar plantilla |
</span>
<span class='tab_enid reporte'  href="#reporte_mail_marketing" role="tab" data-toggle="tab">
    Reporte Mail marketing 
</span>




<div class='seccion-principal-admin'>
  <div class="tab-content clear-style">
    
    <div class="tab-pane" id="reporte_mail_marketing">        
        <?=create_select($tipos_publicidad , "tipo_publicidad_r" , "form-control input-sm tipo_publicidad_r" , "tipo_publicidad_r" , "nombre" , "id_tipo_publicidad" )?>        
        <div class='place_reporte_mail_marketing_general'>
        </div>
        <div class='reporte_mail_marketing_general'>
        </div>
    </div>

    <div class="tab-pane active r_plantilla" id="templates">               
        
        
        <?=n_row_12()?>
            <span class='place_template_mail' id="">
            </span>
        <?=end_row()?>


            <div>                 
                <section >
                    <header class="panel-heading blue-col-enid" style='background:rgb(8, 65, 84);'>                        
                        <div class="btn-toolbar">
                            <h4 class="pull-left titulo_new_mail_marketing">
                                Mail Marketing Enid Service
                            </h4>
                        </div>
                    </header>
                    <section>                               



                        <form class='form-template' id="form-template" method="post">           
                            

                            <div class='row'>                            
                                <div class='col-lg-10 col-md-10  col-sm-10'>
                                    ¿Qué promoción quieres registrar?                                                                                 
                                    <div class="form-group">                                                                            
                                        <?=create_select($tipos_publicidad , "tipo_publicidad" , "form-control input-sm tipo_publicidad" , "tipo_publicidad" , "nombre" , "id_tipo_publicidad" )?>
                                    </div> 
                                </div>
                                <div class='col-lg-2 col-md-2  col-sm-2'>
                                    <br>
                                    <div class='place_organizaciones_resumen'>
                                    </div>
                                </div>

                            </div>
                            
                            <?=n_row_12()?>
                                <div class="form-group">            
                                    <div class="input-group m-bot15">
                                        <span class="input-group-addon">
                                                        Asunto
                                        </span>                            
                                        <input required  name='asunto' id='asunto' type="text" class="form-control input-sm">
                                    </div>
                                </div>
                            <?=end_row()?>    

                            <?=n_row_12()?>
                                <input type='hidden' name='flag_img' value="0">
                                <textarea name="descripcion" class="form-control input-lg p-text-area" rows="6" placeholder="¿Cuál es el mensaje de Marketing?">
                                </textarea>                                            
                            <?=end_row()?>        
                            <span class='place_descripcion'>
                            </span>
                            <footer class="panel-footer">
                                <div class='pull-right'>
                                    <button class="btn btn-sm btn-default">
                                        <i class="fa fa-check">
                                        </i> 
                                        Registrar
                                    </button>                                        
                                </div>
                                
                            </footer>                                        
                        </form>                        
                        </section>
                    </section>
                </div>


    </div>

    <div class="tab-pane p_plantilla " id="registros">        
        <span class='place_template_mail'>
        </span>                    
        <header class="panel-heading blue-col-enid" style='background:rgb(8, 65, 84);'>                        
            <div class="btn-toolbar">
                <h4 class="pull-left">
                    Tus plantillas programadas
                </h4>
            </div>
        </header>
        <br>                            
        <?=n_row_12()?>                
            <div class='row'>
                <form id="form_busqueda">
                    <div class='col-lg-6 col-md-6 col-sm-6'>
                        <div class="form-group">            
                            <div class="input-group">
                                <span class="input-group-addon">
                                                Búsqueda por asunto
                                </span>                        
                                <input type="text" class="form-control input-sm" id="b_asunto" name="b_asunto" placeholder="Asunto" >
                            </div>                                                
                        </div>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-6'>
                        <?=create_select($tipos_publicidad , "b_tipo_publicidad" , "b_tipo_publicidad form-control" , "b_tipo_publicidad" , "nombre" , "id_tipo_publicidad" )?>                            
                    </div>                        
                </form>                    
            </div>
        <?=end_row()?>             
        
        <?=n_row_12()?>       
            <div class='place_templates_programadas'>
            </div>
        <?=n_row_12()?>       
        
    </div> 

    

    
  </div> 
</div>

<script type="text/javascript" src="<?=base_url('application/js/enid/mail_marketing.js')?>"></script>
<?=$this->load->view("enid/market/modal/admin");?>





<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>

<style type="text/css">
.titulo_new_mail_marketing{
    color: white !important;
}
</style>