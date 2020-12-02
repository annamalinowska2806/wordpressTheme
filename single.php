<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Mfindtetete
 * @since Mfind 1.0
 */
$category = get_the_category();
$title = htmlspecialchars(get_the_title());
$title = preg_replace("/&#?[a-z0-9]+;/i", "", $title);
$title = preg_replace("/#[a-z0-9]+/i", "", $title);
$title = preg_replace("/;+/i", "", $title);
setPostViews(get_the_ID());
get_header();

$post_image = get_post_image_url('827x265', false);

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
  'orderby' => 'date',
  'posts_per_page' => 4,
  'post_type' => 'post',
  'tag' => $recommendedTag,
  'post__not_in' => [ $post->ID ],
  'meta_key' => '_thumbnail_id',
  'meta_query'  => array(
    'relation' => 'OR',
    // key 'IS_CLONE' zastosowany jest to do testow A B
    ['key' => 'IS_CLONE', 'compare' => 'NOT_EXISTING'],
    ['key' => 'IS_CLONE', 'compare' => '!=', 'value' => 1]
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
]);
?>
<div class="image-options">
  <div class="item-content">
    <ul>
      <li class="fb">
        <a target="_blank" rel="nofollow noreferrer noopener"
           href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink($post->ID); ?>">
        </a>
      </li>
      <li class="tw">
        <a target="_blank" rel="nofollow noreferrer noopener"
           href="https://www.twitter.com/share?url=<?php echo get_permalink($post->ID); ?>">
        </a>
      </li>
      <li class="gplus">
        <a target="_blank" rel="nofollow noreferrer noopener"
           href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID); ?>">
        </a>
      </li>
      <li class="pin">
        <a target="_blank" rel="nofollow noreferrer noopener"
           href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink($post->ID); ?>">
        </a>
      </li>
    </ul>
  </div>
</div>

<div id="content-cont">
  <?php custom_breadcrumbs(); ?>
  <div id="content-holder">
    <div id="content" itemscope itemtype="https://schema.org/Article">
      <div class="container">
        <div class="headline-wrapper">
          <div class="item-content">
            <h1 itemprop="headline"><?php echo get_the_title(); ?></h1>
          </div>

          <div class="article-info">
            <span class="article-info_divider" itemprop="publisher" itemscope
                  itemtype="https://schema.org/Organization">
              <?php if (has_tag(get_sponsor_tag_slug())): ?>
                <span>Artykuł sponsorowany</span>
              <?php else: ?>
                Autor:
                <span class="article-info_author-name"><?php echo get_the_author(); ?></span>
              <?php endif; ?>
              <meta itemprop="name" content="mfind">
              <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="image">
                <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logo-academy.png">
              </span>
            </span>
            <span class="date article-info_divider" itemprop="datePublished" content="<?php the_time('Y-m-d'); ?>">
              opublikowano: <?php the_time('d.m.Y'); ?>
            </span>
            <meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">
            <meta itemprop="mainEntityOfPage" content="mfind">
            <a href="#comments" class="article-info_comments"><?php echo get_comments_number(); ?> komentarzy</a>
            <span class="share-social">
              <div class="rating-wrap"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
            </span>
          </div>
        </div>
      </div>

      <?php if ($post_image): ?>
        <div class="image-wrapper" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
          <img itemprop="image" class="article-image tooltip" alt="<?php echo get_the_title();?>"
               title="<?php echo get_the_title();?>" src="<?php echo $post_image; ?>" >
          <meta itemprop="url" content="<?php echo $post_image; ?>">
          <meta itemprop="width" content="827">
          <meta itemprop="height" content="265">
        </div>
      <?php endif; ?>

      <div class="container">
        <div class="article with-sidebar">
            <div class="article-content">
                <div class="article-text single-article-content" itemprop="articleBody" id="single-article-content">
                  <?php
                    while (have_posts()): the_post();
                      if (get_field('artykul_zajawka')) {
                        ?>
                        <p class="article-teaser" itemprop="description">
                          <?php the_field('artykul_zajawka'); ?>
                        </p>
                        <?php
                      }
                      /* Banner Marketingu */
                      do_shortcode('[mfind_banner type="under_excerpt"]');
                      /* Article inner sidebar widget */
                      $content = apply_filters('the_content', $post->post_content);
                      echo $content;
                    endwhile;
                  ?>
                </div>

                <?php do_shortcode('[mfind_banner type="article-bottom-wideboard"]'); ?>

                <?php if ($post->post_excerpt): ?>
                  <div class="clearfix"></div>
                  <div id="summary">
                    <h4 class="article-section-title with-negative-margin summary-section">Podsumowanie</h4>
                    <div class="item-content">
                      <?php echo display_summary(get_the_excerpt()); ?>
                    </div>
                  </div>
                <?php endif;

                if ( (get_the_author() != 'mfind') && !has_tag(get_sponsor_tag_slug()) ): ?>
                  <div class="person-box">
                    <div class="person-image-with-link">
                      <?php
                        $facebook = get_the_author_meta('facebook');
                        $google_plus = get_the_author_meta('google_plus');
                        $twitter = get_the_author_meta('twitter');
                      ?>
                      <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                        <div class="entry_author_image">
                          <?php echo get_wp_user_avatar(get_the_author_meta('ID'), 124); ?>
                        </div>
                      </a>
                      <ul class="author-social">
                        <?php if (!empty($twitter)): ?>
                          <li class="tw">
                            <a rel="nofollow noreferrer noopener" href="<?php echo $twitter;?>" target="_blank">
                              Twitter
                            </a>
                          </li>
                        <?php endif; ?>
                      </ul>
                    </div>
                    <div class="person-info">
                      <h4 class="name">
                        <a href="<?php echo get_home_url();?>/redakcja#<?php the_author_meta('nicename'); ?>">
                          Autor artykułu:
                          <span itemprop="author"><?php echo get_the_author(); ?></span>
                        </a>
                      </h4>
                      <p><?php echo get_the_author_meta('description'); ?></p>
                    </div>
                  </div>
                <?php endif; ?>

                <h4 class="article-section-title with-margin">Zobacz także:</h4>
                <div class="more-posts-box">
                  <div class="download-banner mfind-adv-tracking" data-adv-tracking-id="27">
                    <?php do_shortcode('[mfind_banner type="article-sidebar-basic"]'); ?>
                  </div>
                  <div class="more-posts">
                    <?php while ($see_also->have_posts()): $see_also->the_post(); ?>
                      <div class="box more <?php checkPostColor(); ?>">
                        <div class="details">
                          <?php author_template(get_post_link()); ?>
                          <h3 class="post-title">
                            <a class="post-link" href="<?php echo get_post_link(); ?>"><?php echo the_title();?></a>
                          </h3>
                        </div>
                      </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                  </div>
                </div>
              </div>
            <?php comments_template('', true); ?>
          </div><!-- end of .article-content -->
        </div><!-- end of article with-sidebar -->
      </div>
    </div><!-- end of #content -->
    <?php get_sidebar(); ?>

    <div class="clear"></div>
  </div><!-- end of #content-holder -->
