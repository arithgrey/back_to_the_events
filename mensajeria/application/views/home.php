<!DOCTYPE html>
<head>       
    <title>
        Enid Service - <?=$titulo?>
    </title>        
    <?=$this->load->view("TemplateEnid/header_meta_enid")?>    
    <?=link_tag(base_url('application/img/Enid.png') , 'shortcut icon', 'image/ico');?>    
</head>

<?=link_tag('application/css/css/style.css');?> 
<?=link_tag('application/css/template/main.css');?>
<script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
<script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>            
<script src="<?=base_url('application/js/js/jquery.nicescroll.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>              
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href="<?=base_url('application/css/agency.min.css')?>" rel="stylesheet">

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand " href="#page-top">
                    Enid Service
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top">
                        </a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="<?=url_busqueda_eventos()?>">
                            Pŕoximos eventos
                        </a>
                    </li>
                    <!--
                    <li>
                        <a class="page-scroll" href="#resumen">
                            Cómo funciona
                        </a>
                    </li>
                -->
                    <!--
                    <li>
                        <a class="page-scroll" href="">
                            Registrarse
                        </a>
                    </li>
                -->
                    <li>
                        <a class="page-scroll" href="<?=url_inicio_session()?>">
                            Iniciar sesión
                        </a>
                    </li>                    
                </ul>
            </div>
          
        </div>
        
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">                
                <div class="intro-heading">
                    Inteligencia de negocio para eventos musicales
                </div>
                <a href="#resumen" class="page-scroll btn btn-xl">
                    Dime más
                </a>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="resumen" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        La herramienta para mejorar tus eventos musicales                        
                    </h2>                    
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x">
                                </i>
                            </div>
                        </div>
                        <img src="<?=base_url('application/img/landing/25.jpg')?>" class="img-responsive" alt="">

                    </a>
                    <div class="portfolio-caption">
                        <a>
                            <h4>
                                Sitio web de tu centro nocturno
                            </h4>
                        </a>
                        <p class="text-muted">
                            Desarrollamos el canal que puedas presentar tu imagen en Internet 
                        </p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?=base_url('application/img/landing/publica.jpg')?>" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="http://enidservice.com/demo_2/">
                            <h4>
                                Promoción de tus eventos musicales
                            </h4>
                        </a>
                        <p class="text-muted">
                            Eventos, promociones e incluso reglas de tus eventos podrás incluir en tu página web.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x">
                                </i>
                            </div>
                        </div>
                        <img src="<?=base_url('application/img/landing/califica.jpg')?>" class="img-responsive" alt="">

                    </a>
                    <div class="portfolio-caption">
                        <a href="https://github.com/arithgrey">
                            <h4>
                                Capta la opinión de tus consumidores frente a tu servicio. 
                            </h4>
                        </a>
                        <p class="text-muted">
                            Con este medio podrás identificar  posibles mejoras de tus servicios ya que tus consumidores serán quienes te evalúen.  
                        </p>
                    </div>
                </div>



                

                
            </div>
            <div class='row'>            
                
                




                <div class="col-md-4 col-sm-6 portfolio-item">
                    
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?=base_url('application/img/documentacion/doc_17.png')?>" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="http://www.enidservice.com/home/index.php/emp/la_historia/153">
                            <h4>
                                Inteligencia para tu negocio.
                            </h4>
                        </a>
                        <p class="text-muted">
                            Ten un panorama de aquellos esfuerzos que realizas, 
                            los intereses de tus clientes y aquello que como dueño de negocio te es de valor
                            para mejorar tus servicios.
                        </p>
                    </div>
                </div>


                <div class="col-md-4 col-sm-6 portfolio-item">
                    
                </div>





            </div>



        </div>
    </section>





       
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; enidservice
                    </span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/arithgrey"><i class="fa fa-twitter"></i></a>
                        </li>
                        
                        <li><a href="https://www.linkedin.com/in/jonathan-govinda-medrano-salazar-17a094b7"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">                
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>
                                    Sitio web para tu centro nocturno
                                </h2>
                                <p class="item-intro text-muted">
                                   Creamos la página web de tu centro nocturno, con ella podrás administrar tus eventos, dar seguimiento a tus consumidores y notificar oportunamente aquello que los puede hacer felices. 
                                </p>                                                            
                                <p>
                                    <strong>
                                        <a href="<?=base_url('index.php/home/uso')?>">
                                            Más información 
                                        </a>  
                                    </strong>
                                </p>    
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>
                                    Promoción de tus eventos musicales
                                </h2>
                                <p class="item-intro text-muted">
                                    Website demo, lo necesario para arrancar tu negocio. 
                                </p>
                                <img class="img-responsive img-centered" src="<?=base_url('application/img/img/2.png')?>" alt="">
                                <p>
                                    <a href="http://enidservice.com/demo_2/">
                                        Herramientas necesarias para iniciar tu negocio en la web
                                    </a> 
                                </p>

                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>
                                    Sitio web bar subterráneo
                                </h2>
                                <img class="img-responsive img-centered" src="<?=base_url('application/img/img/3.png')?>" alt="">
                                <a href="http://www.enidservice.com/home/index.php/emp/la_historia/153">
                                <p class="item-intro text-muted">
                                    Página web bar subterráneo
                                </p>
                                </a>

                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>
                                    Mis proyectos en Github
                                </h2>
                                <img class="img-responsive img-centered" src="<?=base_url('application/img/img/4.png')?>" alt="">
                                <a href="https://github.com/arithgrey">
                                    <p class="item-intro text-muted">
                                        Contribuciones web
                                    </p>
                                </a>

                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <i class="fa fa-times">
                                    </i> 
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
















    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>
                                    Inteligencia de negocio Grupo konecta
                                </h2>
                                <img class="img-responsive img-centered" src="<?=base_url('application/img/img/5.jpg')?>" alt="">                            
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <i class="fa fa-times">
                                    </i> 
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>
                                    Inteligencia de negocio Grupo konecta
                                </h2>
                                <img class="img-responsive img-centered" src="<?=base_url('application/img/img/6.jpg')?>" alt="">                            
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <i class="fa fa-times">
                                    </i> 
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    


    <!-- jQuery -->
    <script src="<?=base_url('application/js/jquery.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('application/js/bootstrap.min.js')?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?=base_url('application/js/jqBootstrapValidation.js')?>"></script>
    <script src="<?=base_url('application/js/contact_me.js')?>"></script>
    <!-- Theme JavaScript -->
    <script src="<?=base_url('application/js/agency.min.js')?>"></script>

</body>

</html>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<style type="text/css">
    .contenedor-info-contacto{
        background: red;
        height: 50%;    
    }
    .url-social{
        background: #0A4A54;
        padding: 5px;
        color: white;
    }
    .url-social:hover , .url-social-tw{
        background: #0FCBEA;
        padding: 5px;
        color: white;
        text-decoration: none;
    }
    ul li{
        text-decoration: none;
        list-style: none;
    }
    ul{
        text-decoration: none;
        list-style: none;
    }
    li{
        text-decoration: none;
        list-style: none;
    }
    header{background-image:url(<?=base_url('application/img/landing/25.jpg') ?>);background-repeat:no-repeat;background-attachment:scroll;background-position:center center;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;-o-background-size:cover;text-align:center;color:#fff}    

</style>
<input type='hidden' value="1" id='id_empresa' class='id_empresa'> 