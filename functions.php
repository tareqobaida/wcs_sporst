<?php

/**
 * Enqueue scripts and styles
 */
function add_scripts() {
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	// load bootstrap css
	wp_enqueue_style( 'css-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css' );
	
	// load bootstrap js
	wp_enqueue_script('js-bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery') );
	// load font awesome
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

}
add_action( 'wp_enqueue_scripts', 'add_scripts' );

   function theme_setup() {


    if ( function_exists( 'add_theme_support' ) ) {


		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
              /**
		 * Enable menus
		*/
               add_theme_support('menus');
               /**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		//will add post to <div class="post" id="content-post"> infinitely, 
		//powered by jetpack http://jetpack.me/support/infinite-scroll/
		add_theme_support( 'infinite-scroll', array(
				'container' => 'content-post',
				'footer' => 'footer',
		) );

    }
    if ( function_exists('register_sidebar') ) {
    	register_sidebar(array(
    			'name' => 'Sidebar-Right',
    			'id' => 'sidebar-right',
    			'description' => 'Appears as the sidebar on the posts',
    			'before_widget' => '<div>',
    			'after_widget' => '</div>',
    			'before_title' => '<h4 class="widget-title bg-primary">',
    			'after_title' => '</h4>',
    	));
    }
	if ( function_exists('register_sidebar') ) {
    	register_sidebar(array(
    			'name' => 'Sidebar-Home',
    			'id' => 'sidebar-home',
    			'description' => 'Appears as the sidebar on home. show scores',
    			'before_widget' => '<div class="panel panel-primary">',
    			'after_widget' => '</div>',
    			'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
    			'after_title' => '</h3></div>',
    	));
    }
	


}

add_action( 'after_setup_theme', 'theme_setup' );
require get_template_directory() . '/includes/resources/bootstrap-wp-navwalker.php';
// Filter wp_nav_menu() to add additional links and other output
function new_nav_menu_items($items) {
	$homelink = '<li class="home"><a href="' . home_url( '/' ) . '"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> &nbsp Home</a></li>';
	$items = $homelink . $items;
	return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<br><a href="'. get_permalink($post->ID) . '"><span class="label label-primary">Read more...</span></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//style the comment form with bootstrap
//idea from here.  http://www.codecheese.com/2013/11/wordpress-comment-form-with-twitter-bootstrap-3-supports/
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

	$fields   =  array(
			'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' required /></div>',
			'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' required /></div>',
			'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
			'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
	);

	return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
                <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
                <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
            </div>';
	$args['class_submit'] = 'btn btn-default'; // since WP 4.1

	return $args;
}
?>
