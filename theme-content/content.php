<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-main-section">
        <div class="page-main-section-content section-header">
            <header>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php foundationpress_entry_meta(); ?>
            </header>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
            </div>
            <hr />
        </div>
    </div>
</article>
