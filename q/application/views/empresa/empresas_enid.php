<?=n_row_12()?>
    <div class='ver-public-lg-emp'>    
      <a  href="#pill-1" role="tab" data-toggle="tab" class='links_enid' id='menu_1'>
        <i class='fa fa-star'>
        </i>        
        Prospectos|      
      </a>
      <a href="#pill-3" role="tab" data-toggle="tab" class='links_enid' id='nuevos_miembros'>
        Miembros|
      </a>  
      <a  href="#pill-2" role="tab" data-toggle="tab" class='links_enid' id='seccion-usabilidad'>
        <i class=" icon-up-1">
        </i> 
        Usabilidad Enid
      </a>|      
      <a  href="#pill-4" role="tab" data-toggle="tab" class='links_enid' id='seccion_bugs'>
        <i class=" icon-up-1">
        </i> 
        Bugs Enid Service
      </a>|            
    </div>  
<?=end_row()?>    
  



  <div class="tab-content">
    <div class="tab-pane  active" id="pill-1">
        
        <?=n_row_12()?>
            <div class='place_prospectos_comparativa'>
            </div>
        <?=end_row()?>



        <?=n_row_12()?>
            <div class='place_prospectos'>        
            </div>
            
            <div class='prospectos'>    
            </div>
        <?=end_row()?>



    </div>
    <div class="tab-pane " id="pill-2">       
        <?=n_row_12()?>


                <div class='place_usabilidad' >
                </div>
            
        <?=end_row()?>
    </div>

    <div class='tab-pane' id='pill-3'>
        <?=n_row_12()?>
            <div class='nuevos_miembros' >
            </div>            
        <?=end_row()?>
    </div>
    <div class='tab-pane' id='pill-4'>
        <br>
        <?=create_select_estados_incidencia("estado_incidencia" , "estado_incidencia")?>
        <br>
        <?=n_row_12()?>
            <div class='bugs_enid_service' >
            </div>            
        <?=end_row()?>
    </div>

    

  </div>            






        

<?=$this->load->view("empresa/enid/principal_empresas_m")?>

<script type="text/javascript" src="<?=base_url('application/js/Organizacion/enid_service/principal.js')?>"></script>
<style type="text/css">

.tab_enid_w{

color: white;
}
.info-dia-p:hover{
    cursor: pointer;
}
.info-d:hover{
    cursor: pointer;    
}

.info-dia-p , .info-d{
    font-weight: bold;
    color: #0C3D45;
}

</style>