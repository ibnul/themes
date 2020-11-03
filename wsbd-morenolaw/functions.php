<?php





if ( ! function_exists( 'wsbd_morenolaw' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function wsbd_morenolaw() {



	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );



	/**

	 * Load Languages

	 */

	load_theme_textdomain('morenolaw', get_template_directory() . '/lang/');

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

	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

	 */

	//add_theme_support( 'post-thumbnails' );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menu( 'primary', 'Primary Menu' );

	register_nav_menu( 'footer_menu', 'Footer Menu' );

	register_nav_menu( 'social_lang', 'Social Menu' );

	



	/*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */

	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',

	) );



	/*

	 * Enable support for Post Formats.

	 * See http://codex.wordpress.org/Post_Formats

	 */

	add_theme_support( 'post-formats', array(

		'aside', 'image', 'video', 'quote', 'link',

	) );

	

	// register image sizes 

	add_image_size( 'news-thumb', 300, 145, true ); 

	add_image_size( 'law-featured', 1010, 235, true );

	



}

endif; // wsbd_trevillionlaw

add_action( 'after_setup_theme', 'wsbd_morenolaw' );



/**

 * Enqueue scripts and styles.

 */

function wsbd_morenolaw_scripts() {

	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'wsbd-morenolaw-style', get_stylesheet_uri() );	

	wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/responsive.css' );

	

	wp_enqueue_script( 'wsbd-morenolaw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );	

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'wsbd-morenolaw-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array() );

	wp_enqueue_script( 'top-button', get_stylesheet_directory_uri() . '/js/topbutton.js', array( 'jquery' ) ); 

	wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true ); 



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

}

add_action( 'wp_enqueue_scripts', 'wsbd_morenolaw_scripts' );







/**

 * Include admin Framework

 */

require_once 'inc/bootstrap.php';



// options

$tmpl_opt  = get_template_directory() . '/admin/option/option.php';



/**

 * Create instance of Options

 */

$theme_options = new VP_Option(array(

	'is_dev_mode'           => false,                                  // dev mode, default to false

	'option_key'            => 'vpt_option',                           // options key in db, required

	'page_slug'             => 'vpt_option',                           // options page slug, required

	'template'              => $tmpl_opt,                              // template file path or array, required

	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu

	'use_auto_group_naming' => true,                                   // default to true

	'use_util_menu'         => true,                                   // default to true, shows utility menu

	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'

	'layout'                => 'fixed',                                // fluid or fixed, default to fixed

	'page_title'            => __( 'Theme Options', 'morenolaw' ), // page title

	'menu_label'            => __( 'Theme Options', 'morenolaw' ), // menu label

));



// First, create a function that includes the path to your favicon

function add_favicon() {

$favicon_url = vp_option('vpt_option.fav_icon');;

echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';

}

// Now, just make sure that function runs when you're on the login page and admin pages

add_action('login_head', 'add_favicon');

add_action('admin_head', 'add_favicon'); 







/**

 * Register widget area.

 *

 * @link http://codex.wordpress.org/Function_Reference/register_sidebar

 */

function wsbd_morenolaw_widgets_init() {

	

	register_sidebar( array(

		'name'          => __( 'Practice Areas Sidebar', 'morenolaw' ),

		'id'            => 'practice_areas_sidebar',

		'description'   => 'Widget area to show on Practice Areas Pages',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h1 class="widget-title">',

		'after_title'   => '</h1>',

	) );



    register_sidebar( array(

		'name' => __( 'Blog Sidebar', 'morenolaw' ),

		'id' => 'blog_sidebar',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h1 class="widget-title">',

		'after_title' => '</h1>',

	) );

	

    register_sidebar( array(

		'name' => __( 'Latest News Sidebar', 'morenolaw' ),

		'id' => 'latest_news_sidebar',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h1 class="widget-title">',

		'after_title' => '</h1>',

	) );

		

	register_sidebar( array(

		'name' => __( 'Footer First Column', 'morenolaw' ),

		'id' => 'foot1',

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		'before_title' => '<h3 class="foot1">',

		'after_title' => '</h3>',

		) );

		

    register_sidebar( array(

		'name' => __( 'Footer Second Column', 'morenolaw' ),

		'id' => 'foot2',

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		'before_title' => '<h3 class="foot2">',

		'after_title' => '</h3>',

		) );

		

	register_sidebar( array(

		'name' => __( 'Footer Third Column', 'morenolaw' ),

		'id' => 'foot3',

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		'before_title' => '<h3 class="foot3">',

		'after_title' => '</h3>',

		) );

}

