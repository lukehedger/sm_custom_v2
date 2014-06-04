<?php
/**
 * Template Name: Services Page
 */

	get_header(); ?>

		<div id="content" class="work">

			<div class="row" id="main">
				<div class="column twelve">
					<div class="inner">

						<?php

						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

						query_posts(array(
							'post_type'      => 'post', // You can add a custom post type if you like
							'paged'          => $paged,
							'posts_per_page' => 15
						));

						if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<div class="teaser">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser-img">
									<div class="teaser-overlay"></div>
									<?php the_post_thumbnail('post-thumbnail', array('alt'=>'Project Preview','title'=>'View Now')); ?>
									<div class="teaser-info">
										<h3><?php the_title(); ?></h3>
									</div>
								</a>
							</div>

						<?php endwhile; ?>

							<div class="pagination">
								<?php pagination(); ?>
							</div>

						<?php else : ?>
						    
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
						<?php endif; ?>

					</div>
				</div>
			</div>

			<div class="row" id="clients">
				<div class="column twelve">
					<div class="inner">
						Clients slideshow
					</div>
				</div>
			</div>

			<div class="row" id="sidebar">
				<div class="column twelve">
					<div class="inner">
						<?php
							if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

						<?php endif; // end primary widget area ?>
					</div>
				</div>
			</div>

		</div><!-- /#content -->
		
	<?php get_footer(); ?>