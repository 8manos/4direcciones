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

/**
 * Display the post content. Optinally allows post ID to be passed
 * @uses the_content()
 *
 * @param int $id Optional. Post ID.
 * @param string $more_link_text Optional. Content for when there is more text.
 * @param bool $stripteaser Optional. Strip teaser content before the more text. Default is false.
 */
function get_the_content_by_id( $post_id=0, $more_link_text = null, $stripteaser = false ){
    global $post;
    $post = &get_post($post_id);
    setup_postdata( $post, $more_link_text, $stripteaser );
    get_the_content();
    wp_reset_postdata( $post );
}

function extractVimeo() {
	global $post;
	$content = $post->post_content;
	$pattern = '/moogaloop[.]swf[?]clip_id=([0-9]+(?:\.[0-9]*)?)/';
	preg_match ($pattern, $content, $match);
	$VIMEO = $match[1];
	if($VIMEO){
		return $VIMEO;
	}else{
		return false;
	}
}

?>