add_action( 'widgets_init', 'wsbd_morenolaw_widgets_init' );



//Page Slug Body Class

function add_slug_body_class( $classes ) {

global $post;

if ( isset( $post ) ) {

$classes[] = $post->post_type . '-' . $post->post_name;

}

return $classes;

}

add_filter( 'body_class', 'add_slug_body_class' );







function load_fonts() {

            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato');

            wp_enqueue_style( 'googleFonts');

        }

    

    add_action('wp_print_styles', 'load_fonts');

    

  



//Register Custom Post Latest News  

    add_action('init', 'latest_news_register'); 

    function latest_news_register() { 



        $labels = array(

            'name'               => _x('Latest News', 'Latest News General Name'),

            'singular_name'      => _x('Latest News', 'Latest News Singular Name'),

            'add_new'            => _x('Add New News', 'Add New Latest News Name'),

            'add_new_item'       => __('Add New Latest News'),

            'edit_item'          => __('Edit Latest News'),

            'new_item'           => __('New Latest News'),

            'view_item'          => __('View Latest News'),

            'search_items'       => __('Search Latest News'),

            'not_found'          => __('Nothing found'),

            'not_found_in_trash' => __('Nothing found in Trash'),

            'parent_item_colon'  => ''

        );



        $args = array(

            'labels'             => $labels,

            'public'             => true,

            'has_archive'        => true,

            'publicly_queryable' => true,

            'show_ui'            => true,

            'query_var'          => true,

            'rewrite'            => array("slug" => 'latest-news'),

            'capability_type'    => 'post',

            'hierarchical'       => true,

            'supports'           => array('title','thumbnail','editor','excerpt', 'comments', 'author')

        ); 



        register_post_type('latest_news' , $args);

            

        register_taxonomy(

                "news-category", array("latest_news"), array(

                "hierarchical"   => true,

                "label"          => "Latest News Categories", 

                "singular_label" => "Latest News Categories", 

                "rewrite"        => true));

        register_taxonomy_for_object_type('news-category', 'latest_news');

      

        flush_rewrite_rules();



    }


