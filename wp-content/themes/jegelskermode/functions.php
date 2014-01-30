<?php
	
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	External files
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	require_once( 'res/addons/custom-navigation.php' );
	require_once( 'res/addons/canonical-change.php' );
	require_once( 'res/addons/cache-images.php' );
	require_once( 'res/addons/AddExtraFieldsUserProfile.php' );

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Theme specific settings
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 600, 403 );
	}	
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'related-thumb', 120, 81, true); //(cropped)
		add_image_size( 'gallery', 600, 403);
		add_image_size( 'sidebar', 280, 240);
	}	
	
	add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  
	function custom_image_sizes_choose( $sizes ) {  
	    $custom_sizes = array(  
		   'gallery' => 'Gallery Image'  
	    );  
	    return array_merge( $sizes, $custom_sizes );  
	} 
	
	// Avatar
	define( 'USER_AVATAR_FULL_WIDTH', 280 );
	define( 'USER_AVATAR_FULL_HEIGHT', 280 );
	
	
	// Register menus
	function register_my_menus() {
	  register_nav_menus(
	    array( 'main-menu' => __( 'Navigation' ) )
	  );
	}
	
	// Sidebar
	if ( function_exists('register_sidebar') )	register_sidebar();	
	
	function custom_excerpt_length( $length ) {
		global $post;
		if ($post->post_type == 'post')
			return 100;
		else if ($post->post_type == 'ekstern')
			return 100;
		else return 100;
	}
	
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	// Removes wordpress html caption from admin panel.  
	function caption_off() {
		return true;
	}
	
	add_filter( 'disable_captions', 'caption_off' );	
	
	
	// Read more '...'
	function new_excerpt_more( $more ) {
		
		return '...';
	}
	
	add_filter('excerpt_more', 'new_excerpt_more');
	
	
	function remove_category_list_rel( $output ) {
	    // Remove rel attribute from the category list
	    return str_replace( ' rel="category tag"', '', $output );
	}

	add_filter( 'wp_list_categories', 'remove_category_list_rel' );
	add_filter( 'the_category', 'remove_category_list_rel' );		
	
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Actions and Filters 
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/		
	
	// Actions:
	add_action( 'wp_enqueue_scripts', 'add_scripts' );
	add_action( 'init', 'register_my_menus' );
	
	// Filters: 
	//add_filter( 'wp_nav_menu_items', 'add_dynamic_categories', 998, 2 ); // Custom-navigation.php
	add_filter( 'wp_nav_menu_items', 'add_searchblog', 997, 2 ); // Custom-navigation.php


	
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Scripts - Add scripts to wordpress
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	function add_scripts() {
		
		wp_register_script('jquery', includes_url() .'js/jquery/jquery.js', false, '1.8.2', false);
		wp_enqueue_script('jquery');
		
		wp_register_script( 'placeholderscript', get_template_directory_uri().'/res/js/jquery.placeholder.min.js', false, '1', true );
		wp_enqueue_script( 'placeholderscript' );
		
		wp_register_script( 'columnizer', get_template_directory_uri().'/res/js/jquery.columnizer.js', false, '1', false );
		wp_enqueue_script( 'columnizer' );				
		
		wp_register_script( 'customScript', get_template_directory_uri().'/res/js/script.js', false, '1', true );
		wp_enqueue_script( 'customScript' );
		
		wp_register_script( 'bootstrapJs', get_template_directory_uri().'/res/frameworks/bs/js/bootstrap.min.js', array( 'customScript'), '1', true );
		wp_enqueue_script( 'bootstrapJs' );
		
		// Add theme stylesheet
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
		
		wp_register_style( 'gallery', get_stylesheet_directory_uri().'/res/frameworks/galleria/galleria.classic.css', '', '', 'screen' );
		wp_enqueue_style( 'gallery' );		
		
	}
	
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Hooks - Custom stuff
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	

	// Create custom posttype that holds the syndicated posts.	
	add_action( 'init', 'create_syndicated_post_type' );

	function create_syndicated_post_type() {
		register_post_type( 'ekstern', 
			array(
				'labels' => array(
					'name' => __( 'Eksterne blogs' ),
					'singular_name' => __( 'ekstern' )
				),
 			     'taxonomies' => array('category', 'post_tag'),
				'public' => true,
				'show_ui' => true,
				'supports' => array('excerpt', 'thumbnail', 'editor', 'title'),
				//'has_archive' => true,
				 'query_var' => true
			)
		);
	}
