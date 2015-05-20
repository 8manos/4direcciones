<?php get_header(); the_post(); ?>

<div class="internas i_blog">
  <?php get_template_part( 'site', 'header' ); ?>

  <section class="intro">
    	<div class="container">
        	<!--<h2 ><img src="images/misc/el-blog.png" width="223" height="189" alt="El blog"/></h2>-->            
            <span class="ic-arrow-down-intro"></span>
        </div>
    </section>
    
    <?php if( has_post_thumbnail() ){ ?>
      <figure><?php the_post_thumbnail( 'full' ); ?></figure>
    <?php } ?>
    
    <section class="content">
    <div class="container">
    <h3><?php the_title(); ?></h3>
    	<div class="col_a">
        <article>
        	
            <h6><?php the_time('M d Y'); ?></h6>
            <ul class="breadcrumb">
            	<li><?php _e( 'Temas', '4dir'); ?>:</li>
                <li><a href="#">Aves</a></li>
                <li><a href="#">Rodaje</a></li>
                <li><a href="#">Amazonas</a></li>
            </ul>
            <div class="ic-img"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div>
            	<?php the_content(); ?>
        </article>


<form>
	<h5>Comentario</h5>
    <ul>
          <li>
            <label for="name">NOMBRE Y APELLIDOS</label>
            <input type="text" name="name" />
          </li>
          <li>
            <label for="email">E-MAIL</label>
            <input type="email" name="email" />
          </li>
          <li>
            <label for="url">URL O BLOG</label>
            <input type="text" name="url" />
          </li>
          <li>
            <label for="comentario">COMENTARIO</label>
             <textarea name="comentario"></textarea>
          </li>          
          <li>
            <button>ENVIAR</button>
          </li>
        </ul>
</form>
        </div>
        <div class="col_b">
        	<aside>
            	<h5>TEMAS</h5>
                <ul class="temas">
                	<li><a href="#">Rodaje</a></li><li><a href="#">Amazonas</a></li><li><a href="#">Pira-Paraná</a></li><li><a href="#">Camellos</a></li><li><a href="#">OM</a></li><li><a href="#">Chocó</a></li><li><a href="#">Cauca</a></li><li><a href="#">El río</a></li><li><a href="#">Guambía</a></li><li><a href="#">Cachivera</a></li><li><a href="#">Viaje</a></li>
                </ul>
                <h5>Medios</h5>
                <ul class="medios">
                	<li><a href="#">Todos</a></li><li><a href="#">Videos</a></li><li><a href="#">Grabaciones</a></li><li><a href="#">Fotografías</a></li><li><a href="#">Textos</a></li>
                </ul>
            </aside>
        </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>