<?php
header('Content-Type: text/xml; charset=' . get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<categories>';

$categories = get_categories();

if ( ! empty($categories))
{
  foreach ($categories as $category)
  {
    echo "<category id=\"{$category->term_id}\">";
    echo '<name>'.$category->name.'</name>';
    echo '<url>'.MAIN_HOST.'/'.$category->slug.'/</url>';
    echo '</category>';
  }
}
echo '</categories>';
