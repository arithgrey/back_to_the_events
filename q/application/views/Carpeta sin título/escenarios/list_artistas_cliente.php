<?php 



$article_artista ="";
$x = 0; 
		foreach ($artistas as $row) {

			$idescenario = $row["idescenario"];        
			$idartista = $row["idartista"];          
			$fecha_registro = $row["fecha_registro"];     
			$hora_inicio = $row["hora_inicio"];        
			$hora_termino = $row["hora_termino"];       
			$url_social_youtube = $row["url_social_youtube"]; 
			$url_sound_cloud = $row["url_sound_cloud"];    
			$status_confirmacion = $row["status_confirmacion"];
			$nombre_artista   = $row["nombre_artista"];
			$nota = $row["nota"];	
			$f_text = substr($nota , 0 ,200 );  		
			$img = create_icon_img($row , " img img-responsive article-img ", " " ); 
			$tipo_artista   = $row["tipo_artista"];
			$dinamic_section =  '';
			$horario = hora_enid_format($hora_inicio , $hora_termino); 	
			$salto = ""; 
			if($x%2!=0) {
				$salto  ="<br><br><hr>";
			}
			$article_artista .=  '
				<article class="col-md-6 ">
				    <figure class="col-lg-12 artista_bloque">
						<a>
							'. $img .'
						</a>
						<figcaption class="article-caption">
							<h1 class="article-title">
								<a href="">
								'.$nombre_artista .'
								</a>
							</h1>
						</figcaption>
					</figure>
					<div>
						'.$horario.'  | '. $status_confirmacion .'| 
					</div>
					<div class="article-intro col-lg-12 texto_descripcion" >
						<strong>
							'. $f_text .'
						</strong>
					</div>				
				</article>	

			';	
			$article_artista .=  $salto;
			$x ++; 	


		}
	

?>
<?=$article_artista?>


<style type="text/css">
.texto_descripcion{
	padding-top: 10px;
    background: rgb(62, 178, 192);
    border-radius: 1px;
}

</style>