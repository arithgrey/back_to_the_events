<?=n_row_12()?>
	<div class='col-md-8 '>
		<?=n_row_12()?>
			<center>
				<?=btn_cargar_elementos($in_session , "btn_cargar_ubicacion" , "btn_cargar_ubicacion"  , "data-toggle='modal' data-target='#modal-ubicacion-empresa'  " ,  " + Cargar ubicación " )?>
			</center>  	
		<?=end_row()?>
		<?=n_row_12("mapgooglemap")?>  			
			<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3761.5116408551294!2d-99.04783123509264!3d19.476611386859318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sel+subterraneo+fes+aragon!5e0!3m2!1ses-419!2smx!4v1480028921072" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen>
			</iframe>
		<?=end_row()?>  
	</div>
		<div class='col-md-4'>
		<center>
			<?=btn_cargar_elementos($in_session , "btn_info_contacto" , "btn_info_contacto"  , "data-toggle='modal' data-target='#modal-contacto-empresa' " ,  "+ información de contacto" )?>
		</center>
		<?=n_row_12()?>
			<center>
				<div class='text-center'>
					<h4 class='direccion-empresa'>
						<?=$data_empresa["formatted_address"]?>
					</h4>
				</div>

				<div class='text-info-contacto' id='text-info-contacto'>
					<?=$data_empresa["num_contacto"]?>
					<br>
					<?=$data_empresa["email_contacto"]?>	
				</div>
			</center>
		<?=end_row()?>
		

	</div>	
<?=end_row()?>  


