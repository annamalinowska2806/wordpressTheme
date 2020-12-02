<?php
/**
* The template for displaying Search Results pages
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
$author_full_name = get_the_author_meta('first_name', $user->ID) . ' ' . get_the_author_meta('last_name', $user->ID); 
$user_id = get_the_author_meta('ID');
?>

<?php if (!is_paged()) : ?>
  <div class="headline-wrapper no-border">
    <h1><?php echo $author_full_name; ?></h1>
    <p><?php the_field('dodatkowy_opis', 'user_' . $user_id); ?></p>
  </div>
<?php endif; ?>

<div id="content-cont">
  <?php custom_breadcrumbs(); ?>
  <div id="content-holder">
    <div id="content">
      <div class="categories-page search">
      <!-- The Loop -->
      <?php 
        if (have_posts()) : 
        while (have_posts()) : the_post();
          include('template-parts/content.php');
        endwhile; 
          get_template_part('template-parts/pagination'); 
        else: 
      ?>
        <p><?php _e('No posts by this author.'); ?></p>
      <?php 
        endif;
      ?>
      <!-- End Loop -->
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
