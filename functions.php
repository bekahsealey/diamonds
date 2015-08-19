<?php
/**
 * Load Languages
 */
add_action('after_setup_theme', 'diamonds_setup');
function diamonds_setup(){
    load_theme_textdomain('diamonds', get_template_directory() . '/languages');
}

/**
 * Define Navigation menu areas
 */
register_nav_menus(
	array(
		'main-nav' => 'Main Nav in header',
		'social-media' => 'Social Media Links',
	)
); 

/**
 * Define maximum content width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 778;
}

/**
 * Generate Featured Image thumbnail sizes
 */
 add_action( 'after_setup_theme', 'diamonds_image_setup' );
function diamonds_image_setup() {
	add_image_size( 'three-quarters-post', 720, 240, true );
	add_image_size( 'three-quarters-page', 720, 400, true );
	add_image_size( 'two-thirds-post', 580, 240, true );
	add_image_size( 'two-thirds-page', 580, 400, true );
	add_image_size( 'half-post', 480, 240, true );
	add_image_size( 'half-page', 480, 400, true );
	add_image_size( 'vert-gallery', 480, 640, true );
	add_image_size( 'horiz-gallery', 720, 540, true );
	add_image_size( 'post-thumb', 700, 167, true );
	add_image_size( 'sm-post-thumb', 180, 180, true );
	add_image_size( 'diamonds-thumb', 250, 250, true );
	add_image_size( 'post', 960, 240, true );
	add_image_size( 'page', 960, 400, true );
	add_image_size( 'featured', 960, 720, true );
}
add_theme_support( 'post-thumbnails' );

/**
 * Add theme support for HTML5, feed links, post-formats
 */
 
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
add_theme_support( 'custom-background' );
add_theme_support( 'title-tag' );

/**
 * Define Custom Header & Background
 */
 
$custom_header_args = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 420,
	'height'                 => 120,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '2B2B2B',
	'header-text'            => true,
	'uploads'                => true
);
add_theme_support( 'custom-header', $custom_header_args );

/**
 * Configure excerpts
 */
 
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );

function new_excerpt_more( $more ) {
	return '<p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read on...', 'your-text-domain') . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function diamonds_status_excerpt() {
	//trim status content to 140 characters
	$content = get_the_content();
	$excerpt = _e(substr( $content, 0, 140 ));
	return $excerpt;
}

/**
 * Style tiny-mce editor
 */
 
function diamonds_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'diamonds_add_editor_styles' );



/**
 * Enqueue scripts and styles
 */
function diamonds_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), '2.8.3', true );
	wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Fontdiner+Swanky%7cAlegreya+Sans:400,300,300italic,400italic,100italic,100' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.css' );
	wp_enqueue_style( 'diamond-gallery', get_template_directory_uri() . '/css/diamonds.css' );
	wp_enqueue_style( 'fancybox',  get_template_directory_uri() . '/css/jquery.fancybox.css' ); 
	wp_enqueue_script( 'diamonds-js', get_template_directory_uri() . '/js/jquery.diamonds.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_script( 'flex-js', get_template_directory_uri() . '/js/flex.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'slicknav-js', get_stylesheet_directory_uri() . '/js/jquery.slicknav.js', array( 'jquery' ), '1.0.4', false );
	wp_enqueue_script( 'fancybox-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), '2.1.5', true );
	wp_enqueue_script( 'fancybox-load', get_template_directory_uri() . '/js/jquery.fancybox.load.js', array( 'fancybox-js' ), '2.1.5', true );
	wp_enqueue_script( 'all', get_template_directory_uri() . '/js/all.js', array( 'jquery' ), '1.0.0', true ); 
	if (is_page( 221 )){
		wp_enqueue_script( 'showHide', get_template_directory_uri() . '/js/showHide.js', array( 'jquery' ), '1.0.0', false );
	}
}

add_action( 'wp_enqueue_scripts', 'diamonds_scripts' );

/**
 * Sidebars
 */
