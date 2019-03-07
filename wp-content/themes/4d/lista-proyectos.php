  <?php while( $proyectos->have_posts() ) : $proyectos->the_post(); ?>

    <?php if( get_post_meta( get_the_ID(), '_video-thumb', true ) ){
      $thumb_id = get_post_meta( get_the_ID(), '_video-thumb', true );
      $thumb_url = wp_get_attachment_url( $thumb_id , 'medium' );
    }else{
      $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) , 'thumbnail' );
    } ?>

    <?php if( $year != get_the_time('Y') ){ $year = get_the_time('Y') ?>
      <!-- <li class="hexagon fecha" >
        <h4><?php echo $year; ?></h4>
        <div class="face1"></div>
        <div class="face2"></div>
      </li> -->
    <?php } ?>
	<!--Agregué imagen temporal mientras se integra con cms-->
    <li <?php post_class( 'hexagon' ); ?> data-href="<?php the_permalink(); ?>" style="background-image:url( <?php echo $thumb_url ; ?>);" onClick="urlProyecto(this)" >
      <div class="hexagon_hov">
        <p><?php the_title(); ?></p>
      </div>
      <div class="face1"></div>
      <div class="face2"></div>
    </li>
  <?php endwhile; ?>
