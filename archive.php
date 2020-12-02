<?php
/**
* Template Name: Lista artykułów
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
    <h2>Artykuły</h2>
  </div>

  <div id="content-holder">
    <div id="content">
      <div class="categories-page search">
        <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'paged' => $paged,
            'posts_per_page' => 10,
            'post_status' => 'publish'
          );

          query_posts($args);
          if (have_posts()) : 
            while (have_posts()) : the_post(); 
              get_template_part('template-parts/content');
            endwhile; 
          endif; 
          wp_reset_query(); 
        ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
