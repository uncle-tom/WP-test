<article <?php post_class( 'entry' ); ?> id="page-<?php the_ID(); ?>" role="page">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<section class="entry-content">
		<?php
		// Content example for CSS ajustments - Uncomment it if you need
		//get_template_part( 'blocks/default/the-content', 'example' );
		the_content();
		?>
	</section>
</article>