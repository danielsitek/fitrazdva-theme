<?php

$layout['template'] = 'page.php';

get_header();

do_action( 'foundationpress_before_content' );

while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile;

do_action( 'foundationpress_after_content' );

get_footer();
