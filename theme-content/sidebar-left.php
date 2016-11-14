<?php
/**
 * Sidebar-left php
 *
 * @package FitRazDva Theme
 */

?>
<aside id="sidebar" class="small-12 large-4 columns large-pull-8">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
