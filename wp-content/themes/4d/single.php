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
                <?php echo get_the_term_list( $post->ID, 'tema', '<li>', ',</li><li>', '</li>' ); ?>
            </ul>
            <div class="ic-img"><span class="path1"></span><span class="path2"></span><span class="path3"></span></div>
            	<?php the_content(); ?>
        </article>

        <?php comments_template(); ?>
        
        </div>
        <div class="col_b">
        	<aside>
            	<h5><?php _e( 'Temas', '4dir' ); ?></h5>
                <ul class="temas">
                  <?php list_tags('tema'); ?> 
                </ul>
                <h5><?php _e( 'Medios', '4dir' ); ?></h5>
                <ul class="medios">
                  <?php list_tags('tema'); ?>
                </ul>
            </aside>
        </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>