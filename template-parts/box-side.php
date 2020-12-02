<div class="box side <?php checkPostColor(); ?>" itemscope itemtype="https://schema.org/Article">
  <div class="details">
    <?php author_template(get_post_link()); ?>
    <h3 class="post-title">
      <a href="<?php echo get_post_link() ?>" itemprop="headline name">
        <?php the_title(); ?>
      </a>
    </h3>
  </div>
  <div class="image-date-wrapper">
    <?php if ( get_field('article_og_image') ) { ?>
      <a itemprop="url" href="<?php echo get_post_link(); ?>"
        style="background-image: url(<?php the_field('article_og_image'); ?>);">
        <meta  itemprop="image" content="<?php the_field('article_og_image'); ?>" />
      </a>
    <?php
      } else if (get_post_image_url('341x208')) {
    ?>
      <a itemprop="url" href="<?php echo get_post_link(); ?>"
        style="background-image: url(<?php echo get_post_image_url('341x208'); ?>);">
        <meta  itemprop="image" content="<?php echo get_post_image_url('341x208'); ?>" />
      </a>
    <?php } else { ?>
      <a itemprop="url" href="<?php echo get_post_link(); ?>"
        style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>);">
        <meta  itemprop="image" content="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" />
      </a>
    <?php
      }
    ?>
  </div>
</div>


