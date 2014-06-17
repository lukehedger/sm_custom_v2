<?php

// WordPress Post Thumbnail Support
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('featured', 718, 375, true);
    add_image_size('category', 80, 80, true);
    add_image_size('custom', 372, 174, true);
}

// Set compression quality for generated images to 100%
function jpeg_quality_callback($arg) { 
	return (int)100;
}
add_filter('jpeg_quality', 'jpeg_quality_callback');	


// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );


// Register 1 sidebar called 'primary-widget-area' with <h1> and </h1> before and after the title. See codex for more parameters
	register_sidebars(1,array('name'=>'primary-widget-area','before_title'=>'<h1>','after_title'=>'</h1>'));
	

// Register additional menu location to the right of current Menu Items
	function register_my_menus() {
		register_nav_menus(
			array( 'nav_menu_right' => __( 'Navigation Menu (right)' ) )
	  	);
	}
add_action( 'init', 'register_my_menus' );


// Adjust the excerpt length
	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Meta Box: Client fields
	//Add the meta box
	add_action( 'add_meta_boxes', 'client_meta_box_add' );  
	function client_meta_box_add()  
		{  
			add_meta_box( 'client-meta-box', 'Client Information', 'client_meta_box_cb', 'post', 'normal', 'default' );  
		}   
	// Render the meta box
	function client_meta_box_cb()  
		{  
			// $post is already set, and contains an object: the WordPress post 
			global $post;  
			// get various current values for each field (or set them to empty strings if their fields are empty) 
			$values = get_post_custom( $post->ID ); 
			$client_name = isset( $values['client_name'] ) ? esc_attr( $values['client_name'][0] ) : ''; 
			$client_url = isset( $values['client_url'] ) ? esc_attr( $values['client_url'][0] ) : ''; 
			
			// Nonce Field
			wp_nonce_field( 'client_meta_box_nonce', 'meta_box_nonce_1' ); 
			?>  			 
			<p>
				<label for="client_name">Client Name:</label>  
			    <input type="text" size="62" name="client_name" id="client_name" value="<?php echo $client_name; ?>" />      
			</p>
			<p>
				<label for="client_url">Client URL:</label>  
			    <input type="text" size="63" name="client_url" id="client_url" value="<?php echo $client_url; ?>" /> 
			</p>
			<p>
				Please ensure that Client URL includes <strong>http://</strong> (for example, http://www.site.com)
			</p>	
			<?php  
		} 
		
	// Save the data in the meta box fields
	add_action( 'save_post', 'client_meta_box_save' );  
	function client_meta_box_save( $post_id )  
	{  
		// Checks...
		// Bail if we're doing an auto save  
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 	 
		// if our nonce isn't there, or we can't verify it, bail 
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_1'], 'client_meta_box_nonce' ) ) return; 
		// if our current user can't edit this post, bail  
		if( !current_user_can( 'edit_post' ) ) return;  
		
		// Now save the data...
		// Make sure your data is set before trying to save it  
		if( isset( $_POST['client_name'] ) )  
			update_post_meta( $post_id, 'client_name', esc_attr( $_POST['client_name'] ) );  
	  
		if( isset( $_POST['client_url'] ) )  
			update_post_meta( $post_id, 'client_url', esc_attr( $_POST['client_url'] ) );
	}  

	
// Meta Box: Date Visibility
	//Add the meta box
	add_action( 'add_meta_boxes', 'date_vis_meta_box_add' );  
	function date_vis_meta_box_add()  
		{  
			add_meta_box( 'date-vis-meta-box', 'Date Visibility', 'date_vis_meta_box_cb', 'post', 'normal', 'default' );  
		}   
	// Render the meta box
	function date_vis_meta_box_cb()  
		{  
			// $post is already set, and contains an object: the WordPress post 
			global $post;  
			// get various current values for each field (or set them to empty strings if their fields are empty) 
			$values = get_post_custom( $post->ID ); 
			$show_date = isset( $values['show_date'] ) ? esc_attr( $values['show_date'][0] ) : ''; 
			
			// Nonce Field
			wp_nonce_field( 'date_vis_meta_box_nonce', 'meta_box_nonce' ); 
			?>  			 
			<p> 
				<input type="checkbox" id="show_date" name="show_date" <?php checked( $show_date, 'on' ); ?> />  
				<label for="show_date">Display Post Date On Video Page?</label> 
			</p>
			<?php  
		} 
		
	// Save the data in the meta box fields
	add_action( 'save_post', 'date_vis_meta_box_save' );  
	function date_vis_meta_box_save( $post_id )  
	{  
		// Checks...
		// Bail if we're doing an auto save  
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 	 
		// if our nonce isn't there, or we can't verify it, bail 
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'date_vis_meta_box_nonce' ) ) return; 
		// if our current user can't edit this post, bail  
		if( !current_user_can( 'edit_post' ) ) return;  
		
		// Now save the data...
		// Make sure your data is set before trying to save it  
		$chk = ( isset( $_POST['show_date'] ) && $_POST['show_date'] ) ? 'on' : 'off';
		update_post_meta( $post_id, 'show_date', $chk );	
	}  	
	
// Meta Box: Bold Excerpt
	//Add the meta box
	add_action( 'add_meta_boxes', 'bold_ex_meta_box_add' );  
	function bold_ex_meta_box_add()  
		{  
			add_meta_box( 'bold-ex-meta-box', 'Bold Excerpt', 'bold_ex_meta_box_cb', 'page', 'normal', 'default' );  
		}   
	// Render the meta box
	function bold_ex_meta_box_cb()  
		{  
			// $post is already set, and contains an object: the WordPress post 
			global $post;  
			// get various current values for each field (or set them to empty strings if their fields are empty) 
			$values = get_post_custom( $post->ID ); 
			$bold_ex = isset( $values['bold_ex'] ) ? esc_attr( $values['bold_ex'][0] ) : ''; 
			
			// Nonce Field
			wp_nonce_field( 'bold_ex_meta_box_nonce', 'meta_box_nonce' ); 
			?>  			 
			<p>
				<textarea id="bold_ex" tabindex="103" rows="4" name="bold_ex" style="width: 100%; margin:5px 2px 0 0;"><?php echo $bold_ex; ?></textarea>
			</p>
			<?php  
		} 
		
	// Save the data in the meta box fields
	add_action( 'save_post', 'bold_ex_meta_box_save' );  
	function bold_ex_meta_box_save( $post_id )  
	{  
		// Checks...
		// Bail if we're doing an auto save  
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 	 
		// if our nonce isn't there, or we can't verify it, bail 
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'bold_ex_meta_box_nonce' ) ) return; 
		// if our current user can't edit this post, bail  
		if( !current_user_can( 'edit_post' ) ) return;  
		
		// Now save the data...
		// Make sure your data is set before trying to save it  
		if( isset( $_POST['bold_ex'] ) )  
			update_post_meta( $post_id, 'bold_ex', esc_attr( $_POST['bold_ex'] ) );	
	}  		


// Create a modified version of get_the_content() but one that includes formatting ...for the about page column split
	function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
		$content = get_the_content($more_link_text, $stripteaser, $more_file);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	// Pagination function
	if ( ! function_exists( 'pagination' ) ) :
	function pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'prev_text' => 'previous',
			'next_text' => 'next'
		) );
	}
	endif;

?>