<? get_header(); ?>
<style>
div.bloque {
	margin-top:0;
	margin-bottom:0;
}
div.bloque h2 {
	font-size:25px;
	margin-bottom:20px;
}
</style>
 <div class="bloque padded">
<?php while (have_posts()) : the_post(); ?>
	<h2><? the_title(); ?></h2>

	<? the_content(); ?>
<? endwhile; ?>

<div id="comentarios">
	<? comments_template(); ?>
<div class="clear"></div>
</div>

</div>
<? get_footer(); ?>