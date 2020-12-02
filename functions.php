<?php
/**
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//define path to includes
define('INCPATH', get_template_directory() . '/inc/cms/');

//include OptionTree.
require( INCPATH . '/mfind_admin.php' );
require( INCPATH . '/mfind-banery.php' );
require( INCPATH . '/metaboxes.php' );

//include cmb2 metaboxes
if ( file_exists(  INCPATH . '/cmb2/init.php' ) ) {
  require_once  INCPATH . '/cmb2/init.php';
} elseif ( file_exists(  INCPATH . '/CMB2/init.php' ) ) {
  require_once  INCPATH . '/CMB2/init.php';
}

/* -- Enqueue CSS and JS -- */
function wpEnqueueScripts(){
//css
  wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', array());
  wp_enqueue_style('mfind_style', get_template_directory_uri() . '/css/mfind-style.css', array());

  wp_register_script('validate-scripts', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js', array('jquery'));
  wp_enqueue_script('validate-scripts');

  wp_register_script('mfind-scripts', get_template_directory_uri() . '/js/mfind-scripts.js', array('jquery'));
  wp_enqueue_script('mfind-scripts');
  wp_register_script( 'jQuery-autka', 'https://cdn.mfind.pl/scripts/autka-widget.js', null, null, true );
  wp_enqueue_script('jQuery-autka');
}
add_action('wp_enqueue_scripts', 'wpEnqueueScripts');

/**
* ID kategorii do wyświetlenia postów w boksach "Pozostałe tematy".
*/
$box_categories = array(10, 11, 2, 12);

// Set up the content width value based on the theme's design and stylesheet.
if (!isset($content_width)) {
  $content_width = 625;
}

/**
* Twenty Twelve setup.
*
* Sets up theme defaults and registers the various WordPress features that
* Twenty Twelve supports.
*
* @uses load_theme_textdomain() For translation/localization support.
* @uses add_editor_style() To add a Visual Editor stylesheet.
* @uses add_theme_support() To add support for post thumbnails, automatic feed links,
*   custom background, and post formats.
* @uses register_nav_menu() To add support for navigation menus.
* @uses set_post_thumbnail_size() To set a custom post thumbnail size.
*
* @since Mfind 1.0
*/
function twentytwelve_setup() {
/*
* Makes Twenty Twelve available for translation.
*
* Translations can be added to the /languages/ directory.
* If you're building a theme based on Twenty Twelve, use a find and replace
* to change 'twentytwelve' to the name of your theme in all the template files.
*/
  load_theme_textdomain('twentytwelve', get_template_directory() . '/languages');

  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // This theme supports a variety of post formats.
  add_theme_support('post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ));

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu('primary', __( 'Primary Menu', 'twentytwelve' ));
  register_nav_menu('footer-left', __( 'O nas', 'twentytwelve' ));
  register_nav_menu('footer-center', __( 'Poczytaj o ubezpieczeniach', 'twentytwelve' ));
  register_nav_menu('footer-right', __( 'Produkty mfind', 'twentytwelve' ));

  /*
  * This theme supports custom background color and image,
  * and here we also set up the default background color.
  */
  add_theme_support( 'custom-background', array(
    'default-color' => 'e6e6e6',
  ));

  // This theme uses a custom image size for featured images, displayed on "standard" posts.
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(624, 9999); // Unlimited height, soft crop
  add_image_size('800x418', 800, 418, true);
  add_image_size('740x416', 740, 416, true);
  add_image_size('643x246', 643, 246, true);
  add_image_size('827x265', 827, 265, true);
  add_image_size('689x218', 689, 218, true);
  add_image_size('400x371', 400, 371, true);
  add_image_size('341x208', 341, 208, true);
  add_image_size('303x177', 303, 177, true);
}
add_action('after_setup_theme', 'twentytwelve_setup');

/**
* Add support for a custom header image.
*/
require(get_template_directory() . '/inc/custom-header.php');



/**
* Filter TinyMCE CSS path to include Google Fonts.
*
* Adds additional stylesheets to the TinyMCE editor if needed.
*
* @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
*
* @since Twenty Twelve 1.2
*
* @param string $mce_css CSS path to load in TinyMCE.
* @return string Filtered CSS path.
*/
function twentytwelve_mce_css($mce_css) {
  $font_url = twentytwelve_get_font_url();

  if (empty($font_url)) {
    return $mce_css;
  }

  if (!empty($mce_css)) {
    $mce_css .= ',';
  }

  $mce_css .= esc_url_raw(str_replace(',', '%2C', $font_url ));

  return $mce_css;
}
add_filter('mce_css', 'twentytwelve_mce_css');



/**
* Return the Google font stylesheet URL if available.
*
* The use of Open Sans by default is localized. For languages that use
* characters not supported by the font, the font can be disabled.
*
* @since Twenty Twelve 1.2
*
* @return string Font stylesheet or empty string if disabled.
*/
function twentytwelve_get_font_url() {
  $font_url = '';

/* translators: If there are characters in your language that are not supported
* by Open Sans, translate this to 'off'. Do not translate into your own language.
*/
if ('off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' )) {
  $subsets = 'latin,latin-ext';

/* translators: To add an additional Open Sans character subset specific to your language,
* translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
*/
$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

if ('cyrillic' == $subset) {
  $subsets .= ',cyrillic,cyrillic-ext';
} elseif ('greek' == $subset) {
  $subsets .= ',greek,greek-ext';
} elseif ('vietnamese' == $subset) {
  $subsets .= ',vietnamese';
}

$protocol = is_ssl() ? 'https' : 'http';
$query_args = array(
  'family' => 'Open+Sans:400italic,700italic,400,700',
  'subset' => $subsets,
);
$font_url = add_query_arg($query_args, "$protocol://fonts.googleapis.com/css");
}

return $font_url;
}

/**
* Filter the page title.
*
* Creates a nicely formatted and more specific title element text
* for output in head of document, based on current view.
*
* @since Mfind 1.0
*
* @param string $title Default title text for current view.
* @param string $sep Optional separator.
* @return string Filtered title.
*/
function twentytwelve_wp_title($title, $sep) {
  global $paged, $page;

  if (is_feed()) {
    return $title;
  }

// Add the site name.
  $title .= get_bloginfo('name');

// Add the site description for the home/front page.
  $site_description = get_bloginfo('description', 'display');
  if ($site_description && (is_home() || is_front_page())) {
    $title = "$title $sep $site_description";
  }

// Add a page number if necessary.
  if ($paged >= 2 || $page >= 2) {
    $title = "$title $sep " . sprintf( __('Page %s', 'twentytwelve'), max($paged, $page));
  }

  return $title;
}
add_filter('wp_title', 'twentytwelve_wp_title', 10, 2);

/**
* Filter the page menu arguments.
*
* Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
*
* @since Mfind 1.0
*/
function twentytwelve_page_menu_args( $args ) {
  if (!isset($args['show_home'] )) {
    $args['show_home'] = true;
  }
  return $args;
}
add_filter('wp_page_menu_args', 'twentytwelve_page_menu_args');

if (!function_exists('twentytwelve_content_nav')) :
  /**
  * Displays navigation to next/previous pages when applicable.
  *
  * @since Mfind 1.0
  */
  function twentytwelve_content_nav($html_id) {
    global $wp_query;

    $html_id = esc_attr($html_id);

    if ($wp_query->max_num_pages > 1) : ?>
      <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
        <h3 class="assistive-text"><?php _e('Post navigation', 'twentytwelve'); ?></h3>
        <div class="nav-previous"><?php next_posts_link( __('<span class="meta-nav">&larr;</span> Older posts',
        'twentytwelve')); ?></div>
        <div class="nav-next"><?php previous_posts_link( __('Newer posts <span class="meta-nav">&rarr;</span>',
        'twentytwelve')); ?></div>
      </nav><!-- #<?php echo $html_id; ?> .navigation -->
    <?php endif;
  }
endif;



if (!function_exists('twentytwelve_entry_meta')) :
/**
* Set up post entry meta.
*
* Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
*
* Create your own twentytwelve_entry_meta() to override in a child theme.
*
* @since Mfind 1.0
*
* @return void
*/
function twentytwelve_entry_meta() {
// Translators: used between list items, there is a space after the comma.
  $categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

// Translators: used between list items, there is a space after the comma.
  $tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

  $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
    esc_url(get_permalink()),
    esc_attr(get_the_time()),
    esc_attr(get_the_date('c')),
    esc_html(get_the_date())
  );

  $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>
    </span>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author())),
    get_the_author()
  );

// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
  if ($tag_list) {
    $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.',
      'twentytwelve' );
  } elseif ($categories_list) {
    $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve'
  );
  } else {
    $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
  }

  printf(
    $utility_text,
    $categories_list,
    $tag_list,
    $date,
    $author
  );
}
endif;

/**
* Extend the default WordPress body classes.
*
* Extends the default WordPress body class to denote:
* 1. Using a full-width layout, when no active widgets in the sidebar
*    or full-width template.
* 2. Front Page template: thumbnail in use and number of sidebars for
*    widget areas.
* 3. White or empty background color to change the layout and spacing.
* 4. Custom fonts enabled.
* 5. Single or multiple authors.
*
* @since Mfind 1.0
*
* @param array $classes Existing class values.
* @return array Filtered class values.
*/
function twentytwelve_body_class($classes) {
  $background_color = get_background_color();
  $background_image = get_background_image();

  if (is_page_template('page-templates/front-page.php')) {
    $classes[] = 'template-front-page';
    if (has_post_thumbnail()) {
      $classes[] = 'has-post-thumbnail';
    }
    if (is_active_sidebar('sidebar-2') && is_active_sidebar('sidebar-3')) {
      $classes[] = 'two-sidebars';
    }
  }

  if (empty($background_image)) {
    if (empty($background_color)) {
      $classes[] = 'custom-background-empty';
    }
    elseif (in_array($background_color, array('fff', 'ffffff'))) {
      $classes[] = 'custom-background-white';
    }
  }

// Enable custom font class only if the font CSS is queued to load.
  if (wp_style_is('twentytwelve-fonts', 'queue')) {
    $classes[] = 'custom-font-enabled';
  }
  return $classes;
}
add_filter('body_class', 'twentytwelve_body_class');

