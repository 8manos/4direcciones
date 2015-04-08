<? get_header(); ?>
<div id="homeLeftCat">
	<h1 class="CatTitle"><? single_cat_title(); ?></h1>

	<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) == 0) : $wp_query->next_post(); else : the_post(); ?>
	<div class="bloque">
		<div class="Catthumb">
		<? if(extractVimeo()){ ?> 

<object width="400" height="302"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<? echo(extractVimeo()); ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=fca400&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=<? echo(extractVimeo()); ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=fca400&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="400" height="302"></embed></object>

		<? }elseif(str_img_src()){ ?>
			<a href="<? the_permalink(); ?>" title="<? the_title(); ?>">
			<img class="alignright" src="<? bloginfo('stylesheet_directory');?>/timthumb.php?src=<? echo(str_img_src()); ?>&w=390&h=320" />
			</a>
		<? }else{} ?>
		</div>
		<p class="fechatag"><? the_time('F Y'); ?></p>
		<h2 class="CatItem"><a href="<?php the_permalink(); ?>"><? the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
		<p>
			<a class="more-link" href="<? the_permalink(); ?>">Ver más</a>
			<?php comments_popup_link('Comentar', '1 Comentario', '% Comentarios', 'comments-link', ''); ?>

		</p>
	</div>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</div>

<?php $i = 0; rewind_posts(); ?>

<div id="homeRightCat">

	<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) !== 0) : $wp_query->next_post(); else : the_post(); ?>

	<div class="bloque">
		<div class="Catthumb">
		<? if(extractVimeo()){ ?> 

<object width="400" height="302"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<? echo(extractVimeo()); ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=fca400&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=<? echo(extractVimeo()); ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=fca400&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="400" height="302"></embed></object>

		<? }elseif(str_img_src()){ ?>
			<a href="<? the_permalink(); ?>" title="<? the_title(); ?>">
			<img class="alignright" src="<? bloginfo('stylesheet_directory');?>/timthumb.php?src=<? echo(str_img_src()); ?>&w=390&h=320" />
			</a>
		<? }else{} ?>
		</div>
		<p class="fechatag"><? the_time('F Y'); ?></p>
		<h2 class="CatItem"><a href="<?php the_permalink(); ?>"><? the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
		<p>
			<a class="more-link" href="<? the_permalink(); ?>">Ver más</a>
			<?php comments_popup_link('Comentar', '1 Comentario', '% Comentarios', 'comments-link', ''); ?>

		</p>
	</div>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</div>
	<div id="navPag">
	           <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
	</div>
<? get_footer(); ?>
