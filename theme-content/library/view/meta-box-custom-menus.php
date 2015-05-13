<?php

$no_menu_selected = __( 'No menu', self::TRANSLATION_DOMAIN );

 ?>
<p>
    <label for="set_page_submenu">
        <strong><?php echo __( 'Choose existing menu:', self::TRANSLATION_DOMAIN ); ?></strong>
    </label>
</p>
<select name="set_page_submenu" id="set_page_submenu" style="width: 100%;">
    <?php if (! strlen($saved_menu) > 0) { ?>
    <option value="0" selected><?php echo $no_menu_selected; ?></option>
    <?php } else { ?>
    <option value="0"><?php echo $no_menu_selected; ?></option>
    <?php } ?>
    <?php foreach ($menus as $menu) {
        if (strlen($saved_menu) > 0 && $saved_menu == $menu->slug ) { ?>
    <option value="<?php echo $menu->slug ?>" selected><?php echo $menu->name ?></option>
    <?php } else { ?>
    <option value="<?php echo $menu->slug ?>"><?php echo $menu->name ?></option>
    <?php }} ?>
</select>