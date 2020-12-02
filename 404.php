<?php
/**
* Template Name: 404
*
* @package WordPress
* @subpackage Mfind
* @since Mfind 1.0
*/
get_header();
?>
<div id="content-cont">
  <div class="breadcrumb-search-wrap clearfix">
    <nav id="breadcrumb" class="with-padding">
      <ol>
        <li><a href="<?php echo MAIN_HOST; ?>" title="mfind.pl">mfind</a></li>
        <li><a href="<?php echo get_home_url(); ?>">Akademia mfind</a></li>
        <li class="last">Błąd 404</li>
      </ol>
    </nav>
  </div>

  <div class="headline-wrapper no-border">
    <h1>Błąd 404</h1>
  </div>

  <div id="content-holder">
    <?php if (is_active_sidebar('default')): ?>
      <div id="sidebar"></div>
    <?php endif; ?>
    <div id="content">
      <div class="categories-page">
        <p>Żądana strona nie została znaleziona. Możliwe, że została usunięta lub adres jest niepoprawny.</p>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
