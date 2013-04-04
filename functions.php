<?php
	
	// * Add RSS links to <head> section *
	
	add_theme_support( 'automatic-feed-links' );
	
	// * Load jQuery *

	function load_google_scripts() {	
		if ( !is_admin() ) {
		   wp_deregister_script('jquery');
		   wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');  
		   wp_enqueue_script('jquery');
		}
	}
	add_action('wp_enqueue_scripts', 'load_google_scripts');
	
	// * Clean up the <head> *
	
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// * Register sidebar *
	
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
    // * Add support for WP menus * 
 
	function register_custom_menu() {
			register_nav_menu('custom_menu', __('Custom Menu'));
	}
	add_action('init', 'register_custom_menu');
	
	// * Allow blog home page to appear in nav menu *
	
	function custom_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'custom_menu_args' );
    
    // * Add theme support for addable WP features, remove as required *
    
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    
    // * Set max content width *
    
    if ( ! isset( $content_width ) ) $content_width = 640;
    
	//* Custom comment display *
	
	function format_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		 	<div id="comment-<?php comment_ID(); ?>">
		  		<div class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 48 ); ?>
				<div class="comment-meta commentmetadata">On <?php printf(__('%1$s'), get_comment_date(),  get_comment_time()) ?>&nbsp;<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">#</a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
			 	<p><?php printf(__('<cite class="fn">%s</cite> <span class="says">said:</span>'), get_comment_author_link()) ?></p> 
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				 <em><?php _e('Your comment is awaiting moderation.') ?></em>
				 <br />
			<?php endif; ?>
	
		  <?php comment_text() ?>
	
				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply &rarr;', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
	<?php }

?>