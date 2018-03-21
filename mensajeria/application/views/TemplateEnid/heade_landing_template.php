<!DOCTYPE html>
<head>
    <!--Header tl-->
    <title>
        Enid Service - <?=$titulo?>
    </title>    
    <!--Metas google -->
    <?=meta('Content-type', 'text/html; charset=utf-8', 'equiv');?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">    
    <?=meta('keywords', $meta_keywords);?>
    <?=meta('description', 'La forma fácil de encontrar tus eventos musicales desde cualquier lugar');?>        
    <?=meta('author', 'Enid Service - @arithgrey');?>        
    


    <?=$this->load->view("TemplateEnid/header_meta_enid")?>    
    <?=link_tag(base_url('application/img/Enid.png') , 'shortcut icon', 'image/ico');?>    
    
    
    
</head>


<style type="text/css">
.left-side,  .sticky-left-side , .sticky-header , .logo{                
    background: white;
    //background: #f9fbfd;
    //background: #038798                
}
</style>

<?=link_tag('application/css/css/style.css');?> 
<?=link_tag('application/css/template/main.css');?>

    <?=link_tag('application/css/css/style.css');?> 
</head>
<body class="sticky-header left-side-collapsed">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">        
        <div class="logo">
            <a href="<?=base_url()?>">
                <img style='display:none' src="<?=$url_img_post?>">
                <img style="width: 20%"  src="<?=base_url('application/img/Enid2.png')?>" alt="Enid Service">
            </a>            
        </div>
        <div class="logo-icon text-center">
            <a href="<?=base_url()?>">
                <img style="width: 70%" src="<?=base_url('application/img/Enid2.png')?>" alt="Enid Service">
            </a>
        </div>
        <!--logo and iconic logo end-->
        <div class="left-side-inner">            
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="" class="media-object">
                    <div class="media-body">
                        <h4>
                            <a href="#">
                                <?=$nombre;?>
                            </a>
                        </h4> 
                        <span>
                            <?=$perfilactual;?>
                        </span>
                    </div>
                </div>
                
                
            </div>            
             <!--Desplegamos el menú-->
            <ul class="nav nav-pills nav-stacked custom-nav">               

            </ul>            
            <!--Termina Desplegamos el menú-->
        </div>
    </div>
    <!-- left side end-->
    <div class="main-content" >
        <!-- header section start-->
        <div class="header-section">
            <a title='Deslizar menú' class="toggle-btn">
                <i class="fa fa-th">
                </i>
            </a>                    
            <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/jquery-migrate-1.2.1.min.js')?>"></script>
            <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
            
            <script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>
            <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>              
            
            <!--notification menu end -->
        </div>        
        <div class="wrapper">           

