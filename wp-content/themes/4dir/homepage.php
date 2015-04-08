<?php
/*
Template Name: homepage4dir
*/
?>


<?php get_header(); ?>
 <div id="homeLeft">
	<div id="manifiesto" class="bloque">
		<?php iinclude_page(46,'displayTitle=true'); ?>
		<p>
			<a class="more-link" href="/sobre-4direcciones/">Sobre 4direcciones</a>
		</p>
	</div>

	<div id="servicios" class="bloque">
		<?php iinclude_page(10,'displayTitle=true'); ?>
		<p>
			<a class="more-link" href="/servicios-profesionales/">Ver más</a>
		</p>
	</div>

	<div id="blog" class="bloque">
		<h2>Blog</h2>
			<?php $bloggy= new WP_Query('showposts=1&cat=6'); ?>
				<?php while ($bloggy->have_posts()) : $bloggy->the_post(); ?>
				<div id="fechaBlog">
					<? the_time('M d'); ?>
				</div>
				<div class="imgBlog">
					<? if(str_img_src()){ ?>
						<a href="<? the_permalink(); ?>" title="<? the_title(); ?>">
						<img class="alignright" src="<? bloginfo('stylesheet_directory');?>/timthumb.php?src=<? echo(str_img_src()); ?>&w=310&h=220" />
						</a>
					<? } ?>
				</div>
				<div class="excerptBlog">
					<h3><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h3>
					<? the_excerpt(); ?>
				</div>
				<p>
					<a class="more-link" href="<? the_permalink(); ?>">Ver blog</a>
				</p>
			<?php endwhile; ?>
	</div>

</div>

<div id="homeRight">
	<div id="inprogress" class="bloque">
		<h2>In Progress</h2>
		<?php $prog = new WP_Query('showposts=1&cat=4'); ?>
			<p class="fechatag"><? the_time('F Y'); ?> - <? the_tags('','',''); ?></p>						
							<?php while ($prog->have_posts()) : $prog->the_post(); ?>
							<? the_excerpt(); ?>
							<p>
								<a class="more-link" href="<? the_permalink(); ?>">Ver proyecto</a>
							</p>
						<?php endwhile; ?>
	</div>

	<div id="reel" class="bloque">
		<h2>Reel</h2>
						<?php $reel = new WP_Query('showposts=1&cat=5'); ?>
							<?php while ($reel->have_posts()) : $reel->the_post(); ?>
							<? the_excerpt(); ?>
							<p>
								<a class="more-link" href="<? the_permalink(); ?>">Ver</a>
							</p>
						<?php endwhile; ?>
		<br><br><br>
		<h2>Nuestro Trabajo</h2>
						<?php $hist = new WP_Query('showposts=3&cat=3'); ?>
							<?php while ($hist->have_posts()) : $hist->the_post(); ?>
							<h3><a href="<?the_permalink(); ?>"><? the_title(); ?></a></h3>
							<div class="thumb">
								<? the_thumb('subfolder=historias&width=100&height=100&link=p&keepratio=0'); ?>
							</div>
							<? the_excerpt(); ?>
							<p>
								<a class="more-link" href="<? the_permalink(); ?>">Ver proyecto</a>
							</p>
						<?php endwhile; ?>
	</div>

</div>
<?php get_footer(); ?>
