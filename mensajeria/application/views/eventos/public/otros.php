<?php    
    
    $extra_class= '' ;   
    if (count($proximos_eventos)>3) {
        $extra_class= ' class= " scroll-enid-public scroll-vertical-enid " ';                  
    }        
    $seccion ="";
    foreach ($proximos_eventos as $row){

        
        $idevento =  $row["idevento"];
        $nombre_evento  =  $row["nombre_evento"];
        $edicion =  $row["edicion"];
        $fecha_inicio =  $row["fecha_inicio"];
        $fecha_termino =  $row["fecha_termino"];
        $fecha_evento= fechas_enid_format( $fecha_inicio  , $fecha_termino );                 
        $ubicacion =  $row["ubicacion"];
        $eslogan =  $row["eslogan"];
        $tipo  =  $row["tipo"]; 
        $map =  "<i class='fa fa-map-marker' title='".$ubicacion."'></i>"; 


        $next_url =  create_url_evento_view($idevento);                
        $url_img = create_url_img_evento($idevento);
        $url_maps =  $next_url."/#enid-maps";
        $url_evento = $next_url;



            $seccion .='
                        '.n_row_12("contenido-resumen").'
                                            
                            <a class="pull-left col-lg-4" href="'.$url_evento.'" >
                                <img src="'.$url_img.'" style="width:100%">                            
                            </a>    
                            <div class="col-lg-8">                                
                                <a class="otro-e-nombre" href="'.$url_evento.'" >
                                    '.$nombre_evento.'
                                </a>
                                <h4 class="media-heading">
                                    <a href="'.$url_evento.'" >                                     
                                        <small class="edicion-otros">
                                            '.$edicion.'
                                        </small>
                                    </a>
                                </h4>                                
                                <ul class="list-inline">    
                                    <li>
                                        <a href="'.$url_maps .'">
                                            '.$map.'
                                        </a>    
                                    </li>                                    
                                    <li>
                                        '.$fecha_evento.'
                                    </li>                                    
                                </ul>                                                                
                            </div>
                        
                        '.end_row().'

                    <div class="divider_block">
                    </div>
                    <hr>
                    ';

    }

?>

<div id="property-listings">                   
    <?=titulo_enid("Las mejores experiencias a tu alcance")?>                     
    <div class='panel'>
        <div class='panel-heading blue-col-enid'>
            <span class='text-more-events'>
                Eventos que pueden interesarte
            </span> 
        </div>
        <div class='panel-body panel-body-enid'>
            <div class='row'>
                <div <?=$extra_class?> >        
                    <div id='otros_eventos_notificacion'>
                    </div>
                    <?=$seccion?>
                </div>              
            </div>
        </div>
    </div>
</div>    








<!---->
<style type="text/css">
.list-inline>li {
    padding: 0 10px 0 0;
    color: white;
}
.container-pad {
    padding: 30px 15px;
}
/**** MODULE ****/
.bgc-fff {
    background-color: #fff!important;
}
.box-shad {
    -webkit-box-shadow: 1px 1px 0 rgba(0,0,0,.2);
    box-shadow: 1px 1px 0 rgba(0,0,0,.2);
}
.brdr {
    border: 1px solid #ededed;
}

/* Font changes */
.fnt-smaller {
    font-size: .9em;
}
.fnt-lighter {
    color: #bbb;
}
/* Padding - Margins */
.pad-10 {
    padding: 10px!important;
}
.mrg-0 {
    margin: 0!important;
}
.btm-mrg-10 {
    margin-bottom: 10px!important;
}
.btm-mrg-20 {
    margin-bottom: 20px!important;
}

/* Color  */
.text-more-events{
    font-size: .9em;
    font-weight: bold;
}
/**** MEDIA QUERIES ****/
@media only screen and (max-width: 991px) {
    #property-listings .property-listing {
        padding: 5px!important;
    }
    #property-listings .property-listing a {
        margin: 0;
    }
    #property-listings .property-listing .media-body {
        padding: 10px;
    }
}
@media only screen and (min-width: 992px) {
    #property-listings .property-listing img {
        max-width: 180px;
    }
}
.divider_block{
    padding: 6px;
}
.text_otros{
    color: #FFEF6F;
}
.h1_otros{
    color: white;
    font-weight: bold;
}
.otro-e-nombre{
    color: white;    
    font-weight: bold;
}
.contenido-resumen{
    background: #13272f;
    padding: 10px;
}
.edicion-otros{
    color: white;
}    
</style>