add_action( 'init', 'cpt_speaking_engagements' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function cpt_speaking_engagements() {
	$labels = array(
		'name'               => _x( 'Speaking Engagements', 'post type general name', 'morenolaw' ),
		'singular_name'      => _x( 'Speaking Engagement', 'post type singular name', 'morenolaw' ),
		'menu_name'          => _x( 'Speaking Engagements', 'admin menu', 'morenolaw' ),
		'name_admin_bar'     => _x( 'Speaking Engagements', 'add new on admin bar', 'morenolaw' ),
		'add_new'            => _x( 'Add New SE', 'speaking_engagements', 'morenolaw' ),
		'add_new_item'       => __( 'Add New SE', 'morenolaw' ),
		'new_item'           => __( 'New SE', 'morenolaw' ),
		'edit_item'          => __( 'Edit SE', 'morenolaw' ),
		'view_item'          => __( 'View SE', 'morenolaw' ),
		'all_items'          => __( 'All Speaking Engagements', 'morenolaw' ),
		'search_items'       => __( 'Search Speaking Engagements', 'morenolaw' ),
		'parent_item_colon'  => __( 'Parent Speaking Engagements:', 'morenolaw' ),
		'not_found'          => __( 'No Speaking Engagements found.', 'morenolaw' ),
		'not_found_in_trash' => __( 'No Speaking Engagements found in Trash.', 'morenolaw' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Custom Posts of Speaking Engagements.', 'morenolaw' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'speaking_engagements' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-megaphone',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'speaking_engagements', $args );
}
   
add_action( 'init', 'cpt_publications' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function cpt_publications() {
	$labels = array(
		'name'               => _x( 'Publications', 'post type general name', 'morenolaw' ),
		'singular_name'      => _x( 'Publications', 'post type singular name', 'morenolaw' ),
		'menu_name'          => _x( 'Publications', 'admin menu', 'morenolaw' ),
		'name_admin_bar'     => _x( 'Publications', 'add new on admin bar', 'morenolaw' ),
		'add_new'            => _x( 'Add New Publications', 'publications', 'morenolaw' ),
		'add_new_item'       => __( 'Add New Publications', 'morenolaw' ),
		'new_item'           => __( 'New Publications', 'morenolaw' ),
		'edit_item'          => __( 'Edit Publications', 'morenolaw' ),
		'view_item'          => __( 'View Publications', 'morenolaw' ),
		'all_items'          => __( 'All Publications', 'morenolaw' ),
		'search_items'       => __( 'Search Publications', 'morenolaw' ),
		'parent_item_colon'  => __( 'Parent Publications:', 'morenolaw' ),
		'not_found'          => __( 'No Publications found.', 'morenolaw' ),
		'not_found_in_trash' => __( 'No Publications found in Trash.', 'morenolaw' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Custom Posts of Publications.', 'morenolaw' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'moreno_publications' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-media-spreadsheet',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'moreno_publications', $args );
}
    

/**

  * Metabox

*/



$tmpl_metabox_others = TEMPLATEPATH . '/admin/metabox/metabox.php';

$news_events_metabox_others = new VP_Metabox($tmpl_metabox_others);



add_post_type_support( 'page', 'excerpt' );

function custom_excerpt_length( $length ) {

	return 10;

}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );





// Function Shortcode 'latest_news'

function function_latest_news($atts) {

	

	extract(shortcode_atts(array(

		'num_of_post' => 4,

		'category' => '',

		), $atts));

	

	

	// return string

	$latest_news_output = '';

	

	if( $category != ''){

		$args = array(

			'post_type' => 'latest_news',

			'orderby' => 'date', 

			'order' => 'DESC',

			'tax_query' => array(

				array(

					'taxonomy' => 'news-category',

					'field'    => 'name',

					'terms'    => $category,

				)

			),

			'posts_per_page' => $num_of_post

		);

	}else{

		$args = array(

			'post_type' => 'latest_news',

			'posts_per_page' => $num_of_post

		);

	}

	//query_posts( $args );

	$query = new WP_Query( $args );	



	$latest_news_output .= '<div class="row div-latest-news">';

	if( $query -> have_posts() ) {

		while( $query -> have_posts() ) {	$query -> the_post();

		

			$term_cats = get_the_terms( get_the_ID(), 'news-category' );



			if ( $term_cats && ! is_wp_error( $term_cats ) ) {



				$categories = array();



				foreach ( $term_cats as $term ) {

					$categories[] = $term->name;

				}

				$category = join( ", ", $categories );

				

			}

//var_dump($category);



			if( is_front_page() ) { $classes = '<div class="col-md-3 col-sm-6 col-xs-6">'; }

			else { $classes = '<div class="col-md-6 col-sm-6 col-xs-6">'; }

			

			$latest_news_output .= $classes;

			

			if( has_post_thumbnail() ){ 

				$latest_news_output .= '<a href="'. get_permalink() .'">'.get_the_post_thumbnail(get_the_ID(), 'news-thumb') .'</a>';

			}	

			$latest_news_output .= '<h3 class="news-title"><a href="'. get_permalink() .'">'. get_the_title(get_the_ID()) .'</a></h3>' ;

			$latest_news_output .= '<p class="author-name">From - '. get_the_author(get_the_ID()) .'</p>' ;

			$latest_news_output .= '<span class="entry-date">'. get_the_date('m&#8226;d&#8226;Y') .' &#9679;</span> <span class="entry-category">'. $category .'</span>';

						

						

			$latest_news_output .= '</div>';

		}

	}

	$latest_news_output .= '</div>';

	

	return $latest_news_output;

}

// add shortcode for Latest News

function register_shortcodes(){

   add_shortcode('latest_news', 'function_latest_news');

}

add_action( 'init', 'register_shortcodes');



//get parent slug of child page

function the_parent_slug() {

  global $post;

  if($post->post_parent == 0) return '';

  $post_data = get_post($post->post_parent);

  return $post_data->post_name;

}



// add page slug to menu class

function add_slug_class_to_menu_item($output){

	$ps = get_option('permalink_structure');

	if(!empty($ps)){

		$idstr = preg_match_all('/<li id="menu-item-(\d+)/', $output, $matches);

		foreach($matches[1] as $mid){

			$id = get_post_meta($mid, '_menu_item_object_id', true);

			$slug = basename(get_permalink($id));

			$output = preg_replace('/menu-item-'.$mid.'">/', 'menu-item-'.$mid.' menu-item-'.$slug.'">', $output, 1);

		}

	}

	return $output;

}

add_filter('wp_nav_menu', 'add_slug_class_to_menu_item');



// Display or Count how many times a post has been viewed. 

// id = the post id and action = display or count 



function arixWp_PostViews( $id, $action ) { 

	$axCountMeta = 'ax_post_views'; // Your Custom field that stores the views 

	$axCount = get_post_meta($id, $axCountMeta, true); 

	

	if ( $axCount == '' ) {

		if ( $action == 'count' ) { $axCount = 0; } 

		delete_post_meta( $id, $axCountMeta ); 

		add_post_meta( $id, $axCountMeta, 0, true ); 

		if ( $action == 'display' ) { echo "0 Views"; } 

	} else {

		if ( $action == 'count' ) { 

			$axCount++; 

			update_post_meta( $id, $axCountMeta, $axCount ); 

		} else { 

			echo $axCount . ' Views'; 

		} 

	} 

}



if ( ! function_exists( 'post_comment' ) ) {

	/** * Template for comments */

	function post_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;	?>		

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">		

			<article id="comment-<?php comment_ID(); ?>" class="comment">			

				<footer class="comment-meta">				

				<div class="comment-author vcard">					

				<?php $avatar_size = 68;						

					if ( '0' != $comment->comment_parent )							

						$avatar_size = 39;						

						echo get_avatar( $comment, $avatar_size );	

						/* translators: 1: comment author, 2: date and time */						

						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'morenolaw' ),					sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),							

						sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',								esc_url( get_comment_link( $comment->comment_ID ) ),								get_comment_time( 'c' ),								

						/* translators: 1: date, 2: time */								

						sprintf( __( '%1$s at %2$s', 'morenolaw' ), get_comment_date(), get_comment_time() )	));		

				?>					

				<?php edit_comment_link( __( 'Edit', 'morenolaw' ), '<span class="edit-link">', '</span>' ); ?>		</div><!-- .comment-author .vcard -->				

				<?php if ( $comment->comment_approved == '0' ) : ?>					

				

				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'morenolaw' ); ?></em>					

				<br />				

				<?php endif; ?>			

				</footer>			

				<div class="comment-content"><?php comment_text(); ?></div>			

				<div class="reply">				

				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'morenolaw' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>			

				</div><!-- .reply -->		

			</article><!-- #comment-## -->	

	<?php	}

} // ends check for post_comment()







