<?
function sin_generators()
{
return '';
}
add_filter('the_generator','sin_generators');

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

function str_img_src() {
global $post;
$content = $post->post_content;
if (stripos($content, '<img') !== false) {
    $imgsrc_regex = '#<\s*img [^\>]*src\s*=\s*(["\'])(.*?)\1#im';
    preg_match($imgsrc_regex, $content, $matches);
    unset($imgsrc_regex);
    unset($content);
    if (is_array($matches) && !empty($matches)) {
        return $matches[2];
    } else {
        return false;
    }
} else {
    return false;
}
}
?>
