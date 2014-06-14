<?php
/**
 * Template Name: Contact Page
 */

	get_header(); ?>

		<div id="content" class="contact">

			<div class="row" id="main">
				<div class="column twelve">
					<div class="inner">
			
						<div id="google_map">
							<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.uk/maps?q=51.526446,-0.08199&amp;num=1&amp;ie=UTF8&amp;t=m&amp;ll=51.526359,-0.081838&amp;spn=0.001427,0.003484&amp;z=17&amp;output=embed"></iframe>
						</div>
						
						<!-- <div id="vid_embed"><?php echo get_post_meta($post->ID, '_videoembed_manual', true); ?></div> -->
						
						<div class="contact-details">

							<h2 class="page-title"><?php the_title(); ?></h2>
				
							<?php while ( have_posts() ) : the_post(); ?>

								<?php 
									echo the_content();
								?>
				
							<?php endwhile; ?>

						</div>

					</div>
				</div>
			</div>

			<?php require_once('inc/clients-carousel.inc'); ?>

			<?php require_once('inc/sidebar.inc'); ?>

		</div><!-- /#content -->

		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>