function diamonds_widget_init() {
	$diamonds_sidebar = array(
		'name' => __( 'Footer', 'diamonds' ),
		'id' => 'footer-sidebar',
		'description' => 'Widgets placed here will display at the bottom',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_sidebar );
	
	$diamonds_header_sidebar = array(
		'name' => __( 'Header', 'diamonds' ),
		'id' => 'header-sidebar',
		'description' => 'Widgets placed here will display at the top',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_header_sidebar );
	
	$diamonds_left_sidebar = array(
		'name' => __( 'Left', 'diamonds' ),
		'id' => 'left-sidebar',
		'description' => 'Widgets placed here will display in the left sidebar',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_left_sidebar );
	
	$diamonds_right_sidebar = array(
		'name' => __( 'Right', 'diamonds' ),
		'id' => 'right-sidebar',
		'description' => 'Widgets placed here will display in the right sidebar',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_right_sidebar );
	
	$diamonds_front_left_sidebar = array(
		'name' => __( 'Front Left', 'diamonds' ),
		'id' => 'front-left-sidebar',
		'description' => 'Widgets placed here will display in the left sidebar on the Front Page',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_front_left_sidebar );
	
	$diamonds_front_right_sidebar = array(
		'name' => __( 'Front Right', 'diamonds' ),
		'id' => 'front-right-sidebar',
		'description' => 'Widgets placed here will display in the right sidebar',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_front_right_sidebar );
	
	$diamonds_single_post_sidebar = array(
		'name' => __( 'Single', 'diamonds' ),
		'id' => 'single-post',
		'description' => 'Widgets placed here will display under the post on a single post page',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	);
	register_sidebar( $diamonds_single_post_sidebar );
	
	$diamonds_search_sidebar = array(
		'name' => __( 'Search', 'diamonds' ),
		'id' => 'search-sidebar',
		'description' => 'Widgets placed here will display in a search and 404 page footer',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	);
	register_sidebar( $diamonds_search_sidebar );
}
add_action( 'widgets_init', 'diamonds_widget_init' );

/**
 * Global Functions
 */

function diamonds_filter_wp_title( $currenttitle, $sep, $seplocal ) {
	$site_name = get_bloginfo( 'name' );
	$full_title = $site_name . $currenttitle;
	if ( is_front_page() || is_home() ) {
		$site_desc = get_bloginfo( 'description' );
		$full_title .= ' ' . $sep . ' ' . $site_desc;
	}
	return $full_title;
}
add_filter( 'wp_title', 'diamonds_filter_wp_title', 10, 3 );

function diamonds_paginate() {
    global $paged, $wp_query;
    $abignum = 999999999; //we need an unlikely integer
    $args = array(
        'base' => str_replace( $abignum, '%#%', esc_url( get_pagenum_link( $abignum ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total' => $wp_query->max_num_pages,
        'show_all' => False,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => True,
        'prev_text' => __( '&laquo;', 'diamonds' ),
        'next_text' => __( '&raquo;', 'diamonds' ),
        'type' => 'list'
    );
    echo paginate_links( $args );
}
	
function the_post_thumbnail_caption() {
  global $post;

  $thumb_id = get_post_thumbnail_id($post->id);

  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	); 

   $thumbnail_image = get_posts($args);

   if ($thumbnail_image && isset($thumbnail_image[0])) {
     //show thumbnail title
     echo $thumbnail_image[0]->post_title; 

     //Uncomment to show the thumbnail caption
     //echo $thumbnail_image[0]->post_excerpt; 

     //Uncomment to show the thumbnail description
     echo $thumbnail_image[0]->post_content; 

     //Uncomment to show the thumbnail alt field
     //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
     //if(count($alt)) echo $alt;
  }
}

function the_breadcrumb() {
    global $post;
    if ( is_front_page() ) { return; } else {
    echo '<ul id="breadcrumbs" class="col-2-3">';
    	if ( !is_home() || !is_front_page() ) {
    		echo '<li><a href="';
    		$url = home_url( '/' );
			echo $url;
    		echo '">';
    		echo 'Home';
    		echo '</a></li><li>&nbsp;&gt;&nbsp;</li>';
        	if (is_category() || is_single() || ( is_home() && !is_front_page() ) ) {
            	echo '<li>';
            	if( is_category() ) {
            		$cat = get_query_var('cat');
        			echo get_category_parents( $cat, true, '</li><li>&nbsp;&gt;&nbsp;</li><li>' );
          	  		echo'</li>';
        		}
        		elseif ( ( is_home() && !is_front_page() ) ) {
          	  		echo ucwords(basename($_SERVER['REQUEST_URI']));
          	  		echo'</li>';
            	}
            	if ( is_single() ) {
            		the_title();
                	echo '</li>';
            	}
    			elseif ( !have_posts() ) { echo single_cat_title( '', false ); }
			
        	} elseif ( is_page() ) {
            	if($post->post_parent){
                	$ancestors = get_post_ancestors( $post->ID );
                	foreach ( array_reverse($ancestors) as $ancestor ) {
						$title = get_the_title();
                    	$output = '<li><a href="x" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li>&nbsp;&gt;&nbsp;</li>';
                	}
                	echo $output;
                	echo '<li>' . $title . '</li>';
            	} else {
                	echo '<li>'; the_title(); echo '</li>';
            	}
			}
			elseif (is_tag()) {echo'<li>Search Results for "'; single_tag_title(); echo'" Tag</li>';}
    		elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    		elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    		elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    		elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    		elseif (is_search()) {echo'<li>Search Results for "' . get_search_query() . '"'; echo'</li>';}
			echo '</ul>'; return;
		}
	}
}

function current_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright . " ";
	}
	return $output;
}

