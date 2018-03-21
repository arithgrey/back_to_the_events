<div class='container'>    
    <?=titulo_enid("Tus plantillas")?>
    <div class='well background_panel_enid'>
        <p class="info_template">
            Una plantilla es un tipo de documento o contenido que crea una copia de sí misma al abrirla, evita escribir miles de veces las descripciones de tus eventos, redacta una plantilla y utilizala cuando te sea necesario.
        </p>
    </div>
</div>
<div class='container'>

    <?=$this->load->view("secciones/menu_principal")?>


    
    <?=$this->load->view("plantillas/modal/contenidos");?>


</div>
<?=$this->load->view("plantillas/modal/config_evento");?>




<script type="text/javascript" src="<?=base_url('application/js/plantillas/principal.js')?>"></script>
<style type="text/css">
.section-escenarios{
    display: none;
}
.info_template{
    color: black;
    font-size: 1.1em;
    font-weight: bold;
    color: white;
}
</style>
<input type='hidden' value='<?=$q?>' class='q_modal'>
