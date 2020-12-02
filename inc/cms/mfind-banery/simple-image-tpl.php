<?php $hrefUrl = $post_meta['mfind_marketing_url'][0]; ?>
<div class="<?php echo $post_meta['mfind_banner_display_type'][0]; ?>"
     id="<?php echo $post_meta['mfind_banner_display_type'][0]; ?>">
  <a id="<?php echo $post_meta['mfind_id'][0]; ?>" 
     class="banner-link"
     href="<?php echo $hrefUrl; ?>"
     <?php if (strpos($hrefUrl, 'mfind.pl/akademia') === false) { ?>target="_blank"<?php } ?>
     data-name="<?php echo $post_meta['mfind_id'][0]; ?>"
     data-banner-id="<?php echo $post_meta['mfind_id'][0]; ?>"
     data-event="InternalPromotionClick"
     onClick="onPromoClick(this)">
    <img class="hidden-on-phone mfindad-img" src="<?php echo $post_meta['mfind_banner_img'][0]; ?>" 
         alt="<?php the_title(); ?>">
    <?php if ($post_meta['mfind_banner_mobile_img'][0]): ?>
      <img class="visible-on-phone mfindad-img" src="<?php echo $post_meta['mfind_banner_mobile_img'][0]; ?>"
           alt="<?php the_title(); ?>">
    <?php endif;
    if (!empty($post_meta['mfind_marketing_field_to_click'][0])):
      echo $post_meta['mfind_marketing_field_to_click'][0];
    endif;
    ?>
  </a>
</div>
