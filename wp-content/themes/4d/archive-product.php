<?php 
  get_header(); 
  if( kcMultilingual_backend::get_data( 'lang' ) == en ){
    $postfix = '_en';
  }else{
    $postfix = '';
  }
?>
<div class="internas tienda">
  <?php get_template_part( 'site', 'header' ); ?>
  <section class="intro">
    <div class="container">
      <h2><?php _e( 'TIENDA', '4dir' ); ?> </h2>
      <span class="ic-arrow-down-intro"></span> </div>
  </section>
  <section class="lista_items">
    <div class="container">
      <div class="col_c">
      <?php $i = 0; if( have_posts() ) :  ?>
        <ul>
          <?php while ( have_posts() ) { the_post(); ?>

          <?php if ( $i == 4 || $i == 8 ){ ?>
        </ul>
      </div>
      <div class="col_c">
        <ul>
        <?php } ?>
        <?php $precio = number_format( get_field('precio') ); ?>
          <li>
            <figure><a href="#content_product-<?php the_ID(); ?>" class="inline"><?php the_post_thumbnail(); ?></a></figure>
            <article>
              <h3><a href="#content_product" class="inline"><?php the_title(); ?></a></h3>
              <p>$<?php echo $precio; ?> (COP)</p>
              <a href="#content_product-<?php the_ID(); ?>" class="ic-canasto comprar inline"><span><?php _e( 'COMPRAR', '4dir' ); ?></span> </a> </article>
          </li>

        <?php unset( $precio ); $i++; } endif; ?>

        </ul>
      </div>
      <div class="paginado">
        <?php get_template_part('pagination'); ?>
      </div>
    </div>

    <?php wp_reset_query(); ?>
    <!-- Contenido del producto-->
    <?php $i = 0; if( have_posts() ) :  ?>
    <?php while ( have_posts() ) { the_post(); ?>
    <div style="display:none" >

    <div id="content_product-<?php the_ID(); ?>" class="prod_ficha">
      <div class="row">
       <h4><?php _e( 'CANASTO DE COMPRA', '4dir' ); ?></h4>
      	  <div class="col_a">
          
          	 <figure><?php the_post_thumbnail(); ?></figure>
          </div>
          <div class="col_b">
          <?php $precio = number_format( get_field('precio') ); ?>
           <h2><?php the_title(); ?></h2>
            <h5>$<?php echo $precio; ?> (COP)</h5>
            <p><?php _e( 'DESCRIPCIÓN', '4dir' ); ?></p>
            <?php the_content(); ?>
          </div>
      </div>

        <form class="product_form" id="product_form_<?php the_ID(); ?>">   
          <div class="col_a">
            <fieldset>
              <ul >
                <li>
                  <p><?php _e( 'OPCIONES DE PAGO', '4dir' ); ?></p>
                </li>
                <li class="radio_btn">
                  <input type="radio" value="<?php _e( 'Transferencia bancaria', '4dir' ); ?>" name="pago" id="r_1_<?php the_ID(); ?>" checked/> <!-- Los ids se pueden modificar a gusto, colocar el mismo texto en el for del label-->                 
                  <label for="r_1_<?php the_ID(); ?>"><?php _e( 'Transferencia bancaria', '4dir' ); ?></label>
                </li>
                <li class="radio_btn">
                  <input type="radio" value="Efectivo" name="pago" id="r_2_<?php the_ID(); ?>"/>
                  <label for="r_2_<?php the_ID(); ?>"><?php _e( 'Efectivo contraentrega *', '4dir' ); ?></label>
                </li>
                <li class="radio_btn">
                  <input type="radio" value="Cheque" name="pago" id="r_3_<?php the_ID(); ?>"/>
                  <label for="r_3_<?php the_ID(); ?>"><?php _e( 'Cheque', '4dir' ); ?></label>
                </li>
              </ul>
            </fieldset>
            <fieldset>
              <ul>
                <li>
                  <p><?php _e( 'OPCIONES DE ENVÍO'); ?></p>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="envio" value="nacional" id="r_4_<?php the_ID(); ?>"/>
                  <label for="r_4_<?php the_ID(); ?>"><?php _e( 'Nacional', '4dir' ); ?></label>
                </li>
                <li class="tipo_1"><!-- Solo cuando es nacional-->
                  <label for="mun"><?php _e( 'Ciudad o Municipio', '4dir' ); ?></label>
                  <input type="text" name="mun" />
                </li>
                <li class="radio_btn">
                  <input type="radio" name="envio" value="internacional" id="r_5_<?php the_ID(); ?>" checked/>
                  <label for="r_5_<?php the_ID(); ?>"><?php _e( 'Internacional', '4dir' ); ?></label>
                </li>
                <li	class="tipo_1"><!-- Solo cuando es internacional-->
                  <div class="col_d">
                    <label for="pais" ><?php _e( 'País', '4dir' ); ?></label>
                    <input type="text" name="pais" />
                  </div>
                  <div class="col_d">
                    <label for="ciudad"><?php _e( 'Ciudad o municipio', '4dir' ); ?></label>
                    <input type="text" name="ciudad" />
                  </div>
                </li>
                <li><p class="condiciones"><?php _e( '* Válido únicamente para Bogotá', '4dir' ); ?></p></li>
              </ul>
              
            </fieldset>
          </div>
          <div class="col_b">
          <?php if( get_field( 'activar_opciones') ){ ?>
            <fieldset>
              <ul>
                <li>
                  <?php $opcion = 'nombre_de_opcion'.$postfix; ?>
                  <p><?php echo get_field( $opcion ); ?></p>
                </li>

                <?php 

                  $opciones = get_field( 'opciones_de_producto'.$postfix ); 

                  $opcionesArray = explode(",", $opciones);

                  $i = 1;

                  foreach($opcionesArray as $value)
                  {
                ?>

                <li class="radio_btn">
                  <input type="radio" name="detalle_producto" value="<?php echo trim($value); ?>" id="op_r_<?php echo $i; ?>" checked/>
                  <label for="op_r_<?php echo $i; ?>"><?php echo trim($value); ?></label>
                </li>

                <?php 
                      $i++;
                  }
                ?>

              </ul>
            </fieldset>
          <?php } ?>
            <fieldset class="camp_ab">
              <ul>
                <li>
                  <label for="name"><?php _e( 'NOMBRE Y APELLIDOS', '4dir' ); ?></label>
                  <input type="text" name="name" required />
                </li>
                <li>
                  <label for="email"><?php _e( 'E-MAIL', '4dir' ); ?></label>
                  <input type="email" name="email" required />
                </li>
                <li>
                  <label for="telefono"><?php _e( 'TELÉFONO', '4dir' ); ?></label>
                   <input type="text" name="telefono" />
                </li>
                <li>
                  <label for="direccion"><?php _e( 'DIRECCIÓN DE ENTREGA', '4dir' ); ?></label>
                   <input type="text" name="direccion" required />
                </li>
                <li>
                  <button class="ic-canasto"><span><?php _e( 'COMPRAR', '4dir' ); ?></span></button>
                </li>
              </ul>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
    <?php unset( $precio ); $i++; } endif; ?>
  </section>
</div>
<?php get_footer(); ?>