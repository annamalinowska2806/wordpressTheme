<?php
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

$prefix = '_mfind_';

// Strona Glowna - Banner
$cmb = new_cmb2_box( array(
  'id'            => 'settings_insurer_excerpt',
  'title'         => 'Zajawka',
  'object_types'  => array( 'page' ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_on'       => array(
    'key'   => 'page-template',
    'value' => array( 'page-insurer-single.php', 'page-insurer.php' )
  ),
  'show_names'    => true,
) );

$cmb->add_field( array(
  'id'            => $prefix . 'insurer_excerpt',
  'type'          => 'wysiwyg',
  'options'       => array(
    'wpautop'       => true,
    'media_buttons' => false,
    'textarea_name' => $editor_id,
    'textarea_rows' => get_option('default_post_edit_rows', 10),
    'tabindex'      => '',
    'editor_css'    => '',
    'editor_class'  => '',
    'teeny'         => false,
    'dfw'           => false,
    'tinymce'       => true,
    'quicktags'     => true
  ),
) );

$cmb = new_cmb2_box( array(
  'id'           => 'menu_insurer',
  'title'        => 'Menu dla firmy ubezpieczeniowej',
  'object_types' => array( 'page' ),
  'context'      => 'normal',
  'priority'     => 'high',
  'show_on'      => array(
    'key'   => 'page-template',
    'value' => array( 'page-insurer-single.php', 'page-insurer.php' )
  ),
  'show_names'   => true,
) );

$group_field_id = $cmb->add_field( array(
  'id'           => 'insurer_menu_group',
  'object_types' => array( 'page' ),
  'type'         => 'group',
  'options'      => array(
    'group_title'   => 'Menu {#}',
    'add_button'    => 'Dodaj nowy element do menu',
    'remove_button' => 'Usuń',
    'sortable'      => true,
  ),
));

$cmb->add_group_field( $group_field_id, array(
  'name' => 'Nazwa wyswietlana w menu',
  'id'   => 'menu_name',
  'type' => 'text'
));

$cmb->add_group_field( $group_field_id, array(
  'name' => 'Url w menu',
  'id'   => 'menu_page_url',
  'type' => 'text_url'
));

$cmb = new_cmb2_box( array(
  'id'           => 'setting_insurer_banner',
  'title'        => 'Banner',
  'object_types' => array( 'page' ),
  'context'      => 'normal',
  'priority'     => 'high',
  'show_on'      => array(
    'key'   => 'page-template',
    'value' => array( 'page-insurer-single.php', 'page-insurer.php' )
  ),
  'show_names'   => true,
) );

// Box 1
$cmb->add_field( array(
  'name'    => 'Ikonka 1',
  'desc'    => 'format ikonki - png albo jpg',
  'id'      => $prefix . 'insurer_banner_img_1',
  'type'    => 'file',
  'options' => array(
    'url' => false,
  ),
  'text'    => array(
    'add_upload_file_text' => 'Dodaj plik',
  ),
) );

$cmb->add_field( array(
  'name'          => 'Edytor tekstowy 1',
  'id'            => $prefix . 'insurer_textbox_1',
  'type'          => 'wysiwyg',
  'options'       => array(
    'wpautop'       => true,
    'media_buttons' => false,
    'textarea_name' => $editor_id,
    'textarea_rows' => get_option('default_post_edit_rows', 10),
    'tabindex'      => '',
    'editor_css'    => '',
    'editor_class'  => '',
    'teeny'         => false,
    'dfw'           => false,
    'tinymce'       => true,
    'quicktags'     => true
  ),
) );

// Box 2
$cmb->add_field( array(
  'name'    => 'Ikonka 2',
  'desc'    => 'format ikonki - png albo jpg',
  'id'      => $prefix . 'insurer_banner_img_2',
  'type'    => 'file',
  'options' => array(
    'url' => false,
  ),
  'text'    => array(
    'add_upload_file_text' => 'Dodaj plik',
  ),
) );

$cmb->add_field( array(
  'name'          => 'Edytor tekstowy 2',
  'id'            => $prefix . 'insurer_textbox_2',
  'type'          => 'wysiwyg',
  'options'       => array(
    'wpautop'       => true,
    'media_buttons' => false,
    'textarea_name' => $editor_id,
    'textarea_rows' => get_option('default_post_edit_rows', 10),
    'tabindex'      => '',
    'editor_css'    => '',
    'editor_class'  => '',
    'teeny'         => false,
    'dfw'           => false,
    'tinymce'       => true,
    'quicktags'     => true
  ),
) );

// Box 3
$cmb->add_field( array(
  'name'    => 'Ikonka 3',
  'desc'    => 'format ikonki - png albo jpg',
  'id'      => $prefix . 'insurer_banner_img_3',
  'type'    => 'file',
  'options' => array(
    'url' => false,
  ),
  'text'    => array(
    'add_upload_file_text' => 'Dodaj plik',
  ),
) );

$cmb->add_field( array(
  'name'          => 'Edytor tekstowy 3',
  'id'            => $prefix . 'insurer_textbox_3',
  'type'          => 'wysiwyg',
  'options'       => array(
    'wpautop'       => true,
    'media_buttons' => false,
    'textarea_name' => $editor_id,
    'textarea_rows' => get_option('default_post_edit_rows', 10),
    'tabindex'      => '',
    'editor_css'    => '',
    'editor_class'  => '',
    'teeny'         => false,
    'dfw'           => false,
    'tinymce'       => true,
    'quicktags'     => true
  ),
) );

// Box 4
$cmb->add_field( array(
  'name'    => 'Ikonka 4',
  'desc'    => 'format ikonki - png albo jpg',
  'id'      => $prefix . 'insurer_banner_img_4',
  'type'    => 'file',
  'options' => array(
    'url' => false,
  ),
  'text'    => array(
    'add_upload_file_text' => 'Dodaj plik',
  ),
) );

$cmb->add_field( array(
  'name'          => 'Edytor tekstowy 4',
  'id'            => $prefix . 'insurer_textbox_4',
  'type'          => 'wysiwyg',
  'options'       => array(
    'wpautop'       => true,
    'media_buttons' => false,
    'textarea_name' => $editor_id,
    'textarea_rows' => get_option( 'default_post_edit_rows', 10 ),
    'teeny'         => false,
    'dfw'           => false,
    'tinymce'       => true,
    'quicktags'     => true
  ),
) );
}
