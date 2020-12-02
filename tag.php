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
  <div id="content-holder">
    <div id="content">
      <div class="categories-page search">
        <?php 
          if (have_posts()) : 
            while (have_posts()): the_post();
            
              include('template-parts/content.php');
            
            endwhile;
            get_template_part('template-parts/pagination');
          endif; 
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
