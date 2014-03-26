<?php
/**
 * Template Name: About Page
 */

get_header(); ?>

		<div id="content">
			
			<h2 class="page_title"><?php the_title(); ?></h2>

			<!-- <div id="vid_embed"><?php echo get_post_meta($post->ID, '_videoembed_manual', true); ?></div> -->
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<!-- restyle content here -->

			<!-- <div class="row" id="about">
				<div class="column twelve">
					<div class="inner">
						
					</div>
				</div>
			</div> -->

			<div id="about_content">		
				<?php 
				$about = get_the_content_with_formatting(); 
				$about_split = explode('<p>[split]</p>', $about);
				
				echo '<div class="col_1">'.$about_split[0].'</div>';
				echo '<div class="col_2">'.$about_split[1].'</div>';				
				?>	
				<div class="clear"></div>
			</div>
			<div class="spcr"></div>
			<?php endwhile; ?>

		</div><!-- #content -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
		
		<?php get_footer(); ?>