function diamonds_page_icon() {
    global $post;
	echo '<ul class="date-meta post-icon">';
	$page_title = get_the_title();
	$words = array( 'about', 'contact', 'products', 'services', 'portfolio', 'photography', 'web', 'optimization' );
	$page_icon = "icon icon-pencil";
	
	if ( is_front_page() || is_home() ) {
		$page_icon = "icon icon-home";
	} else {
		foreach ($words as $word) {
			if ( preg_match("/$word/i", $page_title, $matches ) == true ) {
				$icon = strtolower($word);
				switch ( $icon ) {
					case "about":
						$page_icon = "icon icon-user";
						break;
					case "contact":
						$page_icon = "icon icon-mail";
						break;
					case "products":
						$page_icon = "icon icon-cog";
						break;
					case "services":
						$page_icon = "icon icon-lab";
						break;
					case "portfolio":
						$page_icon = "icon icon-folder";
						break;
					case "photography":
						$page_icon = "icon icon-camera";
						break;
					case "web":
						$page_icon = "icon icon-screen";
						break;
					case "optimization":
						$page_icon = "icon icon-stats";
						break;
				};
			}
		}		
	}
	echo '<li><div class="';
	echo $page_icon;
	echo ' hide-label"><span>';
	echo is_home() ? "Home" : the_title();
	echo '</span></div></li>';
	echo '</ul>';
}

function diamonds_post_format_icons() {
	if (! has_post_format() || ! is_post_type_archive( 'profile' ) ) {
		echo '<ul class="date-meta">';
		echo '<li>'; the_time( 'M' ); echo '</li>';
		echo '<li><a href="'; the_permalink(); echo '" title="'; esc_attr_e( 'For More Info on ' ); the_title_attribute(); echo '"><div>'; the_time( 'd' ); echo '</div></a></li>';
		echo '<li>'; the_time( 'Y' ); echo '</li>';
		echo '</ul>';
	} else if ( has_post_format() || is_post_type_archive( 'profile' ) ) {
		$format = get_post_format();
		switch ( $format ) {
					case "aside":
						$page_icon = "icon icon-newspaper";
						break;
					case "gallery":
						$page_icon = "icon icon-images";
						break;
					case "link":
						$page_icon = "icon icon-link";
						break;
					case "image":
						$page_icon = "icon icon-camera";
						break;
					case "quote":
						$page_icon = "icon icon-quotes";
						break;
					case "status":
						$page_icon = "icon icon-bullhorn";
						break;
					case "video":
						$page_icon = "icon icon-video";
						break;
					case "audio":
						$page_icon = "icon icon-music";
						break;
					case "chat":
						$page_icon = "icon icon-bubbles";
						break;
		}
		echo '<ul class="date-meta post-icon">';
		echo '<li><a href="'; the_permalink(); echo '" title="'; esc_attr_e( 'For More Info on ' ); the_title_attribute(); echo '"><div class="';
		echo $page_icon;
		echo ' hide-label"><span>';
		echo $format;
		echo '</span></div></a></li>';
		echo '</ul>';
	}
}

class diamondsFlexCol {
	protected $_numCols;
	protected $_leftcol_width;
	protected $_rightcol_width;
	public $_maincol_width;
	public $_size;
	
