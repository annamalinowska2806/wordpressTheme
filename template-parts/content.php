<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Mfind
 * @since Mfind 1.0
 */
$post_image = get_post_image_url('689x218', false);

if ( is_tag() || is_category() || is_search() ) { ?>

  <div class="box <?php if ($post_image): ?>with-image <?php endif; checkPostColor(); ?>" itemscope
       itemtype="https://schema.org/Article">
    <?php if ($post_image): ?>
    <div class="image-wrapper">
      <a itemprop="url" href="<?= get_post_link(); ?>">
        <img class="post-image" src="<?= $post_image; ?>" alt="">
        <meta itemprop="image" content="<?= $post_image; ?>" />
      </a>
      <div class="author">
        <?php author_template(get_post_link()); ?>
      </div>
    </div>
    <?php else: ?>
    <div class="author">
      <?php author_template(get_post_link()); ?>
    </div>
    <?php endif; ?>
    <div class="details">
      <h3 class="post-title">
        <a href="<?= get_post_link(); ?>" itemprop="headline name"><?php the_title(); ?></a>
      </h3>
      <p itemprop="description">
        <?php
          if ( get_field('artykul_zajawka') ) {
            the_field('artykul_zajawka');
          } else {
            the_content_rss('', true, '', 50);
          }
        ?>
        <a class="more" href="<?= get_post_link(); ?>" rel="nofollow">Czytaj&nbsp;więcej&nbsp;&raquo;</a>
      </p>
    </div>
  </div>

<?php } elseif ( is_author() ) { ?>

  <div class="box <?php if ($post_image): ?>with-image <?php endif; checkPostColor(); ?>">
    <?php if ($post_image): ?>
    <div class="image-wrapper">
      <a href="<?= get_post_link(); ?>">
        <img class="post-image" src="<?= $post_image; ?>" alt="">
      </a>
      <div class="author">
        <?php author_template(get_post_link()); ?>
      </div>
    </div>
    <?php else: ?>
    <div class="author">
      <?php author_template(get_post_link()); ?>
    </div>
    <?php endif; ?>

    <div class="details">
      <h3 class="post-title">
        <a href="<?= get_post_link(); ?>"><?php the_title(); ?></a>
      </h3>
      <p>
        <?php the_content_rss('', true, '', 50); ?>
        <a class="more" href="<?= get_post_link(); ?>" rel="nofollow">Czytaj&nbsp;więcej&nbsp;&raquo;</a>
      </p>
    </div>
  </div>

<?php } else { ?>

  <div class="box js-box-load <?php checkPostColor(); ?>" data-postid="<?= get_the_ID(); ?>" itemscope
       itemtype="https://schema.org/Article">
    <?php
      $image_wrapper_classes = ['image-date-wrapper'];
      if (get_field('al_article_image_size')) {
        $image_wrapper_classes[] = get_field('al_article_image_size');
      }
      if (get_field('al_article_image_position')) {
        $image_wrapper_classes[] = get_field('al_article_image_position');
      }
    ?>
    <div class="<?= join(' ', $image_wrapper_classes); ?>">
      <?php if (get_field('article_og_image')): ?>
      <a itemprop="url" href="<?php echo get_permalink(); ?>"
         style="background-image: url(<?php the_field('article_og_image'); ?>);">
        <meta itemprop="image" content="<?php the_field('article_og_image'); ?>" />
      </a>
      <?php elseif (get_post_image_url('740x416')): ?>
      <a temprop="url" href="<?= get_permalink(); ?>"
         style="background-image: url(<?= get_post_image_url('740x416'); ?>);">
      </a>
      <?php endif; ?>
    </div>
    <?php author_template(get_post_link()); ?>
    <h3 class="post-title">
      <a href="<?= get_permalink(); ?>" itemprop="headline name"><?php the_title(); ?></a>
    </h3>
  </div>
<?php } ?>
