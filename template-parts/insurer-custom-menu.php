<?php
  if (have_posts()) :
    while (have_posts()): the_post(); ?>
<ul class="custom-menu menu-items">
  <?php $custom_menu_group = get_post_meta(get_the_ID(), "insurer_menu_group", true);
    foreach ($custom_menu_group as $value) { ?>
    <li class="menu-item">
      <a class="menu-link" href="<?= $value["menu_page_url"] ?>">
        <?= $value["menu_name"] ?>
      </a>
    </li>
    <?php
    }
  ?>
</ul>

<?php
   endwhile;
endif; ?>
