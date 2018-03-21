<style type="text/css"> 
    .nombre-escenario-text:hover, .descripcion-escenario-text:hover, .artistas-inputs:hover , .img-artista-evento:hover{
        cursor: pointer;    
    }
    .section-descripcion-escenario-in, .section-nombre-evento-in  , .section-input , .hidden_desc , .title_main , .seccion-links-extra{
        display: none;
    }    
    .contenedor_slider_imgs{
        background:  rgb(54, 70, 84);   
    }.f_escenario:hover{
        cursor: pointer;
        text-decoration: none;
    }.seccion-descripcion-escenario{        
        font-size: .9em;    
    }.experiencia_title{
        font-size: 2em;
        font-weight: bold;
    }#img-button-more-imgs:hover{
        cursor: pointer;
    }    
    #fecha-esc{
        color: white;
    }
    .seccion-portada-escenario{
        background: rgb(4, 97, 136);
    }.text_estado_artista{
        background: #2a323f;
        padding: 1px 10px;
        color: white;
    }    
    /*Todo lo que pertenece a medios*/
      @media only screen and (max-width: 991px) {    
        .config-general-escenario{
            margin-top: 10px;
        }
        .btn-registro-tipo{
            margin-top: 10px;   
        }
        .btn-nota-registro{
            margin-top: 10px;
        }
        .seccion-btn-confim{
            margin-top: 10px;   
        }
        .seccion-links-extra{
            display: block;
        }
        .link_to_view_seccion{
            display: none;
        }
  }


</style>




<?=n_row_12()?>
    <?=$this->load->view('escenarios/otros_escenarios')?>
<?=end_row()?>


<?=n_row_12()?>
    <?=template_view_like_public( create_url_escenario_in_evento($data_escenario['idescenario'] , $data_escenario["idevento"]) )?>
<?=end_row()?>  

<?=n_row_12()?>
    <?=template_evento_admin($evento["nombre_evento"] , $evento["idevento"])?>
<?=end_row()?> 
<br>
<br>
<?=n_row_12()?>
    <div class="tab-content">
        <div class="tab-pane tab_escenario active" id="pill-1">
            <?=$this->load->view("escenarios/config_escenario");?>
        </div>
    </div>  
<?=end_row()?> 

<!--Cargamos los modal de configuración ***********-->
<?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->
<input value="<?=$data_escenario["nombre"];?>" class='nombre_escenario' type='hidden'>
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$evento['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$evento['nombre_evento']?>"> 
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$data_escenario['idescenario'];?>">
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='q' class='qparam' value="<?=$q?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />

<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>


<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>
<input type='hidden' value="<?=$evento['nombre_evento']?>" class='enid_evento' id='enid_evento'>
<input type='hidden' value="<?=$data_escenario["nombre"];?>" class='enid_escenario' id='enid_escenario'> 