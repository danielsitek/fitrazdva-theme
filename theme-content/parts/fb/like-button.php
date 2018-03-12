<?php
/**
 * Facebook Like Button
 *
 * @link https://developers.facebook.com/docs/plugins/like-button
 * @package FitRazDva Theme
 */

global $wp;
$current_url = home_url( $wp->request );
?>
<div class="fb-like" data-href="<?php echo $current_url; ?>" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
