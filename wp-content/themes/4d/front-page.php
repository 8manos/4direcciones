<?php get_header(); ?>
<div id="home">
  <section class="teaser">
    <video width="100%" autoplay loop muted preload>
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/prueba.mp4" type="video/mp4">
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/prueba.ogg" type="video/ogg">
      <source src="<?php bloginfo('stylesheet_directory'); ?>/videos/prueba.webm" type="video/webm">
      <?php _e( 'Tu navegador no soporta el formato de video', '4dir' ); ?></video>
    <h1 ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/misc/logo-4-direcciones.svg" width="300" alt="4 DIRECCIONES AUDIO - VISIONARIES"/></h1>
    <a href="javascript:void(0)" class="ic-arrow-more view_more" onClick="scrollDown()"></a> </section>
  
  <section class="proyectos" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/images/misc/backgrounds/bg_proyecto.jpg) center center no-repeat; background-size:cover;">
  
  <header id="menu_ppal"> 
  <div id="nav-anchor"></div>
  <div class="cont_men">
  <a class="ic-menu-txt trigger" href="#" id="trigger-menu"></a> 
  <div id="nav_container">
  <a class="ic-close" href="#" id="trigger-menu-close"></a> 
    <!--Redes-->
    <div id="accordion_social" class="accordion">
      <h6><a href="#" class="ic-social"></a></h6>
      <div>
      <span></span>
        <?php wp_nav_menu(array('menu_class' => 'social-menu', 'theme_location' => 'social')); ?>
      </div>
    </div>

    <?php kc_ml_list_languages(); ?>
    <!-- <div id="lang">
    	<a href="#esp" id="esp" class="replaced_txt current"><?php _e( 'ESP', '4dir' ); ?></a>
        <a href="#ing" id="ing" class="replaced_txt"><?php _e( 'ING', '4dir' ); ?></a>
    </div> -->
    
    <nav>
    	<?php wp_nav_menu(array('menu_class' => 'nav-menu', 'theme_location' => 'primary')); ?>
      <!--<ul>
        <li><a href="#proyectos" class="current">PROYECTOS<span></span></a> </li>
        <li><a href="#nosotros">NOSOTROS<span></span></a> </li>
        <li><a href="servicios.html">SERVICIOS<span></span></a> </li>
        <li><a href="blog.html">BLOG<span></span></a> </li>
        <li><a href="tienda.html">TIENDA<span></span></a> </li>
        <li><a href="#contacto">CONTACTO<span></span></a> </li>
      </ul> -->
    </nav>
    <div class="redes_resp">
    <p><?php _e( 'SÍGUENOS', '4dir' ); ?></p>

    	<?php wp_nav_menu(array('menu_class' => 'social-menu', 'theme_location' => 'social')); ?>
    
    </div>
    
    <div class="clear_float"></div> 
     <h4 class="replaced_txt"><?php _e( '4 DIRECCIONES AUDIO - VISIONARIOS', '4dir' ); ?></h4>
     </div>
     <h1 class="replaced_txt"><a href="index.html"><?php _e( '4 DIRECCIONES AUDIO - VISIONARIOS', '4dir' ); ?></a></h1>
     <h3 class="replaced_txt"><?php _e( '4 DIRECCIONES AUDIO - VISIONARIOS', '4dir' ); ?></h3>
    
    </div>
   
  </header>
    <h2><?php _e( 'PROYECTOS', '4dir' ); ?></h2>

    <ul class="filtros">
    	<li><a href="#" class="current"><?php _e( 'TODOS', '4dir' ); ?></a></li>
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
    		if( $proyectos->have_posts() ) : require( locate_template( 'lista-proyectos.php' ) ); endif;
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
      <h2><?php _e( 'CONTACTO', '4dir' ); ?></h2>
      <p>4direcciones es una compañía colombiana de producción audiovisual premiada a nivel internacional por sus contenidos ambientales, indígenas, culturales.</p>
      <form>
        <ul>
          <li>
            <label for="name">NOMBRE</label>
            <input type="text" name="name" />
          </li>
          <li>
            <label for="email">EMAIL</label>
            <input type="email" name="email" />
          </li>
          <li>
            <label for="mns">MENSAJE</label>
            <textarea name="mns"></textarea>
          </li>
          <li>
            <button>ENVIAR</button>
          </li>
        </ul>
      </form>
      <article>
        <div class="info_con">
          <h3><?php _e( 'DATOS DE CONTACTO', '4dir' ); ?></h3>
          <ul itemscope itemtype="http://schema.org/Person">
            <li ><i class="ic-mail"></i><a href="mailto:info@4direcciones.tv" itemprop="email">info@4direcciones.tv</a></li>
            <li  itemprop="telephone"><i class="ic-phone"></i><span>57(1) 2822766</span></li>
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