<nav class="nav-submenu">
    <ul>
        <li><strong><?php echo $menu['name'] ?></strong></li>
        <?php foreach ( $menu['items'] as $menu_item ) { ?>
        <li><a href="<?php echo $menu_item['href'] ?>" title="<?php echo $menu_item['title'] ?>"><?php echo $menu_item['label'] ?></a></li>
        <?php } ?>
    </ul>
</nav>