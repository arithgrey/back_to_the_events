<style type="text/css">

/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;  
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #2874F0;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #2874F0;
  background-image: #2874F0;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #2874F0;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
.list-group-item{
  font-size: .8em;
  font-weight: bold;
}
</style>



<br>
<div class='container'>
  <div class='col-lg-9'>
    <?=template_view_like_public(create_url_evento_view($data_evento["idevento"]))?>
    <?=template_evento_admin($data_evento["nombre_evento"] , $data_evento["idevento"])?>
    <?=n_row_12()?>
        <div class="bhoechie-tab-container">
            <div class="col-lg-1 col-md-1 col-sm-12 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">
                        <h4 class="fa fa-money">
                        </h4>                        
                    </a>
                </div>
            </div>
            <div class="col-lg-11 col-md-11 col-sm-12 bhoechie-tab">                
                <div class="bhoechie-tab-content active">
                      <?=$this->load->view("secciones/accesos")?>  
                </div>
            </div>
        </div>

    <?=end_row()?>  
  </div>
  <div class='col-lg-3'>
  </div>  

</div>



























<!--Sección derecha puntos de venta  termina -->



<input id='config2' class='config2' value="" type='hidden' >
<input id="flag_config" class='flag_config' value='0' type='hidden'>



<input class='dinamic_acceso' id='dinamic_acceso' type='hidden'>



<input class='qacceso' id='qacceso' value='<?=$id_acceso?>' type='hidden'>
<input class='enid_evento' id='enid_evento' value="<?=$data_evento["nombre_evento"]?>" type='hidden'> 
<input class='empresa' id="empresa" value="<?=$empresa;?>" type='hidden'>
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_evento['idevento']?>">
<input type='hidden' name='q3' id='q3' class='q3' value="<?=$q3;?>">







<link rel="stylesheet" type="text/css" href="<?=base_url('../js_tema/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('../js_tema/js/pickers-init.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/avanzado.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/img.js')?>"></script>
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