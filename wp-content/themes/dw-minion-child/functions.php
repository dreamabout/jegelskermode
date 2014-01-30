<?php
function jem_logo() {
    $logo = dw_minion_get_theme_option( 'logo' );
    if($logo) {
        echo '<img alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="'.$logo.'" />';
    } else {
        echo get_bloginfo( 'name', 'display' ); 
    }
}
function jem_header_nav()
{
    ?>
    <div id="site-title" class="hidden-desktop">
        <?php jem_logo(); ?>
    </div>
    <?php
    wp_nav_menu( array( 
        'theme_location' => 'header-menu' , 
        'container' => 'nav', 
        'container_class' => 'nav ',
        'container_id' => 'main-menu',
        'walker'          =>      new wp_bootstrap_navwalker(),
        ) 
    ); 
}
function jem_remove_bootstrap_js()
{
    wp_dequeue_script('bootstrap-transition');
    wp_dequeue_script('bootstrap-carousel');
    wp_dequeue_script('bootstrap-tabs');
    wp_dequeue_script('bootstrap-collapse');
}

add_action('after_navigation', 'jem_header_nav');
function jem_new_excerpt_more($output) {
    $replace = '<a class="read-more btn pull-right btn-small" href="'. get_permalink( get_the_ID() ) . '">' . __("Læs mere") . '</a>';
    return $output . $replace; 
}
add_filter( 'the_excerpt', 'jem_new_excerpt_more' );
add_filter( 'excerpt_more', 
    function() { return ""; } );
add_filter( 'excerpt_length', function() {
    if(get_post_type() === 'external_post') {
        return 30;
    }
    return 60;
}, 1024);
function register_jem_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
function jem_add_external_blogger_role() {
    remove_role("external_blogger");
    $result = add_role(
        'external_blogger',
        'Ekstern Blogger',
        array(
            'read'         => true,  // True allows this capability
            'edit_posts'   => true,
            'delete_posts' => false, // Use false to explicitly deny
        )
    );


}
add_action( 'init', 'register_jem_header_menu' );
add_action( 'init', "jem_add_external_blogger_role");
add_theme_support('menus');
function jem_custom_post_type() {
    $labels = array(
        'name'               => _x( 'External blogpost', 'post type general name' ),
        'singular_name'      => _x( 'External post', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'external blog entry' ),
        'add_new_item'       => __( 'Add New exerternal blog post' ),
        'edit_item'          => __( 'Edit Extenal post' ),
        'new_item'           => __( 'New External Post' ),
        'all_items'          => __( 'All External Posts' ),
        'view_item'          => __( 'View External Post' ),
        'search_items'       => __( 'Search External Posts' ),
        'not_found'          => __( 'No external posts found' ),
        'not_found_in_trash' => __( 'No external posts found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'External Posts'
    );
    $args = array(
        'labels'           => $labels,
        'description'      => 'Holds our products and product specific data',
        'public'           => true,
        'menu_position'    => 5,
        'supports'         => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'      => false,
        'public_queryable' => true,
        'query_var'        => true,
        'rewrite'          => false,
    );
    register_post_type( 'external_post', $args );

    global $wp_rewrite;
    $post_structure = '/external/%author%/%external_post%';
    $wp_rewrite->add_rewrite_tag("%external_post%", '([^/]+)', "external_post=");
    $wp_rewrite->add_permastruct('external_post', $post_structure, false);
    flush_rewrite_rules(true);
}

add_action( 'init', 'jem_custom_post_type' );

if ( !defined('SAVEQUERIES')) {
    define('SAVEQUERIES', true);
}

// Add filter to plugin init function
add_filter('post_type_link', 'external_permalink', 10, 3);   
// Adapted from get_permalink function in wp-includes/link-template.php
function external_permalink($permalink, $post_id, $leavename) {
    $post = get_post($post_id);
 
    if ('' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft'))) {
        $author = '';
        if ( strpos($permalink, '%author%') !== false ) {
            $authordata = get_userdata($post->post_author);
            $author = $authordata->user_nicename;
        }
        $replace = array(
            "%author%"        => $author,
            "%external_post%" => $post->post_name,
        );
        
        $permalink = strtr($permalink, $replace);
    }
    return $permalink;
}



function jem_add_javascripts()
{
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', false, null, false);
    wp_enqueue_style( 'bootstrap-dropdown', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(), '20130716' );
    
}

add_action( 'wp_enqueue_scripts', 'jem_add_javascripts' );
add_action( 'wp_enqueue_scripts', 'jem_remove_bootstrap_js', 1024);


function custom_post_author_archive($query) {
    if ($query->is_author) {
        $query->set( 'post_type', array('external_post', 'post') );
    }
    remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}
add_action('pre_get_posts', 'custom_post_author_archive');

require (get_stylesheet_directory() . '/incs/wp_bootstrap_navwalker.php');
require (get_stylesheet_directory() . '/incs/template-tags.php');
require (get_stylesheet_directory() . '/incs/extras.php');