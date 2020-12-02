<?php
/**
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php post_class(); ?> >
<head>
  <link rel="dns-prefetch" href="//ajax.googleapis.com">
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="dns-prefetch" href="//google-analytics.com">
  <link rel="dns-prefetch" href="//www.google-analytics.com">
  <link rel="dns-prefetch" href="//www.googletagmanager.com">
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
  $user_id = get_the_author_meta('ID');
  $ogType = 'website';
  $meta_wpseo_social = get_option( 'wpseo_social' );
  $meta_wpseo_title = esc_attr( $meta_wpseo_social['og_frontpage_title'] );
  $meta_wpseo_desc  = esc_attr( $meta_wpseo_social['og_frontpage_desc'] );
  $meta_wpseo_image = esc_attr( $meta_wpseo_social['og_frontpage_image'] );

if (is_single()) {
  $ogType = 'article';
  $meta_wpseo_title = get_post_meta($post->ID, '_yoast_wpseo_title', true);
  $meta_wpseo_desc = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
  if (get_field('article_og_image')) {
    $meta_wpseo_image = get_field('article_og_image');
  } else {
    $meta_wpseo_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
  }
  wp_reset_postdata();
} elseif (is_category()) {
  $meta_wpseo_title = single_cat_title('',false);
  $meta_wpseo_desc = category_description();
} elseif (!is_home()) {
  $meta_wpseo_title = get_post_meta($post->ID, '_yoast_wpseo_title', true);
  $meta_wpseo_desc = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
}
if (is_author()) {
  $meta_wpseo_desc = get_field('dodatkowy_opis', 'user_' . $user_id) . ' | Strona: ' . $paged;
}
?>
  <meta property="og:locale" content="pl_PL" />
  <meta property="og:type" content="<?php echo $ogType; ?>" />
  <meta property="og:title" content="<?php echo $meta_wpseo_title; ?>" />
  <meta property="og:description" content="<?php echo $meta_wpseo_desc; ?>" />
  <meta property="og:image" content="<?php echo $meta_wpseo_image; ?>" />
  <meta property="og:url" content="<?php echo $current_url = home_url(add_query_arg(array(), $wp->request)); ?>/" />
  <meta content="https://www.facebook.com/akademiamfind" property="article:publisher">
  <meta content="1679599675" property="fb:admins">

  <?php if (is_page('kontakt') || is_page('kontakt-2')) { ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" defer></script>
  <?php } ?>

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
  <script>
    var main_ajax_call = {
      ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>',
      pid: '<?php echo $post->ID; ?>'
    };
  </script>
  <?php include("critical-css.php"); ?>
  <?php wp_head(); ?>
  <script id="load-css" type="text/javascript">/*<![CDATA[*/(function(w){"use strict";if(!w.loadCSS){w.loadCSS=function(){}}
  var rp=loadCSS.relpreload={};rp.support=(function(){var ret;try{ret=w.document.createElement("link").relList.supports("preload")}catch(e){ret=!1}
  return function(){return ret}})();rp.bindMediaToggle=function(link){var finalMedia=link.media||"all";function enableStylesheet(){link.media=finalMedia}
  if(link.addEventListener){link.addEventListener("load",enableStylesheet)}else if(link.attachEvent){link.attachEvent("onload",enableStylesheet)}
  setTimeout(function(){link.rel="stylesheet";link.media="only x"});setTimeout(enableStylesheet,3000)};rp.poly=function(){if(rp.support()){return}
  var links=w.document.getElementsByTagName("link");for(var i=0;i<links.length;i++){var link=links[i];if(link.rel==="preload"&&link.getAttribute("as")==="style"&&!link.getAttribute("data-loadcss")){link.setAttribute("data-loadcss",!0);rp.bindMediaToggle(link)}}};if(!rp.support()){rp.poly();var run=w.setInterval(rp.poly,500);if(w.addEventListener){w.addEventListener("load",function(){rp.poly();w.clearInterval(run)})}else if(w.attachEvent){w.attachEvent("onload",function(){rp.poly();w.clearInterval(run)})}}
  if(typeof exports!=="undefined"){exports.loadCSS=loadCSS}else{w.loadCSS=loadCSS}}(typeof global!=="undefined"?global:this))/*]]>*/</script>
</head>
<body <?php body_class(); ?> >
  <!-- Dodanie api do facebook -->
  <div id="fb-root"></div>
  <script>
    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.4";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-T6J2TP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push(
      {'gtm.start': new Date().getTime(),event:'gtm.js'}
      );var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-T6J2TP');</script>
  <!-- End Google Tag Manager -->
<?php if (is_home()) { do_shortcode( '[mfind_banner type="home-top-panel"]'); } ?>
<div class="content-top-wrap">
  <header class="content-top">
    <div class="wrapper">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"
         title="Porównywarka OC i AC najtańsze ubezpieczenie samochodu">
        <img src="<?php echo get_template_directory_uri();?>/images/logo_akademia.svg" alt="mfind.pl">
      </a>
      <nav class="main-menu" id="main-menu">
        <span class="menu-mobile-trigger" id="menu-mobile-trigger">Menu<i class="menu-arrow"></i></span>
        <div class="main-menu-content-scroll-wrap">
          <div class="main-menu-content-wrap">
            <div class="main-menu-content">
              <ul class="social">
                <li class="fa fa-google-plus">
                  <a target="_blank" rel="nofollow noreferrer noopener"
                     href="<?php echo mfind_get_option('link-google'); ?>">google+</a>
                </li>
                <li class="fa fa-twitter">
                  <a target="_blank" rel="nofollow noreferrer noopener"
                     href="<?php echo mfind_get_option('link-twitter'); ?>">twitter</a>
                </li>
                <li class="fa fa-facebook">
                  <a target="_blank" rel="nofollow noreferrer noopener"
                     href="<?php echo mfind_get_option('link-facebook'); ?>">facebook</a>
                </li>
                <li class="wykop">
                  <a target="_blank" rel="nofollow noreferrer noopener"
                     href="<?php echo mfind_get_option('link-wykop'); ?>">wykop</a>
                </li>
              </ul>
              <div class="main-menu_searchFormToggle js-searchFormToggle">menu</div>
              <div class="main-menu_searchForm js-searchForm">
                Szukaj...
                <?php echo get_search_form(); ?>
                <i class="fa fa-search"></i>
              </div>
              <ul class="main-menu-list">
                <li class="menu-item has-sub-menu">
                  <p>Kategorie</p>
                  <div class="sub-menu">
                    <?php if (is_active_sidebar('about-us')): ?>
                      <ul>
                        <?php dynamic_sidebar('about-us'); ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </li>
                <li class="menu-item">
                  <a href="<?php echo MAIN_HOST; ?>/?icm_source=akademia&icm_medium=link_stopka&icm_campaign=mfind"
                     title="Porównywarka ubezpieczeń">Porównywarka ubezpieczeń</a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo MAIN_HOST; ?>/ubezpieczenie-oc-ac/kalkulator-oc-ac?mpc=akademia"
                     title="Kalkulator OC/AC mfind">Kalkulator OC i AC</a>
                </li>
              </ul>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </nav>
      <div class="clear"></div>
    </div>
  </header>
</div>
<?php
  if (is_single()):
      do_shortcode('[mfind_banner type="rolldown"]');
  endif;
?>

<div id="wrapper">
