<?php 
  get_header(); 
  the_post(); 
?>

<div class="internas servicios">
  <?php get_template_part( 'site', 'header' ); ?>
  <section class="intro">
    <div class="container">
      <h2 ><?php the_title(); ?></h2>
      <span class="ic-arrow-down-intro"></span> </div>
  </section>
  <section class="content">
    <div class="intro_txt container">
      <p>En 4direcciones ofrecemos nuestros servicios de asesoría y desarrollo en todo el proceso de producción y realización audiovisual. Alquilamos equipos de última generación para grabación y post-producción de video. </p>
    </div>
    <ul class="lista_serv">
      <li>
        <article>
          <div class="container">
            <div class="col_a">
              <h2>PRODUCCIón Y REALIZACIÓN LOCAL</h2>
              <p>4direcciones asesora y desarrolla proyectos audiovisuales desde el diseño y las estrategias de financiación, el desarrollo y la escritura de guiones, la producción, la grabación y la post-producción.</p>
            </div>
            <div class="col_b">
              <figure><img src="images/misc/servicios-realizacion.svg" alt="PRODUCCIÓN Y REALIZACIÓN LOCAL"/></figure>
            </div>
            <a href="javascript:void(0)" class="ver_pro ic-arrow-down-full" onClick="desplegar(1)"><span>VER PROYECTOS</span></a> </div>
        </article>
        <div class="proy" id="cont_pro_1">
         <h3>PROYECTOS <strong>LOCALES</strong></h3>
          <div class="proyectos">
           
            <article class="cont_proy">
              <ul id="list_proy_s1">
                <!--ORDENAR PROYECTOS ASÍ: AÑO-P-P-AÑO-P-P // POR FAVOR INGRESARLOS DE MAYOR A MENOR :)-->
                <li class="hexagon fecha" >
                  <h4>2014</h4>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_2" style="background-image:url(images/misc/galeria/PROY-2.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_4" style="background-image:url(images/misc/galeria/PROY-8.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_1" style="background-image:url(images/misc/galeria/PROY-9.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_1" style="background-image:url(images/misc/galeria/PROY-5.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_2" style="background-image:url(images/misc/galeria/PROY-6.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon fecha" >
                  <h4>2013</h4>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_3" style="background-image:url(images/misc/galeria/PROY-11.jpg);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_1" style="background-image:url(images/misc/galeria/PROY-5.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_2" style="background-image:url(images/misc/galeria/PROY-6.png);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon fecha" >
                  <h4>2012</h4>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
                <li class="hexagon cat_3" style="background-image:url(images/misc/galeria/PROY-11.jpg);" onClick="prueba()" >
                  <div class="hexagon_hov">
                    <p>Maxi: Guardián de las anacondas</p>
                  </div>
                  <div class="face1"></div>
                  <div class="face2"></div>
                </li>
              </ul>
            </article>
          </div>
        </div>
      </li>
      <li>
        <article>
          <div class="container">
            <div class="col_a">
              <h2>EQUIPOS DE GRABACIÓN Y POST-PRODUCCIÓN</h2>
              <p>Alquilamos cámaras de video en formatos HDV, DVCAM y MINIDV, micrófonos y luces. Alquilamos salas de composición y edición en plataforma Final Cut de última generación.</p>
            </div>
            <div class="col_b">
              <figure><img src="images/misc/servicios-alquiler.svg" alt="PRODUCCIÓN Y REALIZACIÓN LOCAL"/></figure>
            </div>
          </div>
        </article>
      </li>
    </ul>
  </section>
</div>
<?php get_footer(); ?>