<?=titulo_enid("Nuestros eventos")?>

                        
	<button type="button" class="btn btn-primary btn-lg btn-block enlance_next" id="<?=url_opiniones($data_empresa['idempresa'])?>">
                            	Califícanos                            
        <i class="fa fa-star" aria-hidden="true">
        </i>
        <i class="fa fa-star" aria-hidden="true">
        </i>
        <i class="fa fa-star" aria-hidden="true">
        </i>
        <i class="fa fa-star" aria-hidden="true">
        </i>
        <i class="fa fa-star" aria-hidden="true">
        </i>
    </button>
                        
    <button type="button" class="btn btn-primary btn-lg btn-block enlance_next" id="<?=url_solicita_artista($data_empresa['idempresa'])?>">                               
		Solicita tu artista
        <i class='fa fa-headphones'>                                
        </i>
    </button>
                        
              

<?=n_row_12()?>	
	<div class='place_eventos'>
	</div>		
<?=end_row()?>