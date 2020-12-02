<?php
/**
*
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
?>
<div id="content-cont" itemscope itemtype="https://schema.org/Article">
  <?php custom_breadcrumbs(); ?>
  <div class="headline-wrapper no-border">
    <h2><?php echo get_the_title(); ?></h2>
  </div>
  <div id="content-holder">
    <?php if (is_active_sidebar('default')): ?>
      <div id="sidebar"></div>
    <?php endif; ?>
    <div id="content">
      <div class="categories-page search page-single">
        <?php 
          while (have_posts()) : the_post(); 
            the_content();
          endwhile; // end of the loop. 
        ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
