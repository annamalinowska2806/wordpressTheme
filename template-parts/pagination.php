<?php 
  global $wp_query;
  $big = 999999999; // need an unlikely integer
  $page_links = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_next' => false,
    'type' => 'list'
  ));
  if ($wp_query->max_num_pages > 1): 
?>
  <div class="pagination">
    <ul>
      <?php if (get_previous_posts_link()): ?>
        <li class="prev">
          <?php echo previous_posts_link('Poprzednia strona'); ?>
        </li>
        <?php endif; ?>
        <?php echo extract_page_numbers($page_links); ?>
        <?php if (get_next_posts_link()): ?>
          <li class="next">
            <?php echo next_posts_link('Następna strona'); ?>
          </li>
        <?php endif; ?>
    </ul>
  </div>
<?php endif; ?>
