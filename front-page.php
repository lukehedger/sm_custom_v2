<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

	get_header(); ?>
		
		<div id="content" class="front-page">
			
			<div class="row" id="hero">
				<div class="column twelve">
					<div class="inner">
					
						<div id="slide">
							<?php //get number of posts in slideshow and set wrapper width accordingly...
							$postsInCat = get_term_by('name','featured','category');
							$postsInCat = $postsInCat->count;
							$wrapWidth = 'width: '.($postsInCat*718).'px;';
							?>
							<div id="slide_wrapper" style="<?php echo $wrapWidth; ?> margin-left: 0px;">
								
								<?php //slideshow post query...
								$sl_args = array( 'post_type' => 'post', 'category_name' => 'featured', 'posts_per_page' => -1 );
								$slide_loop = new WP_Query( $sl_args );				
								while ( $slide_loop->have_posts() ) : $slide_loop->the_post();
								?>
								<div class="slide_panel">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('featured', array('alt'=>'Project Preview','title'=>'View Now')); ?></a>
									<h3><a href="<?php the_permalink(); ?>" title="View Now" class="teaser_title"><?php the_title(); ?></a></h3>
								</div>
					
								<?php endwhile; ?>	
								<div class="clear"></div>	
							
							</div>	
							<div id="slide_nav_left" onclick="slideArrowLeft()">
								<img src="<?php bloginfo('template_url'); ?>/images/slide_left.png" alt="previous" />
							</div>	
							<div id="slide_nav_right" onclick="slideArrowRight()">
								<img src="<?php bloginfo('template_url'); ?>/images/slide_right.png" alt="next" />
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="row" id="tagline">
				<div class="column twelve">
					<div class="inner">
						creative. production. post production. distribution.
					</div>
				</div>
			</div>

			<div class="row" id="thumbs">
				<div class="column twelve">
					<div class="inner">

						<?php 
							query_posts($query_string . '&posts_per_page=9');
							if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						?>
						
						<div class="teaser">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser-img">
								<div class="teaser-overlay"></div>
								<?php the_post_thumbnail('post-thumbnail', array('alt'=>'Project Preview','title'=>'View Now')); ?>
								<div class="teaser-info">
									<p class="excerpt"><?php echo get_the_excerpt(); ?><br /></p>
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
						</div>

						<?php endwhile; else: ?>
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
						<?php
						// Define arguments for pagination function
							// Create an unlikely large integer for use in $paginate_args
							$big = 999999999; 			
							$paginate_args = array(
								'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
								'format' => '?paged=%#%',
								'show_all' => false,
								'mid_size' => 1,
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages,
								'prev_text' => ' Prev',
								'next_text' => 'Next '
							); 
						?>
						<!-- <span class="pagination"><?php echo paginate_links( $paginate_args );?></span> -->

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

		</div><!-- #content -->

	<?php get_footer(); ?>