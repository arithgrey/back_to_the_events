<form class="form-signin" role="form">
    <?php if (@$user_profile):?>
                
        <?php 
            switch ($enid_page) {
                case 'conecta_fb_enid':
                    $this->load->view("socials/fb/conecta_con_enid");
                    break;
                        
                    default:
                    echo "Ninguna página seleccionada";
                    break;
                }
        ?>

    <?php else:?>



    <?=$this->load->view("socials/fb/login_in_to_fb")?>
    
    <?php endif; ?>
</form>
    