function ajax_url_script() {
  wp_localize_script( 'main-page-js', 'main_ajax_call', array(
    'ajax_url' => admin_url('admin-ajax.php')
  ));
}
add_action('wp_enqueue_scripts', 'ajax_url_script');

function post_filter() {
  require_once('article-filter.php');
  die();
}
add_action('wp_ajax_post_filter', 'post_filter');
add_action('wp_ajax_nopriv_post_filter', 'post_filter');

/**
* Register postMessage support.
*
* Add postMessage support for site title and description for the Customizer.
*
* @since Mfind 1.0
*
* @param WP_Customize_Manager $wp_customize Customizer object.
* @return void
*/
function twentytwelve_customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport         = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}
add_action('customize_register', 'twentytwelve_customize_register');

/**
* Enqueue Javascript postMessage handlers for the Customizer.
*
* Binds JS handlers to make the Customizer preview reload changes asynchronously.
*
* @since Mfind 1.0
*
* @return void
*/
function twentytwelve_customize_preview_js() {
  wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js',
    array('customize-preview'), '20130301', true);
}
add_action('customize_preview_init', 'twentytwelve_customize_preview_js');

function get_post_link() {
  $link = get_permalink();
  $tag = get_post_meta(get_the_ID(), 'tag');
  return $link.(!empty($tag[0]) ? '?ubzp='.$tag[0] : '');
}

function get_post_image_url($size = 'thumbnail', $placeholder = true) {
  $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
  $url = $thumb['0'];
  if (empty($url) AND $placeholder) {
    $url = get_template_directory_uri().'/images/placeholder-'.$size.'.jpg';
  }
  return $url;
}

function get_post_image_alt() {
  return get_post_meta(get_post_thumbnail_id() , '_wp_attachment_image_alt', true);
}

function extract_page_numbers($pagination) {
  if (!empty($pagination)) {
    $pagination = str_replace("<ul class='page-numbers'>", '', $pagination);
    $pagination = str_replace('</ul>', '', $pagination);
    $pagination = str_replace("<span class='page-numbers current'>", '<a class="current" href="#">', $pagination);
    $pagination = str_replace('</span>', '</a>', $pagination);
    $pagination = str_replace('<span class="page-numbers dots">', '<a class="dots" href="#">', $pagination);
  } else {
    $pagination = '<li><a class="current" rhef="#">1</a></li>';
  }
  return $pagination;
}
/**
* Get either a Gravatar URL or complete image tag for a specified email address.
*
* @param string $email The email address
* @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
* @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
* @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
* @param boole $img True to return a complete IMG tag False for just the URL
* @param array $atts Optional, additional key/value attributes to include in the IMG tag
* @return String containing either just a URL or a complete image tag
* @source https://gravatar.com/site/implement/images/php/
*/
function get_gravatar($email, $s = 80, $d = 'identicon', $r = 'g', $img = false, $atts = array()) {
  $url = 'https://www.gravatar.com/avatar/';
  $url .= md5 (strtolower(trim($email)));
  $url .= "?s=$s&d=$d&r=$r";
  if ($img) {
    $url = '<img src="' . $url . '"';
    foreach ($atts as $key => $val) {
      $url .= ' ' . $key . '="' . $val . '"';
    }
    $url .= ' />';
  }
  return $url;
}

