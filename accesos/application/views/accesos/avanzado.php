<?=template_view_like_public( url_accesos_al_evento($data_evento['idevento']))?>
<?=template_evento_admin($data_evento["nombre_evento"] , $data_evento["idevento"])?>
<?=titulo_enid("Precios por acceder al evento")?> 
<?=n_row_12()?>
    <button id="nuevo-acceso-button" title="Registrar contacto" type="button" class="btn_nnuevo" data-toggle="modal" data-target="#nuevo-acceso-modal">                
        + Nuevo acceso
    </button>                        
<?=end_row()?>    


<?=n_row_12()?>
<div class='place_list_accesos'>
    </div>
    <div class='list-accesos' id='list-accesos'>                    
    </div>                               
<?=end_row()?>    

<!--Sección derecha puntos de venta  termina -->
<input id='config2' class='config2' value="" type='hidden' >
<input id="flag_config" class='flag_config' value='0' type='hidden'>
<input id='qparam' class='qparam' value="<?=$q?>" type='hidden'> 
<input id='q2' class='q2' value="<?=$q2?>" type='hidden'> 
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_evento['idevento']?>">
<input class='dinamic_acceso' id='dinamic_acceso' type='hidden'>
<input class='empresa' id="empresa" value="<?=$empresa;?>" type='hidden'>
<input class='enid_evento' id='enid_evento' value="<?=$data_evento["nombre_evento"]?>" type='hidden'> 

<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/avanzado.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/img.js')?>"></script>
<?=$this->load->view("accesos/modal/config_avanzado");?>
<style type="text/css">
    .info-punto-venta{
        -moz-transition:all ease .8s; 
        -webkit-transition:all ease .8s ;
        filter: alpha(opacity=0); 
        left: 10%; 
        opacity: 0; 
        position: absolute; 
        transition:all ease .8s;
        zoom: 1;
    }
    .img-horizontal:hover .info-punto-venta{
        filter: alpha(opacity=80);
        opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }
    .delete_punto_venta_evento , .puntos_venta_contacto{
        cursor:pointer;
    }
    .title_main{
        display: none;
    }
    .info-punto-venta:hover{
        cursor: pointer;
    }
    .text-descripcion-acceso{
        font-size: .8em;        
    }
    .nombre_acceso{
        background: rgb(32, 116, 155) none repeat scroll 0% 0%;
        color: white !important;
        margin-left: 10px;
        border-radius: 1px;
        padding: 1px;    
    }.delete-acceso:hover , .img_acceso:hover{
        cursor: pointer;
    }
    .menu_accesos{
        background: #046188;
        padding: 15px;
    }
    .seccion_accesos_registrado{
        background: #166781;
    }    
    .seccion_pv{                
        background: rgb(8, 65, 84) !important;
        padding: 10px;
    }
    .titulo_pv{
        color: white !important;
        font-size: 1.8em;
    }
    .contenido-accesos{
        margin-top: 10px;
    }
    #nuevo-acceso-button{
        margin-bottom: 10px;   
    }
    .delete-punto-venta-icon{
        cursor: pointer;
    }
    .seccion-date-input{
        width: 95%;
    }    
    
    
    /**/
    @media only screen and (max-width: 991px) {    
        .titulo_pv{
            color: white !important;
            font-size: 1.5em;
        }
        .text-punto-venta{
            font-size: .9em;
        }
        .seccion-date-input{
            width: 50%;
        }
        .ver-public-lap{
            display: none;
        }
    }
    .seccion-presentacion{
        margin-bottom: 15px;
    }
    
    .nota_acceso{
        font-size: .9em;        
    }
    
</style>