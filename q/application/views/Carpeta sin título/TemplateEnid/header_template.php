<!DOCTYPE html>
<head>       
    <title>
        Enid Service - <?=$titulo?>
    </title>        
    <?=$this->load->view("TemplateEnid/header_meta_enid")?>    
    <?=link_tag(base_url('application/img/Enid.png') , 'shortcut icon', 'image/ico');?>    
</head>

<style type="text/css">
.left-side,  .sticky-left-side , .sticky-header , .logo{                    
    background: #038798                
}
</style>
<?=link_tag('application/css/css/style.css');?> 
<?=link_tag('application/css/template/main.css');?>

<script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
<script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>            
<script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>

<script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>              


<body class="sticky-header left-side-collapsed">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">                
        <div class="logo">
            <a href="<?=base_url()?>">                
                <img style="width: 20%"  src="<?=base_url('application/img/Enid.png')?>" alt="Enid Service">
            </a>   
        </div>
        <div class="logo-icon">
            <a href="<?=base_url()?>">
                <img style="width: 70%" src="<?=base_url('application/img/Enid.png')?>" alt="Enid Service">
            </a>
        </div>                
        <!--Desplegamos el menú-->
            <ul class="nav custom-nav">                               
                <?php echo $menu; ?>                
            </ul>            
        <!--Termina Desplegamos el menú-->        
    </div>
    <!-- left side end-->
    <div class="main-content" >
        <!-- header section start-->
        <div class="header-section">
            <a title='Deslizar menú' class="toggle-btn">
                <i class="fa fa-th">
                </i>
            </a>                                
            <?=$this->load->view("TemplateEnid/menu_right");?>   
            <!--notification menu end -->
        </div>        
        <div class="wrapper">           