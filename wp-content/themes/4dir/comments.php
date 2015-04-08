<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number(__('Comentarios', 'kubrick'), __('1 Comentario', 'kubrick'), __('% Comentarios', 'kubrick'));?></h3>
<div id="listaComentarios">


	<ol class="commentlist">
		<?php wp_list_comments('avatar_size=0&type=comment'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link('&laquo; Anteriores') ?></div>
		<div class="alignright"><?php next_comments_link('Siguientes &raquo;') ?></div>
		<small>Se muestran 5 comentarios por página</small>
	</div>
</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div id="respond">
<?php if (!$comments) : ?>
<h3 id="responder"><?php _e('Comentar', 'kubrick'); ?></h3>
<?php endif; ?>

<div class="cancel-comment-reply">
	<p><small><?php cancel_comment_reply_link(); ?></small></p>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'kubrick'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php comment_id_fields(); ?>

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Parece que eres <a href="%1$s">%2$s</a>.', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink().'#respond'); ?>"><?php _e('No, no lo soy &raquo;', 'kubrick'); ?></a></p>

<?php else : ?>

<p class="inputcomment"><label for="author"><small><?php _e('Nombre', 'kubrick'); ?> <?php if ($req) _e("*", "kubrick"); ?></small></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p class="inputcomment"><label for="email"><small><?php _e('eMail (no será publicado)', 'kubrick'); ?> <?php if ($req) _e("*", "kubrick"); ?></small></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p class="inputcomment"><label for="url"><small><?php _e('URL o blog', 'kubrick'); ?></small></label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</p>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'kubrick'), allowed_tags()); ?></small></p>-->

<p class="textAreaCom"><label for="comment"><small><?php _e('Comentario', 'kubrick'); ?></small></label><textarea name="comment" id="comment" cols="38" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Enviar', 'kubrick'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<div id="commentSubs">
	<?php comments_rss_link('Suscribirse a los comentarios via RSS'); ?>
</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
