<?php $post_meta = get_post_meta( $post->ID ); ?>
<div class="bg-yellow">
  <h2 class="product-box-header">Produkty ubezpieczeniowe</h2>
  <div class="product-wrap">
    <div class="product-box">
      <img src="<?= $post_meta["_mfind_insurer_banner_img_1"][0]; ?>"
           alt="Ikona Samochód">
      <p><?= $post_meta["_mfind_insurer_textbox_1"][0]; ?></p>
    </div>
    <div class="product-box">
      <img src="<?= $post_meta["_mfind_insurer_banner_img_2"][0]; ?>"
           alt="Ikona Serce">
      <p><?= $post_meta["_mfind_insurer_textbox_2"][0]; ?></p>
    </div>
    <div class="product-box">
      <img src="<?= $post_meta["_mfind_insurer_banner_img_3"][0]; ?>"
           alt="Ikona Walizka">
      <p><?= $post_meta["_mfind_insurer_textbox_3"][0]; ?></p>
    </div>
    <div class="product-box">
      <img src="<?= $post_meta["_mfind_insurer_banner_img_4"][0]; ?>"
           alt="Ikona Dom">
      <p><?= $post_meta["_mfind_insurer_textbox_4"][0]; ?></p>
    </div>
  </div>
</div>
