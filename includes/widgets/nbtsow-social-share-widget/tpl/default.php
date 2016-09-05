<div class="nbtsow-social-wrap">
<?php global $post;
 if($title) {
    echo '<h3 class="nbtsow-title">' . $title . '</h3>';
}
if($facebook_button) {
    echo  '<a rel="nofollow" href="http://www.facebook.com/sharer.php?u='. urlencode(get_permalink( $post->ID )) .'&amp;t='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" ><i class="fa fa-facebook"></i></a>';
}
if($gplus_button) {
    echo  '<a rel="nofollow" href="https://plus.google.com/share?url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;"><i class="fa fa-google-plus"></i></a>' ;
}
if($twitter_button) {
    echo  '<a rel="nofollow" href="http://twitter.com/share?text='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;url='.  urlencode(get_permalink( $post->ID )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" ><i class="fa fa-twitter"></i></a><i class="cs c-icon-cresta-spinner animate-spin"></i>' ;
}
if($pinterest_button) {
    echo  '<a rel="nofollow" href="http://pinterest.com/pin/create/bookmarklet/?url='. urlencode(get_permalink( $post->ID )) .'&amp;media='. esc_attr($pinImage).'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;"><i class="fa fa-pinterest"></i></a>';
}
if($linkedin_button) {
    echo  '<a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;"><i class="fa fa-linkedin"></i></a>';
}
?>
</div>