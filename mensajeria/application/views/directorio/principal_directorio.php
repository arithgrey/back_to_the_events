

<div class='row'>
    <div class='col-lg-9 col-md-9 col-sm-12' title='Click para registrar'>            
        <div class="panel panel-seccion-right">
            <header class="panel-heading">
                <div class='row'>
                    <button id="nuevo-contacto-button" title='Registrar contacto' type="button" class="btn_nnuevo" 
                    data-toggle="modal" data-target="#contact-modal">                
                            + Nuevo contacto
                    </button>
                    <span class="pull-right">
                    Tus contactos
                    </span>
                </div>
            </header>
            <div class="panel-body">

                
                <div class='separate-enid'>
                </div>
                <!--Inicioa  formulario de búsqueda  -->    
                <div class='row'>
                    <form method='GET' action="" id='form-filtro' >

                        <div class='row'>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <span class="text-filtro-enid">
                                  + Filtros
                                </span>
                                
                                <div class="form-group" >        
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            Contacto 
                                        </div>
                                        <input type="text"  class="form-control input-sm" id="contacto-name"  name='nombre_b' placeholder="Nombre del contacto">                      
                                        
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12 hidden-field-mov'>
                                <div class="form-group" >
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            Tel de contacto 
                                        </div>
                                        <input type="tel" class="form-control input_tel_contacto input-sm" id="contacto-tel-filtro" name='telefono_b' placeholder="51153433..">                      
                                    </div>
                                </div>             
                            </div>
                            <div class='col-lg-3 col-md-3 col-sm-12 hidden-field-mov'>
                                <div class="form-group" >
                                    <div class="input-group">
                                        <div class="input-group">
                                            <?=get_tipos_contactos("tipo_b" , "form-control input-sm col-lg-3 col-md-3 col-sm-12" , "select-tipo-b" )?>                        
                                        </div>
                                    </div>
                                </div>      
                            </div>      
                            <div class='col-lg-1 col-md-1 col-sm-12'>
                                <div class="form-group pull-right" >        
                                    <button class='btn btn_busqueda' type='submit'>
                                    Buscar
                                    </button>
                                </div>
                            </div>
                        </div>                
                    </form>
                    <hr>    
                </div>    
                
                <div class='row'>
                    <div class="contactos">
                    </div>
                </div>
                <div class="row">
                    <div class='place_contactos'>
                    </div>
                    <div class='response_img_contacto' id='response_img_contacto'>
                    </div>        
                </div>

                <!--Termina  formulario -->                   
                
                
                <br>
                <div class='row'>

                    <a href="<?=create_url_puntoventa_admin()?>">
                        <button type="button" class="btn btn-default next-to input-sm">
                            Ir a puntos de venta
                        </button>
                    </a> 
                </div>                   
            </div>
        </div>


    </div>
</div>



<div class='row'>
    <div class='col-lg-3 col-md-3 col-sm-12 seccion-logs'>
      <div class="panel deep-purple-box">
          <div style="background:#D12F40 none repeat scroll 0% 0%"  class="panel-body">
            <div class="blog-post">
                <h1 class='text-acontecimientos'>
                  Últimos acontecimientos 
                </h1>
                
            </div>                
          </div>
      </div>
    </div>
</div>




<style type="text/css">
/*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {
    /*Inicia media query*/
    .form-second-part{
      margin-top: 0%;
    }
    .hidden-field-mov{
      display: none;
    }.panel-seccion-right{
      margin-top: 10%;
    }
    .seccion-logs{
      margin-top: 10px;
    }
    /*Termina  media query*/
  }
</style>

  















<!--*************CARGAMOS MODALS DE CONFIGURACIÓN-->
<?=$this->load->view("directorio/modal/config_directorio");?>
<!--*************TERMINAMOS DE CARGAR  MODALS DE CONFIGURACIÓN-->
<input type='hidden' class='qparam' value='<?=$q?>'> 
<script type="text/javascript" src="<?=base_url('application/js/directorio/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/directorio/img.js')?>"></script>
<style type="text/css">
.status-registro{
    display: none;
}
.nota-c:hover , .editar-contacto:hover , .img_contacto:hover{
    cursor: pointer;
}
.locacion{
    cursor: pointer;
}
.mas-campos-contenedor{
    text-align: right;
}
.mas-campos:hover{
    cursor: pointer;
}
.more-fields{
    display: none;

}
.text-acontecimientos{
  color: white;
} 
</style>
