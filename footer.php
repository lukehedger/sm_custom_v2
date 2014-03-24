<?php
/**
 * The template for displaying the footer.
 *
*/
?>


			<footer role="contentinfo" class="row">
				<div class="column twelve">
					<div class="inner">
						Footer

						<div class="copyright">
							Copyright &copy;
						</div>
					</div>
				</div>
			</footer><!-- /footer -->

		</div><!-- /.grid -->

	</section><!-- /document -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17453400-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 
<?php
	if (is_front_page() or is_archive() or is_single()) {
		echo '<script type="text/javascript" src="' . get_bloginfo( 'template_url' ) . '/scripts/jquery.min.js"></script>';
		echo '<script type="text/javascript" src="' . get_bloginfo( 'template_url' ) . '/scripts/resize_teaser.js"></script>';
	}
	if (is_front_page()) {
		echo '<script type="text/javascript" src="' . get_bloginfo( 'template_url' ) . '/scripts/jquery.easing.js"></script>';
		echo '<script type="text/javascript" src="' . get_bloginfo( 'template_url' ) . '/scripts/slideshow.js"></script>';
	}
	if (is_page_template('page-contact.php')) {
		echo '<script type="text/javascript" src="' . get_bloginfo( 'template_url' ) . '/scripts/encrypt_mail.js"></script>';
	}	
	
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
