<?php
/**
 * Template Name: Services Page
 */

	get_header(); ?>

		<div id="content" class="services">

			<div class="row" id="main">
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

			<?php require_once('inc/clients-carousel.inc'); ?>

			<?php require_once('inc/sidebar.inc'); ?>

		</div><!-- /#content -->
		
	<?php get_footer(); ?>