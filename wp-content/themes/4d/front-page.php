<?php get_header(); ?>
<div id="home">
  <section class="teaser">
    <video width="100%" autoplay loop muted preload>
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/prueba.mp4" type="video/mp4">
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/prueba.ogg" type="video/ogg">
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/prueba.webm" type="video/webm">
      <?php _e( 'Tu navegador no soporta el formato de video', '4dir' ); ?></video>
    
    <a href="javascript:void(0)" class="ic-arrow-more view_more" onClick="scrollDown()"></a> </section>
  
  <section class="proyectos" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/backgrounds/bg_proyecto.jpg) center center no-repeat; background-size:cover;">
  
  <?php get_template_part( 'site', 'header' ); ?>


    <!--<h2><?php _e( 'PROYECTOS', '4dir' ); ?></h2>-->
	<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/proyectos.svg" alt="PROYECTOS"/></h2>

    <ul class="filtros">
    	<li><a href="#todos" class="current"><?php _e( 'TODOS', '4dir' ); ?></a></li>
      <?php 
      $categories = get_categories('child_of=3'); 
      foreach ($categories as $category) {
        $option = '<li><a href="/#category-'.$category->category_nicename.'">';
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
  <section class="mod manifiesto">
    <div class="container">
      <?php iinclude_page(1763,'displayTitle=true&titleBefore=<h2>'); ?>
    </div>
  </section>
  <section class="mod contacto">
    <div class="col_b">
	
      <?php// iinclude_page(24,'displayTitle=true&titleBefore=<h2>'); ?>
	   <p><?php _e( 'Traemos correspondencia desde la otra orilla, ¿Quieres ser unos de nuestros destinatarios? Haz parte de nuestra lista de correos:', '4dir' ); ?></p>
      <form class="new_form">
        <ul>         
          <li>
          	<input type="email" name="email" />
         	  <button class="send_mail ic-mail"></button>
          </li>
        </ul>
      </form>
      <article> 
		<h3><?php _e( 'DATOS DE CONTACTO', '4dir' ); ?></h3>
        <div class="info_con">
          <ul itemscope itemtype="http://schema.org/Person">
            <li ><i class="ic-mail"></i><a href="mailto:info@4direcciones.tv" itemprop="email">info@4direcciones.tv</a></li>
            <li  itemprop="telephone"><i class="ic-phone"></i><span>(57 1) 2822766</span></li>
            <li  itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><i class="ic-scale"></i><span itemprop="streetAddress">Carrera 5 #26-39 torre b apto 306</span></li>
            <li  itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality">Bogotá, Colombia</span></li>
          </ul>
        </div>
      </article>
    </div>
    <h5>&copy; 4 DIRECCIONES <?php echo date('Y'); ?>. <?php _e( 'TODOS LOS DERECHOS RESERVADOS', '4dir' ); ?></h5>
  </section>
</div>
<?php get_footer(); ?>