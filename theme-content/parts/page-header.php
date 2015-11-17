<div class="nav-mobile" id="mobile-nav"></div>
<header>
    <div class="row">
        <div class="column small-12">
            <div class="page-brand-logo">
                <a href="<?php echo home_url(); ?>">
                    <strong><?php bloginfo( 'name' ); ?></strong>
                </a>
            </div>

            <nav class="main-navigation">
                <?php fitrazdvatheme_main_nav_bar(); ?>
            </nav>

        </div>
    </div>
    <?php get_template_part( 'parts/page-header-section-panels' ); ?>
</header>