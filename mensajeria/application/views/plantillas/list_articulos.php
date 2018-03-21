<?php

    $objetos = "";			
    $height ="style='overflow-x:auto;'"; 
	if (count($articulos) >= 20 ){		
		$height ="style='overflow-y:scroll; style='overflow-x:auto;' height: 500px;' " ; 
	}
	$b =1;						  
	foreach ($articulos as $row){

		$idobjetopermitido        =  $row["idobjetopermitido"];
		$nombre =  strtolower($row["nombre"]); 
		$descripcion =  $row["descripcion"];
		$fecha_registro=  $row["fecha_registro"];

		$configurar=  '<i id="'.$idobjetopermitido.'" class="configurar_obj fa fa-cog" data-toggle="modal" data-target="#config_obj"  ></i>';
		$eliminar =   '<i id="'.$idobjetopermitido.'" class="eliminar_obj fa fa-times" data-toggle="modal" data-target="#eliminar_obj"  ></i>';

		$objetos .='<tr>';	
		$objetos .= get_td($configurar); 
		
		$objetos .= get_td($nombre); 
		$objetos .= get_td($fecha_registro);		
		$objetos .= get_td($descripcion); 				
		$objetos .='</tr>';			
		$b++;
	}	
?>



<span class='num_registros_encontrados'>
	# Artículos registrados <?=count($articulos);?>
</span>
<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">		
			<?=get_td("Configurar")?>
			
			<?=get_td("Artículo")?>
			<?=get_td("Fecha Registro")?>
			<?=get_td("Especificación")?>
		</tr>		
		<?=$objetos;?>
	</table>
</div>
<style type="text/css">
.tipo_text{
	background: #166781;
	color: white;
}
.campo_contacto{
	background: #3C5E79;	
	color: white;
}
.eliminar_obj:hover{
	cursor: pointer;
}

</style>
