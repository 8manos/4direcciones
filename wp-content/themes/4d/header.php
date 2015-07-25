<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php _e( 'Compañía colombiana de producción audiovisual premiada a nivel internacional.', '4dir'); ?>">
<meta name="keywords" content="<?php _e( 'Colombia, producción audiovisual, web, indigenas, cultural, infantil, TV, Diana Rico, Richard Décaille', '4dir'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#01afc1">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/colorbox.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.11.2.min.js"  ></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.colorbox-min.js"></script><!-- Lightbox -->
<!--[if IE]>
	<script>
    	document.createElement('header');		document.createElement('footer');        document.createElement('section');
        document.createElement('nav');          document.createElement('article');       document.createElement('figure');
        document.createElement('figcaption');   document.createElement('aside');
    </script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class( kcMultilingual_backend::get_data( 'lang' ) ); ?>>