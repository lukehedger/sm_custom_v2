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

		<div id="content" class="tags">

			<div class="row" id="main">
				<div class="column twelve">
					<div class="inner">

						<h2 class="tag-name">Tag: <?php single_tag_title(); ?></h2>

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<div class="teaser">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser-img">
									<div class="teaser-overlay"></div>
									<?php the_post_thumbnail('post-thumbnail', array('alt'=>'Project Preview','title'=>'View Now')); ?>
									<!-- <div class="teaser-info">
										<h3><?php the_title(); ?></h3>
									</div> -->
								</a>
							</div>
					
						<?php endwhile; else: ?>
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>

					</div>
				</div>
			</div>

			<?php require_once('inc/sidebar.inc'); ?>

		</div><!-- #content -->

<?php get_footer(); ?>
