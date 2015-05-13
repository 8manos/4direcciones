<?php
/**
 * Theme setup
 */
function minimal_theme_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');
	// Custom menu support.
	register_nav_menu('primary', 'Primary Menu');
	register_nav_menu('social', 'Social Menu');

	// Most themes need featured images.
	add_theme_support('post-thumbnails' );
	// Localization support

	load_theme_textdomain('4dir', get_template_directory() . '/lang');
}

add_action('after_setup_theme', 'minimal_theme_setup');

?>