<span class='num_registros_encontrados'>
	# Agregados al evento <?=count($pvs);?>
</span>

	<table class='table_enid_service' border=1>
		
		
		<tr>
			<?=get_td("PUNTO DE VENTA") ?>
			<?=get_td("L") ?>
			<?=get_td("M") ?>
			<?=get_td("MM") ?>
			<?=get_td("J") ?>
			<?=get_td("V") ?>
			<?=get_td("S") ?>
			<?=get_td("D") ?>
			<?=get_td("HORARIOS") ?>
			<?=get_td("Zona") ?>
		</tr>
					

		<tr class="table_enid_service_header">		
			<?=catalogo_disponibles($pvs)?>
		</tr>
	</table>
	<br>

