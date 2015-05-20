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
     	<?php if( have_posts() ) :  ?>
        <ul>
          <?php while ( have_posts() ) { the_post(); ?>
          	
       	  <li <?php post_class(); ?>>
            <figure>
            	<?php the_post_thumbnail(); ?>
            <!-- <img src="images/misc/backgrounds/blog.jpg" alt="img blog"/> -->
            </figure>
			<article>
              <h3><?php the_title(); ?></h3>
              <?php the_excerpt(); ?>
              <p><a href="<?php the_permalink(); ?>" class="view_more"><?php _e('Ver más', '4dir'); ?></a></p>
              <hr/>
              <div class="ic-img mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date"><?php the_time('M. d Y'); ?></span> 
            </article>
          </li>

	      <?php } endif; ?>
      </div>
      <div class="col_c">
        <ul>
          <li>
            <div class='embed-container'>
              <iframe src='http://www.youtube.com/embed/LJkOLWvsvew' frameborder='0' allowfullscreen></iframe>
            </div>
            <article>
              <h3>Título del post</h3>
              <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <a href="interna-blog.html" class="view_more">VER MÁS +</a></p>
              <hr/>
              <div class="ic-img mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date">SEPT. 01 2014</span> </article>
          </li>
          <li>
            <figure><img src="images/misc/galeria/PROY-6.png" alt="img blog"/></figure>
            <article>
              <h3>Título del post</h3>
              <p>Cum horribilem walking dead resurgere de crazed sepulcris creaturis, zombie sicut de grave feeding iride et serpens. Pestilentia, shaun ofthe dead scythe animated corpses ipsa screams. Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. Aenean a dolor plan et terror soulless vulnerum contagium accedunt, mortui iam vivam unlife. <a href="#" class="view_more"> VER MÁS +</a></p>
              <hr/>
              <div class="ic-img mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date">SEPT. 01 2014</span> </article>
          </li>
          <li>
            <article>
              <h3>Título del post</h3>
              <p>Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. <a href="interna-blog.html" class="view_more"> VER MÁS +</a></p>
              <hr/>
              <div class="ic-video mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date">SEPT. 01 2014</span> </article>
          </li>
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
          <li>
            <div class='embed-container'>
              <iframe src='https://player.vimeo.com/video/58192865' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            </div>
            <article>
              <h3>Título del post</h3>
              <p>Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo.<a href="interna-blog.html" class="view_more"> VER MÁS +</a></p>
              <hr/>
              <div class="ic-video mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date">SEPT. 01 2014</span> </article>
          </li>
          <li>
            <figure><img src="images/misc/backgrounds/blog.jpg" alt="img blog"/></figure>
            <article>
              <h3>Título del post</h3>
              <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <a href="interna-blog.html" class="view_more">VER MÁS +</a></p>
              <hr/>
              <div class="ic-img mult"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div><span class="date">SEPT. 01 2014</span> </article>
          </li>
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