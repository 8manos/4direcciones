<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php _e( 'Compañía colombiana de producción audiovisual premiada a nivel internacional.', '4dir'); ?>">
<meta name="keywords" content="<?php _e( 'Colombia, producción audiovisual, web, indigenas, cultural, infantil, TV, Diana Rico, Richard Décaille', '4dir'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/misc/favicon.png" />
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
<body <?php body_class(); ?>>