function get_first_image_from_posts($category_id, $limit, $additional_params = '') {
  query_posts('cat='.$category_id.'&showposts='.$limit.$additional_params);

  while (have_posts()) {
    the_post();
    $image_url = get_post_image_url('303x177', false);

    if (!empty($image_url)) {
      return $image_url;
    }
  }
}

function get_first_image_alt_from_posts($category_id, $limit, $additional_params = '') {
  query_posts('cat='.$category_id.'&showposts='.$limit.$additional_params);

  while (have_posts()) {
    the_post();

    $image_url = get_post_image_url('303x177', false);

    if (!empty($image_url)) {
      return get_post_meta(get_post_thumbnail_id() , '_wp_attachment_image_alt', true);
    }
  }
}

/*
* Additional user fields
*/
add_filter('user_contactmethods', 'my_new_contactmethods', 10, 1);

function my_new_contactmethods($contactmethods) {
  $contactmethods['facebook'] = 'URL do profilu - Facebook';
  $contactmethods['google_plus'] = 'URL do profilu - Google Plus';
  $contactmethods['twitter'] = 'URL do profilu - Twitter';

  return $contactmethods;
}

function fb_add_custom_user_profile_fields($user) {
  ?>
  <h3><?php _e('Extra Profile Information', 'your_textdomain'); ?></h3>

  <table class="form-table">
    <tr>
      <th>
        <label for="show_in_team"><?php _e('Wyświetlaj na stronie "Nasz zespół"', 'your_textdomain'); ?></label>
    </th>
    <td>
      <input type="checkbox" name="show_in_team" id="show_in_team" value="1" <?php if
      (get_the_author_meta( 'show_in_team', $user->ID ) == '1'): ?> checked="checked"<?php endif ?> /><br/>
    </td>
  </tr>
  <tr>
    <th>
      <label for="show_in_team"><?php _e('Nie wyświetlaj na stronie "Redakcja Akademii mfind', 'your_textdomain'); ?>
      </label>
  </th>
  <td>
    <input type="checkbox" name="hide_on_editorial_team" id="hide_on_editorial_team" value="1"
    <?php if (get_the_author_meta( 'hide_on_editorial_team', $user->ID ) == '1'): ?> checked="checked"<?php endif ?>
    /><br/>
  </td>
</tr>
</table>
<?php }

function fb_save_custom_user_profile_fields($user_id) {
  if ( !current_user_can('edit_user', $user_id)) {
    return false;
  }
  update_usermeta($user_id, 'show_in_team', $_POST['show_in_team']);
  update_usermeta($user_id, 'hide_on_editorial_team', $_POST['hide_on_editorial_team']);
}

add_action('show_user_profile', 'fb_add_custom_user_profile_fields');
add_action('edit_user_profile', 'fb_add_custom_user_profile_fields');
add_action('personal_options_update', 'fb_save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'fb_save_custom_user_profile_fields');

/*
* Custom body classes
*/
add_filter('body_class', 'custom_body_class');

function custom_body_class($classes) {
  if (is_page(91)) {
    $classes[] = 'home';
  } elseif (is_category(25) OR in_category(25)) {
    $classes[] = 'work';
  } elseif (is_category(26)) {
    $classes[] = 'founders';
  }

  return $classes;
}

/*
* Post/page summary
*/
function display_summary($excerpt) {
  $excerpt = str_replace('<ul>', '<ul class="summary">', $excerpt);

  return $excerpt;
}

/*
*  Make main category not selectable
*/
add_action('admin_footer-post.php', 'wpse_22836_remove_top_categories_checkbox');
add_action('admin_footer-post-new.php', 'wpse_22836_remove_top_categories_checkbox');

function wpse_22836_remove_top_categories_checkbox() {
  global $post_type;

  if ('post' != $post_type) {
    return;
  }
  ?>
  <script type="text/javascript">
    jQuery("#categorychecklist #category-1, #category-pop #popular-category-1").each(function(){
      jQuery(this).remove();
    });
  </script>
  <?php
}

function getPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');

    return "0 View";
  }

  return $count.' Views';
}

