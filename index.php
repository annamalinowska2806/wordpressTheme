<?php
/**
 * Template Name: Akademia
 *
 * @package WordPress
 * @subpackage Mfind
 * @since Mfind 1.0
 */
get_header();
$excluded_ids_from_load_more = [118, 123, 125]; // excluded and already loaded posts

$meta_query_not_cloned = [
  'relation' => 'OR',
  ['key' => 'IS_CLONE', 'compare' => 'NOT EXISTS', 'value' => ''],
  ['key' => 'IS_CLONE', 'compare' => '!=', 'value' => 1]
];

$partner_btn_visible = false;

$queryBigBox = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 1,
  'meta_key' => 'wyswietlaj_w_module_duzym',
  'meta_value' => 1,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $excluded_ids_from_load_more,
  'meta_query' => $meta_query_not_cloned
]);

if ( $queryBigBox->have_posts() ) {
  $post_ids = wp_list_pluck($queryBigBox->posts, 'ID');
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $post_ids);
}

$queryFirstSmallBox = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 1,
  'meta_key' => 'wyswietlaj_w_module_malym',
  'meta_value' => 1,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $excluded_ids_from_load_more,
  'meta_query' => $meta_query_not_cloned
]);

if ( $queryFirstSmallBox->have_posts() ) {
  $post_ids = wp_list_pluck($queryFirstSmallBox->posts, 'ID');
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $post_ids);
}

$querySecondSmallBox = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 1,
  'meta_key' => 'wyswietlaj_w_module_malym_drugim',
  'meta_value' => 1,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $excluded_ids_from_load_more,
  'meta_query' => $meta_query_not_cloned
]);

if ( $querySecondSmallBox->have_posts() ) {
  $post_ids = wp_list_pluck($querySecondSmallBox->posts, 'ID');
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $post_ids);
}

$queryAllPosts = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $excluded_ids_from_load_more,
  'meta_query' => $meta_query_not_cloned,
  'tax_query' => [
    [
      'taxonomy' => 'post_tag',
      'field' => 'slug',
      'terms' => get_sponsor_tag_slug(),
      'operator' => 'NOT IN'
    ]
  ]
]);

if ( $queryAllPosts->have_posts() ) {
  $post_ids = wp_list_pluck($queryAllPosts->posts, 'ID');
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $post_ids);
}

$queryPartner = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $excluded_ids_from_load_more,
  'tag' => get_sponsor_tag_slug(),
  'meta_query' => $meta_query_not_cloned
]);

if ( $queryPartner->have_posts() ) {
  $partner_btn_visible = true;
  $post_ids = wp_list_pluck($queryPartner->posts, 'ID');
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $post_ids);
}

$queryClonedPosts = new WP_Query([
  'post_type' => 'post',
  'fields' => 'ids',
  'post__not_in' => $excluded_ids_from_load_more,
  'meta_query' => [
    ['key' => 'IS_CLONE', 'compare' => '=', 'value' => 1]
  ]
]);

if ( $queryClonedPosts->have_posts() ) {
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $queryClonedPosts->posts);
}

$queryOtherPartner = new WP_Query([
  'post_type' => 'post',
  'fields' => 'ids',
  'tag' => get_sponsor_tag_slug()
]);

if ( $queryOtherPartner->have_posts() ) {
  $excluded_ids_from_load_more = array_merge($excluded_ids_from_load_more, $queryOtherPartner->posts);
}

