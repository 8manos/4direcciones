<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><? wp_title(); ?> | <? bloginfo('name') ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=2" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="Suscripción RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Suscripción ATOM" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<? bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="/wp-content/themes/4dir/js/anarchy_media/anarchy.js"></script>
	<!-- PARA BORRAR CAMPOS DE COMENTARIOS -->
		<script type="text/javascript">
		function clickclear(thisfield, defaulttext) {
		if (thisfield.value == defaulttext) {
		thisfield.value = "";
		}
		}
	
		function clickrecall(thisfield, defaulttext) {
		if (thisfield.value == "") {
		thisfield.value = defaulttext;
		}
		}
		</script>
	<!-- TERMINA SCRIPT DE BORRAR -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
</head>
<body>
<div id="rap">
	<div id="header">
		
		<div id="contacto">
			<div class="imgs">
			<a target="_blank" href="https://www.facebook.com/4direcciones" id="fb">f</a>
			<a target="_blank" href="http://www.youtube.com/user/4dir" id="dsh">d</a>
			<a target="_blank" href="http://www.flickr.com/photos/gangainternationalgallery" id="dot">d</a>   
			<a target="_blank" href="http://vimeo.com/cuatrodir" id="vimeo">v</a>
			</div>
			<a href="/contacto" id="contactolink">Contact</a>
			<a href="/english" id="lang">Español</a>
		</div>

		<ul id="menuPrincipal">
			<li><a href="/" id="ainicio">Inicio - </a></li>
			<li><a href="/sobre-4direcciones/" id="asobre">Sobre 4direcciones - </a></li>
			<li><a href="/ver/nuestro-trabajo/" id="atrabajo">Nuestro trabajo - </a></li>
			<li><a href="/servicios-profesionales/" id="aservicios">Servicios - </a></li>
			<li><a href="/alianzas/" id="aalianzas">Alianzas - </a></li>
			<li><a href="/ver/blog/" id="ablog">Blog - </a></li>
		</ul>
		<h1><a href="/" title="">4direcciones</a></h1>
	</div>

	<div id="bodyContenidos">
	<div id="innerbody">