<?php

    $objetos = "";			
    $height =""; 
	if (count($articulos) >= 10 ){		
		$height ="style='height: 300px;
overflow-x: hidden;
overflow-y: auto;' " ; 
	}
	$b =1;						  
	foreach ($articulos as $row){

		$idobjetopermitido        =  $row["idobjetopermitido"];
		$nombre =  strtolower($row["nombre"]); 
		$descripcion =  $row["descripcion"];
		$fecha_registro=  $row["fecha_registro"];
		$configurar=  '<i id="'.$idobjetopermitido.'" class="configurar_obj fa fa-cog" data-toggle="modal" data-target="#config_obj"  ></i>';
		$eliminar =   '<i id="'.$idobjetopermitido.'" class="eliminar_obj fa fa-times" data-toggle="modal" data-target="#eliminar_obj"  ></i>';
		
		$objetos .= n_row_12("contenedor_obj");	
			$objetos .= "<div class='col-lg-5'>";
				$objetos .= "<span class='strong'>". $nombre."</strong>"; 	
				$objetos .= "<br>"; 		
				$objetos .= $fecha_registro;		
			$objetos .= "</div>";

			$objetos .= "<div class='col-lg-7'>";
				
				$objetos .="<div class='text-right'>". $configurar."</div>";

				$objetos .= "<span class='info_extra'>".$descripcion."</span>"; 							
			$objetos .= "</div>";
			
		$objetos .= end_row()."<hr>";			

		$b++;
	}	
?>

<label>
	Registrados - <?=count($articulos)?>
</label>
<div <?=$height?> >
	<?=$objetos;?>		
</div>



<style type="text/css">

.contenedor_obj{
	height: 200px;
	background: #0081FF;
	padding: 10px;
}
.info_extra{
	font-size: .8em;
}
</style>
