<?php get_header(); ?>
<div class="internas tienda">
  <?php get_template_part( 'site', 'header' ); ?>
  <section class="intro">
    <div class="container">
      <h2><?php _e( 'TIENDA', '4dir' ); ?></h2>
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

          <li>
            <figure><a href="#content_product-<?php the_ID(); ?>" class="inline"><?php the_post_thumbnail(); ?></a></figure>
            <article>
              <h3><a href="#content_product" class="inline"><?php the_title(); ?></a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product-<?php the_ID(); ?>" class="ic-canasto comprar inline"><span><?php _e( 'COMPRAR', '4dir' ); ?></span> </a> </article>
          </li>

        <?php $i++; } endif; ?>

        </ul>
      </div>
      <div class="paginado">
        <?php get_template_part('pagination'); ?>
      </div>
    </div>

    <?php wp_reset_query(); ?>
    <!-- Contenido del producto-->
    <div style="display:none" >
    <?php $i = 0; if( have_posts() ) :  ?>
    <?php while ( have_posts() ) { the_post(); ?>

    <div id="content_product-<?php the_ID(); ?>" class="prod_ficha">
      <div class="row">
       <h4>CANASTO DE COMPRA</h4>
      	  <div class="col_a">
          
          	 <figure><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></figure>
          </div>
          <div class="col_b">
           <h2><?php the_title(); ?></h2>
            <h5>$20.000 (COP)</h5>
            <p><?php _e( 'DESCRIPCIÓN', '4dir' ); ?></p>
            <?php the_content(); ?>
          </div>
      </div>
        <form>
         
          <div class="col_a">
            <fieldset>
              <ul >
                <li>
                  <p><?php _e( 'OPCIONES DE PAGO', '4dir' ); ?></p>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="pago" id="r_1" checked/> <!-- Los ids se pueden modificar a gusto, colocar el mismo texto en el for del label-->                 
                  <label for="r_1">Transferencia bancaria</label>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="pago" id="r_2"/>
                  <label for="r_2">Efectivo contraentrega *</label>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="pago" id="r_3"/>
                  <label for="r_3">Cheque</label>
                </li>
              </ul>
            </fieldset>
            <fieldset>
              <ul>
                <li>
                  <p><?php _e( 'OPCIONES DE ENVÍO'); ?></p>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="envio" id="r_4"/>
                  <label for="r_4">Nacional</label>
                </li>
                <li class="tipo_1"><!-- Solo cuando es nacional-->
                  <label for="mun">Ciudad o Municipio</label>
                  <input type="text" name="mun" />
                </li>
                <li class="radio_btn">
                  <input type="radio" name="envio" id="r_5" checked/>
                  <label for="r_5">Internacional</label>
                </li>
                <li	class="tipo_1"><!-- Solo cuando es internacional-->
                  <div class="col_d">
                    <label for="pais" >País</label>
                    <input type="text" name="pais" />
                  </div>
                  <div class="col_d">
                    <label for="ciudad">Ciudad o municipio</label>
                    <input type="text" name="ciudad" />
                  </div>
                </li>
                <li><p class="condiciones">* Válido únicamente para Bogotá</p></li>
              </ul>
              
            </fieldset>
          </div>
          <div class="col_b">
            <fieldset>
              <ul>
                <li>
                  <p>TALLAS</p>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="talla" id="r_6" checked/>
                  <label for="r_6">S</label>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="talla" id="r_7"/>
                  <label for="r_7">M</label>
                </li>
                <li class="radio_btn">
                  <input type="radio" name="talla" id="r_8"/>
                  <label for="r_8">L</label>
                </li>
              </ul>
            </fieldset>
            <fieldset class="camp_ab">
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
                  <label for="telefono">TELÉFONO</label>
                   <input type="text" name="telefono" />
                </li>
                <li>
                  <label for="direccion">DIRECCIÓN DE ENTREGA</label>
                   <input type="text" name="direccion" />
                </li>
                <li>
                  <button class="ic-canasto"><span><?php _e( 'COMPRAR', '4dir' ); ?></span></button>
                </li>
              </ul>
            </fieldset>
          </div>
        </form>
      </div>
      <?php $i++; } endif; ?>
    </div>
  </section>
</div>
<?php get_footer(); ?>