<?php
  $recommendedTag = has_tag();
  switch ($recommendedTag){
    case 'ubezpieczenie-zdrowotne':
        $recommendedTag = 'ubezpieczenie-zdrowotne';
        break;
    case 'ubezpieczenie-mieszkania':
        $recommendedTag = 'ubezpieczenie-mieszkania';
        break;
    case 'ubezpieczenie-domu':
        $recommendedTag = 'ubezpieczenie-domu';
        break;
    case 'ubezpieczenie-oc':
        $recommendedTag = 'ubezpieczenie-oc';
        break;
    case 'ubezpieczenie-ac':
        $recommendedTag = 'ubezpieczenie-ac';
        break;
    case 'ubezpieczenie-turystyczne':
        $recommendedTag = 'ubezpieczenie-turystyczne';
        break;
    default:
        $recommendedTag = '';
        break;
  }

  $see_also = new WP_Query([
    'orderby'        => 'date',
    'posts_per_page' => 4,
    'post_type'      => 'post',
    'tag' => $recommendedTag,
    'post__not_in'   => [ $post->ID ],
    'meta_key'       => '_thumbnail_id',
    'meta_query'     => array(
      'relation' => 'OR',
      // key 'IS_CLONE' zastosowany jest to do testow A B
      ['key'     => 'IS_CLONE', 'compare' => 'NOT_EXISTING'],
      ['key'     => 'IS_CLONE', 'compare' => '!=', 'value' => 1]
    ),
    // exclude partner posts
    'tax_query' => [
      [
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => get_sponsor_tag_slug(),
        'operator' => 'NOT IN'
      ]
    ]
  ]); ?>

<h2 class="read-more-header">Zobacz także</h2>
<div class="read-more-box">
  <?php while ($see_also->have_posts()): $see_also->the_post(); ?>
    <div class="details">
        <?php if ( has_post_thumbnail( $post->ID ) ):
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
          $image = $image[0]; ?>
          <div class="read-more-img" style="background-image: url(<?= $image; ?>);"></div>
        <?php endif; ?>
        </br>
        <?php author_template(get_post_link()); ?>
        <?= $recommendedTag; ?>
        <h3 class="post-title">
          <a class="post-link" href="<?= get_post_link(); ?>"> <?= the_title();?></a>
        </h3>
    </div>
  <?php endwhile; ?>
</div>
