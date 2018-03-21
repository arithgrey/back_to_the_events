<!DOCTYPE html>
<html>
  <head>
    <?=link_tag('application/css/css/style.css');?> 
    <meta charset="utf-8">
    <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
    <script src="<?=base_url('application/js/js/jquery-ui-1.9.2.custom.min.js')?>"></script>        
    <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>  
    <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>
  </head>
  <body>    

    <?php 
        
        $razon_social =  "";
        $fecha_registro = "";
        $descripcion =  "";
        $L  = "";
        $M  = "";
        $MM = "";
        $J  = "";
        $V  = "";
        $S  = "";
        $D  = "";
        $horario_atencion =  ""; 

        foreach ($info as $row) {
          $razon_social =  $row["razon_social"];
          $fecha_registro =  $row["fecha_registro"];
          $descripcion =  substr($row["descripcion"] ,  0 , 100);
          $L =  evalua_dia($row["L"]);
          $M  =evalua_dia($row["M"]);
          $MM =evalua_dia($row["MM"]);
          $J  =evalua_dia($row["J"]);
          $V = evalua_dia($row["V"]);
          $S = evalua_dia($row["S"]);
          $D = evalua_dia($row["D"]);
          $horario_atencion  =  $row["horario_atencion"]; 
          $formatted_address =  $row["formatted_address"];

        }
    ?>

    <div>
      <div class='col-lg-12 col-md-12 col-sm-12'>        
          <span class='razon_social'>
            <?=$razon_social?>
          </span>        
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>          
            <span class='desc'>
              <?=$descripcion?>
            </span>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>
            <?=$formatted_address?>
          </div>
        </div>
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>            
            <span class='horarios_text'>
              Horarios de atención
            </span>            
          </div>
        </div>  
        <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12'>            
            <div class='pull-left'>
              <?=$horario_atencion?>
            </div>  
            <div class='pull-right'>            
              <?=$L?>
              <?=$M?>
              <?=$MM?>
              <?=$J?>
              <?=$V?>
              <?=$S?>
              <?=$D?>
            </div>          
          </div>
        </div>
      </div>
    </div>




  </body>
</html>

<style type="text/css">
  .desc{
    font-size: .9em;  
  }
  .razon_social{
    font-size: 2em;
    font-weight: bold;
  }
  body{    
    //background: rgb(209, 47, 64);
    background: rgb(4, 97, 136);
    color: white;
  }
  .horarios_text{
    font-weight: bold;
  }
  
</style>