// Start template
?>
<div id="main">
  <div class="main-content js-acedemy-mainContent">
    <?php
      do_shortcode('[mfind_banner type="home-wideboard"]');
      custom_breadcrumbs();
    ?>
    <div class="heading-title">
      <h1>Kompletne i profesjonalne źródło wiedzy o ubezpieczeniach</h1>
    </div>
    <div class="academy-filters js-academy-filters">
      <div class="academy-filters_btn academy-filters_btnAllArticles js-academy-filters_btn"
        data-mfind-tag="">
        <div>
          <i class="icon-academy-sections-all"></i>
          <div class="academy-filters_btnTxt">Wszystkie</div>
        </div>
      </div>
      <div class="academy-filters_btn academy-filters_btnCar js-academy-filters_btn"
        data-mfind-tag="ubezpieczenie-oc">
        <div>
          <i class="icon-academy-sections-car"></i>
          <div class="academy-filters_btnTxt">Pojazd</div>
        </div>
      </div>
      <div class="academy-filters_btn academy-filters_btnHealth js-academy-filters_btn"
        data-mfind-tag="ubezpieczenie-zdrowotne">
        <div>
          <i class="icon-academy-sections-health"></i>
          <div class="academy-filters_btnTxt">Zdrowie</div>
        </div>
      </div>
      <div class="academy-filters_btn academy-filters_btnTravel js-academy-filters_btn"
        data-mfind-tag="ubezpieczenie-turystyczne">
        <div>
          <i class="icon-academy-sections-travel"></i>
          <div class="academy-filters_btnTxt">Podróż</div>
        </div>
      </div>
      <div class="academy-filters_btn academy-filters_btnHome js-academy-filters_btn"
        data-mfind-tag="ubezpieczenie-mieszkania">
        <div>
          <i class="icon-academy-sections-home"></i>
          <div class="academy-filters_btnTxt">Nieruchomość</div>
        </div>
      </div>
      <?php if ($partner_btn_visible): ?>
      <div class="academy-filters_btn academy-filters_btnPartnerZone js-academy-filters_btn"
        data-mfind-tag="strefa-partnera">
      <?php else: ?>
      <div class="academy-filters_btn academy-filters_btnPartnerZone section-inactive">
      <?php endif; ?>
        <div>
          <i class="icon-academy-sections-sponsored"></i>
          <div class="academy-filters_btnTxt">Sponsorowane</div>
        </div>
      </div>
    </div>

    <div id="academy" class="section academy">
      <div class="inner clearfix">
        <div class="top-topics section js-top-topics">
          <?php
            while($queryBigBox->have_posts()):
              $queryBigBox->the_post();
              get_template_part('template-parts/box-main');
            endwhile;

            while($queryFirstSmallBox->have_posts()):
              $queryFirstSmallBox->the_post();
              get_template_part('template-parts/box-side');
            endwhile;

            while($querySecondSmallBox->have_posts()):
              $querySecondSmallBox->the_post();
              get_template_part('template-parts/box-side');
            endwhile;
          ?>
        </div>

        <?php do_shortcode('[mfind_banner type="home-power-content"]'); ?>

        <div class="filters-loading js-loadingPosts">
          <i class="fa fa-spinner fa-spin"></i>
        </div>
        <div class="other-topics section clearfix js-other-topics">
          <div id="most-popular">
            <div class="most-popular-content">
              <h2 class="title">Najpopularniejsze</h2>
              <?php wpp_get_mostpopular("post_type=post&range=monthly&limit=3&thumbnail_width=60&thumbnail_height=60&wpp_start='<ol>'&wpp_end='</ol>'&post_html='<li><article><div class=\"col\"><h3>{title}</h3></div></article></li>'"); ?>
            </div>
          </div>

          <?php
            $indexDefaultPost = 0;
            while($queryAllPosts->have_posts()):
              $queryAllPosts->the_post();
              get_template_part('template-parts/content');
              $indexDefaultPost++;
              if ($indexDefaultPost == 4):
                do_shortcode('[mfind_banner type="home-content-box"]');
              endif;
            endwhile;

            while($queryPartner->have_posts()):
              $queryPartner->the_post();
              get_template_part('template-parts/content');
            endwhile;

            echo do_shortcode('[ajax_load_more post_type="post" id="load-more-main" repeater="default" posts_per_page="6" tag="" orderby="date" order="DESC" transition="fade" button_label="pokaż więcej artykułów" scroll="false" exclude="'.implode(',', $excluded_ids_from_load_more).'"]');
          ?>
        </div>
        <div class="academy-filters_more js-academy-filtersMoreShow">
          <button class="js-academy-filtersMore academy-filtersMore alm-load-more-btn more">pokaż więcej artykułów</button>
        </div>
      </div><!-- end .inner -->
      <?php do_shortcode('[mfind_banner type="home-bottom-box"]'); ?>
    </div><!-- end .academy -->
  </div><!-- end .main-content -->
  <?php echo get_footer() ?>
</div><!-- end #main -->
</div><!-- end #wrapper -->