/*

 * Function creates post duplicate as a draft and redirects then to the edit post screen

 */

function rd_duplicate_post_as_draft(){

	global $wpdb;

	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {

		wp_die('No post to duplicate has been supplied!');

	}

 

	/*

	 * Nonce verification

	 */

	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )

		return;

 

	/*

	 * get the original post id

	 */

	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );

	/*

	 * and all the original post data then

	 */

	$post = get_post( $post_id );

 

	/*

	 * if you don't want current user to be the new post author,

	 * then change next couple of lines to this: $new_post_author = $post->post_author;

	 */

	$current_user = wp_get_current_user();

	$new_post_author = $current_user->ID;

 

	/*

	 * if post data exists, create the post duplicate

	 */

	if (isset( $post ) && $post != null) {

 

		/*

		 * new post data array

		 */

		$args = array(

			'comment_status' => $post->comment_status,

			'ping_status'    => $post->ping_status,

			'post_author'    => $new_post_author,

			'post_content'   => $post->post_content,

			'post_excerpt'   => $post->post_excerpt,

			'post_name'      => $post->post_name,

			'post_parent'    => $post->post_parent,

			'post_password'  => $post->post_password,

			'post_status'    => 'draft',

			'post_title'     => $post->post_title,

			'post_type'      => $post->post_type,

			'to_ping'        => $post->to_ping,

			'menu_order'     => $post->menu_order

		);

 

		/*

		 * insert the post by wp_insert_post() function

		 */

		$new_post_id = wp_insert_post( $args );

 

		/*

		 * get all current post terms ad set them to the new post draft

		 */

		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");

		foreach ($taxonomies as $taxonomy) {

			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));

			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);

		}

 

		/*

		 * duplicate all post meta just in two SQL queries

		 */

		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");

		if (count($post_meta_infos)!=0) {

			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";

			foreach ($post_meta_infos as $meta_info) {

				$meta_key = $meta_info->meta_key;

				if( $meta_key == '_wp_old_slug' ) continue;

				$meta_value = addslashes($meta_info->meta_value);

				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";

			}

			$sql_query.= implode(" UNION ALL ", $sql_query_sel);

			$wpdb->query($sql_query);

		}

 

 

		/*

		 * finally, redirect to the edit post screen for the new draft

		 */

		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );

		exit;

	} else {

		wp_die('Post creation failed, could not find original post: ' . $post_id);

	}

}

add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

 

/*

 * Add the duplicate link to action list for post_row_actions

 */

function rd_duplicate_post_link( $actions, $post ) {

	if (current_user_can('edit_posts')) {

		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';

	}

	return $actions;

}

 

add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );


?>