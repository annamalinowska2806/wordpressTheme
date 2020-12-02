<?php
/**
* The template for displaying Category pages
*
* Used to display archive-type pages for posts in a category.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
?>


<div class="headline-wrapper no-border">
  <h1><?php echo get_cat_name(get_query_var('cat')); ?></h1>
  <p><?php echo category_description(get_query_var('cat')); ?></p>
</div>

<div id="content-cont">
  <?php custom_breadcrumbs(); ?>
  <div id="content-holder">
    <div id="content">
      <div class="categories-page search">
        <?php 
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $i = 0; 
          $query = new WP_Query(array(
            'cat' => get_query_var('cat'),
            'paged' => $paged,
          ));
          if ($query->have_posts()) : 
            while ($query->have_posts()): $query->the_post();
              include('template-parts/content.php'); 
            endwhile;
            get_template_part('template-parts/pagination');
          endif; 
        ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
