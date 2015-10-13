<?php get_header(); the_post(); ?>
<div <?php post_class("internas i_proy"); ?>> 
<!--Categorías de proyectos:
	cat_1: Film
    cat_2: Niños
    cat_3: Lado B
    cat_4: Documentales

-->
  <?php get_template_part( 'site', 'header' ); ?>

  <?php // Load data 
    $duracion = get_post_meta( get_the_ID(), '_video-duracion', true );
    $pdf = get_post_meta( get_the_ID(), '_video-pdf', true );
    $vhx = get_post_meta( get_the_ID(), '_video-vhx', true );
    $galeria = get_post_meta( get_the_ID(), '_video-galeria', true );
    $premios = get_post_meta( get_the_ID(), '_video-premios', true );
    $realizadores = get_post_meta( get_the_ID(), '_video-realizadores', true );
    $video = get_post_meta( get_the_ID(), '_video-file', true );
    $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) , 'large' );
  ?>

  <section class="teaser">
    <div class='embed-container' id="player" style="background: url( <?php echo $thumb_url; ?> ) 0 0 no-repeat; background-size:cover;"></div>
    <h1 id="title"><?php the_title(); ?></h1>
    <a href="#" data-video="<?php echo get_vimeoid( $video ); ?>" id="play_btn" class="ic-play"></a> 
     </section>
  <section class="ficha_tec">
  
  <a href="javascript:void(0)" class="ic-arrow-more view_more"></a>
    <article class="container">
      <h2><?php the_title(); ?></h2>
      <?php if( $vhx ){ ?>
        <a href="<?php echo $vhx; ?>" class="ic-canasto link_more"><span><?php _e( 'Comprar', '4dir' ); ?></span></a>
      <?php } ?> 
      <h3><?php _e( 'FICHA TÉCNICA', '4dir' ); ?></h3>
      <ul class="info">
      <?php if( $duracion ){ ?>
        <li>
          <p><?php _e('Duración:', '4dir'); ?> <?php echo $duracion; ?></p>
        </li>
      <?php } ?>
        <li>
          <p><?php the_category( ', ' ); ?></p>
        </li>
        <li>
          <p><?php the_time('Y'); ?></p>
        </li>
      </ul>


      <?php the_content(); ?>

      <?php if( $pdf ){ ?>
        <a href="<?php echo $pdf; ?>" class="ic-arrow-download link_more"><span><?php _e( 'PDF', '4dir' ); ?></span></a>
      <?php } ?> 

    </article>
  </section>

  <section class="galeria">

    <?php 
      if( $galeria ){ 
        $tipo = rand( 1, 2 );
        get_template_part( 'tipo', $tipo ); 
      } 
    ?>

     <div class="container">
      <div class="extra">

        <?php if( $realizadores ){ ?>
        <div class="row">
          <div class="col_a">
            <h3><?php _e( 'REALIZACIÓN', '4dir' ); ?></h3>
          </div>
          <div class="col_b">
            <ul>
              <?php 
                foreach ( $realizadores as $realizador ) { 
                $img = wp_get_attachment_image_src( $realizador, 'thumbnail' );
              ?>
                <li><a href="javascript:void(0)"><img src="<?php echo( $img[0] ); ?>"></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>

        <?php if( $premios ){ ?>
        <div class="row">
          <div class="col_a">
            <h3><?php _e( 'PREMIOS', '4dir' ); ?></h3>
          </div>
          <div class="col_b">
            <ul>
              <?php 
                foreach ( $premios as $premio ) { 
                $img = wp_get_attachment_image_src( $premio, 'thumbnail' );
              ?>
                <li><a href="javascript:void(0)"><img src="<?php echo( $img[0] ); ?>"></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>

      </div>
      <div class="paginado_b">
        <ul>
          <li><a href="<?php echo get_permalink(get_adjacent_post(true,'',false)); ?>" class="ic-arrow-left arrows_tp2" id="prev_pag"><span><?php _e( 'Ver anterior proyecto', '4dir' ); ?></span></a></li>
          <li><a href="/#proyectos" class=" ic-bg-btn back"><span><?php _e( 'Regresar a proyectos', '4dir' ); ?></span>	</a></li>
          <li> <a href="<?php echo get_permalink(get_adjacent_post(true,'',true)); ?> " class="ic-arrow-right arrows_tp2" id="next_pag"><span><?php _e( 'Ver siguiente proyecto', '4dir' ); ?></span></a></li>
        </ul>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>