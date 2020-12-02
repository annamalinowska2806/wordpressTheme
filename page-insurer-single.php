<?php
/**
* Template Name: Towarzystwo Ubezpieczeniowe - Strona Pojedyncza
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
$post_meta = get_post_meta( $post->ID );
?>
<div class="content-wrap">
  <?php custom_breadcrumbs(); ?>
</div>
<div class="bg-grey">
  <div class="content-wrap" itemscope itemtype="https://schema.org/Article">
    <div class="content-insurer-single">
      <div class="headline-wrapper-box">
        <div class="headline-wrapper-left">
          <h1><?= get_the_title(); ?></h1>
          <p><?= $post_meta["_mfind_insurer_excerpt"][0]; ?></p>
        </div>
        <div class="headline-wrapper-right">
          <?php
          if ( has_post_thumbnail( $post->ID ) ):
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            $image = $image[0]; ?>
            <img class="header-img" src="<?= $image; ?>" alt="<?php the_title(); ?>">
          <?php endif; ?>
        </div>
      </div>
      <div class="insurer-menu">
        <?php get_template_part('template-parts/insurer-custom-menu'); ?>
      </div>
    </div>
  </div>
</div>
<div class="content-wrap">
  <div class="content-insurer-single">
    <div class="content-left">
      <div class="content-text">
          <?php while (have_posts()) : the_post();
            the_content();
          endwhile; // end of the loop. ?>
      </div>
    </div>
    <div class="content-right">
      <div
          class="mfind-widget"
          data-mpc="akademia"
          data-utm-source="insurer"
          data-utm-medium="sidebar"
          data-header-html="Kalkulator OC/AC online<br><span class='widget-text-small'>Porównaj oferty i zaoszczędź na
            polisie</span>"
          data-button="Oblicz składkę <i class='fa fa-long-arrow-right' aria-hidden='true'></i>">
      </div>
    </div>
  </div>
</div>
<div class="content-wrap">
  <?php get_template_part('template-parts/insurer-product-box'); ?>
</div>
<div class="read-more-wrap">
  <div class="content-wrap">
    <?php get_template_part('template-parts/insurer-related-posts'); ?>
  </div>
</div>
<?php get_footer(); ?>
