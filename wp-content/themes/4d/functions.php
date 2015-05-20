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

function dir_scripts(){
	wp_enqueue_script( '4dirjs', get_template_directory_uri() . '/js/interfaz.js', array('jquery'), '0.8', false);
	wp_localize_script( '4dirjs', 'CuatroAjax', array(
		// URL to wp-admin/admin-ajax.php to process data
		'ajaxurl' => admin_url( 'admin-ajax.php' ),

		// Creates a random string to test against for security purposes
		'security' => wp_create_nonce( 'my-special-string' )
	));
}


add_action( 'wp_enqueue_scripts', 'dir_scripts' );
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

function list_tags( $tax ){
	$args = array( 'hide_empty=1' );

	$terms = get_terms( $tax, $args );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    $term_list = '';
	    foreach ( $terms as $term ) {
	        $i++;
	    	$term_list .= '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'Ver más de %s', '4dir' ), $term->name ) . '">' . $term->name . '</a></li>';
	    }
	    echo $term_list;
	}
}

?>