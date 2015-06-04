<?php 
$galeria = get_post_meta( get_the_ID(), '_video-galeria', true );
foreach ( $galeria as $imagen ) { 
$img = wp_get_attachment_image_src( $imagen, 'large' );
?>
     <figure class="row_full" style="background-image:url(<?php echo( $img[0] ); ?>);"></figure>
<?php } ?>

              
              
