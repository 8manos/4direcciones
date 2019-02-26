<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php _e( 'Compañía colombiana de producción audiovisual premiada a nivel internacional.', '4dir'); ?>">
<meta name="keywords" content="<?php _e( 'Colombia, producción audiovisual, web, indigenas, cultural, infantil, TV, Diana Rico, Richard Décaille', '4dir'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#000000">
<meta name="theme-color" content="#ffffff">
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/colorbox.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/assets/owl.theme.default.min.css">
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.11.2.min.js"  ></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.colorbox-min.js"></script><!-- Lightbox -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/owl.carousel.min.js"></script>
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
