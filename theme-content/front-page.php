<?php

$layout['template'] = 'front-page.php';

get_header('homepage');

do_action( 'foundationpress_before_content' );

while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="page-main-section">
            <div class="page-main-section-content section-header">
                <header>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
            </div>
            <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
            <div class="page-main-section-content">
                <?php the_content(); ?>
            </div>
        </div>
	</article>
<?php endwhile;

do_action( 'foundationpress_after_content' );

get_footer();
