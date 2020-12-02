<?php
/** Register custom post for mfind banners */
register_post_type('mfind_banery',
  array(
    'labels'        => array(
    'name'          => __('Banery Reklamowe', 'mfind'),
    'singular_name' => __('Baner', 'mfind'),
    'add_new'       => __('Dodaj Nową', 'mfind'),
    'add_new_item'  => __('Nowa', 'mfind'),
    'edit'          => __('Edytuj', 'mfind')
  ),
  'public'        => true,
  'rewrite'       => array( 'slug' => __('baner', 'mfind') ),
  'menu_icon'     => 'dashicons-cart',
  'hierarchical'  => true,
  'has_archive'   => false,
  'supports'      => array(
    'title',
  ),
  'can_export'    => true,
));

function transform_to_options_list($array)
{
  $new_array = [];
  foreach ($array as $element) {
    $new_array[$element->term_id] = $element->name;
  }
  return $new_array;
}

/// register metaboxes for above post type
add_action( 'cmb2_init', 'mfind_banery_cmb' );
function mfind_banery_cmb()
{

  $cmb = new_cmb2_box(array(
    'id'           => 'banner_box',
    'title'        => __( 'Baner', 'mfind' ),
    'object_types' => array( 'mfind_banery' ),
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true
  ));

  $cmb->add_field(array(
    'name'             => 'Staly czy czasowy',
    'id'               => 'mfind_temporary_or_permament_banner',
    'type'             => 'select',
    'show_option_none' => true,
    'default'          => 'custom',
    'options'          => array(
      'staly'          => __( 'Stały', 'cmb2' ),
      'czasowy'        => __( 'Czasowy', 'cmb2' ),
      'none'           => __( 'Nie pokazuj', 'cmb2' ),
    )
  ));

  $cmb->add_field(array(
    'name'                   => 'Rodzaj modułu',
    'desc'                   => 'Wybierz opcje',
    'id'                     => 'mfind_banner_display_type',
    'type'                   => 'select',
    'show_option_none'       => true,
    'default'                => 'custom',
    'options'                => array(
      //Article banners
      'sidebar-banner'                  => __( 'Article Baner w Sidebarze', 'cmb2' ),
      'under-excerpt-banner'            => __( 'Article Baner pod Zajawką', 'cmb2' ),
      'rolldown-banner'                 => __( 'Article Rolldown Mfind', 'cmb2' ),
      'article-power-slider-banner'     => __( 'Article Power Slider banner', 'cmb2' ),
      'article-bottom-wideboard-banner' => __( 'Article Bottom Wideboard banner', 'cmb2' ),
      'article-sidebar-basic-banner'    => __( 'Article Sidebar Basic banner', 'cmb2' ),
      // Home banners
      'home-top-panel-banner'           => __( 'Home Top Panel banner', 'cmb2' ),
      'home-wideboard-banner'           => __( 'Home Wideboard banner', 'cmb2' ),
      'home-power-content-banner'       => __( 'Home Power Content banner', 'cmb2' ),
      'home-content-box-banner'         => __( 'Home Content Box banner', 'cmb2' ),
      'home-bottom-box-banner'          => __( 'Home Bottom Box banner', 'cmb2' ),
    )
  ));

  $cmb->add_field(array(
    'name' => 'Baner ID',
    'id'   => 'mfind_id',
    'desc' => 'Id które wrzucane jest do Google Analitycs',
    'type' => 'text'
  ));

  $cmb->add_field(array(
    'name' => 'URL',
    'id'   => 'mfind_marketing_url',
    'type' => 'text'
  ));

  $cmb->add_field(array(
    'name' => 'Pole do kodów',
    'id'   => 'mfind_marketing_field_to_click',
    'type' => 'textarea_code'
  ));

  //get all cats and tags
  $tagi = get_terms('post_tag');

  $cmb->add_field(array(
    'name'    => 'Tagi',
    'id'      => 'mfind_tag_list',
    'desc'    => 'Wypisz tagi po przecinku',
    'type'    => 'pw_multiselect',
    'options' => transform_to_options_list($tagi)
  ));

  $kategorie = get_terms('category');

  $cmb->add_field(array(
    'name'    => 'Kategorie',
    'id'      => 'mfind_category_list',
    'desc'    => 'Wypisz kategorie po przecinku',
    'type'    => 'pw_multiselect',
    'options' => transform_to_options_list($kategorie)
  ));

  $cmb->add_field(array(
    'name' => 'Wyświetlaj zawsze bez tagu lub kategorii',
    'desc' => 'Po zaznaczeniu tej opcji będzie ignorowanie wpisanie lub nie - tagu lub/i kategorii określających warunki wyświetlania',
    'id'   => 'always_visible',
    'type' => 'checkbox'
  ));

  $cmb->add_field(array(
    'name'    => 'Banner',
    'desc'    => 'Wybierz Obrazek.',
    'id'      => 'mfind_banner_img',
    'type'    => 'file',
    'options' => array(
      'url'   => false,
    ),
    'text'    => array(
      'add_upload_file_text' => 'Dodaj plik'
    )
  ));

  $cmb->add_field(array(
    'name'    => 'Banner-mobile',
    'desc'    => 'Wybierz Obrazek.',
    'id'      => 'mfind_banner_mobile_img',
    'type'    => 'file',
    'options' => array(
      'url'   => false,
    ),
    'text'    => array(
      'add_upload_file_text' => 'Dodaj plik'
    )
  ));

  $days_of_week = array( 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela' );
  $months_list = explode( ',', 'Styczeń,Luty,Marzec,Kwiecień,Maj,Czerwiec,Lipiec,Sierpień,Wrzesień,Październik,Listopad,Grudzień' );

  $cmb->add_field(array(
    'name'       => __( 'od', 'cmb2' ),
    'desc'       => __( 'field description (optional)', 'cmb2' ),
    'id'         => 'mfind_date_start',
    'type'       => 'text_date',
    'attributes' => array(
      'data-datepicker'   => json_encode( array(
        'dayNames'        => $days_of_week,
        'monthNamesShort' => $months_list,
        'yearRange'       => '-100:+0',
      )),
    )
  ));
  $cmb->add_field(array(
    'name'       => __( 'do', 'cmb2' ),
    'desc'       => __( 'field description (optional)', 'cmb2' ),
    'id'         => 'mfind_date_end',
    'type'       => 'text_date',
    'attributes' => array(
      'data-datepicker' => json_encode( array(
        'dayNames'         => $days_of_week,
        'monthNamesShort'  => $months_list,
        'yearRange'        => '-100:+0',
      )),
    )
  ));

  $cmb = new_cmb2_box(array(
    'id'           => 'rolldown_box',
    'title'        => __('Rolldown - dodatkowe opcje jeżeli wybierasz rolldown', 'mfind'),
    'desc'         => __('Przy wybraniu rolldownu, nie ma potrzeby wgrywac obrazka: wybierasz kolor, ustawiasz tekst w edytorze i wpisujesz tekst który ma się pojawić w buttonie.', 'cmb2'),
    'object_types' => array( 'mfind_banery' ),
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true
  ));

  $cmb->add_field(array(
    'name' => 'Dodatkowe pola do Rolldown',
    'type' => 'title_rolldown',
    'id'   => 'mfind-rolldown'
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_rolldown_text',
    'desc'    => 'Tekst ktory wyswietli sie w rolldownie',
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop'        => true,
      'media_buttons'  => true,
      'textarea_name'  => ['exclude-permament'],
      'textarea_rows'  => get_option('default_post_edit_rows', 2),
      'teeny'          => false,
      'dfw'            => false,
      'tinymce'        => true,
      'quicktags'      => true
    ),
  ));

  $cmb->add_field(array(
    'name' => 'text w buttonie',
    'id'   => 'mfind_rolldown_button_text',
    'type' => 'text'
  ));

  $cmb->add_field(array(
    'name'    => 'Kolor tła w rolldown',
    'desc'    => 'komunikacja: #8baf36, zdrowie: #00a094, podroz: #007bc1, nieruchomosci: #d47c3b',
    'id'      => 'mfind_colorpicker_permament',
    'type'    => 'colorpicker',
    'default' => '#ffffff'
  ));

  $cmb = new_cmb2_box(array(
    'id'           => 'power_slider_box',
    'title'        => __('Power slider - dodatkowe opcje jeżeli wybierasz klasyczny power slider mfind', 'mfind'),
    'desc'         => __('Przy wybraniu power slidera mfind, nie ma potrzeby wgrywac obrazka: ustawiasz tekst w edytorze i wpisujesz tekst który ma się pojawić w buttonie.', 'cmb2'),
    'object_types' => array( 'mfind_banery' ),
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true
  ));

  $cmb->add_field(array(
    'name' => 'Dodatkowe pola do Power slider copy',
    'type' => 'title_power_slider',
    'id'   => 'mfind-rolldown'
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_power_slider_text1',
    'desc'    => 'Tekst ktory wyswietli sie w power sliderze',
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop'        => true,
      'media_buttons'  => true,
      'textarea_name'  => ['exclude-permament'],
      'textarea_rows'  => get_option('default_post_edit_rows', 2),
      'teeny'          => false,
      'dfw'            => false,
      'tinymce'        => true,
      'quicktags'      => true
    ),
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_power_slider_text2',
    'desc'    => 'Tekst ktory wyswietli sie w power sliderze',
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop'        => true,
      'media_buttons'  => true,
      'textarea_name'  => ['exclude-permament'],
      'textarea_rows'  => get_option('default_post_edit_rows', 2),
      'teeny'          => false,
      'dfw'            => false,
      'tinymce'        => true,
      'quicktags'      => true
    ),
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_power_slider_text3',
    'desc'    => 'Tekst ktory wyswietli sie w power sliderze',
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop'        => true,
      'media_buttons'  => true,
      'textarea_name'  => ['exclude-permament'],
      'textarea_rows'  => get_option('default_post_edit_rows', 2),
      'teeny'          => false,
      'dfw'            => false,
      'tinymce'        => true,
      'quicktags'      => true
    ),
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_power_slider_text4',
    'desc'    => 'Tekst ktory wyswietli sie w power sliderze',
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop'        => true,
      'media_buttons'  => true,
      'textarea_name'  => ['exclude-permament'],
      'textarea_rows'  => get_option('default_post_edit_rows', 2),
      'teeny'          => false,
      'dfw'            => false,
      'tinymce'        => true,
      'quicktags'      => true
    ),
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_power_slider_text5',
    'desc'    => 'Tekst ktory wyswietli sie w power sliderze',
    'type'    => 'wysiwyg',
    'options' => array(
      'wpautop'        => true,
      'media_buttons'  => true,
      'textarea_name'  => ['exclude-permament'],
      'textarea_rows'  => get_option('default_post_edit_rows', 2),
      'teeny'          => false,
      'dfw'            => false,
      'tinymce'        => true,
      'quicktags'      => true
    ),
  ));

  $cmb->add_field(array(
    'id'      => 'mfind_power_slider_link',
    'desc'    => 'Tekst ktory wyswietli sie w linku',
    'type'    => 'textarea'
  ));

  $cmb->add_field(array(
    'name'    => 'slider-icon',
    'desc'    => 'Wybierz ikonke w formacie png.',
    'id'      => 'mfind_power_slider_ikon',
    'type'    => 'file',
    'options' => array(
      'url'   => false,
    ),
    'text'    => array(
      'add_upload_file_text' => 'Dodaj plik'
    )
  ));
}
/* END CMD fields config */

