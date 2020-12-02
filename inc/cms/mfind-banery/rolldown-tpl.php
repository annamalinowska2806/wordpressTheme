<?php $hrefUrl = $post_meta['mfind_marketing_url'][0]; ?>
<div id="rolldown" class="rolldown-mfind <?php echo $post_meta['mfind_banner_display_type'][0]; ?>">
  <div class="wrapper" style="background: <?php echo $post_meta['mfind_colorpicker_permament'][0]; ?>;">
    <div class="content">
      <?php if (!empty($post_meta['mfind_banner_img'][0])): ?>
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
        <?php else:
          if (!empty($post_meta['mfind_rolldown_text'][0])):
            echo $post_meta['mfind_rolldown_text'][0];
          endif;
          echo "<br>";
          if (!empty($post_meta['mfind_marketing_field_to_click'][0])):
            echo $post_meta['mfind_marketing_field_to_click'][0];
          endif;
        ?>
          <a id="<?php echo $post_meta['mfind_id'][0]; ?>"
             class="banner-link btn-featured"
             href="<?php echo $hrefUrl; ?>"
             <?php if (strpos($hrefUrl, 'mfind.pl/akademia') === false) { ?>target="_blank"<?php } ?>
             data-name="<?php echo $post_meta['mfind_id'][0]; ?>"
             data-banner-id="<?php echo $post_meta['mfind_id'][0]; ?>"
             data-event="InternalPromotionClick"
             onClick="onPromoClick(this)">
            <?php echo $post_meta['mfind_rolldown_button_text'][0]; ?>
          </a>
        <?php endif; ?>
    </div>
  </div>
  <div class="footer">
    <div class="logos">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/warta.png" alt="warta">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/uniqa.png" alt="uniqua">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/gothaer.png" alt="gothaer">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/inter.png" alt="inter">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/compensa.png" alt="compensa">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/allianz.png" alt="allianz">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/proama.png" alt="proama">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/generali.png" alt="generali">
      <img src="<?php echo AWS_BUCKET; ?>images/widget/logos/pzu.png" alt="pzu">
    </div>
    <div class="scroll-down" id="rolldown-close">
      <p>Przewiń w dół, aby przeczytać artykuł</p>
      <img src="<?php echo get_template_directory_uri() . '/images/scroll-black.png' ?>" alt="scroll">
    </div>
  </div>
</div>
