<?php
/**
 * Rebo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rebo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'rebo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rebo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Rebo, use a find and replace
		 * to change 'rebo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rebo', get_template_directory() . '/languages' );

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
		//Default WordPress
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rebo' ),
				'mobile' => esc_html__( 'Mobile', 'rebo' ),
				'footer' => esc_html__( 'Footer', 'rebo' ),

			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'rebo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'rebo_setup' );
/*----------------------------------------*/

function count_post_visits() {
	if( is_single() ) {
		global $post;
		$views = get_post_meta( $post->ID, 'my_post_viewed', true );
		if( $views == '' ) {
			update_post_meta( $post->ID, 'my_post_viewed', '1' );	
		} else {
			$views_no = intval( $views );
			update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
		}
	}
}
add_action( 'wp_head', 'count_post_visits' );
/*  Post Title Pendek
/*----------------------------------------*/
function brdcmb() {
    if (!is_home()) {
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';;
        echo "</a> » ";
        if (is_category() || is_single()) {
            the_category(",");
            if (is_single()) {
                echo " » ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
}

add_filter( 'the_content', 'ilc_share' );

function rebo_menu()
{
 // code Menu
	add_menu_page( 'Rebo Theme General', 'Rebo', 'manage_options', 'rebo', 'rebo_ads', 'dashicons-admin-site-alt3');
	add_submenu_page( 'rebo', 'Rebo Ads', 'Ads', 'manage_options', 'rebo_ads', 'rebo_ads', null );

}

function rebo_ads()
{
	# code ads
	echo '<h2>Rebo Ads Menu </h2></p>' ;
	if ($_POST['adshome']!= '') {
		# code...
		update_post( 'adshome', $_POST['adshome'], $autoload = null );
		update_post( 'adssloth', $_POST['adssloth'], $autoload = null );
		echo 'Update Success'; 
	}
	echo '<form action="" method="post">
	Home <input type="text" name="adshome" placeholder="ca-pub-..." ><input type="text" name="adssloth" placeholder="slot"><input type="submit" value="Update">
	
	</form></br>';

	if ($_POST['adsarticle']!= '') {
		# code...
		update_option( 'adsarticle', $_POST['adsarticle'], $autoload = null );
		update_option( 'adsslota', $_POST['adsslota'], $autoload = null );
		echo 'Update Success';
	}
	echo '<form action="" method="post">
	Article <input type="text" name="adsarticle" placeholder="ca-pub-..." ><input type="text" name="adsslota" placeholder="slot"><input type="submit" value="Update">
	
	</form>';
	
}

add_action('admin_menu', 'rebo_menu');
function rbads()
{
	# functions ads
	$showads= bloginfo('adsh');
	return $showads;
}

$ads='reboads';

add_shortcode( $ads, 'rbads' );


function ilc_share( $content ) {
    global $post;
    $postlink  = get_permalink($post->ID);
    $posttitle = get_the_title($post->ID);
    $html = '<ul class="share-entry">';
    // Twitter
    $html .= '<li><a class="share-twitter" title="Share on Twitter" rel="external" href="http://twitter.com/share?text='.$posttitle.'&url='.$postlink.'"><svg width="20px" height="20px" viewBox="0 0 20 20"> <path d="M20,3.8c-0.7,0.3-1.5,0.5-2.4,0.6c0.8-0.5,1.5-1.3,1.8-2.3c-0.8,0.5-1.7,0.8-2.6,1c-0.7-0.8-1.8-1.3-3-1.3c-2.3,0-4.1,1.8-4.1,4.1c0,0.3,0,0.6,0.1,0.9C6.4,6.7,3.4,5.1,1.4,2.6C1,3.2,0.8,3.9,0.8,4.7c0,1.4,0.7,2.7,1.8,3.4C2,8.1,1.4,7.9,0.8,7.6c0,0,0,0,0,0.1c0,2,1.4,3.6,3.3,4c-0.3,0.1-0.7,0.1-1.1,0.1c-0.3,0-0.5,0-0.8-0.1c0.5,1.6,2,2.8,3.8,2.8c-1.4,1.1-3.2,1.8-5.1,1.8c-0.3,0-0.7,0-1-0.1c1.8,1.2,4,1.8,6.3,1.8c7.5,0,11.7-6.3,11.7-11.7c0-0.2,0-0.4,0-0.5C18.8,5.3,19.4,4.6,20,3.8z"></path> </svg></a></li>';
    // Facebook
    $html .= '<li><a class="share-facebook" title="Share on Facebook" rel="external" href="http://www.facebook.com/share.php?u=' . $postlink . '"><svg width="20px" height="20px" viewBox="0 0 20 20"> <path d="M20,10.1c0-5.5-4.5-10-10-10S0,4.5,0,10.1c0,5,3.7,9.1,8.4,9.9v-7H5.9v-2.9h2.5V7.9C8.4,5.4,9.9,4,12.2,4c1.1,0,2.2,0.2,2.2,0.2v2.5h-1.3c-1.2,0-1.6,0.8-1.6,1.6v1.9h2.8L13.9,13h-2.3v7C16.3,19.2,20,15.1,20,10.1z"></path> </svg></a></li>';
    // LinkedIn
    $html .= '<li><a class="share-linkedin" title="Share on LinkedIn" rel="external" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $postlink . '&title=' . $posttitle . '"><svg width="20px" height="20px" viewBox="0 0 20 20"> <path d="M18.6,0H1.4C0.6,0,0,0.6,0,1.4v17.1C0,19.4,0.6,20,1.4,20h17.1c0.8,0,1.4-0.6,1.4-1.4V1.4C20,0.6,19.4,0,18.6,0z M6,17.1h-3V7.6h3L6,17.1L6,17.1zM4.6,6.3c-1,0-1.7-0.8-1.7-1.7s0.8-1.7,1.7-1.7c0.9,0,1.7,0.8,1.7,1.7C6.3,5.5,5.5,6.3,4.6,6.3z M17.2,17.1h-3v-4.6c0-1.1,0-2.5-1.5-2.5c-1.5,0-1.8,1.2-1.8,2.5v4.7h-3V7.6h2.8v1.3h0c0.4-0.8,1.4-1.5,2.8-1.5c3,0,3.6,2,3.6,4.5V17.1z"></path> </svg></a></li>';
    // Google+
    $html .= '<li><a class="share-pinters" title="Share on Pinterst" rel="external" href="https://pinterst.com/_/+1/confirm?url=' . $postlink . '"><svg width="20px" height="20px" viewBox="0 0 20 20"> <path d="M10,0C4.5,0,0,4.5,0,10c0,4.1,2.5,7.6,6,9.2c0-0.7,0-1.5,0.2-2.3c0.2-0.8,1.3-5.4,1.3-5.4s-0.3-0.6-0.3-1.6c0-1.5,0.9-2.6,1.9-2.6c0.9,0,1.3,0.7,1.3,1.5c0,0.9-0.6,2.3-0.9,3.5c-0.3,1.1,0.5,1.9,1.6,1.9c1.9,0,3.2-2.4,3.2-5.3c0-2.2-1.5-3.8-4.2-3.8c-3,0-4.9,2.3-4.9,4.8c0,0.9,0.3,1.5,0.7,2C6,12,6.1,12.1,6,12.4c0,0.2-0.2,0.6-0.2,0.8c-0.1,0.3-0.3,0.3-0.5,0.3c-1.4-0.6-2-2.1-2-3.8c0-2.8,2.4-6.2,7.1-6.2c3.8,0,6.3,2.8,6.3,5.7c0,3.9-2.2,6.9-5.4,6.9c-1.1,0-2.1-0.6-2.4-1.2c0,0-0.6,2.3-0.7,2.7c-0.2,0.8-0.6,1.5-1,2.1C8.1,19.9,9,20,10,20c5.5,0,10-4.5,10-10C20,4.5,15.5,0,10,0z"></path> </svg></a></li>';
    $html .= '</ul>';
    return $content . $html;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rebo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rebo_content_width', 640 );
}
add_action( 'after_setup_theme', 'rebo_content_width', 0 );


function rebo_id_pagination() {
    global $wp_query;
    $big = 999999999;
    $paged = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
	'prev_next'          => true,
	'prev_text'          => __('««'),
	'next_text'          => __('»»'),
	'type'               => 'flex',
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => '|',
        'total' => $wp_query->max_num_pages
    ));
// Replace style bawaan, sesuaikan dengan class  pada CSS Anda.
    $arr = array(
    "<ul class='page-numbers'>" => '<ul class="halaman">',
    '<li>' => '<li class="list-halaman">',
    "'" => '"'
    );
    echo strtr($paged, $arr);
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rebo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rebo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rebo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'ads', 'rebo' ),
			'id'            => 'ads',
			'description'   => esc_html__( 'Add widgets here.', 'rebo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rebo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rebo_scripts() {
	wp_enqueue_style( 'rebo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rebo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rebo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rebo_scripts' );

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

