<?php
/**
* The template for displaying Search Results pages
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
?>

<div id="content-cont">
  <?php custom_breadcrumbs(); ?>
  <div class="headline-wrapper no-border">
    <h2>Szukaj Artykułu: <strong><?php echo get_search_query(); ?></strong></h2>
  </div>
  <div id="content-holder">
    <div id="content">
      <div class="categories-page search">
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $search_query = new WP_Query(array(
            'paged' => $paged,
            'orderby' => 'date',
            'meta_query'  => array(
              array(
                'key' => 'IS_CLONE',
                'compare' => 'NOT_EXISTING'
              )
            )
          ));
          if ( $search_query->have_posts() ) {
            while ( $search_query->have_posts() ) : $search_query->the_post();
              include('template-parts/content.php');
            endwhile;
            get_template_part('template-parts/pagination');
          } else {
            echo 'brak wyników wyszukiwania';
          }
        ?>
      </div>
    </div>

    <div id="sidebar">
      <div class="sidebar-sticky-widgets" id="sidebar-sticky-widgets">
       <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
