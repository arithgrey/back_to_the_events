<?=template_evento($evento["nombre_evento"]  , $evento["idevento"] ,  $evento["idempresa"])?>    
<div>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
        <section id='section-slider' class='section-slider'>
         <?=$this->load->view("escenarios/principal_escenario_public")?>
        </section>
    </div>    
  </div> 
</div>	
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link href="<?=base_url('application/tema/fonts/fontello/css/fontello.css')?>" rel="stylesheet">
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal_cliente.js')?>"></script>

<style>
  .seccion-down{
    margin-top: 15px;
  }

  #section_escenario_principal{
    background: white !important;
  }
  .section-more-events{
    background: #DEE8EC none repeat scroll 0% 0%;
  }
  .title_main{
        display: none;
  }
  .web_link{
        color: #F6D314 !important;
  }
    .form_hover{
        padding: 0px;
        position: relative;
        overflow: hidden;
        height: 340px;
    }
    .form_hover:hover .header{    	

		background: #020912;
		padding: 10px;
		height: 340px;
		transform: translateY(-170px);
		-webkit-transform: translateY(-170px);
		-moz-transform: translateY(-170px);
		-ms-transform: translateY(-170px);
		-o-transform: translateY(-170px);
    }
    .form_hover img{
        z-index: 4;
    }
    .form_hover .header{
		position: absolute;
		top: 340px;
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		-o-transition: all 0.3s ease;
		-ms-transition: all 0.3s ease;
		transition: all 0.3s ease;
		width: 100%;
    }
	.section-header-title{		
		display: none;
	}  
</style>



  
<style type="text/css">

  .text-descripcion-escenario{
    background: #e8f0f3;
    font-size: .8em;  
    padding: 10px;
  }

  .text-slogan{
    margin-left: 10px;
  }
  .footer_info_esceneario{
    font-size: .8em;
    color: #0E7DBA;
  }
  .link_cliente{
    background: #032935;
      padding: 1px;
      border-radius: 1px;
      color: white;
      text-align: center;
  }
  .link_cliente:hover{
    background: #03A9F4;
      color: white;
      text-decoration: none;      
  }    
  .resumen_escenario_desc{
    font-size: .9em;
    color: #364654;
  }
  
</style>


<style type="text/css">
  /**/  
  .resumen-escenario{    
    font-weight: bold;
  }    
  .resumen-a , .resumen-b , .resumen-c{
      
      display: inline-table;
      font-size: .9em;
      color: white;
      font-weight: bold;
  }
  .part_desc_{
    text-align: right;
  }
  /*Medios*/
  @media only screen and (max-width: 991px){    
    /**/
    .part_desc_{
      text-align: right;
    }

  }

</style>
<input type='hidden' id='id_escenario' class='id_escenario' value='<?=$escenario["idescenario"]?>'>
<input type='hidden' id='nombre_escenario' class='nombre_escenario' value='<?=$escenario["nombre"]?>'>
<input type='hidden' class='evento' value="<?=$evento["idevento"];?>">
<input type='hidden' class='id_evento' value="<?=$evento["idevento"];?>">
<input type='hidden' class='id_empresa' value="<?=$evento["idempresa"]?>">
<input type='hidden' class='empresa' value="<?=$evento["idempresa"]?>">

<?=$this->load->view("escenarios/modal/public")?>

