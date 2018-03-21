<?=titulo_enid("Line up(Artistas) ")?> 
    <?=n_row_12("config-general-escenario")?>
        <div class="place_artista">
        </div>
    <?=end_row()?>               

    <?=n_row_12()?>                
        <form role="form" class="form-inline" id="form-escenario-artista" >
            <div class="form-group todo-entry">                     
                <input placeholder="Artista, dj,  set, ... " 
                            class="form-control input-sm input_new_artista"
                            id="artista" 
                            name="nuevoartista" 
                            type="text">                                                                              
                <input type="hidden" name="idescenario" value="<?=$data_escenario["idescenario"]?>">
            </div>
            <button class="btn btn-primary pull-right nuevo_artista_btn" type="submit">
                +
            </button>
        </form>                        
    <?=end_row()?>                            


<hr>

<?=n_row_12("config-general-escenario")?>            
    <div class='response_img_artista' id='response_img_artista'>
    </div>                                              
<?=end_row()?>                            

<?=n_row_12()?> 
    <div class='place_config_artistas'>
    </div>          
<?=end_row()?>                            


<?=n_row_12()?> 

    <div class='place_artistas'>
    </div>  
<?=end_row()?>                            

<?=n_row_12()?> 
    <div class='artistas-escenario-section' id='artistas-escenario-section'>   
    </div>
<?=end_row()?>                            

    