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
        $razon_social =  ""; $fecha_registro = ""; $descripcion =  ""; $zona =  "";
        $L  = ""; $M  = ""; $MM = ""; $J  = ""; $V  = ""; $S  = ""; $D  = ""; $sitio_web =  "";  
        $horario_atencion =  ""; 
        $idpunto_venta = 0;
        foreach ($info as $row) {
          $idpunto_venta =  $row["idpunto_venta"];
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
          $zona =  $row["zona"];
          $sitio_web =  $row["sitio_web"];
        }
        $url_admin =  create_url_puntoventa_admin("/".$evento);
        
    ?>

    


    <div>
      <div> 

        <input class='punto_venta' id='punto_venta' value='<?=$idpunto_venta?>' type='hidden'>       
        <input class='now' value='<?=base_url()?>' id='now' type='hidden'>

        

        

        
        <center>
          <?=n_row_12()?>  
            <div class='img-pv'>
                <div class='place_img'>
                </div>
                <div class='img'>
                </div>
            </div>  
            <span class='razon_social'>                                    
                <?=$razon_social?>          
            </span> 
            <span class='link-to'>
              <?=editar_btn( $links  , $url_admin );?>            
            </span>     
          <?=end_row()?>    
          


          <?=n_row_12()?>
            <span class='desc-zona'>
                  Zona de la ciudad <?=$zona?>
            </span>
          <?=end_row()?>     

          <?=n_row_12()?>   
            <span class='desc'>
                <?=$descripcion?>
            </span>
          <?=end_row()?>      

          

        <?=n_row_12()?>
          <?=$formatted_address?>
        <?=end_row()?>    

        <?=n_row_12()?>  
          <table>
            <tr>
              <td colspan="7">
                <strong>
                      Horarios de atención
                </strong>
              </td>
            </tr>
            
            <tr>                  
              <?=get_td("L")?>
              <?=get_td("M")?>
              <?=get_td("MM")?>
              <?=get_td("J")?>
              <?=get_td("V")?>
              <?=get_td("S")?>
              <?=get_td("D")?>
            </tr>
            <tr>
              <?=get_td($L)?>
              <?=get_td($M)?>
              <?=get_td($MM)?>
              <?=get_td($J)?>
              <?=get_td($V)?>
              <?=get_td($S)?>
              <?=get_td($D)?>
            </tr>


            

          </table>



        <?=end_row()?>    

        <?=n_row_12()?>
          <?=$horario_atencion?>
        <?=end_row()?>    
          
        <?=n_row_12()?>
          <span >
              <a href="<?=$sitio_web?>" class='link-pg'>
                  Página web - www
              </a>
          </span>
        <?=end_row()?>      

        </center>

        <?=n_row_12()?>

          <iframe height='500px;' width='100%'   id='iframe_maps_conf'   
           src="<?=base_url('index.php/maps/map')?>/<?=$idpunto_venta?>/2/1/0">
          </iframe> 
        <?=end_row()?>    
      </div>
    </div>
  </body>
</html>






<style type="text/css">
  body{
    background: #44bef5;
    color: white;
  }
  .desc{
    font-size: .9em;  
  }
  .razon_social{
    font-size: 2.5em;
    font-weight: bold;
  }  
  .horarios_text{
    font-weight: bold;
  }
  .desc-zona{
    font-weight: bold;
  }
  .link-to{    
    text-decoration: none;
    list-style: none;
  }
  .img-pv{
    width: 25px;
  }
  .img-pv , .razon_social, .link-to{

    display: inline-table;
  }
  .link-pg , .fa-cog{
    color: white;
  }
</style>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?=base_url('application/js/puntosventa/info.js')?>"></script>