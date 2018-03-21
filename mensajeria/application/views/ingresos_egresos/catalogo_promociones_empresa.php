<div class='info_update_promociones'>
</div>
<?php
        $complete  ="";		
        $l = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($promociones) >= 10 ){			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 200px;' " ; 
		}
		$b =1;						  
		$x = count($promociones);
		$total_dia  = 0;  
		$registros = 0;
		foreach ($promociones as $row){


			$id_promocion     = $row["id_promocion"];
			$num_productos =  $row["num_productos"];
			$nombre_promocion = $row["nombre_promocion"];
			$descripcion      = $row["descripcion"];
			$status           = $row["status"];
			$fecha_registro   = $row["fecha_registro"];
			
			$l .='<tr>';						
				$l .=  get_td("Agregar productos/servicios");
				$l .=  get_td($num_productos);
				$l .= get_td($nombre_promocion);										
				$l .= get_td($status);				
				$l .= get_td($fecha_registro);								
				$l .= get_td($descripcion);	
			$l .='</tr>';			
		}		
?>
<br>
<table>
	<tr class="table_enid_service_header_s">		
		<?=get_td("Promociones de tu empresa")?>
	</tr>	
</table>

<div <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">		
			<?=get_td("Agregar"); ?>					
			<?=get_td("Productos/servicios agregados a la promoción"); ?>					
			<?=get_td("Promocion"); ?>					
			<?=get_td("Estatus")?>				
			<?=get_td("Fecha registro"); ?>			
			<?=get_td("Descripción"); ?>
		</tr>		
		<?=$l;?>
	</table>
</div>