function unserialize_list( $post_meta, $key )
{
  try {
    return (array)unserialize( $post_meta[$key][0] );
  } catch (\Exception $e) { }
  return [];
}

/** Shortcode */
add_shortcode( 'mfind_banner', 'banner_create_holder');
function banner_create_holder( $atts ) {
  $shortcode_attributes = shortcode_atts( array('type' => ''), $atts );
  $bannerType = str_replace('_', '-', $shortcode_attributes['type']).'-mfindad';
  echo "<div class=\"$bannerType\"></div>";
}

function mfind_banner_tool($shortcode_attributes)
{
  global $post;
  $post_meta = get_post_meta($post->ID);

  $categories_ids = wp_get_post_categories($post->ID, array('fields' => 'ids'));
  $tags_ids = wp_get_post_tags($post->ID, array('fields' => 'ids'));
  $post_terms_id = array_merge($categories_ids, $tags_ids);

  $mfind_banner_display_type = str_replace('_', '-', $shortcode_attributes['type']).'-banner';

  $args = array(
    'post_type'      => 'mfind_banery',
    'posts_per_page' => -1,
    'order'          => 'DESC',
    'orderby'        => 'date',
    'meta_query'     => array(
      array(
        'key'     => 'mfind_banner_display_type',
        'value'   => $mfind_banner_display_type,
        'compare' => '='
      )
    )
  );

  $master_rekomend = new WP_Query($args);
  $banner_do_pokazania = [
    'staly' => [],
    'czasowy' => []
  ];

  while ($master_rekomend->have_posts()) : $master_rekomend->the_post();
    $post_meta = get_post_meta($post->ID);

    $always_visible = $post_meta['always_visible'][0];
    $banner_categories = unserialize_list( $post_meta, 'mfind_category_list' );
    $banner_tags = unserialize_list( $post_meta, 'mfind_tag_list' );
    $banner_terms_id = array_merge( $banner_categories, $banner_tags );
    //sprawdz czy tagi i kategorie bannera zawieriaja tagi lub kategorie posta

    if (count(array_intersect( $post_terms_id, $banner_terms_id )) == 0 && !($always_visible == 'on')) {
      continue;
    }
    // sprawdz typ bannera
    $typBanera = $post_meta["mfind_temporary_or_permament_banner"][0];
    switch ($typBanera) {
      case 'staly':
        $banner_do_pokazania['staly'][] = $post;
        break;
      case 'czasowy':
        if (empty($post_meta["mfind_date_start"][0]) || empty($post_meta["mfind_date_end"][0])) {
          continue;
        } else {
          //sprawdz daty
          $startDate = $post_meta["mfind_date_start"][0];
          $endDate = $post_meta["mfind_date_end"][0];
          $today = date("m/d/Y");
          if ($today <= $endDate && $startDate <= $today) {
            $banner_do_pokazania['czasowy'][] = $post;
          } else {
            continue;
          }
        }
        break;
      default:
        continue;
        break;
    }
  endwhile;

  if (!empty($banner_do_pokazania['staly']) || !empty($banner_do_pokazania['czasowy'])) {
    $banner = !empty($banner_do_pokazania['czasowy']) ? $banner_do_pokazania['czasowy'][0] : $banner_do_pokazania['staly'][0];
    $post_meta = get_post_meta($banner->ID);

    switch ($shortcode_attributes['type']) {
      case 'sidebar':
      case 'under_excerpt':
      case 'article-rolldown-premium':
      case 'article-bottom-wideboard':
      case 'article-sidebar-basic':
        include('mfind-banery/simple-image-tpl.php');
        break;
      case 'article-power-slider':
        include('mfind-banery/slider-image-tpl.php');
        break;
      case 'rolldown':
        $rolldown_cookie_name = "rolldown_{$banner->ID}";
        if (!isset($_COOKIE[$rolldown_cookie_name])) {
          setcookie($rolldown_cookie_name, true, time() + (60 * 30), '/'); // 30 minutes
          include('mfind-banery/rolldown-tpl.php');
        }
        break;
      case 'home-top-panel':
      case 'home-wideboard':
      case 'home-power-content':
      case 'home-bottom-box':
        include('mfind-banery/simple-image-tpl.php');
        break;
      case 'home-content-box':
        include('mfind-banery/home-content-box-tpl.php');
        break;
    }
  }
  wp_reset_query();
}

