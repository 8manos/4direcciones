<?php
  get_header();
  if( kcMultilingual_backend::get_data( 'lang' ) == en ){
    $postfix = '_en';
  }else{
    $postfix = '';
  }
?>
<div id="home">
  <section class="teaser">
    <!--<video width="100%" autoplay loop muted preload>
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/home.mp4" type="video/mp4">
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/home.webm" type="video/webm">
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/home.flv" type="video/flv">
      <?php _e( 'Tu navegador no soporta el formato de video', '4dir' ); ?></video>-->
	  <!-- <div class='embed-container'>
        <iframe src="https://player.vimeo.com/video/131829712?transparent=0&autoplay=1&title=0&byline=0&portrait=0;loop=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div> -->

    <div class="owl-carousel">
      <?php
        $slides = new WP_Query( array(
          'post_type' => array('slide'),
          'posts_per_page' => -1
        ) );
        if( $slides->have_posts() ){
          while( $slides->have_posts() ){
            $slides->the_post();
            $slide_link = get_field( 'link_de_slide'.$postfix );
            $slide_image = get_field( 'imagen_de_slide'.$postfix );
            $titulo_slide = get_field( 'titulo_slide'.$postfix );
            $texto_corto_slide = get_field( 'texto_corto_slide'.$postfix );
            $texto_link_mas = get_field( 'texto_link_mas'.$postfix );
            $link_de_slide = get_field( 'link_de_slide'.$postfix );
      ?>
              <div class="slide <?php if( $titulo_slide ){ ?>bleedimage<?php } ?>">
                <a href="<?php echo $slide_link; ?>"><img class="owl-lazy" data-src="<?php echo $slide_image ?>" /></a>
                <div class="slide_content">
                  <div class="slide_content_inner">
                    <?php if( $titulo_slide ){ ?>
                      <span class="fecha"><?php the_time('F / Y'); ?></span>
                      <h1><?php echo $titulo_slide; ?></h1>
                    <?php } ?>

                    <?php if( $texto_corto_slide ){ ?>
                      <p><?php echo $texto_corto_slide; ?></p>
                    <?php } ?>

                    <?php if( $texto_link_mas &&  $link_de_slide ){ ?>
                      <a class="maslink" href="<?php echo $link_de_slide; ?>"><?php echo $texto_link_mas; ?></a>
                    <?php } ?>
                  </div>
                </div>
              </div>
      <?php
          }
        }
      ?>
    </div>

    <!-- <a href="javascript:void(0)" class="ic-arrow-more view_more" onClick="scrollDown()"></a> --> </section>

  <section class="proyectos" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/backgrounds/FONDO-PROYECTOS.jpg) center center no-repeat; background-size:cover;">

  <?php get_template_part( 'site', 'header' ); ?>


    <!--<h2><?php _e( 'PROYECTOS', '4dir' ); ?></h2>-->
	<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/proyectos.svg" alt="PROYECTOS"/></h2>

    <ul class="filtros">
    	<li><a href="javascript:void(0)" onClick="filterProject('hexagon', this)" class="current"><?php _e( 'TODOS', '4dir' ); ?></a></li>
      <?php
      $categories = get_categories('child_of=3');
      foreach ($categories as $category) {
        $option = '<li><a href="javascript:void(0)" onClick="filterProject(\'category-'.$category->category_nicename.'\', this)">';
        $option .= $category->cat_name;
        $option .= '</a></li>';
        echo $option;
      }
      ?>
    </ul>
    <article class="cont_proy">
    	<?php
    		$proyectos = new WP_Query( array( 'posts_per_page' => -1, 'cat' => 3 ) );
    		if( $proyectos->have_posts() ){ echo( '<ul id="list_proy">' ); require( locate_template( 'lista-proyectos.php' ) ); echo ('</ul'); }
    	?>
    </article>
  </section>

  <section class="mod nosotros" id="nosotros">
    <div class="container">
      <?php iinclude_page(1761,'displayTitle=true&titleBefore=<h2>'); ?>
    </div>
  </section>

  <section class="mod fundacion" id="fundacion" >
    <div class="container">
      <?php iinclude_page(2659,'displayTitle=true&titleBefore=<h2>'); ?>
    </div>
    <div class="mod_footer">
      <ul>
        <li><a href="http://festivalosos.com" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/logooda.svg" /></a></li>
        <li><a href="#" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/mayores.svg" /></a></li>
        <li><a href="#" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/logoabundancia.svg" /></a></li>
      </ul>
    </div>
  </section>

  <section class="mod servicios" id="servicios" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/backgrounds/FONDO-SERVICIOS.jpg) center center no-repeat; background-size:cover;">
    <div class="container">
      <?php iinclude_page(10,'displayTitle=true&titleBefore=<h2>'); ?>
      </div>
      <div class="mod_footer">
        <p style="text-align:center">
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/logosservicios.png" alt="PROYECTOS"/>
        </p>
      </div>
    </section>
  <section class="mod manifiesto" id="manifiesto">
    <div class="container">
      <?php iinclude_page(1763,'displayTitle=true&titleBefore=<h2>'); ?>
    </div>
  </section>
  <section class="mod contacto" id="contacto">
    <div class="col_b">

      <?php// iinclude_page(24,'displayTitle=true&titleBefore=<h2>'); ?>
	   <p><?php _e( 'Traemos correspondencia desde la otra orilla, ¿Quieres ser unos de nuestros destinatarios? Haz parte de nuestra lista de correos:', '4dir' ); ?></p>
      <form action="//4direcciones.us11.list-manage.com/subscribe/post?u=af401e2368e924faf2a2b6934&amp;id=2bfb68e573" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="new_form validate" target="_blank" novalidate>
        <ul>
          <li>
          	<input type="email" name="EMAIL" class="required email" id="mce-EMAIL" />
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_af401e2368e924faf2a2b6934_2bfb68e573" tabindex="-1" value=""></div>
            <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="send_mail ic-mail button"></button>
          </li>
        </ul>
      </form>
      <article>
		<h3><?php _e( 'DATOS DE CONTACTO', '4dir' ); ?></h3>
        <div class="info_con">
          <ul itemscope itemtype="http://schema.org/Person">
            <li ><i class="ic-mail"></i><a href="mailto:info@4direcciones.tv" itemprop="email">info@4direcciones.tv</a></li>
            <li  itemprop="telephone"><i class="ic-phone"></i><span>(57) 312 3972007</span></li>
            <li  itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><i class="ic-scale"></i><span itemprop="streetAddress">cra 5 n 28-20 / 601</span></li>
            <li  itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality">Bogotá, Colombia</span></li>
          </ul>
        </div>
      </article>
    </div>
	 <h4><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/logo-innpulsa.png" alt="PROYECTOS"/></h4>
    <h5>&copy; 4 DIRECCIONES <?php echo date('Y'); ?>. <?php _e( 'TODOS LOS DERECHOS RESERVADOS', '4dir' ); ?> - <a href="http://8manos.com" target="_blank" title="By 8manos">&infin;</a></h5>
  </section>
</div>
<?php get_footer(); ?>