function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count == '') {
    $count = 0;

    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}
/* ------------------------------------------------------------ */
/* -- Custom sidebars - single post (article) sidebars */
/* ------------------------------------------------------------ */
function mfind_widgets_init() {
  register_sidebar(array(
    'name' => __( 'Cała akademia - Kategorie - Menu', 'mfind' ),
    'id' => 'about-us',
    'description' => __( 'Cała akademia - Menu Kategorie', 'mfind' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' =>'',
    'after_title' => '',
  ));
}
add_action('widgets_init', 'mfind_widgets_init');

//redirect to forum after lost password
function wpse_lost_password_redirect() {
// Check if have submitted
  $confirm = (isset($_GET['action']) && $_GET['action'] == resetpass);

  if ($confirm) {
    wp_redirect(home_url('/forum/'));
    exit;
  }
}
add_action('login_headerurl', 'wpse_lost_password_redirect');

// change wp-login logo, logo link and logo title
function my_loginlogo() {
  echo '<style type="text/css">
  h1 a {
    background-image: url(' . get_template_directory_uri() . '/images/logo-academy.png) !important;
    height: 44px !important;
  }
  </style>';
}
add_action('login_head', 'my_loginlogo');

function my_login_logo_url() {
  return home_url('/forum/');
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title() {
  return get_bloginfo('name');
}
add_filter('login_headertitle', 'my_login_logo_url_title');

add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
  /* New Wordpress Admin styles */
#wpwrap .widget-title h4 { padding: 10px 15px; white-space: normal; line-height: 1.5; }
  </style>';
}

// enable html5 search form
add_theme_support('html5', array('search-form'));

// noindex, nofollow for tags pagination
function add_noindex_tags() {
  $paged = intval(get_query_var('paged'));
  if (is_tag() && $paged >= 2) {
    echo '<meta name="robots" content="noindex, follow">';
  }
}
add_action('wp_head','add_noindex_tags', 4);

add_action('wp_insert_comment','comment_inserted_notification',99,2);

function comment_inserted_notification($comment_id, $comment_object) {

  $comment = get_comment($comment_id);
  if (empty($comment)) {
    return false;
  }

  $post = get_post($comment->comment_post_ID);
  $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

  if ($comment->comment_type = 'comment') {
    $notify_message  = sprintf( __( 'Nowy komentarz do artykułu: <br><b>"%s"</b>' ), $post->post_title ) . "\r\n\r\n";
    /* translators: 1: comment author, 2: author IP, 3: author domain */
    $notify_message .= sprintf( __('Author : %1$s (IP: %2$s , %3$s)'),
      $comment->comment_author, $comment->comment_author_IP, $comment_author_domain ) . "\r\n";
    $notify_message .= sprintf( __('E-mail : %s'), $comment->comment_author_email ) . "\r\n";
    $notify_message .= sprintf( __('URL    : %s'), $comment->comment_author_url ) . "\r\n";
    $notify_message .= sprintf( __('Whois  : https://whois.arin.net/rest/ip/%s'), $comment->comment_author_IP ) .
    "\r\n\r\n";
    $notify_message .= __('<b>Komentarz:</b><br> ') . $comment->comment_content . "\r\n\r\n";
    $notify_message .= __('<b>Link do komentarza:</b><br>') . "";
    $notify_message .= __('<a href="'. esc_url( get_permalink($post->ID) ) .'#comment-'.$comment_id.'">'.
      esc_url( get_permalink($post->ID) ) .'#comment-'.$comment_id.'</a>') . "\r\n";
    $notify_message .= __('<b>Link do wszystkich komentarzy tego artykułu:</b><br>') . "";
    $notify_message .= __('<a href="'. esc_url( get_permalink($post->ID) ) .'#comments">'.
      esc_url( get_permalink($post->ID) ) .'#comments</a>') . "\r\n";

    /* translators: 1: blog name, 2: post title */
    @wp_mail('komentarze.akademia@mfind.pl', 'Nowy komentarz na Akademii', $notify_message);
  }
}

/* tymczasowe - ustawienie reklamy rolldown */
// Register and define the settings
add_action('admin_init', 'mfind_adv_admin_init');
function mfind_adv_admin_init() {
  register_setting(
    'general', // settings page
    'mfind_adv_rolldown', // option name
    'esc_attr' // validation callback
  );

  add_settings_field (
    'mfind_adv_rolldown',
    'Reklama porównywarki mfind - rolldown',
    'mfind_adv_setting_input',
    'general'
  );
}

function get_sponsor_tag_slug() {
  return 'strefa-partnera';
}

function checkPostColor() {
  $postColorClass = 'color_default';
  if (has_tag('ubezpieczenie-zdrowotne')) {
    $postColorClass = 'color_health';
  }
  if (has_tag('ubezpieczenie-mieszkania') || has_tag('ubezpieczenie-domu')) {
    $postColorClass = 'color_home';
  }
  if (has_tag('ubezpieczenie-oc') || has_tag('ubezpieczenie-ac')) {
    $postColorClass = 'color_car';
  }
  if (has_tag('ubezpieczenie-turystyczne')) {
    $postColorClass = 'color_tour';
  }
  if (has_tag(get_sponsor_tag_slug())) {
    $postColorClass = 'color_partner';
  }
  echo $postColorClass;
}

add_filter('post_class', 'remove_hentry');
function remove_hentry($class) {
  $class = array_diff($class, array('hentry'));
  return $class;
}

/*-----------------------------------------------------------------------------------*/
/*  Breadcrumbs with Google Frienldy Rich Snippet Tools
/*-----------------------------------------------------------------------------------*/
if (!function_exists('custom_breadcrumbs')) {
  function custom_breadcrumbs() {
    include 'template-parts/breadcrumbs.html.php';
  }
}

add_action( 'template_redirect', 'mfind_banery_cpt_singular_posts' );
function mfind_banery_cpt_singular_posts() {
  if ( is_singular('mfind_banery') ) {
    wp_redirect( home_url(), 302 );
    exit;
  }
}

function style_loader_tag($html, $handle, $href) {

  // default media-attribute is "all"
  $media = 'all';

  // try to catch media-attribute in the html tag
  if (preg_match('/media=\'(.*)\'/', $html, $match)) {

      // extract media-attribute
      if (isset($match[1]) && !empty($match[1])) {
          $media = $match[1];
      }
  }
  if (strpos($href, '//fonts.googleapis.com') !== false) {
    return '<link id="'.$handle.'" rel="preload" href="'.$href.'" as="style" media="'.$media.'" onload="this.onload=null;this.rel=\'stylesheet\'" type="text/css"><noscript><link id="'.$handle.'" rel="stylesheet" href="'.$href.'" media="'.$media.'" type="text/css"></noscript>'."\n";
  }
  return $html;
}

add_filter('style_loader_tag', 'style_loader_tag', PHP_INT_MAX, 3);

add_action('template_redirect', 'redirect_to_home_page');
function redirect_to_home_page() {
  if (is_paged() && is_home()) {
    wp_redirect(home_url(), 301);
    exit;
  }
}

if (!function_exists('t5_add_page_number')) {
  function t5_add_page_number($page_title) {
    global $page;
    $paged = get_query_var('paged', $page);
    if (!empty($paged) && $paged > 1) {
      $page_title .= ' | ' . sprintf('Strona: %s', $paged);
    }
    return $page_title;
  }
  add_filter('wp_title', 't5_add_page_number', 100, 1);
  add_filter('wpseo_metadesc', 't5_add_page_number', 100, 1);
}

add_filter('acf/settings/remove_wp_meta_box', '__return_false');

if ( !function_exists('author_template') ):
  function author_template($href_url)
  {
    ob_start();
    if ( has_tag( get_sponsor_tag_slug() ) ): ?>
    <p class="post_author">Artykuł sponsorowany</p>
  <?php  elseif (get_the_author() != 'mfind'): ?>
      <p class="post_author">
        <a href="<?= $href_url ?>" itemprop="author">
          <?= get_the_author(); ?>
        </a>
      </p>
    <?php
    endif;
    echo ob_get_clean();
  }
endif;