	public function __construct() {
		// count active columns
		if ( has_post_format( array( 'gallery', 'image', 'video' ) )|| (is_page_template( 'template-photography.php' )&& !is_active_sidebar( 'left-sidebar' ) && !is_active_sidebar( 'right-sidebar' ) ) ) {
			$this->_numCols = 'full';
		} if ( !has_post_format( array( 'gallery', 'image', 'video' ) ) && !(is_page_template( 'template-photography.php' )&& !is_active_sidebar( 'left-sidebar' ) && !is_active_sidebar( 'right-sidebar' ) )  ) {
			if ( ( !is_front_page() && is_active_sidebar( 'left-sidebar' ) && is_active_sidebar( 'right-sidebar' ) ) 
			|| ( is_front_page() && is_active_sidebar( 'front-left-sidebar' ) && is_active_sidebar( 'front-right-sidebar' ) )) {
				$this->_numCols = 'three';
			} elseif ( ( !is_front_page() && is_active_sidebar( 'left-sidebar' ) && !is_active_sidebar( 'right-sidebar' ) ) 
			|| ( is_front_page() && is_active_sidebar( 'front-left-sidebar' ) && !is_active_sidebar( 'front-right-sidebar' ) ) ) {
				$this->_numCols = 'two-left';
			}  elseif ( ( !is_front_page() && is_active_sidebar( 'right-sidebar' ) && !is_active_sidebar( 'left-sidebar' ) ) 
			|| ( is_front_page() && is_active_sidebar( 'front-right-sidebar' ) && !is_active_sidebar( 'front-left-sidebar' ) ) ) {
				$this->_numCols = 'two-right';
			} elseif ( ( !is_front_page() && !is_active_sidebar( 'left-sidebar' ) && !is_active_sidebar( 'right-sidebar' ) )
			|| ( is_front_page() && !is_active_sidebar( 'front-left-sidebar' ) && !is_active_sidebar( 'front-right-sidebar' ) ) ) {
				$this->_numCols = 'single';
			}
		}
		$this->setWidths( $this->_numCols );
	}
	
	public function diamonds_flex( $pos ) {
		// return sidebar
		switch ( $pos ) {
			case "left" :
				if ( ! empty( $this->_leftcol_width ) ) {
					echo '<div id="left" class="col-' . $this->_leftcol_width . '">';
					if( is_front_page() ) {
						get_sidebar( 'front-left' );
					} else { 
						get_sidebar( 'left' );
					}
					echo '</div>';
				}
				break;
			case "right" :
				if ( ! empty( $this->_rightcol_width ) ) {
					echo '<div id="right" class="col-' . $this->_rightcol_width . ' reverse">';
					if( is_front_page() ) {
						get_sidebar( 'front-right' );
					} else { 
						get_sidebar( 'right' );
					}
					echo '</div>';
				}
				break;
		}
	}
	
	protected function setWidths($colWidths) {
		// using number of columns counted, assign width classes
		switch ( $colWidths ) {
			case "three" :
				$this->_leftcol_width = '1-4';
				$this->_rightcol_width = '1-4';
				$this->_maincol_width = '1-2';
				$this->_size = 'half-page';
				break;
			case "two-left" :
				$this->_leftcol_width = '1-3';
				$this->_maincol_width = '2-3 reverse';
				$this->_size = 'two-thirds-page';
				break;
			case "two-right" :
				$this->_rightcol_width = '1-3 reverse';
				$this->_maincol_width = '2-3';
				$this->_size = 'two-thirds-page';
				break;
			case "single" :
				$this->_maincol_width = '3-4 center';
				$this->_size = 'three-quarters-page';
				break;
			case "full" :
				$this->_maincol_width = '1-1 center';
				$this->_size = 'page';
				break;
		}
	}
}

function diamonds_front_page_gallery() {
		if ( !is_front_page() ) {
			return; 
		} else {
			/* 
			 * Collect featured images from 'Diamonds Gallery' category to insert into front page gallery
			 */
			$args = array( 'category_name' => 'portfolio', 'posts_per_page' => 15, 'orderby' => 'rand' );
			$gallery_query = new WP_Query( $args ); 
			if ( $gallery_query->have_posts() ) :
				echo '<div class="diamondswrap center">';
				while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); 
				if (has_post_thumbnail()) {
					echo '<a href="'; the_permalink(); echo '" class="item">';
					the_post_thumbnail( 'diamonds-thumb' );
					echo '</a>';
				}
				endwhile;
				echo '</div>';
				endif;
				wp_reset_postdata();
		}
}
function diamonds_icons( $icons ) {
	$icons = str_replace ( " ", "", $icons );
	$iconcodes = explode( ",", $icons["icons"]);
	if (!empty($icons["color"])) {
		$color = 'style="color:' . $icons["color"] . '" ';
		foreach ($iconcodes as $icon) {
			echo $icon;
			$my_icons .= '<span ' . $color . 'class="icon icon-' . $icon . '"></span>';
		}
	}
	else {
		foreach ($iconcodes as $icon) {
			$my_icons .= '<span class="icon icon-' . $icon . '"></span>';
		}
	}
	return $my_icons;
}
add_shortcode( 'icon', 'diamonds_icons' );

