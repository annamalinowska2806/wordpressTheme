<?php
$hrefUrl = $post_meta['mfind_marketing_url'][0];
$popup_text = array("1", "2", "3", "4", "5");
$random_keys = array_rand($popup_text,1);
?>

<div class="<?php echo $post_meta['mfind_banner_display_type'][0]; ?>"
     id="<?php echo $post_meta['mfind_banner_display_type'][0]; ?>">
  <?php if (!empty($post_meta['mfind_banner_img'][0])): ?>
  <div id="slide-box" class="slider-box-img-only">
    <a id="<?php echo $post_meta['mfind_id'][0]; ?>"
       class="banner-link"
       href="<?php echo $hrefUrl; ?>"
        <?php if (strpos($hrefUrl, 'mfind.pl/akademia') === false) { ?>target="_blank"<?php } ?>
        data-name="<?php echo $post_meta['mfind_id'][0]; ?>"
        data-banner-id="<?php echo $post_meta['mfind_id'][0]; ?>"
        data-event="InternalPromotionClick"
        onClick="onPromoClick(this)">
      <img class="hidden-on-phone mfindad-img"
           src="<?php echo $post_meta['mfind_banner_img'][0]; ?>"
           alt="<?php the_title(); ?>">
      <?php if ($post_meta['mfind_banner_mobile_img'][0]): ?>
      <img class="visible-on-phone mfindad-img"
           src="<?php echo $post_meta['mfind_banner_mobile_img'][0]; ?>"
           alt="<?php the_title(); ?>">
      <?php
        endif;
        if (!empty($post_meta['mfind_marketing_field_to_click'][0])):
            echo $post_meta['mfind_marketing_field_to_click'][0];
        endif;
      ?>
    </a>
    <a class="close">x</a>
  </div>
  <?php else: ?>
    <div id="slide-box">
      <div class="left-box">
      <?php
        $popup_img = $post_meta['mfind_power_slider_icon'][0];
      if (!empty($popup_img)):
        ?>
        <img src="<?php echo $post_meta['mfind_power_slider_icon'][0]; ?>" alt="Trąbka">
      <?php else: ?>
        <img src="<?= AWS_BUCKET; ?>images/icons/optimize/icon_1.svg"
             alt="Trąbka">
      <?php endif; ?>
    </div>
    <div class="right-box">
      <?php echo $post_meta['mfind_power_slider_text' . $popup_text[$random_keys]][0]; ?>
        <a id="<?php echo $post_meta['mfind_id'][0]; ?>"
        class="banner-link"
        href="<?php echo $hrefUrl; ?>"
        <?php if (strpos($hrefUrl, 'mfind.pl/akademia') === false) { ?>target="_blank"<?php } ?>
        data-name="<?php echo $post_meta['mfind_id'][0]; ?>"
        data-banner-id="<?php echo $post_meta['mfind_id'][0]; ?>"
        data-event="InternalPromotionClick"
        onClick="onPromoClick(this)">
          <?php
            if (!empty($post_meta['mfind_power_slider_link'][0])):
              echo $post_meta['mfind_power_slider_link'][0];
            endif;
            if (!empty($post_meta['mfind_marketing_field_to_click'][0])):
              echo $post_meta['mfind_marketing_field_to_click'][0];
            endif;
          ?>
        </a>
        <a class="close">x</a>
      </div>
    </div>
  <?php endif; ?>
</div>

<script>
  jQuery(document).ready(function($) {
    $(window).scroll(function () {
      if ($(window).scrollTop() > 800) {
        $("#slide-box").addClass('slide-right');
      }
    });

    $('#slide-box .close').on('click tap', function() {
      $(this).parents('#slide-box').hide();
    })
  });
</script>
