<style type="text/css">
#t-cards {
    padding-top: 40px;
    padding-bottom: 40px;
    
}
.panel.panel-card {
    position: relative;
    height: 241px;
    border: none;
    overflow: hidden;
}
.panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 120px;
    border-bottom-color: #fff;
    overflow: hidden;
    
    -webkit-transition: height 600ms ease-in-out;
            transition: height 600ms ease-in-out;
}
.panel.panel-card .panel-heading img {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 1;
    width: 120%;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
}
.panel.panel-card .panel-heading button {
    position: absolute;
    top: 10px;
    right: 15px;
    z-index: 3;
}
.panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
            box-shadow: 0 0 0 3px #fff;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}

.panel.panel-card .panel-body {
    padding-top: 40px;
    padding-bottom: 20px;

    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
} 

.panel.panel-card .panel-thumbnails {
    padding: 0 15px 20px;
}
.panel-thumbnails .thumbnail {
    width: 60px;
    max-width: 100%;
    margin: 0 auto;
    background-color: #fff;
} 


.panel.panel-card:hover .panel-heading {
    height: 55px;
    
    -webkit-transition: height 400ms ease-in-out;
            transition: height 400ms ease-in-out;
}
.panel.panel-card:hover .panel-figure {
    opacity: 0;
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}
.panel.panel-card:hover .panel-body {
    padding-top: 20px;
    
    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
}
.panel_template_enid{
    background: #008FEA;
}
.panel_template_enid:hover{
    cursor: pointer;
}

</style>


<section id="t-cards">
    
        
                    
                <ul class="nav nav-tabs" role="tablist">

                
                <div class="col-sm-6 col-md-3 restriciones_disponibles tb_restricciones">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            <img src="../img_tema/123.jpg" />
                            <button title='Registra nueva plantilla'  
                                    class="btn btn-primary btn-sm" 
                                    role="button" 
                                    data-toggle="modal" 
                                    data-target="#modal-restriccion-eventos">
                                +  Nuevo 
                            </button>
                        </div>
                        <div class="panel-figure">
                            <img class="img-responsive img-circle" src="../img_tema/askj.jpg" />
                        </div>
                        <div   title='Ver plantillas registradas'  class="panel-body text-center panel_template_enid" data-toggle="modal" data-target="#modal_restricciones">
                            <h4 class="panel-header">                                
                                Restricciones                                
                            </h4>
                            
                        </div>
                        <div class="panel-thumbnails">
                            
                        </div>
                    </div>   
                </div>


                <div class="col-sm-6 col-md-3 tb_objs tb_objs_secccion">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            
                            <img src="../img_tema/plpas.jpg" />
                            <button title='Registra nueva plantilla' class="btn btn-primary btn-sm" role="button" data-toggle="modal" data-target="#modal-articulo-eventos">
                                +  Nuevo 
                            </button>
                        </div>
                        <div class="panel-figure">                            
                            <img class="img-responsive img-circle" src="../img_tema/askj.jpg" />
                        </div>
                        <div  title='Ver plantillas registradas'  class="panel-body text-center panel_template_enid" data-toggle="modal" data-target="#modal_objetos">
                            <h4 class="panel-header" >
                                Articulos permitidos
                            </h4>
                            
                        </div>
                        <div class="panel-thumbnails">
                            
                        </div>
                    </div>   
                </div>



                <div class="col-sm-6 col-md-3 politicas-section tb_politicas"
                href="#complete">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            <img src="../img_tema/okaos.png"/>
                            <button title='Registra nueva plantilla' class="btn btn-primary btn-sm" role="button" data-toggle="modal" data-target="#modal-politica-eventos">
                                +  Nueva 
                            </button>
                        </div>
                        <div class="panel-figure">
                            <img class="img-responsive img-circle" src="../img_tema/askj.jpg" />
                        </div>
                        <div  title='Ver plantillas registradas' class="panel-body text-center panel_template_enid"  data-toggle="modal" data-target="#modal_politicas">
                            <h4 class="panel-header">
                                Políticas                            
                            </h4>
                            
                        </div>
                        <div class="panel-thumbnails">                            
                        </div>
                    </div>   
                </div>


                <div class="col-sm-6 col-md-3 active tb_presentacion" title=''>
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            <img src="../img_tema/vinil.jpg" />
                            <button title='Registra nueva plantilla' class="btn btn-primary btn-sm" role="button" data-toggle="modal" data-target="#modal-descripcion-eventos">
                                +  Nuevo 
                            </button>
                        </div>
                        <div class="panel-figure">
                            <img class="img-responsive img-circle" src="../img_tema/askj.jpg" />
                        </div>
                        <div title='Ver plantillas registradas' class="panel-body text-center panel_template_enid" data-toggle="modal" data-target="#modal_experiencias">
                            <h4 class="panel-header">                                
                                Eventos                                
                            </h4>
                            <small>Lo que vivirán en tus eventos
                            </small>
                        </div>
                        <div class="panel-thumbnails">
                            
                        </div>
                    </div>   
                </div>




                


</section>