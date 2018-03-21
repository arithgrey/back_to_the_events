<div class='info_update_precios_promociones'>
</div>

<?php
        $complete  ="";		
        $l = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($catalogo_productos_servicios) >= 10 ){			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 200px;' " ; 
		}
		$b =1;						  
		$x = count($catalogo_productos_servicios);
		$total_dia  = 0;  
		$registros = 0;
		foreach ($catalogo_productos_servicios as $row){

			$id_catalogo_productos_servicios = $row["id_catalogo_productos_servicios"];
			$nombre = $row["nombre"];
			$descripcion = $row["descripcion"];
			$precio = $row["precio"];
			$costo = $row["costo"];
			$precio_variable =  $row["precio_variable"];
			$fecha_registro = $row["fecha_registro"];
			$modal_modal = "class='editar_catalogo_categoria'  id='".$id_catalogo_productos_servicios."' data-toggle='modal' data-target='#editar-catalogo-registro'  "; 
			$part_editar =  "Editar"; 

			$l .='<tr>';		
				$l .= get_td($part_editar , $modal_modal );				
				$l .= get_td($nombre);				
				$l .= get_td($precio);				
				$l .= get_td($costo);				
				$l .= get_td(precio_editable_icon($precio_variable));				
				$l .= get_td($fecha_registro);				
			$l .='</tr>';			
		}		
?>
<br>
<table>
	<tr class="table_enid_service_header_s">		
		<?=get_td("Catalogo de productos y servicios")?>
	</tr>	
</table>
<div  <?=$height?> >
	<table class='table_enid_service' border=1>
			<tr class="table_enid_service_header">		
					<?=get_td("Registrar"); ?>
					<?=get_td("Producto/servicio"); ?>				
					<?=get_td("Precio"); ?>
					<?=get_td("Costo"); ?>
					<?=get_td("Precio editable por el cajero"); ?>
					<?=get_td("Fecha registro"); ?>			
			</tr>		
		<?=$l;?>
	</table>
</div>
