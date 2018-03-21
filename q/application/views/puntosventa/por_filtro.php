<br>
<?php

	$filtro =  "<div >"; 
	foreach ($contactos as $row){	          
		
		$img =  create_icon_img($row , "result-busqueda-contacto" , $row["idcontacto"] );

		
	    $filtro .= "<li class='enid-filtro-busqueda row' id='". $row["idcontacto"] ."'>";                                  	          
	    
	    $filtro .=  "<div class='col-lg-4 col-md-4  col-sm-12 '>"; 
			$filtro .=  "<div class='contenedor_img_contacto'>"; 
	        $filtro .=  $img; 
			$filtro .=  "</div>"; 	 
		$filtro .=  "</div>";       

		$filtro .=  "<div class='col-lg-6 col-md-6  col-sm-12  '>"; 
		    $filtro .=  "<div class='result-busqueda-contacto text_pv'  id='". $row["idcontacto"]."'>";          
		    $filtro .=   $row["nombre"];                     
	        $filtro .=  "</div>";        
	    $filtro .= "</div>"; 
	        
	    $filtro .=  "<div class='col-lg-2 col-md-2  col-sm-12'>";     
		    $filtro .= "<span class='result-busqueda-contacto  agregar_contacto '  id='". $row["idcontacto"]."' > 
		    				Agregar 
		    			</span> ";
		$filtro .=  "</div>";     			
	    $filtro .=  "</li>
	    			
	    			"; 
	}
	$filtro .=  "</div>"; 	
	$msj_user = count($contactos) . " contactos encontrados "; 	
	$msj_carga = "<a href = '".base_url('index.php/directorio/contactos/nuevo/')."' class='btn_nnuevo'> Registra + </a>"; 		
?>

<div>	
	<div>
		<?=$filtro?>	    
	</div>	
	<br>	
	<span class='pull-left text-carga-pv row'>
		<?=$msj_user;?><?=$msj_carga;?>
	</span>

</div>


<style type="text/css">
.contenedor_img_contacto{
	width: 50%;
}.agregar_contacto{
	font-size: .8em;
	background: #032935;
	color: white;
	
	border-radius: 1px;
	padding: 1px;
}.text_pv{
	font-size: .8em;
}.enid-filtro-busqueda{
	list-style:none !important;
}.text-carga-pv{
	background: rgb(61, 74, 80) none repeat scroll 0% 0%;
	padding: 4px;
	color: white;
	font-size: .8em;
}
</style>



