<?php

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {

	/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(120, 90, true);
	add_image_size('square', 150, 150, true);


	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location.
	* You can allow clients to create multiple menus by
  * adding additional menus to the array. */
	register_nav_menus( array(
		'primary' => 'Primary Navigation',
		'footer' =>'Footer Menu'
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
endif;

add_action( 'after_setup_theme', 'theme_setup' );

/* Add all our CSS files here.
We'll let WordPress add them to our templates automatically instead
of writing our own link tags in the header. */

function project_styles(){
	wp_enqueue_style('style', get_stylesheet_uri() );

	wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.0.7/css/all.css');

	wp_enqueue_style('mailchimp', '//cdn-images.mailchimp.com/embedcode/naked-10_7.css');
}


add_action( 'wp_enqueue_scripts', 'project_styles');
/* Add all our JavaScript files here.
We'll let WordPress add them to our templates automatically instead
of writing our own script tags in the header and footer. */

function project_scripts() {

	//Don't use WordPress' local copy of jquery, load our own version from a CDN instead
	wp_deregister_script('jquery');
  wp_enqueue_script(
  	'jquery',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

  wp_enqueue_script(
    'plugins', //handle
    get_template_directory_uri() . '/js/plugins.js', //source
    false, //dependencies
    null, // version number
    true //load in footer
  );

  wp_enqueue_script(
    'scripts', //handle
    get_template_directory_uri() . '/dist/main.min.js', //source
    array( 'jquery', 'plugins' ), //dependencies
    null, // version number
    true //load in footer
  );
}

add_action( 'wp_enqueue_scripts', 'project_scripts');


/* Custom Title Tags */

function project_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'Project' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'project_wp_title', 10, 2 );

/*
  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function project_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'project_page_menu_args' );


/*
 * Sets the post excerpt length to 40 characters.
 */
function project_excerpt_length( $length ) {
	return 65;
}
add_filter( 'excerpt_length', 'project_excerpt_length' );

/*
 * Returns a "Continue Reading" link for excerpts
 */
function project_continue_reading_link() {
	return ' <br><br><a class="ctaLink" href="'. get_permalink() . '">Continue Reading</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and project_continue_reading_link().
 */
function project_auto_excerpt_more( $more ) {
	return ' &hellip;' . project_continue_reading_link();
}
add_filter( 'excerpt_more', 'project_auto_excerpt_more' );



/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function project_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= project_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'project_custom_excerpt_more' );




 define('EXCERPT_RARELY', '{[}]');
 define('EXCERPT_BR', nl2br(PHP_EOL));

 function so306588_trim_excerpt_custom($text = '')
 {
     add_filter('the_content', 'so306588_trim_excerpt_custom_mark', 6);

     // get through origin filter
     $text = wp_trim_excerpt($text);

     remove_filter('the_content', 'so306588_trim_excerpt_custom_mark', 6);

     return so306588_trim_excerpt_custom_restore($text);
 }

 function so306588_trim_excerpt_custom_mark($text)
 {
     $text = nl2br($text);
     return str_replace(EXCERPT_BR, EXCERPT_RARELY, $text);
 }

 function so306588_trim_excerpt_custom_restore($text)
 {
     return str_replace(EXCERPT_RARELY, EXCERPT_BR, $text);
 }

 // remove default filter
 remove_filter('get_the_excerpt', 'wp_trim_excerpt');

 // add custom filter
 add_filter('get_the_excerpt', 'so306588_trim_excerpt_custom'); 



/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within project_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function project_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'project_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function project_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'project_remove_recent_comments_style' );


if ( ! function_exists( 'project_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function project_posted_on() {
	printf('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s',
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr( 'View all posts by %s'), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'project_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function project_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ' ' );
	if ( $tag_list ) {
		$posted_in = '<section class="tagList">%2$s</section>';
	} 
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/* Get rid of junk! - Gets rid of all the crap in the header that you dont need */

function clean_stuff_up() {
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 3 );
}

add_action('init', 'clean_stuff_up');


/* Here are some utility helper functions for use in your templates! */

/* pre_r() - makes for easy debugging. <?php pre_r($post); ?> */
function pre_r($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Organization General Information',
		'menu_title'	=> 'Organization Information',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-email-alt2',
		'position' => 14,
		'redirect'		=> false
	));
	
	
}

function tsv_tags() {
	?>
	<div class="tags">
		<?php

		$tags = [];
		$cats = get_the_category();

		$i = 0;

		foreach($cats as $cat) {
			$tags[] = '<a href="'.get_category_link( $cat->term_id ).'">'.$cat->cat_name.'</a>';
		}

		foreach($tags as $tag) {

			if($i > 0) {
				echo ''.$tag;
			}

			else {
				echo $tag;
			}

			$i++;

		}


		?>
	</div>
	<?php
	wp_reset_postdata();
}


// Register a slider block.
// add_action('acf/init', 'my_register_blocks');
// function my_register_blocks() {

//     // check function exists.
//     if( function_exists('acf_register_block_type') ) {

//         // register a  block.
//         acf_register_block_type(array(
//             'name'              => 'membership_info_text',
//             'title'             => __('Announcement Text'),
//             'description'       => __('Use for membership announcemnts or other parts of site'),
//             'render_template'   => 'template-parts/blocks/membership-info-text/membership-info-text.php',
// 			'category'          => 'formatting',
// 			'icon' 				=> 'button',
// 			'align'				=> 'full',
// 			'enqueue_assets' 	=> function(){
// 				// wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
// 				// wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
// 				// wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
// 				// wp_enqueue_style('bxslider', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css');
// 				// wp_enqueue_script(
// 				// 	'bxslidejs',
// 				// 	"https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js",array('jquery'), '4.2.15', true 
// 				// );

// 				wp_enqueue_style( 'block-membership-info-text', get_template_directory_uri() . '/template-parts/blocks/membership-info-text/membership-info-text.css', array(), '1.0.0' );
// 				wp_enqueue_script( 'block-membership-info-text', get_template_directory_uri() . '/template-parts/blocks/membership-info-text/membership-info-text.js', array(), '1.0.0', true );
// 			  },
//         ));

//                 acf_register_block_type(array(
//                     'name'              => 'membership_option',
//                     'title'             => __('Options box with pricing'),
//                     'description'       => __('Use for membership pricing ption or other parts of site'),
//                     'render_template'   => 'template-parts/blocks/membership_option/membership_option.php',
//         			'category'          => 'formatting',
//         			'icon' 				=> 'button',
//         			'align'				=> 'full',
//         			'enqueue_assets' 	=> function(){

//         				wp_enqueue_style( 'block-membership_option', get_template_directory_uri() . '/template-parts/blocks/membership_option/membership_option.css', array(), '1.0.0' );
//         				wp_enqueue_script( 'block-membership_option', get_template_directory_uri() . '/template-parts/blocks/membership_option/membership_option.js', array(), '1.0.0', true );
//         			  },
//                 ));
//     }
// }

// function wpse167989_posts_orderby( $orderby, $query ) {
//     global $wpdb;
//     // Strip all numbers & hyphens from title, and trim any leading spaces.
//     return $wpdb->prepare(
//         'LTRIM(' . str_repeat( 'REPLACE(', 11 ) . $wpdb->posts . '.post_title'
//         . str_repeat( ', %s, %s)', 11 ) . ') ' . $query->get( 'order' )
//         , 0, '', 1, '', 2, '', 3, '', 4, '', 5, '', 6, '', 7, '', 8, '', 9, '', '-', '' );
// }
// add_filter( 'posts_orderby', 'wpse167989_posts_orderby', 10, 2 );
// $loop = new WP_Query( $args );
// remove_filter( 'posts_orderby', 'wpse167989_posts_orderby', 10 );

// add_filter( 'posts_orderby' , 'wpse_custom_orderby_statement' );
// function wpse_custom_orderby_statement( $orderby ) {

//   $orderby = " post_name+0<>0 ASC, post_name+0, post_name";

//   return $orderby;
// }

function myComparison($a, $b){
    if(is_numeric($a) && !is_numeric($b))
        return 1;
    else if(!is_numeric($a) && is_numeric($b))
        return -1;
    else
        return ($a < $b) ? -1 : 1;
} 
/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

