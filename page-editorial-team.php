<?php
/**
* Template Name: Redakcja - zespół
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
?>

<div id="content-cont" class="template-editorial">
  <?php custom_breadcrumbs(); ?>
  <div id="content-holder">
    <div id="content">
      <div class="article">
        <div class="article-content">
          <div class="heading-title">
            <h1><?php the_title(); ?></h1>
          </div>
          <?php
            if (!empty(get_the_content())) {
          ?>
            <div class="box">
              <?php the_content(); ?>
            </div>
          <?php
            }
            $user_featured_id = 295; //id gosi dawid-mroz, jest pierwsza
          ?>

          <div class="box box-author" id="<?php the_author_meta('nicename', $user_featured_id); ?>" itemscope
               itemtype="https://schema.org/Person">
            <div class="author-avatar-meta">
              <div class="author-avatar">
                <img src="<?php echo get_wp_user_avatar_src( $user_featured_id, 124 ); ?>" itemprop="image"
                     alt="<?php echo get_the_author_meta('first_name', $user_featured_id) . ' '
                     . get_the_author_meta('last_name', $user_featured_id); ?>" />
              </div>
              <div class="author-meta">
                <meta itemprop="url" content="<?php echo get_home_url() ?>/redakcja#<?php the_author_meta('nicename',
                $user_featured_id); ?>" />
                <h3 class="author-title" itemprop="name">
                  <?php echo get_the_author_meta('first_name', $user_featured_id) . ' '
                  . get_the_author_meta('last_name', $user_featured_id); ?>
                </h3>
                <p class="author-role" itemprop="jobtitle"><?php echo get_field( 'rola', 'user_'.$user_featured_id); ?>
              </p>
              <p class="author-email" itemprop="email">
                <a href="mailto:<?php echo get_the_author_meta('user_email', $user_featured_id); ?>"
                   title="Napisz email do <?php echo get_the_author_meta('first_name', $user_featured_id).' '
                   . get_the_author_meta('last_name', $user_featured_id); ?>">
                  <?php echo get_the_author_meta('user_email', $user_featured_id); ?>
                </a>
              </p>
            </div>
          </div>
          <div class="author-description" itemprop="description">
            <?php echo get_the_author_meta('description', $user_featured_id); ?>
          </div>
          <p class="author-articles-link">
            <a href="<?php echo get_author_posts_url($user_featured_id); ?>" title="Kliknij tutaj i zapoznaj się ze
              wszystkimi artykułami <?php echo get_field( 'imie_-_odmiana', 'user_'.$user_featured_id); ?> &raquo;">
              Kliknij tutaj i zapoznaj się ze wszystkimi artykułami
              <?php echo get_field( 'imie_-_odmiana', 'user_'.$user_featured_id); ?> &raquo;</a>
            </p>
          </div>
          <?php
          /*
          we can't use include and exclude in the same query, so we have to compare the results with this array of excluded ID's
          18 - exclude Dominika Grabek,
          6 - exclude mfind
          1, 11, 19, 9, 15 - exclude some admins
          10 -  Małgorzata Chodacka
          7 - Małgorzata Chłopaś
          5 - Marcin Chłopaś
          16 - Aneta Kaczmarek
          21 - Karina Knorps
          2 - Hanna Laudowicz
          8 - Katarzyna Olczak
          14 - Rafał Rodzeń
          17 - Artur Żuliński

          */
          $exclude_academy_users  = array( 6, 1, 11, 19, 9, 15, 10, 7, 5, 16, 21, 2, 8, 14, 17, 295 );

          $args = array (
            'order' => 'ASC',
            'who' => 'author, administrator'
          );

          $get_academy_authors = get_users( $args );

          // Sort by last_name, must be done this way because WordPress get_users() doesn't support sorting by the last_name
          usort($get_academy_authors, create_function('$a, $b', 'return strnatcasecmp($a->last_name, $b->last_name);'));

          // Result
          foreach ( $get_academy_authors as $user ) {

            $author_full_name = get_the_author_meta('first_name', $user->ID) . ' ' . get_the_author_meta('last_name', $user->ID);

            $user_post_count = count_user_posts( $user->ID , 'post' );
            if ( !in_array($user->ID, $exclude_academy_users) && $user_post_count  > 0 && (get_the_author_meta(
              'hide_on_editorial_team', $user->ID ) != '1') ) {
          ?>
        <div class="box box-author" id="<?php the_author_meta('nicename', $user->ID); ?>" itemscope
          itemtype="https://schema.org/Person">
          <div class="author-avatar-meta">
            <div class="author-avatar">
              <img src="<?php echo get_wp_user_avatar_src( $user->ID, 124 ); ?>" itemprop="image" alt="
              <?php echo $author_full_name; ?>" />
            </div>
            <div class="author-meta">
              <meta itemprop="url" content="<?php echo get_home_url(); ?>/redakcja#<?php the_author_meta('nicename',
              $user->ID); ?>" />

              <h3 class="author-title" itemprop="name"><?php echo $author_full_name; ?></h3>

              <p class="author-role" itemprop="jobtitle">
                <?php if ( get_field('rola', 'user_'.$user->ID) != '' ) {
                  echo get_field('rola', 'user_'.$user->ID);
                } else {
                  echo 'Dziennikarz';
                } ?>
              </p>

              <?php
              /* if it's Wojtek Martyński, then show his email, otherwise show akademia@mfind.pl */
              if ( $user->ID === 4 ) {
              ?>
                <p class="author-email" itemprop="email"><a href="mailto:<?php echo esc_html( $user->user_email );
                ?>" title="Napisz email do <?php echo $author_full_name; ?>"><?php echo esc_html( $user->user_email ); ?>

              </a></p>
            <?php } else { ?>

              <p class="author-email" itemprop="email"><a href="mailto:akademia@mfind.pl" title="Napisz email do
                <?php echo $author_full_name; ?>">akademia@mfind.pl</a></p>
              <?php } ?>
            </div>
          </div>
          <div class="author-description" itemprop="description">
            <?php echo get_the_author_meta('description', $user->ID); ?>
          </div>
          <p class="author-articles-link">
            <a href="<?php echo get_author_posts_url($user->ID); ?>"
              title="Kliknij tutaj i zapoznaj się ze
              wszystkimi artykułami <?php echo get_field( 'imie_-_odmiana', 'user_'.$user->ID); ?> &raquo;">
              Kliknij tutaj i zapoznaj się ze wszystkimi artykułami
              <?php echo get_field( 'imie_-_odmiana', 'user_'.$user->ID); ?> &raquo;</a>
            </p>
          </div>
        <?php
            }
          }
        ?>
        </div>
      </div>
    </div>
     <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
