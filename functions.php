<?php
/**
 * Theme Functions
** ---------------------------- */

/* Load text string used in theme */
require_once( trailingslashit( get_template_directory() ) . 'includes/string.php' );

/* Load base theme functionality. */
require_once( trailingslashit( get_template_directory() ) . 'includes/tamatebako.php' );

/* Load theme general setup */
add_action( 'after_setup_theme', 'cara_setup' );

/**
 * General Setup
 * @since 0.1.0
 */
function cara_setup(){

	/* === DEBUG === */
	$debug_args = array(
		'mobile'         => 0,
		'no-js'          => 0,
		'media-queries'  => 1,
	);
	//add_theme_support( 'tamatebako-debug', $debug_args );

	/* === Post Formats === */
	$post_formats_args = array(
		'aside',
		'audio',
		//'gallery',
		//'link',
		//'quote',
		//'status',
		//'video',
		//'chat'
	);
	add_theme_support( 'post-formats', $post_formats_args );

	/* === Theme Layouts === */
	$layouts = array(
		'content' => 'Content', /* Archive */
	);
	$layouts_args = array(
		'default'   => 'content',
		'customize' => false,
		'post_meta' => false,
	);
	add_theme_support( 'theme-layouts', $layouts, $layouts_args );

	/* === Register Sidebars === */
	$sidebars_args = array(
		"primary" => array( "name" => cara_string( 'sidebar-primary-name' ), "description" => "" ),
	);
	add_theme_support( 'tamatebako-sidebars', $sidebars_args );

	/* Sidebar Args */
	add_filter( "hybrid_sidebar_args", "cara_sidebar_args" );

	/* === Register Menus === */
	$menus_args = array(
		"primary" => cara_string( 'menu-primary-name' ),
	);
	add_theme_support( 'tamatebako-menus', $menus_args );

	/* === Load Stylesheet === */
	$style_args = array(
		'open-sans',
		'theme-merriweather-font',
		'dashicons',
		'theme-reset',
		'theme-menus',
		'parent',
		'style',
		'media-queries'
	);
	add_theme_support( 'hybrid-core-styles', $style_args );

	/* === Editor Style === */
	$editor_css = array(
		'css/reset.min.css',
		'style.css',
		tamatebako_google_merriweather_font_url()
	);
	add_editor_style( $editor_css );

	/* === Customizer Mobile View === */
	add_theme_support( 'tamatebako-customize-mobile-view' );

	/* === Custom Background === */
	//add_theme_support( 'custom-background', array( 'default-color' => 'e6e6e6' ) );

	/* === Custom Header === */

	/* === Set Content Width === */
	hybrid_set_content_width( 1200 );


	/* === Context === */
	add_filter( 'body_class', 'cara_body_class' );

	/* === Scripts === */
	add_action( 'wp_enqueue_scripts', 'cara_enqueue_scripts' );

	/* === Image Size === */
	//add_action( 'init', 'cara_register_image_sizes' );
}

/**
 * Sidebar Args
 * @since 0.1.0
 */
function cara_sidebar_args( $args ){
	$args['before_widget'] = '<section id="%1$s" class="widget %2$s"><div class="wrap">';
	$args['after_widget'] = '</div></section>';
	return $args;
}

/**
 * Additional Body Class
 * @since 0.1.0
 */
function cara_body_class( $classes ){

	/* Masonry 3 Column */
	$new_classes = apply_filters( 'cara_body_class', array( 'col-active', 'col-3', 'col-masonry' ) );

	/* Only in archive type pages */
	if ( is_home() || is_archive() || is_search() ){
		foreach( $new_classes as $new_class ){
			$classes[] = $new_class;
		}
	}
	$classes = array_unique( $classes );
	return $classes;
}

/**
 * Enqueue Scripts
 * @since 0.1.0
 */
function cara_enqueue_scripts(){

	if( !is_singular() ){
		wp_enqueue_script('masonry');
		wp_enqueue_style('masonry');
		wp_enqueue_script('theme-imagesloaded');
		wp_enqueue_script('theme-webfontloader');
	}
}


/* === TEMPLATE FUNCTIONS === */

/**
 * Sidebar Toggle Open
 * Located in menu/primary.php
 * @since 0.1.0
 */
function cara_sidebar_toggle_open(){
?>
<a id="sidebar-toggle-open" title="<?php echo esc_attr( cara_string( 'sidebar-toggle-open' ) ); ?>" href="#sidebar-primary-wrap"><span class="screen-reader-text"><?php echo cara_string( 'sidebar-toggle-open' ); ?></span></a>
<?php
}

/**
 * Sidebar Toggle Close
 * Located in sidebar/primary.php
 * @since 0.1.0
 */
function cara_sidebar_toggle_close(){
?>
<a id="sidebar-toggle-close" title="<?php echo esc_attr( cara_string( 'sidebar-toggle-close' ) ); ?>" href="#sidebar-toggle-close"><span class="screen-reader-text"><?php echo cara_string( 'sidebar-toggle-close' ); ?></span></a>
<?php
}

/**
 * Register Image Sizes
 * @since 0.1.0
 * 
 */
function cara_register_image_sizes(){

	/* Adds image size. */
	add_image_size( 'theme-thumbnail', 300, 200, true );
}


do_action( 'cara_after_theme_setup' );