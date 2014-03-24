<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

		<div id="content">
		
			<h2 class="page_title"><?php the_title(); ?></h2>
			<div class="spcr"></div>

			<div id="google_map">
				<iframe width="718" height="386" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.uk/maps?q=51.526446,-0.08199&amp;num=1&amp;ie=UTF8&amp;t=m&amp;ll=51.526359,-0.081838&amp;spn=0.001427,0.003484&amp;z=17&amp;output=embed"></iframe>
				<br />
				<span><a href="http://maps.google.co.uk/maps?q=51.526446,-0.08199&amp;num=1&amp;ie=UTF8&amp;t=m&amp;ll=51.526359,-0.081838&amp;spn=0.001427,0.003484&amp;z=17&amp;source=embed" style="text-align:left;">View Larger Map</a></span> 
				<div class="clear"></div>
			</div>

			<?php while ( have_posts() ) : the_post(); ?>
			
			<div id="contact_content">		
				<?php 
				echo the_content();				
				?>	
			</div>
			
			<?php endwhile; ?>

		</div><!-- #content -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
		
		<?php get_footer(); ?>
