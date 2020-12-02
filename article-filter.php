<?php
$tagMfind = $_POST['tagMfind'];
$excluded = array();
if ($_POST['exclude']) {
  $excluded = json_decode($_POST['exclude']);
}

$queryFilter = new WP_Query(array(
  'post_type' => 'post',
  'orderby' => 'date',
  'order' => 'DESC',
  'post_status' => 'publish',
  'posts_per_page' => 9,
  'tag' => $tagMfind,
  'post__not_in' => $excluded,
));

if ($queryFilter->have_posts()) {
  while ($queryFilter->have_posts()) {
    $queryFilter->the_post(); 
    include('template-parts/content.php');
  }
} else {
  echo 'no more posts';
}
