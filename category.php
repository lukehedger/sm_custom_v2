<?php
/**
 * Category archive template file.
 */

get_header(); ?>
		
		<div id="content">
			
			<h2 class="page_title"><?php single_cat_title(); ?></h2>
			
			<?php
			// Define arguments for pagination function
				// Create an unlikely large integer for use in $paginate_args
				$big = 999999999; 			
			$paginate_args = array(
				'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				'format' => '?paged=%#%',
				'show_all' => true,
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_text' => ' Prev',
				'next_text' => 'Next '
			); 
			?>
			<div class="spcr"><span class="pagination"><?php echo paginate_links( $paginate_args );?></span><span class="clear"></span></div>
			
			<?php 
			
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			?>
			
			<div class="teaser">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser_img"><?php the_post_thumbnail('post-thumbnail', array('alt'=>'Project Preview','title'=>'View Now')); ?></a>
				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser_title"><?php the_title(); ?></a></h3>
				<div class="stretch">
					<p class="excerpt"><?php echo get_the_excerpt(); ?><br /></p>
					<div class="view_now"><a href="<?php the_permalink(); ?>" title="View Project Details">View Now</a></div>
				</div>				
			</div>

			<!--Run the loop to output the posts. Put various tags here to show required content-->
			
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
			
			<div class="clear"></div>
			
			<div class="spcr"><span class="pagination"><?php echo paginate_links( $paginate_args );?></span></div>

		</div><!-- #content -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>

		<?php get_footer(); ?>
