wordpress
=========

Local Wordpress development

## TODO

- [ ] Other pages:
	- [x] Contact content (needs column six structure)
	- [ ] About & Services background
	- [x] Services page
 	- [ ] Work - create new page + show all posts without Categories? + pagination styles
 		- something like
 			$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
			$loop2 = new WP_Query( $args );
	- [ ] Single styles + pagination?
- [x] Theme overview/thumbnail?
- [ ] Font -> then h2.page_title and body type styles in typography
- [ ] Clients slideshow -> [plugin](http://wordpress.org/plugins/sponsors-carousel/)
- [x] Menu -> [see](http://localhost/wp-admin/nav-menus.php) and [here](http://codex.wordpress.org/Function_Reference/wp_nav_menu) - will need to target active classes in css
- [ ] Directors dropdown and page?
- [ ] Assets -> wp-uploads folders needs to be cleared out and left with required assets only


## Go Live

- [ ] Backup current live, ready for restore (test restore, ie make a slight change and then restore to test overwrite)
- [ ] Reconfigure Widget structure/settings to match local - Sidebar
- [ ] About, Contact and Service page content
- [ ] Menu structure
- [ ] Copy theme files to live (create/activate new theme - sm_custom_v2)