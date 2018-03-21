<!--
<div class="panel-heading panel-nuestra-comunidad">
    <h3 class="panel-title title-cominidad">
        Imagenes de nuestra comunidad
    </h3>
</div>

<section class="panel">                        
    <div class="panel-body">
            <ul id="filters" class="media-filter" >
                <?=$iconos_experiencia_cliente["links"];?>                   
            </ul>                            
    </div>
</section>
<div id="gallery" class="media-gal">
    <?=$iconos_experiencia_cliente["imagenes"];?>                             
</div>                        
<style type="text/css">
.tag-enid-galery{
    background: #09AFDF !important;
}
</style>




<script src="<?=base_url('application/js/js/jquery.isotope.js')?>">
</script>
<script type="text/javascript">
    $(function() {
        var $container = $('#gallery');
        $container.isotope({
            itemSelector: '.item',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        // filter items when filter link is clicked
        $('#filters a').click(function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({filter: selector});
            return false;
        });
    });
</script>

-->