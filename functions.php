<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '_s' ),
            'menu-2' => esc_html__( 'Footer', '_s' ),
            'menu-3' => esc_html__( 'Footer-1', '_s' ),
            'menu-4' => esc_html__( 'Footer-2', '_s' ),
            'menu-5' => esc_html__( 'Footer-image', '_s' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'underscore', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name' => esc_html__( 'clement', '_s' ),
        'id' => 'bill',
        'before_widget' => '<div class="nwa-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="nwa-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'bob', '_s' ),
        'id' => 'bob',
        'before_widget' => '<div class="nwa-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="nwa-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'joe', '_s' ),
        'id' => 'joe',
        'before_widget' => '<div class="nwa-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="nwa-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'slider', '_s' ),
        'id' => 'slider',
        'before_widget' => '<div class="nwa-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="nwa-title">',
        'after_title' => '</h2>',
    ) );

}
add_action( 'widgets_init', '_s_widgets_init' );

/*
function header_widgets_init() {

    register_sidebar( array(

        'name' => 'Ma nouvelle zone de widget',
        'id' => 'new-widget-area',
        'before_widget' => '<div class="nwa-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="nwa-title">',
        'after_title' => '</h2>',
    ) );
}*/

/*add_action( 'widgets_init', 'header_widgets_init' );*/

  
/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

    wp_enqueue_style( '_menu-reserviste', get_template_directory_uri().'/custom-styles/menu-reserviste.css');

    wp_register_style('style-typo', get_template_directory_uri() . '/custom-styles/style-typo.css', array(), '1.0', 'all');
    wp_enqueue_style('style-typo');

    wp_register_style('animation', get_template_directory_uri() . '/custom-styles/animation.css', array(), '1.0', 'all');
    wp_enqueue_style('animation');

    wp_register_style('evenement-reserviste', get_template_directory_uri() . '/custom-styles/evenement-reserviste.css', array(), '1.0', 'all');
    wp_enqueue_style('evenement-reserviste');

    wp_register_style('style-reserviste', get_template_directory_uri() . '/custom-styles/style-reserviste.css', array(), '1.0', 'all');
    wp_enqueue_style('style-reserviste');

    wp_register_style('home', get_template_directory_uri() . '/custom-styles/home.css', array(), '1.0', 'all');
	wp_enqueue_style('home');

    wp_register_style('liste-articles', get_template_directory_uri() . '/custom-styles/liste-articles.css', array(), '1.0', 'all');
    wp_enqueue_style('liste-articles');

    wp_register_style('article', get_template_directory_uri() . '/custom-styles/article.css', array(), '1.0', 'all');
    wp_enqueue_style('article');

    wp_register_style('galerie', get_template_directory_uri() . '/custom-styles/galerie.css', array(), '1.0', 'all');
    wp_enqueue_style('galerie');

    wp_register_style('calendrier', get_template_directory_uri() . '/custom-styles/calendrier.css', array(), '1.0', 'all');
    wp_enqueue_style('calendrier');

    wp_register_style('histoire', get_template_directory_uri() . '/custom-styles/histoire.css', array(), '1.0', 'all');
    wp_enqueue_style('histoire');

    wp_register_style('dessins', get_template_directory_uri() . '/custom-styles/dessins.css', array(), '1.0', 'all');
    wp_enqueue_style('dessins');

    wp_register_style('footer-reserviste', get_template_directory_uri() . '/custom-styles/footer-reserviste.css', array(), '1.0', 'all');
    wp_enqueue_style('footer-reserviste');

    wp_register_style('credits', get_template_directory_uri() . '/custom-styles/credit.css', array(), '1.0', 'all');
    wp_enqueue_style('credits');

    wp_register_style('sengager', get_template_directory_uri() . '/custom-styles/sengager.css', array(), '1.0', 'all');
    wp_enqueue_style('sengager');

    /*Les scripts*/

    wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'menu-burger', get_template_directory_uri() . '/js/menu-burger.js', array(), '20151215', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );






/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* Test de widget footer */
function widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
    register_sidebar( array(
        'name' => $name,
        'id' => $id,
        'description' => $description,
        'before_widget' => $beforeWidget,
        'after_widget' => $afterWidget,
        'before_title' => $beforeTitle,
        'after_title' => $afterTitle,
    ));
}

function multiple_widget_init(){
    widget_registration('Footer widget 1', 'footer-sidebar-1', 'test-1', '', '', '', '');
    //widget_registration('Footer widget 2', 'footer-sidebar-2', 'test-2', '', '', '', '');
    // ETC...
}

add_action('widgets_init', 'multiple_widget_init');