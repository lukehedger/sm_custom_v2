wordpress
=========

Local Wordpress development

## TODO

- Other pages:
	- About styles + icons
	- Contact styles
	- Single styles + pagination?
 	- Work - create new page + show all posts without Categories? + pagination styles
 		- something like
 			$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
			$loop2 = new WP_Query( $args );
 	- Services page - create new + styles/content (clone from about)
- Theme overview/thumbnail?
- Font
- Assets
- Clients slideshow
- Directors dropdown and page?


## Go Live

- Backup current live, ready for restore (test restore, ie make a slight change and then restore to test overwrite)
- Copy theme files to live (create/activate new theme - sm_custom_v2)
- Reconfigure Widget structure/settings to match local