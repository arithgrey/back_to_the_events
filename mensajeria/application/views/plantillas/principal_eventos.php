<div>
    Una plantilla es un tipo de documento o contenido que crea una copia de sí misma al abrirla, evita escribir 
    miles de veces las descripciones de tus eventos, redacta una plantilla 
    y utilizala cuando te sea necesario.
</div>


<div class='row'>    
    <div class='col-lg-3 col-md-13 col-sm-12'>
        <div>          
            <select class='form-control input-sm' id='select-template' name='select_template'>            
                <option value='Eventos'>
                        Para eventos
                </option>
                <option value='Escenarios'>
                        Para escenarios
                </option>
            </select>
        </div>    
    </div>    
</div>


<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='contenedor_templates' >        
            <div id='section-escenarios' class='section-escenarios'>    
                <?=$this->load->view("plantillas/escenarios");?>
            </div>        
            <div id='section-eventos'>
                <?=$this->load->view("plantillas/eventos");?>
            </div>
        </div>
    </div>    
</div>
    



<!--*******************MODAL DE CONFIGURACIÓN ***********************************-->
<?=$this->load->view("plantillas/modal/config_evento");?>
<!--*******************TERMINA  MODAL DE CONFIGURACIÓN ***********************************-->
<style type="text/css">

.wizard > div.wizard-inner {
    position: relative;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    border-bottom-color: transparent;
    border: 0;
    color: #555555;
    cursor: default;
}
span.round-tab {
    background: #fff;
    border-radius: 100px;
    border: 2px solid #e0e0e0;
    display: inline-block;
    font-size: 25px;
    height: 70px;
    left: 0;
    line-height: 70px;
    position: absolute;
    text-align: center;
    width: 70px;
    z-index: 2;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}
span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}
.wizard .nav-tabs > li {
    width: 25%;
}
.wizard li:after {
    border-bottom-color: #5bc0de;
    border: 5px solid transparent;
    bottom: 0px;
    content: " ";
    left: 46%;
    margin: 0 auto;
    opacity: 0;
    position: absolute;
    transition: 0.1s ease-in-out;
}
.wizard li.active:after {
    border-bottom-color: #5bc0de;
    border: 10px solid transparent;
    bottom: 0px;
    content: " ";
    left: 46%;
    margin: 0 auto;
    opacity: 1;
    position: absolute;
}
.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}
.wizard .nav-tabs > li a:hover {
    background: transparent;
}
.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}
.wizard h3 {
    margin-top: 0;
}
</style>




<script type="text/javascript" src="<?=base_url('application/js/plantillas/principal.js')?>"></script>
<style type="text/css">
.section-escenarios{
    display: none;
}
.menu_tb{

}
.contenedor_templates{
    background: #f9f9f9;
}
.delete_contenido_templ:hover{
    cursor: pointer;
}
.delete_contenido_templ{
    background: rgb(62, 178, 192) !important;
    color: white !important;    
}
.template-f-seccion, .template-a-seccion{
    margin-bottom: 10px;
}

</style>

<input type='hidden' value='<?=$q?>' class='q_modal'>
