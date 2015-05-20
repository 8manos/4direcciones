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