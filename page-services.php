<?php
/**
 * Template Name: Services Page
 */

	get_header(); ?>

		<div id="content" class="services">

			<div class="row">
				<div class="column twelve">
					<div class="inner box">
			
						<h2 class="page-title"><?php the_title(); ?></h2>
						
						<!-- <div id="vid_embed"><?php echo get_post_meta($post->ID, '_videoembed_manual', true); ?></div> -->
			
						<?php while ( have_posts() ) : the_post(); ?>

							<?php 
								echo the_content();
							?>
			
						<?php endwhile; ?>

					</div>
				</div>
			</div>

		</div><!-- /#content -->

		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>