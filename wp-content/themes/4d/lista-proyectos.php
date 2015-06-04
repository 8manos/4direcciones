 <!--ORDENAR PROYECTOS ASÍ: AÑO-P-P-AÑO-P-P // POR FAVOR INGRESARLOS DE MAYOR A MENOR :)-->
  <?php while( $proyectos->have_posts() ) : $proyectos->the_post(); ?>
    <?php if( $year != get_the_time('Y') ){ $year = get_the_time('Y') ?>
      <!-- <li class="hexagon fecha" >
        <h4><?php echo $year; ?></h4>
        <div class="face1"></div>
        <div class="face2"></div>
      </li> -->
    <?php } ?>
	<!--Agregué imagen temporal mientras se integra con cms-->
    <li <?php post_class( 'hexagon' ); ?> data-href="<?php the_permalink(); ?>" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/galeria/PROY-1.png);" onClick="urlProyecto(this)" >
      <div class="hexagon_hov">
        <p><?php the_title(); ?></p>
      </div>
      <div class="face1"></div>
      <div class="face2"></div>
    </li>
  <?php endwhile; ?>   