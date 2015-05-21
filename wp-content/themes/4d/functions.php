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


	function buy_ajax(){

		/* Datos esperados 
			security
			id_producto
			nombre_producto
			detalle_producto
			fecha_compra
			pago
			envio
			mun
			pais
			ciudad
			name
			email
			telefono
			direccion
		*/

		wp_verify_nonce( 'my-special-string', $_POST['security'] );

		$id_producto = htmlspecialchars(stripslashes(trim($_POST['id_producto'])));
		$nombre_producto = htmlspecialchars(stripslashes(trim($_POST['nombre_producto'])));
		$detalle_producto = htmlspecialchars(stripslashes(trim($_POST['detalle_producto'])));
		$fecha_compra = htmlspecialchars(stripslashes(trim($_POST['fecha_compra'])));
		$pago = htmlspecialchars(stripslashes(trim($_POST['pago'])));
		$envio = htmlspecialchars(stripslashes(trim($_POST['envio'])));
		$mun = htmlspecialchars(stripslashes(trim($_POST['mun'])));
		$pais = htmlspecialchars(stripslashes(trim($_POST['pais'])));
		$ciudad = htmlspecialchars(stripslashes(trim($_POST['ciudad'])));
		$name = htmlspecialchars(stripslashes(trim($_POST['name'])));
		$email = htmlspecialchars(stripslashes(trim($_POST['email'])));
		$telefono = htmlspecialchars(stripslashes(trim($_POST['telefono'])));
		$direccion = htmlspecialchars(stripslashes(trim($_POST['direccion'])));
		
		$errors = array();
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		} else {
			$errors[] = "Please Enter A Valid Email";
		}
		
		if($errors){
			$error_encode = "<div class='form_errors'>";
			foreach($errors as $error){
				$error_encode .= "$error<br/>";
			}
			$error_encode .= "</div>";
			echo json_encode("$error_encode");
			die();
		} else {
	 
			$email_message  = "El producto: <strong>" . $nombre_producto . "</strong> con ID: <strong>" . $id_producto . "</strong> se ha vendido en la web.<br /><br />";
			$email_message .= "<strong>Detalle producto:</strong> $detalle_producto<br/>";
			$email_message .= "<strong>Fecha compra:</strong> $fecha_compra<br/>";
			$email_message .= "<strong>Forma de pago:</strong> $pago<br/>";
			$email_message .= "<strong>Envío:</strong> $envio<br/>";
			$email_message .= "<strong>Municipio:</strong> $mun<br/>";
			$email_message .= "<strong>País:</strong> $pais<br/>";
			$email_message .= "<strong>Ciudad:</strong> $ciudad<br/>";
			$email_message .= "<strong>Name:</strong> $name<br/>";
			$email_message .= "<strong>Email:</strong> $email<br/>";
			$email_message .= "<strong>Teléfono:</strong> $telefono<br/>";
			$email_message .= "<strong>Dirección:</strong> $direccion<br/>";
	 
	 
			$mail_send = wp_mail( 'jorge@8manos.com', 'Tienda 4dir: ' . $name . ' ha comprado: '.$nombre_producto, $email_message, 'jorge@8manos.com' );
			
	 
			if($mail_send){
				echo json_encode("<div class='form_success'>Success! You Will Hear From Us Shortly</div><script>$('#contact')[0].reset();</script>");
				die();
			}else{
				echo $email_message;
				die();
			}
		}
		
		
	}
	 
	add_action( 'wp_ajax_buy_ajax', 'buy_ajax' );
	add_action( 'wp_ajax_nopriv_buy_ajax', 'buy_ajax' );

    function cuatro_set_content_type(){
        return "text/html";
    }
    add_filter( 'wp_mail_content_type','cuatro_set_content_type' );

?>