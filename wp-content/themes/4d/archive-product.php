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
        <ul>
          <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li>
          <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li> <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li>
        </ul>
      </div>
      <div class="col_c">
        <ul>
          <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li> <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li> <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li>
        </ul>
      </div>
      <div class="col_c">
        <ul>
          <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li> <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li> <li>
            <figure><a href="#content_product" class="inline"><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></a></figure>
            <article>
              <h3><a href="#content_product" class="inline">Nombre del producto</a></h3>
              <p>$20.000 (COP)</p>
              <a href="#content_product" class="ic-canasto comprar inline"><span>COMPRAR</span> </a> </article>
          </li>
        </ul>
      </div>
      <div class="paginado">
        <?php get_template_part('pagination'); ?>
      </div>
    </div>
    <!-- Contenido del producto-->
    <div style="display:none" >
      <div id="content_product" class="prod_ficha">
      <div class="row">
       <h4>CANASTO DE COMPRA</h4>
      	  <div class="col_a">
          
          	 <figure><img src="images/misc/tienda/producto.png" alt="nombre del producto"/></figure>
          </div>
          <div class="col_b">
           <h2>Nombre del producto</h2>
            <h5>$20.000 (COP)</h5>
            <p>DESCRIPCIÓN</p>
            <p class="desc">Laute irure dolor in reprehenderit in Sed ut perspiciatis unde omnis iste natus error consectetur, adipisci velit in sed ut perspiciatis unde omnis iste natus.</p>
          </div>
      </div>
        <form>
         
          <div class="col_a">
            <fieldset>
              <ul >
                <li>
                  <p>OPCIONES DE PAGO</p>
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
                  <p>OPCIONES DE ENVÍO</p>
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
                  <button class="ic-canasto"><span>COMPRAR</span></button>
                </li>
              </ul>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>