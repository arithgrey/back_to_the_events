<div class='info_puntos_venta_cargados'>
</div>
<?php		
	$puntos_venta_resum = ""; 
		foreach ($puntos_venta as $row){			
	
			$idpunto_venta  = $row["idpunto_venta"];
			

		}	

	

?>


<style type="text/css">
	
	
	.delete-punto-venta-icon {
	    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
	    -webkit-transition:all ease .8s ;
	    background: black;
	    color: white;
	    filter: alpha(opacity=0); /*Opacidad Para IE */
	    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
	    opacity: 0; /*Inicialmente transparente */
	    padding: 5px;
	    position: absolute; /*Info sobre la imagen*/
	    top: 5%;
	    transition:all ease .8s;
	    zoom: 1;
    }
    .img-horizontal:hover .delete-punto-venta-icon{
	    filter: alpha(opacity=80);
	    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }
    .delete-punto-venta-icon:hover{
    	cursor: pointer;
    }
</style>
					