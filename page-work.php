<?php
/**
 * Template Name: Services Page
 */

	get_header(); ?>

		<div id="content" class="work">

			<div class="row">
				<div class="column twelve">
					<div class="inner">

						<?php

							$args = array( 'post_type' => 'post', 'posts_per_page' => 15 );
							$loop2 = new WP_Query( $args );

							while ( $loop2->have_posts() ) : $loop2->the_post();

							// print_r($loop2);

						?>


						<div class="teaser">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser-img">
								<div class="teaser-overlay"></div>
								<?php the_post_thumbnail('post-thumbnail', array('alt'=>'Project Preview','title'=>'View Now')); ?>
								<div class="teaser-info">
									<!-- <p class="excerpt"><?php echo get_the_excerpt(); ?><br /></p> -->
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
						</div>

						<?php endwhile; ?>

						<!-- PAGINATION -->
						<?php
							// $big = 999999999;
							// $paginate_args = array(
							// 	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							// 	'format' => '?paged=%#%',
							// 	'show_all' => false,
							// 	'mid_size' => 1,
							// 	'current' => max( 1, get_query_var('paged') ),
							// 	'total' => $wp_query->max_num_pages,
							// 	'prev_text' => ' Prev',
							// 	'next_text' => 'Next '
							// ); 
						?>
						<!-- <span class="pagination"><?php echo paginate_links( $paginate_args );?></span> -->

					</div>
				</div>
			</div>

		</div><!-- /#content -->

		<?php get_sidebar(); ?>
		
	<?php get_footer(); ?>