</div><!-- end of #content-cont -->

<?php do_shortcode('[mfind_banner type="article-power-slider"]'); ?>

<div id="callback-widget-open" class="hide">
  <div id="callback" class="background-image">
    <div id="callback-content">
      <div class="callback-inner">
        <div class="call-to-action">
          <h3>Pomożemy Ci znaleźć <br> najtańsze OC</h3>
          <p>Zostaw numer, oddzwonimy <br> w ciągu 30s</p>
        </div>
        <div class="thank-you-message">
          <h3>Gotowe!</h3>
          <p>Dziękujemy za zamówienie rozmowy, nasz konsultant odezwie się w ciągu kilku minut.</p>
          <a class="modal-button thank-you-anchor" href="<?= get_home_url(); ?>">
            Więcej o ubezpieczeniach
          </a>
        </div>
        <div class="callback-modal-close">&times;</div>
        <form class="form" id="contactForm"
              data-request-url="<?= B2C_API_URL . '/calculations/auto/create'; ?>"
              data-auth-hash="<?= B2C_API_AUTHORIZATION; ?>">
          <input id="phone" type="tel" class="input_form w-input"
                 placeholder="Wprowadź numer..." minlength="9" maxlength="9"
                 name="phone" data-name="Phone">
          <button type="submit" class="modal-button">ZAMÓW ROZMOWĘ <i class="fa fa-phone" aria-hidden="true"></i></button>
          <div class="acceptance-box">
            <input class="w3-check" type="checkbox" name="agreements[]" value="14">
            <label>
              <div class="container-acceptance">
                <div class="content-excerpt">Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z
                  <a href="<?= MAIN_HOST; ?>/regulamin-polityka-prywatnosci/#polityka-prywatnosci" target="_blank">
                    Polityką prywatności
                  </a>
                </div>
                <a class="button-hide">(pokaż mniej)</a>
                <a class="button-show">(pokaż więcej)</a>
                <div class="content-showmore">
                  <p>Wyrażam zgodę na przetwarzanie moich danych osobowych podanych przeze mnie w powyższym formularzu
                  przez mfind sp. z o.o. oraz mfind IT sp. z o.o. w celu kontaktu ze mną związanego z dokonaniem porównania
                  i przedstawienia mi ofert ubezpieczeniowych, udostępnienia moich danych wybranym zakładom ubezpieczeń
                  oraz multiagencjom i ewentualnego zawarcia umowy ubezpieczenia. Jestem świadomy, że podanie danych
                  osobowych jest dobrowolne, a powyższą zgodę mogę w każdej chwili cofnąć w całości lub w części. </p>
                  <p> Więcej o sposobie przetwarzania Twoich danych osobowych oraz przysługujących Ci w związku z tym
                  uprawnieniach czytaj w
                  <a href="<?= MAIN_HOST; ?>/regulamin-polityka-prywatnosci/#polityka-prywatnosci"
                     target="_blank">Polityką prywatności</a>.</p>
                  <a class="button-hide">(pokaż mniej)</a>
                </div>
              </div>
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="callback-widget">
  <div class="callback-tooltip">
    <span class="tooltiptext">Pomożemy Ci znaleźć najtańsze OC <br> Zostaw numer, oddzwonimy w ciągu 30s</span>
    <div class="callback-tooltip-close">&times;</div>
  </div>
  <button class="callback-trigger">
    <img src="<?php echo get_template_directory_uri(); ?>/images/callback-widget/callback-button.png"
         alt="Ikona telefonu">
  </button>
</div>

<div id="wrapper-footer">
  <?php get_footer();?>
</div>
