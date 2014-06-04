<?php
/**
 * The Template for displaying all single posts.
 */

	get_header(); ?>

		<div id="content" class="single">

			<div class="row">
				<div class="column twelve">
					<div class="inner">

						<?php while ( have_posts() ) : the_post(); ?>
						
							<div id="vid_embed"><?php echo get_post_meta($post->ID, '_videoembed_manual', true); ?></div>
						
							<div class="single-details">

								<h2><?php the_title(); ?></h2>
								<div id="vid_desc">
									<?php the_content(); ?>

									<!-- META -->
									<?php
									if (get_post_meta($post->ID, 'show_date', true) == 'on') { echo '<p>Date: '.get_the_date().'</p>'; }
					
									$client_name = get_post_meta($post->ID, 'client_name', true);
									$client_url = get_post_meta($post->ID, 'client_url', true);				
									if ($client_name != '' && $client_url != '') { echo '<p class="client">Client: <a href="'.$client_url.'" title="'.$client_name.'" target="_blank">'.$client_name.'</a></p>' ; }
									elseif ( $client_name != '') { echo '<p class="client">Client: '.$client_name.'</p>' ; }			
									?>
								</div>

							</div>
						
						<?php endwhile; ?>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="column twelve">
					<div class="inner">

						<!-- secondary query to get project posts -->			
						<?php
							$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
							$loop2 = new WP_Query( $args );
							
							while ( $loop2->have_posts() ) : $loop2->the_post();
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