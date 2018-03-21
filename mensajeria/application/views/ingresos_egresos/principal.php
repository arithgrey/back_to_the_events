<style type="text/css">
    .mover_registro:hover , .editar_registro:hover{
      cursor: pointer;
    }
    .mover_registro , .editar_registro{
      background: #d6ecfd;
    }

    .btn_cuenta{
        background: #0286c1;
        color: white;
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 4px;
        font-size: 0.7em;
        border-color: #007095;
        color: #FFFFFF;
    }
    .btn_cuenta:hover{

        background: #00bffe;
        color: white;
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 7px;
        font-size: 0.7em;
        border-color: #007095;
        color: #FFFFFF;
    }
    .activa_cuenta{

        background: #031c2f;
        color: white;
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 7px;
        font-size: 0.7em;
        border-color: #007095;
        color: #FFFFFF; 
    }

    .btn_nuevo_link{
        background: #166781;
        color: white;
        border-radius: 0;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        padding: 7px;
        font-size: 0.7em;
        border-color: #007095;
        color: #FFFFFF;
    }
    .ingresos-btn{
      background: #166781;
      padding: 10px;
      color: white;
      text-decoration: none;
      font-size: 0.7em;
    }
    .egresos-btn{
      background: #166781;
      padding: 10px;
      color: white;
      font-size: 0.7em;

    }
    .egresos-btn:hover , .ingresos-btn:hover{
      text-decoration: none;  
      cursor: pointer;

    }
    #pill-1 , #pill-2{
      padding: 10px;
    }
    .s-categorias , .c-categorias , .i-categorias{
      display: inline-table;
    }
    .agregar-categoria{
      font-weight: bold;
      font-size: .8em;
    }
    .agregar-categoria:hover{ 
      cursor: pointer;
    }
    .contendor-cuenta-info{
      overflow-y:scroll; 
      overflow-x:hidden; 
      height: 400px;
    }
    .cuentas-menu{                
      margin-bottom: 10px;
    }
    .active{
      padding: 12px;
    }
    @media only screen and (max-width: 991px) {

      .cuentas-menu{                
        overflow-y:auto;
      }
    }
    
</style>
  <div class="ver-public-lg-emp">              
        <?=muestra_seccion_ingresos_egresos_cabecera($perfiles)?>
  </div>
  <div class="tab-content">
    <?php 
      $secciones =  muestra_seccion_ingresos_egresos($perfiles); 
      for ($a=0; $a < count($secciones); $a++){ 
          $this->load->view($secciones[$a]);
      }
    ?>
  </div>
<?=$this->load->view("empresa/modal/ingresos_egresos_modal")?>
<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/main.js')?>">
</script>