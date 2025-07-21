<?php

function drdev_get_assets_data() {
 $icon_path = get_theme_file_uri('/assets/images/icons/');
  $img_path  = get_theme_file_uri('/assets/images/');

  return [
    'site_name'        => get_bloginfo('name'),
    'site_desc'        => get_bloginfo('description'),
    'page_desc'        => is_singular() && has_excerpt() ? get_the_excerpt() : get_bloginfo('description'),
    'canonical_url'    => is_singular() ? get_permalink() : home_url(add_query_arg([], $_SERVER['REQUEST_URI'])),
    'image_url'        => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : $img_path . 'socialMedia/team-hola-packs.jpg',
    'favicon_ico'      => $icon_path . 'favicon.ico',
    'favicon_svg'      => $icon_path . 'favicon.svg',
    'apple_touch_icon' => $icon_path . 'apple-touch-icon.png',
    '$phone_icon'         => $icon_path . 'telefono-hola-packs.svg',
    'whatsapp_icon'    => $icon_path . 'whatsapp-icon.svg',
    'tracking_bg'      => $icon_path . 'fondo-rastrear.svg',
    'tracking_icon'    => $icon_path . 'ico-rastreo.svg',
  ];
}