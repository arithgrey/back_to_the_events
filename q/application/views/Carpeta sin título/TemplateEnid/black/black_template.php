<!DOCTYPE html>
<head>  
    <title>
        Enid Service - <?=$titulo?>
    </title>    
    <?=$this->load->view("TemplateEnid/header_meta_enid")?>    
    <?=link_tag(base_url('application/img/Enid.png') , 'shortcut icon', 'image/ico');?>            
    <?=link_tag('application/css/css/style.css');?>    
    <?=link_tag('application/css/template/black.css');?> 
    <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('application/js/js/gritter/js/jquery.gritter.js')?>"></script>      
    <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>            
    <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>              
</head>
<body>
<section>
    <div>        
        <div class="wrapper">                                     
        <!--    
        <?=n_row_12()?>             
            <?=btn_busqueda_eventos()?>                                            
            <?=btn_registra_evento($no_publics)?>                      
            <a href='<?=base_url()?>'>           
                <img style='display:none' src="<?=$url_img_post?>">
                <img style='width: 3%;' class='icono-g-enid'  src="<?=base_url('application/img/Enid.png')?>" alt="Enid Service">                                                    
            </a>                  
            <?=btn_inicio_session($no_publics)?>                    
        <?=end_row()?>                    
        -->