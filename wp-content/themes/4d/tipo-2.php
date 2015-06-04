 
	<?php 
	$galeria = get_post_meta( get_the_ID(), '_video-galeria', true );
	$i = 0; foreach ( $galeria as $imagen ) { 
	$img = wp_get_attachment_image_src( $imagen, 'large' );
	?>

 	<?php if( $i == 0 ){ ?><div class="row_full"><?php $row_open = true; ?><div class="col_b"><?php $col_open = true; ?><?php } ?>

 		<?php if( $i == 0 ){ ?>
    	<figure class="fig_1" style="background-image:url(<?php echo $img[0]; ?>);"></figure>
 		<?php } ?>

 		<?php if( $i == 1 ){ ?>
        <figure class="fig_2" style="background-image:url(<?php echo $img[0]; ?>);"></figure>
 		<?php } ?>

    <?php if( $i == 2 ){ ?></div><?php $col_open = false; ?><?php } ?>
 	
 	<?php if( $i == 2 ){ ?>
 		<figure class="col_c" style="background-image:url(<?php echo $img[0]; ?>);"></figure>     
 	<?php } ?>
	
	<?php if( $i == 2 ){ ?></div><?php $row_open = false; ?><?php } ?>
	
	<?php $i++; if( $i == 3 ){ $i = 0; } } ?>

	<?php if( $col_open == true ){ ?> </div> <?php } ?>
	<?php if( $row_open == true ){ ?> </div> <?php } ?>