// // force exceptions
// set_error_handler(function($severity, $message, $filename, $lineno) {
//     //throw new ErrorException($message, 0, $severity, $filename, $lineno);
// });

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	Custom metaboxes
	------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/		
	include_once 'metaboxes/setup.php';
	include_once 'metaboxes/gallery-spec.php';
	
	/* Feed */
	
	class filter_content_before 
	{
	
	function __construct() {
		$this->init();
	}
	
	function init() {
		add_action( 'syndicated_post', array( &$this, 'strip' ), 8, 1 );
	}
	
	function strip( $post ) {
		
		// Get content
		$content = $post['post_content'];

		// Remove a tag around images
		//$content = preg_replace('%(<a.*>)+.*(<(img .*)>)+(</a>)+%i', '$2', $content);
		$content = preg_replace('%(<a [^>]*>)([^<]*(<img[^>]*>[^<]*)+)(</a>)%i', '$2', $content);
		
		$content = preg_replace("%<img[^>]+src\s*=\s*['\"][^'\"]*/([^'\"]*)['\"][^>]+alt\s*=\s*['\"]([^'\"]*)['\"][^>]+class\s*=\s*['\"][^'\"]*wp-smiley[^'\"]*['\"][^>]*>%",  "<img src='".includes_url()."images/smilies/$1' alt='$2' class='wp-smiley'>", $content);
		
		// remove when border="0" width="1" height="1" are together
		$content = preg_replace("%(<img[^>]+(border\s*=\s*['\"]0['\"]).+(width\s*=\s*['\"]1['\"]).+(height\s*=\s*['\"]1['\"])[^>]*>)%", "", $content);
		
		$post['post_content'] = $content;
		
		return $post;	
		
	}	
}	
$filter_content_before = new filter_content_before;

set_time_limit( 300 );

add_action( 'save_post', 'get_attached_post_images', 12, 1 );
	function get_attached_post_images($post_ID) {
		// Run only if posttype is ekstern!
		if(get_post_type( $post_ID ) == 'ekstern'){
			$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_mime_type' => 'image',
				'post_parent' => $post_ID
			); 

			$attachments = get_posts($args);
			loop_current_post_for_attachments($attachments, $post_ID);
		}
	}	
	
	function loop_current_post_for_attachments($attachments, $post_ID) {
		if ($attachments) {
			
			for ($i = 0; $i <= count($attachments); $i++ ){
				
				$current_attach_id = $attachments[$i]->ID;
				
				// Make check to see if image is OK for features
				$s_image = wp_get_attachment_image_src( $current_attach_id, 'full' ); // Get array with data on current image-attachment

				//$image_src = $s_image[0]; // Get the src
				$attach_id = $attachments[$i]->ID;
				$image_width = $s_image[1]; // Get width
				$image_height = $s_image[2]; // Get heght
				
				if(check_size_and_pick_suitable_featured_image($image_width, $image_height, $attach_id, $post_ID)){
					break; // Break if got what wanted
				}
				
			}			
			
		}
		
	}	
	
	function check_size_and_pick_suitable_featured_image($image_width, $image_height, $attach_id, $post_ID){
		if ($image_width >= 100 && $image_height >= 150) { // Check image size

			if(to_featured($attach_id, $post_ID)){
				return true;
			}
		}
		
	}
	
	function to_featured($attach_id, $post_ID) {

		if (isset($attach_id )){
			update_post_meta($post_ID, '_thumbnail_id', $attach_id);
		}
	}

function any_ptype_on_cate($request) {
	if ( isset($request['cat']) )
		$request['post_type'] = 'any';

	return $request;
}
add_filter('request', 'any_ptype_on_cate');	

function any_ptype_on_tag($request) {
	if ( isset($request['tag']) )
		$request['post_type'] = 'any';

	return $request;
}
add_filter('request', 'any_ptype_on_tag');	

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}