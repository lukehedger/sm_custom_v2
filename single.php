<?php
/**
 * The Template for displaying all single posts.
 * 
 */

get_header(); ?>

		<div id="content">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<div id="single_video">
				<div id="vid_embed"><?php echo get_post_meta($post->ID, '_videoembed_manual', true); ?></div>
				<h2><?php the_title(); ?></h2>
				<div id="vid_desc">
					<?php the_content(); ?>
				</div>
				<div id="vid_meta">
					<?php
					if (get_post_meta($post->ID, 'show_date', true) == 'on') { echo '<p>Date: '.get_the_date().'</p>'; }
	
					$client_name = get_post_meta($post->ID, 'client_name', true);
					$client_url = get_post_meta($post->ID, 'client_url', true);				
					if ($client_name != '' && $client_url != '') { echo '<p>Client: <a href="'.$client_url.'" title="'.$client_name.'" target="_blank">'.$client_name.'</a></p>' ; }
					elseif ( $client_name != '') { echo '<p>Client: '.$client_name.'</p>' ; }			
					?>
				</div>
				<div class="clear"></div>
			</div>
			
			<?php endwhile; ?>
			
			<div class="spcr"><a class="prev" href="<?php echo home_url(); ?>">Home</a></div>
			
			<!-- secondary query to get project posts -->			
			<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
			$loop2 = new WP_Query( $args );
			
			
			while ( $loop2->have_posts() ) : $loop2->the_post();
			?>
			
			<div class="teaser">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser_img"><?php the_post_thumbnail('post-thumbnail', array('alt'=>'Project Preview','title'=>'View Now')); ?></a>
				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teaser_title"><?php the_title(); ?></a></h3>
				<div class="stretch">
					<p class="excerpt"><?php echo get_the_excerpt(); ?><br /></p>
					<div class="view_now"><a href="<?php the_permalink(); ?>" title="View Project Details">View Now</a></div>
				</div>				
			</div>

			<?php endwhile; ?>
			
			<div class="clear"></div>
			
			<div class="spcr_slim"></div>
			
		</div><!-- #content -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>

		<?php get_footer(); ?>