add_action( 'wp_ajax_promobanner', 'promobanner' );
add_action( 'wp_ajax_nopriv_promobanner', 'promobanner' );

function get_html_banner_as_variable($type)
{
  global $post;
  $post = get_post($_POST['pid']);

  ob_start();
  mfind_banner_tool(array('type' => $type));
  $banner = ob_get_clean();
  return $banner;
}

function promobanner()
{
  echo json_encode( array(
    // Home banners
    'home-top-panel-mfindad'           => get_html_banner_as_variable('home-top-panel'),
    'home-wideboard-mfindad'           => get_html_banner_as_variable('home-wideboard'),
    'home-power-content-mfindad'       => get_html_banner_as_variable('home-power-content'),
    'home-content-box-mfindad'         => get_html_banner_as_variable('home-content-box'),
    'home-bottom-box-mfindad'          => get_html_banner_as_variable('home-bottom-box'),
    // Article banners
    'rolldown-mfindad'                 => get_html_banner_as_variable('rolldown'),
    'sidebar-mfindad'                  => get_html_banner_as_variable('sidebar'),
    'under-excerpt-mfindad'            => get_html_banner_as_variable('under_excerpt'),
    'article-sidebar-basic-mfindad'    => get_html_banner_as_variable('article-sidebar-basic'),
    'article-bottom-wideboard-mfindad' => get_html_banner_as_variable('article-bottom-wideboard'),
    'article-power-slider-mfindad'     => get_html_banner_as_variable('article-power-slider'),
  ) );
  wp_die();
}
