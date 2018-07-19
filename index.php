<?php get_header(); ?>
<section class="entry-section">

	<div class="container-fluid">
		  <div class="row">
			<?php
			if( have_posts() ):

				// Start the loop
				while( have_posts() ): the_post();

					// Load loop content block template
					get_template_part( 'blocks/default/loop', 'default' );

				// End the loop
				endwhile;

			else:

				_e('No content found', 'minimal-blank-theme');

			endif;
			?>
			<button type="button" class="btn btn-light btn-lg">LOAD MORE</button>
			</div>
 </div>

</section>
<?php get_footer(); ?>
