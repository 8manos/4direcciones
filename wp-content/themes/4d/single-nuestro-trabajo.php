<?php get_header(); the_post(); ?>
<div <?php post_class("internas i_proy cat_1"); ?>> 
<!--Categorías de proyectos:
	cat_1: Film
    cat_2: Niños
    cat_3: Lado B
    cat_4: Documentales

-->
  <?php get_template_part( 'site', 'header' ); ?>

  <section class="teaser">
    <div class='embed-container' id="player" style="background: url(images/misc/backgrounds/proyecto.jpg) 0 0 no-repeat; background-size:cover;"></div>
    <h1 id="title"><?php the_title(); ?></h1>
    <a href="javascript:void(0)" id="play_btn" onClick="showVideo()" class="ic-play"></a> 
     </section>
  <section class="ficha_tec">
  <a href="javascript:void(0)" class="ic-arrow-more view_more"></a>
    <article class="container">
      <h2><?php the_title(); ?></h2>
      <h3><?php _e( 'FICHA TÉCNICA', '4dir' ); ?></h3>
      <ul class="info">
        <li>
          <p>Duración: 89 x 79 HDV</p>
        </li>
        <li>
          <p>Documental</p>
        </li>
        <li>
          <p><?php the_time('Y'); ?></p>
        </li>
      </ul>

      <?php the_content(); ?>

      <a href="#" class="ic-arrow-download link_more"><span>PDF</span></a> <a href="#" class="ic-canasto link_more"><span>Comprar</span></a> </article>
  </section>
  <section class="galeria">
    <!--Tipo 1-->     
     <figure class="row_full" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/galeria/proyecto-full.jpg);"></figure>
     
      <!--Tipo 2-->
     <div class="row_full">
     	<div class="col_b">
        	<figure class="fig_1" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/galeria/proyecto-full-30.jpg);"></figure>
            <figure class="fig_2" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/galeria/proyecto-full-30-2.jpg);"></figure>
        </div>
     	<figure class="col_c" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/galeria/proyecto-70.jpg);"></figure>     
     </div>

      <!--Tipo 1-->
      <figure class="row_full" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/galeria/proyecto-full-2.jpg);"></figure>
     <div class="container">
      <div class="extra">
        <div class="row">
          <div class="col_a">
            <h3><?php _e( 'REALIZACIÓN', '4dir' ); ?></h3>
          </div>
          <div class="col_b">
            <ul>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-6.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-12.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-6.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-12.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-6.png" alt="logo"></a></li>
              
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col_a">
            <h3><?php _e( 'PREMIOS', '4dir' ); ?></h3>
          </div>
          <div class="col_b">
            <ul>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-6.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-12.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-6.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-12.png" alt="logo"></a></li>
              <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/misc/galeria/PROY-6.png" alt="logo"></a></li>	
            </ul>
          </div>
        </div>
      </div>
      <div class="paginado_b">
        <ul>
          <li><a href="<?php echo get_permalink(get_adjacent_post(true,'',false)); ?>" class="ic-arrow-left arrows_tp2" id="prev_pag"><span><?php _e( 'Ver anterior proyecto', '4dir' ); ?></span></a></li>
          <li><a href="/#proyectos" class=" ic-bg-btn back"><span><?php _e( 'Regresar a proyectos', '4dir' ); ?></span>	</a></li>
          <li> <a href="<?php echo get_permalink(get_adjacent_post(true,'',true)); ?> " class="ic-arrow-right arrows_tp2" id="next_pag"><span><?php _e( 'Ver siguiente proyecto', '4dir' ); ?></span></a></li>
        </ul>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>