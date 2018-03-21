<div class='row'>    
    <!--Sección izquierda inicia -->                           
    <div class="col-lg-8 col-lg-8 col-sm-12" id='section_main_left'>                        

        <?=n_row_12()?>
            <div class='place_notificacion_nuevo_user'>
            </div>
        <?=end_row()?>

        <?=$this->load->view(valida_template_perfil_home($perfil))?>
    </div>                
    <!--Sección izquierda termina  -->      
    <!--Inicia la sección--> 
    <div class="col-lg-4 col-lg-4 col-sm-12" id='section_main_right'>                      
            <div class='place_bloque_extra'>
            </div>                                            
            <div class='bloque_extra'>
            </div>        
            <hr>        
            <?=$this->load->view("socials/tw_feed")?>                    
    </div> 
</div>
<!--Termina la sección-->            
<!--Incluimos los modals del panel principal -->
<?=$this->load->view("principal/modal/principal_admin");?>
<!--Terminamos de Incluir  los modals del panel principal -->
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<!--pickers initialization-->
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/evento/global.js')?>"></script>    
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/principal/actividad.js')?>" ></script>


<style type="text/css">
    #scroll{
        border:1px solid;            
        overflow-y:scroll;
        overflow-x:hidden;
    }
    .dinamic_activity_section_left , .dinamic_activity_section_right{
        background: #E31F56;
        color: white;
        padding: 7px;
    }
    .dinamic_activity_section_left:hover , .dinamic_activity_section_right:hover{
        background: #01090F;
        cursor:pointer;
        color: white;
    }
    .blog-img-sm-sup{        
        width: 100%;
        padding-bottom: 0px;
    }
    .eslogan-text{
        font-size: .8em;
    }
    .resum_evento{
        font-size: .9em;
    }
    .section-header-title{
        display: none;
    }
    .seccion_activity_enid{
        height: 350px !important;
    }.resum_evento:hover{
        cursor: pointer;
        text-decoration: none;
    }
    .calendarios-evento{
        margin-top: 11%;
    }
    .panel-resumen-evento{
        background: #6ecef9;
        padding: 10px;        
    }
    .msj-resumen{
        font-size: .8em;
        color: white;
    }.menos_info_puntos_venta , .menos_info_escenario, .menos_info_escenario , .menos_info_artistas{
        background: white;
        color: black;
        padding: 10px;
    }    
    .item{color:#48453d; margin-top:30px; overflow:hidden;}     
    .tags a{background-color:white; padding:10px; color:#fff; display:inline-block; font-size:11px; text-transform:uppercase; line-height:11px; border-radius:2px; margin-bottom:5px; margin-right:2px; text-decoration:none; color: black}
    .tags a:hover{background-color:white}
    .tags_e:hover{
        cursor: pointer;
    }        
    .title-acontecimientos{
        color: white;
    }    
.text-reservaciones , 
  .btn_configurar_enid_w{
    display: inline-block;
  }
    /**/
    @media only screen and (max-width: 991px) {
        .dinamic_activity_section_left,  #dinamic_activity_section_right{
            display: none;
        }    
    }
    .btn_nuevo_evento_link{
        background: #090f10;
        color: white;
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
        font-size: 0.98889rem;
        border-color: #007095;
        color: #FFFFFF;
    }
    

</style>
<input type='hidden' value='<?=$id_empresa?>' class='empresa'>  
<input type="hidden" name="q" class='q' id='q' value="<?=$q?>">
<input type="hidden" value="<?=$perfil?>" class='action_template' id='action_template'>