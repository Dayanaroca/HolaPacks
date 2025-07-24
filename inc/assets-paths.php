<?php

function drdev_get_assets_data() {
  $icon_path = get_theme_file_uri('/assets/images/icons/');
  $img_path  = get_theme_file_uri('/assets/images/');
  $phone     = get_theme_mod('company_phone');
  $email     = get_theme_mod('company_email');
  $ws        = get_theme_mod('company_whatsapp');
  $ws_clean  = preg_replace('/[^0-9]/', '', $ws);
  $schedule  = get_theme_mod('company_schedule');
  $tiktok    = get_theme_mod('company_tiktok');
  $facebook  = get_theme_mod('company_facebook');
  $instagram = get_theme_mod('company_instagram');

  return [
    // General
    'site_name'        => get_bloginfo('name'),
    'site_desc'        => get_bloginfo('description'),
    'page_desc'        => is_singular() && has_excerpt() ? get_the_excerpt() : get_bloginfo('description'),
    'canonical_url'    => is_singular() ? get_permalink() : home_url(add_query_arg([], $_SERVER['REQUEST_URI'])),
    'image_url'        => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : $img_path . 'socialMedia/team-hola-packs.jpg',

    // Icons
    'favicon_ico'      => $icon_path . 'favicon.ico',
    'favicon_svg'      => $icon_path . 'favicon.svg',
    'apple_touch_icon' => $icon_path . 'apple-touch-icon.png',
    'phone_icon'       => $icon_path . 'telefono-hola-packs.svg',
    'whatsapp_icon'    => $icon_path . 'whatsapp-icon.svg',
    'tracking_bg'      => $icon_path . 'fondo-rastrear.svg',
    'tracking_icon'    => $icon_path . 'ico-rastreo.svg',
    'tiktok_icon'      => $icon_path . 'tiktok-icon.svg',
    'facebook_icon'    => $icon_path . 'facebook-icon.svg',
    'instagram_icon'   => $icon_path . 'instragram-icon.svg',
    'logo-footer'      => $icon_path . 'logo-footer.svg',
    'yellow-ribbon-left'=> $icon_path . 'yellow-ribbon-left.svg',
    'yellow-ribbon-left-mobile'=> $icon_path . 'yellow-ribbon-left-mobile.svg',
    'yellow-ribbon-right'=> $icon_path . 'yellow-ribbon-right.svg',
    'yellow-ribbon-right-mobile'=> $icon_path . 'yellow-ribbon-right-mobile.svg',

    // Contact
    'phone'            => $phone,
    'email'            => $email,
    'whatsapp'         => $ws,
    'whatsapp_clean'   => $ws_clean,
    'schedule'         => $schedule,

    //Social media
    'tiktok'            => $tiktok,
    'facebook'          => $facebook,
    'instagram'         => $instagram,
  ];
}