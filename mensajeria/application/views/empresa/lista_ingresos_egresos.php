<br>
<?php 
	$saldo =  get_saldo($ingresos_egresos["total_ingresos"] , $ingresos_egresos["total_gastos"]);
	$class_estado_cuenta = get_class_estado_cuenta($ingresos_egresos["total_ingresos"] , $ingresos_egresos["total_gastos"]);

?>
<?=n_row_12()?>		
		<center>
			<div class='col-lg-4 col-lg-offset-4  col-md-12  col-sm-12'>
				<table class='table_enid_service' border=1>
					<tr  class='table_enid_service_header_s'>
						<?=get_td("Estado de la cuenta" , 'colspan=3')?>
					</tr>
					<tr class="table_enid_service_header" >
						<?=get_td("Saldo" , "class='$class_estado_cuenta' ")?>
						<?=get_td("Ingresos")?>
						<?=get_td("Gastos" , "class='$class_estado_cuenta' ")?>
					</tr>
					<tr>
						<?=get_td( $saldo  , "class='$class_estado_cuenta' " )?>
						<?=get_td($ingresos_egresos["total_ingresos"] )?>
						<?=get_td($ingresos_egresos["total_gastos"]  , "class='$class_estado_cuenta' ")?>
					</tr>			
				</table>
			</div>	
		</center>

<?=end_row()?>


<?php
        $complete  ="";		
        $l = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($ingresos_egresos["desglose"]) >= 10 ){			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 200px;' " ; 
		}

		$b =1;						  
		$x = count($ingresos_egresos["desglose"]);
		$total_dia  = 0;  
		$registros = 0;
		foreach ($ingresos_egresos["desglose"] as $row) {

			$id_registro =  $row["id_registro"];
			$f_registro      = $row["f_registro"];
			$hora =  $row["hora"];
			$nombre    = $row["nombre"];						
			$tipo = $row["tipo"];			
			$cantidad = $row["cantidad"];			
			$valor = $row["valor"];
			$arr = [ "Gasto", "Ingreso"];
			$total =  $row["total"];
			$total_dia =  $total_dia + $total;
			
			$l .='<tr>';		
				$l .= get_td($x); 
				$l .= get_td("Editar" , "class='editar_registro'  id='".$id_registro."' data-toggle='modal' data-target='#editar-registro-modal'  "); 					
				$l .= get_td("Mover" , "class='mover_registro'  id='".$id_registro."' data-toggle='modal' data-target='#mover-registro-modal'  "); 					
				$l .= get_td($f_registro); 
				$l .= get_td($hora); 
				$l .= get_td($nombre); 
				$l .=  get_td($arr[$tipo]);
				$l .= get_td($cantidad); 
				$l .= get_td($valor); 
				$l  .= get_td($total);			
			$l .='</tr>';			

			$b++;
			$registros ++; 
			$x -- ;

		}

		

		
		
		
		
?>
<?=n_row_12()?>
	<span class='pull-right text-total'>
		Total  <?=$total_dia;?>
	</span>
<?=end_row()?>

<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header_s">		
			<?=get_td("Últimos registros" , "colspan = '10' ")?>
		</tr>	
		<tr class="table_enid_service_header">		
				<?=get_td("#"); ?>
				<?=get_td("Editar"); ?>
				<?=get_td("Mover"); ?>
				<?=get_td("Fecha Registro"); ?>
				<?=get_td("Hora"); ?>
				<?=get_td("Registro"); ?>
				<?= get_td("Tipo");?>
				<?=get_td("Cantidad"); ?>
				<?=get_td("Valor"); ?>
				<?=get_td("Total"); ?>
		</tr>		
		<?=$l;?>
	</table>
</div>
<br>
<?=titulo_enid("Resumen")?>







<?php
        $complete  ="";		
        $l = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($ingresos_egresos["resumen"]) >= 10 ){			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 200px;' " ; 
		}

		$b =1;						  
		$x = count($ingresos_egresos["resumen"]);
		$total_dia  = 0;  
		$registros = 0;

		foreach ($ingresos_egresos["resumen"] as $row) {

			
			$articulos = $row["articulos"];
			$movimientos = $row["movimientos"];
			$acumulado = $row["acumulado"];
			
			$l .='<tr>';							
				$l .= get_td($b); 
				$l .= get_td($articulos); 
				$l .= get_td($movimientos); 
				$l  .= get_td($acumulado);			
			$l .='</tr>';			

			$b++;
			$registros ++; 
			$x -- ;

		}

		

		
		
		
		
?>



<table class='table_enid_service' border=1>
	<tr class="table_enid_service_header">		
		<?=get_td("#");?>
		<?=get_td("Registro");?>
		<?=get_td("Movimientos registrados"); ?>
		<?=get_td("Total"); ?>	
	</tr>		
	<?=$l;?>
</table>



<style type="text/css">
.tipo_text{
	background: #166781;
	color: white;
}
.campo_contacto{
	background: #3C5E79;	
	color: white;
}
.table_enid_service_footer{
	background: #166781;
	color: white;
}
.num_ingresos , .num_egresos{
	display: inline-table;
	padding: 5px;
	background: #089FFF;
}
.num_ingresos{
	
}
.num_egresos{
	margin-left: 1px;	
}
.text-total{
	font-size: .7em;
}
.buen_estado{

}
.mal_estado{
	background: #f37970;
}

</style>