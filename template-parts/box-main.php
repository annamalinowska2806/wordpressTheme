<div class="box large <?php checkPostColor(); ?>" itemscope itemtype="https://schema.org/Article">
  <div class="image-date-wrapper">
    <a itemprop="url" href="<?php echo get_post_link(); ?>" style="background-image: url(<?php echo
      get_post_image_url('full'); ?>);"></a>
    <meta  itemprop="image" content="<?php echo get_post_image_url('full'); ?>" />
  </div>
  <div class="details">
    <?php author_template(get_post_link()); ?>
    <h3 class="post-title">
      <a href="<?php echo get_post_link(); ?>" itemprop="headline name">
        <?php echo the_title(); ?>
      </a>
    </h3>
    <p itemprop="description">
      <?php
        if ( get_field('artykul_zajawka') ) {
          the_field('artykul_zajawka');
        } else {
          the_content_rss('', true, '', 60);
        }
      ?>
    </p>
  </div>
</div>
