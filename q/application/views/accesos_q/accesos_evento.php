
<?php 

  $accesos =  ""; 

  foreach ($info as $row) {

    $idacceso       =  $row["idacceso"];
    $descripcion    =  $row["descripcion"];
    $precio         =  $row["precio"];
    $inicio_acceso  =  $row["inicio_acceso"];
    $termino_acceso =  $row["termino_acceso"];
    $status         =  $row["status"];
    $id_evento       =  $row["idevento"];
    $idtipo_acceso  =  $row["idtipo_acceso"];
    $fecha_registro =  $row["fecha_registro"];
    $nombre         =  $row["nombre"];
    $moneda         =  $row["moneda"];
    $tipo= $row["tipo"];
    $img =  create_img_enid(create_url_img_acceso($idacceso));
    $fecha =  fechas_enid_format($inicio_acceso , $termino_acceso );
    $editar =  template_editar( $in_session, url_accesos_configuracion_avanzada($id_evento) );
    $accesos .=  ' 
                <div class="col-md-6 text-center">
                    <div class="text-left"> 
                      '.$editar .'
                    </div> 
                    '.$img.'
                    <div class="box">
                        <div class="box-content">
                            <h1 class="tag-title">
                            '.$nombre.'                              

                            </h1>
                              <small>
                              '.$tipo.'<br>  '.$inicio_acceso .' al '.$termino_acceso.'
                              </small>
                            <hr/>
                            <p>
                              '.$descripcion.'
                            </p>
                            <br />
                            <a href="ppc.html" class="btn btn-block btn-primary">
                              '.$precio.'/'.$moneda.'
                            </a>
                        </div>
                    </div>
                </div>
          '; 


  }
?>

    
            
<?=$accesos?>
      <!--      
            <xmp>  
  <?=print_r($info)?>
</xmp>-->