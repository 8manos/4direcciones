<?php 
  get_header(); 
  the_post(); 
?>

<div class="internas servicios">
  <?php get_template_part( 'site', 'header' ); ?>
  <section class="intro">
    <div class="container">
      <!--<h2 ><?php the_title(); ?></h2>-->
      <span class="ic-arrow-down-intro"></span> </div>
  </section>
  <section class="content">
    <div class="intro_txt container">
      <?php the_content(); ?>
    </div>
    <?php if( is_page( 'servicios' ) ){ ?>
    <ul class="lista_serv">
      <li>
        <article>
          <div class="container">
            <div class="col_a">
              <?php iinclude_page(1842,'displayTitle=true&titleBefore=<h2>'); ?>
            </div>
            <div class="col_b">
              <figure><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/servicios-realizacion.svg" alt="PRODUCCIÓN Y REALIZACIÓN LOCAL"/></figure>
            </div>
            <a href="javascript:void(0)" class="ver_pro ic-arrow-down-full" onClick="desplegar(1)"><span><?php _e( 'VER PROYECTOS', '4dir' ); ?></span></a> </div>
        </article>
        <div class="proy" id="cont_pro_1">
         <h3>PROYECTOS <strong>LOCALES</strong></h3>
          <div class="proyectos">
           
            <article class="cont_proy">
              <?php 
                $proyectos = new WP_Query( array( 'posts_per_page' => -1, 'cat' => 3 ) );
                if( $proyectos->have_posts() ){ echo( '<ul id="list_proy_s1">' ); require( locate_template( 'lista-proyectos.php' ) ); echo ('</ul'); }
              ?>
            </article>
          </div>
        </div>
      </li>
      <li>
        <article>
          <div class="container">
            <div class="col_a">
              <?php iinclude_page(1844,'displayTitle=true&titleBefore=<h2>'); ?>
            </div>
            <div class="col_b">
              <figure><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/servicios-alquiler.svg" alt="PRODUCCIÓN Y REALIZACIÓN LOCAL"/></figure>
            </div>
          </div>
        </article>
      </li>
    </ul>
    <?php } ?>
  </section>
</div>
<?php get_footer(); ?>