function diamonds_submenu() {
	if ( is_404() ) {
		return; 
	}
	if ( is_page() ) {
		$currentid = get_the_id();
		$currentpost = get_post( $currentid );
		$has_children = get_pages('child_of='.$currentpost->ID);
		if( count( $has_children ) == 0 && $currentpost->post_parent  && $currentid != 404) {
			//collect siblings
			$children = wp_list_pages("title_li=&child_of=".$currentpost->post_parent."&echo=0", 'sort_column=menu_order');
		} else { 
			//collect children
			$children = wp_list_pages("title_li=&child_of=".$currentpost->ID."&echo=0", 'sort_column=menu_order');
		}
	}
	if( is_archive() || is_page( 'photography' )) {
		if ( is_page( 'photography' ) ) {
			$category = get_cat_ID( 'photography' );
		}	
		if ( !$category ) { $category = get_query_var( 'cat' ); }
		$has_children = get_categories( array( 'parent' => $category ) );
		//var_dump( $has_children ); 
		if( $has_children == NULL ) { 
			$cat = get_category($category);
			$parent = $cat->category_parent;
			$children = wp_list_categories("title_li=&child_of=".$parent."&echo=0", 'depth=1');
		} else {
			$children = wp_list_categories("title_li=&child_of=".$category."&echo=0", 'depth=1');
		}	
	}
	if ( !$children || is_404() ) {
		return;
	} elseif ($children) { 
		$child_pages = "";
		$child_pages .= '<nav id="submenu">';
		$child_pages .= '<ul class="menu">';
		$child_pages .= $children;
		$child_pages .= '</ul>';
		$child_pages .= '</nav>'; 
		return $child_pages;
	}
}
add_shortcode( 'submenu', 'diamonds_submenu' );	
add_filter( 'comment_text', 'do_shortcode' );
add_filter('widget_text', 'do_shortcode');


/**
 * New Personal Profile options
 */

add_action( 'show_user_profile', 'diamonds_add_profile_options' );
add_action( 'edit_user_profile', 'diamonds_add_profile_options' );
 
function diamonds_add_profile_options( $user ) { ?>
 
<h3>Extra profile information</h3>
 
<table class="form-table">
 
<tr>
<th><label for="user_title">Title</label></th>
 
<td>
<input type="text" name="user_title" id="user_title" value="<?php echo esc_attr( get_the_author_meta( 'user_title', $user->ID ) ); ?>" class="regular-text" />
<span class="description">Enter your job title.</span>
</td>
</tr>
 
 <tr>
<th><label for="user_picture">Profile Picture</label></th>
 
<td>
<input type="text" name="user_picture" id="user_picture" value="<?php echo esc_attr( get_the_author_meta( 'user_picture', $user->ID ) ); ?>" class="regular-text" />
<span class="description">Enter link to profile picture from media library (if none, defaults to Gravatar)</span>
</td>
</tr>
</table>
<?php }

 
 function diamonds_add_profile_options_update(){
  if(!isset($_POST['user_title']))
   return;
  //get user id
  $user_id = get_current_user_id();
  //validate submitted value otherwise set to default
  $user_title = sanitize_text_field( $_POST['user_title'] );
  //update user title
  update_user_meta($user_id, 'user_title', $user_title);
  if(!isset($_POST['user_picture']))
   return;
  //get user id
  $user_id = get_current_user_id();
  //validate submitted value otherwise set to default
  $user_picture = sanitize_text_field( $_POST['user_picture'] );
  $user_picture = str_replace( '.jpg', '', $user_picture );
  //update user picture
  update_user_meta($user_id, 'user_picture', $user_picture);
 }
 add_action('personal_options_update','diamonds_add_profile_options_update');
add_action( 'edit_user_profile_update', 'diamonds_add_profile_options_update' );

/**
 * Contact Methods
 */

function modify_user_contact_methods( $user_contact ) {

	/* Add user contact methods */
	$user_contact['facebook'] = __( 'Facebook', 'diamonds' ); 
	$user_contact['twitter'] = __( 'Twitter', 'diamonds' );
	$user_contact['skype'] = __( 'Skype', 'diamonds' );
	$user_contact['github'] = __( 'Github', 'diamonds' );
	$user_contact['pinterest'] = __( 'Pinterest', 'diamonds' );
	$user_contact['instagram'] = __( 'Instagram', 'diamonds' );
	$user_contact['linkedin'] = __( 'LinkedIn', 'diamonds' );
	$user_contact['codepen'] = __( 'Codepen', 'diamonds' );
	$user_contact['tumblr'] = __( 'Tumblr', 'diamonds' );
	$user_contact['youtube'] = __( 'YouTube', 'diamonds' );
	
	return $user_contact;
}
add_filter( 'user_contactmethods', 'modify_user_contact_methods' );


  
?>