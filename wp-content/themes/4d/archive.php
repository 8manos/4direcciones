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
        <?php get_sidebar(); ?>

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