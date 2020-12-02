<div class="breadcrumbs">
  <ul itemscope itemtype="http://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
      <a itemprop="item" href="<?= MAIN_HOST; ?>">
        <span itemprop="name">Porównywarka ubezpieczeń mfind</span>
      </a>
      <meta itemprop="position" content="1"/>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
      <a itemprop="item" href="<?= home_url() ?>">
        <span itemprop="name">Akademia mfind</span>
      </a>
      <meta itemprop="position" content="2"/>
    </li>
    <?php
    $categories = get_the_category();
    $title = get_the_archive_title();
    $tags = get_the_tags();

    if (!is_front_page()) {
      if (is_category() || is_single()) {
        if ($categories) { ?>
          <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="<?= get_category_link($categories[0]->term_id); ?>" itemprop="item">
              <span itemprop="name"><?= $categories[0]->cat_name ?></span>
            </a>
            <meta itemprop="position" content="3"/>
          </li>
        <?php }
        if (is_single()) { ?>
          <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <span itemprop="name"><?= get_the_title(); ?></span>
            <meta itemprop="position" content="4"/>
          </li>
        <?php }
      } elseif (is_page()) { ?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <span itemprop="name"><?= get_the_title(); ?></span>
          <meta itemprop="position" content="3"/>
        </li>
      <?php } elseif ($tags) { ?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a href="<?= get_tag_link($tags[0]->tag_id); ?>" itemprop="item">
            <span itemprop="name"><?= $title; ?></span>
          </a>
          <meta itemprop="position" content="3"/>
        </li>
      <?php } elseif (is_author()) {
        $author_full_name = get_the_author_meta('first_name', $user->ID) . ' ' .
                             get_the_author_meta('last_name', $user->ID);
      ?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <span itemprop="name"><?= $author_full_name; ?></span>
          <meta itemprop="position" content="3"/>
        </li>
      <?php }
    } ?>
  </ul>
</div>
