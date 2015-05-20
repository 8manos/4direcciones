<?php get_header(); ?>
<div class="internas i_blog blog">
<?php get_template_part( 'site', 'header' ); ?>
  <section class="intro">
    <div class="container">
      <!--<h2 ><img src="images/misc/el-blog.png" width="223" height="189" alt="El blog"/></h2>-->
      <span class="ic-arrow-down-intro"></span> </div>
  </section>
  <section class="lista_items">
    <div class="container">
      <div class="col_c">
     	<?php $i = 0; if( have_posts() ) :  ?>
        <ul>
          <?php while ( have_posts() ) { the_post(); ?>
          	

          <?php if ( $i == 4 ){ ?>
        </ul>
      </div>
      <div class="col_c">
        <ul>

          <?php } ?>

          <?php if( $i == 8 ){ ?>
        </ul>
      </div>
      <div class="col_c">
        <ul>
          <li>
            <div class="relacionados">
              <h5>TEMAS</h5>
              <ul class="temas">
                <li><a href="#">Rodaje</a></li>
                <li><a href="#">Amazonas</a></li>
                <li><a href="#">Pira-Paraná</a></li>
                <li><a href="#">Camellos</a></li>
                <li><a href="#">OM</a></li>
                <li><a href="#">Chocó</a></li>
                <li><a href="#">Cauca</a></li>
                <li><a href="#">El río</a></li>
                <li><a href="#">Guambía</a></li>
                <li><a href="#">Cachivera</a></li>
                <li><a href="#">Viaje</a></li>
              </ul>
              <h5>Medios</h5>
              <ul class="medios">
                <li><a href="#">Todos</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Grabaciones</a></li>
                <li><a href="#">Fotografías</a></li>
                <li><a href="#">Textos</a></li>
              </ul>
            </div>
          </li>
          <?php } ?>
       	  
          <li <?php post_class(); ?>>
            <?php if( extractVimeo() ){ ?>
              <div class='embed-container'>
                <iframe src="//player.vimeo.com/video/<?php echo extractVimeo(); ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
            <?php }elseif( has_post_thumbnail() ){ ?>
            <figure>
            	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <!-- <img src="images/misc/backgrounds/blog.jpg" alt="img blog"/> -->
            </figure>
            <?php } ?>
			<article>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <p><a href="<?php the_permalink(); ?>" class="view_more"><?php _e('Ver más', '4dir'); ?></a></p>
              <hr/>
              <div class="ic-img mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date"><?php the_time('M. d Y'); ?></span> 
            </article>
          </li>

	      <?php $i++; } endif; ?>

          <!-- <li>
            <div class='embed-container'>
              <iframe src='http://www.youtube.com/embed/LJkOLWvsvew' frameborder='0' allowfullscreen></iframe>
            </div>
            <article>
              <h3>Título del post</h3>
              <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <a href="interna-blog.html" class="view_more">VER MÁS +</a></p>
              <hr/>
              <div class="ic-img mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date">SEPT. 01 2014</span> </article>
          </li> -->
        </ul>
      </div>
      <div class="paginado">
      	
      	  <?php get_template_part('pagination'); ?>
          <ul>
          <li><a href="#" class="ic-pagina_izq arrows" id="prev_pag"><span>Anterior página</span></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li> <a href="#" class="ic-pagina_der arrows" id="next_pag"><span>Siguiente página</span></a></li>
          </ul>
         
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>