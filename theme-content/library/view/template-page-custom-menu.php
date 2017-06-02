<?php
/**
 * Template-page-custom-menu php
 *
 * @package FitRazDva Theme
 */

$i = 0;
$len = count( $menu['items'] );
?>
<nav class="nav-submenu">
	<ul>
		<li><strong><?php echo $menu['name'] ?></strong></li>
		<?php foreach ( $menu['items'] as $menu_item ) {
			// setup class arrays.
			$list_class = [];
			$link_class = [];
			// check if item is first.
			0 == $i ? array_push( $list_class, 'first' ) : '';
			// check if item is last.
			$i == $len - 1 ? array_push( $list_class, 'last' ) : '';
			// check if item is active.
			$menu_item['href'] === $active_url ? array_push( $link_class, 'active' ) : '';
		?>
		<li <?php if ( count( $list_class ) > 0 ) { ?>class="<?php echo implode( ' ', $list_class ); ?>"<?php } ?>>
			<a href="<?php echo $menu_item['href'] ?>" title="<?php echo $menu_item['title'] ?>" <?php if ( count( $link_class ) > 0 ) { ?>class="<?php echo implode( ' ', $link_class ); ?>"<?php } ?>><?php echo $menu_item['label'] ?></a>
		</li>
		<?php $i++; } ?>
	</ul>
</nav>
