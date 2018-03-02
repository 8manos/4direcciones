<header>
  <div id="nav-anchor"></div>
  <div class="cont_men">
  <!--Idiomas-->
   <?php kc_ml_list_languages(); ?>
    <!-- <div id="lang">
    	<a href="#esp" id="esp" class="replaced_txt current"><?php _e( 'ESP', '4dir' ); ?></a>
        <a href="#ing" id="ing" class="replaced_txt"><?php _e( 'ING', '4dir' ); ?></a>
    </div> -->

	 <a class="trigger ic-menu" href="#" id="trigger-menu"></a>

	    <!--Redes antiguas
    <div id="accordion_social" class="accordion">
      <h6><a href="#" class="ic-social"></a></h6>
      <div>
      <span></span>
        <?php wp_nav_menu(array('menu_class' => 'social-menu', 'theme_location' => 'social')); ?>
      </div>
    </div>-->
	 <!--Redes nuevas-->
	<div id="accordion_social" class="accordion">
      <h6><a href="#" class="ic-social"></a></h6>
      <div>

        <ul>
    		 <li><a target="_blank" href="http://vimeo.com/cuatrodir" class="ic-vimeo"></a></li>
    		 <li><a target="_blank" href="http://www.youtube.com/user/4dir" class="ic-youtube"></a></li>
    		 <li><a target="_blank" href="https://instagram.com/4direcciones/" class="ic-instagram"></a></li>
    		 <li><a target="_blank" href="http://www.flickr.com/photos/gangainternationalgallery" class="ic-flickr"></a></li>
         <!-- <li><a target="_blank" href="#" class="ic-twitter"></a></li> -->
         <li><a target="_blank" href="https://www.facebook.com/4direcciones" class="ic-facebook"></a></li>
        </ul>
      </div>
    </div>

  <div id="nav_container">
  <a class="ic-close" href="#" id="trigger-menu-close"></a>




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


    <div class="clear_float"></div>
     <h4 class="replaced_txt"><?php _e( '4 DIRECCIONES AUDIO - VISIONARIOS', '4dir' ); ?></h4>
     </div>
     <h1 class="replaced_txt"><a href="<?php bloginfo('url'); ?>"><?php _e( '4 DIRECCIONES AUDIO - VISIONARIOS', '4dir' ); ?></a></h1>

    </div>

  </header>
