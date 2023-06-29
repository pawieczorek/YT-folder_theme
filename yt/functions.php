<?php



if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


define( 'TAXONOMY_T', 'folders' );
define( 'MAIN_FOLDER_TERM_ID_T', get_option( 'MAIN_FOLDER_TERM_ID' ) );
define( 'ADMIN_ID', '1' );


function YTfolders_setup() {

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'YTfolders_setup' );


function YTfolders_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'YTfolders_content_width', 640 );
}
add_action( 'after_setup_theme', 'YTfolders_content_width', 0 );


function YTfolders_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'YTfolders' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'YTfolders' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'YTfolders_widgets_init' );

function YTfolders_scripts() {

	//from WP-includes 
	wp_enqueue_script('jquery');
	
	wp_enqueue_style( 'YTfolders-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );

	wp_enqueue_style( 'YTfolders-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_register_script( 'YTfolders-popper-js', 'https://unpkg.com/@popperjs/core@2' );

	wp_enqueue_script( 'YTfolders-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js' );

	wp_enqueue_script( 'YTfolders-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'YTfolders_scripts' );

/**
 * current user root folder 
 */
require get_template_directory() . '/inc/rootfolder.php';


add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'posts_where', 'YTfolders_posts_where', 10, 2 );

function YTfolders_posts_where( $where, $wp_query ) {
		global $wpdb;
	if ( $title = $wp_query->get( 'search_title' ) ) {
		$where .= ' AND ' . $wpdb->posts . ".post_title LIKE '%" . esc_sql( $wpdb->esc_like( $title ) ) . "%'";
	}
		return $where;
}





function debug_file( $nazwa, $var ) {

	// w głownym folderze plugin -->
	// define("PLUGIN_DIR", plugin_dir_path( __FILE__ ));

	$myfile = file_put_contents( get_theme_root( 'YTfolders' ) . '/YT/logs.txt', print_r( $nazwa, true ) . ': ' . print_r( $var, true ) . "\n\n", FILE_APPEND | LOCK_EX );
}
