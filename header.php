<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
    global $post;

    // Valores dinámicos
    $site_name     = get_bloginfo('name');
    $site_desc     = get_bloginfo('description');
    $page_desc     = is_singular() && has_excerpt($post->ID) ? get_the_excerpt() : $site_desc;
    $canonical_url = is_singular() ? get_permalink() : home_url(add_query_arg([], $_SERVER['REQUEST_URI']));
    $image_url     = has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, 'full') : get_theme_file_uri('/screenshot.png');
  ?>

  <!-- Meta -->
  <meta name="description" content="<?php echo esc_attr(wp_strip_all_tags($page_desc)); ?>">
  <link rel="canonical" href="<?php echo esc_url($canonical_url); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="<?php echo is_singular('post') ? 'article' : 'website'; ?>">
  <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta property="og:description" content="<?php echo esc_attr(wp_strip_all_tags($page_desc)); ?>">
  <meta property="og:url" content="<?php echo esc_url($canonical_url); ?>">
  <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
  <meta property="og:image" content="<?php echo esc_url($image_url); ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr(wp_strip_all_tags($page_desc)); ?>">
  <meta name="twitter:image" content="<?php echo esc_url($image_url); ?>">

    <!-- Favicon -->
  <link rel="icon" href="<?php echo get_theme_file_uri('/assets/images/favicon.ico'); ?>" sizes="32x32" />
  <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('/assets/images/apple-touch-icon.png'); ?>" />
  <meta name="theme-color" content="#1e40af" />

    <!-- Google Fonts preload -->
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">


  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>
  <header class="bg-white">
   <div class="flex justify-between items-center mx-auto px-4 py-4 md:max-w-[1440px] md:px-6 md:py-[22px]">

      <?php if (has_custom_logo()) : ?>
        <div class="site-logo">
          <?php the_custom_logo(); ?>
        </div>
      <?php else : ?>
        <h1 class="text-xl font-bold">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
          </a>
        </h1>
      <?php endif; ?>

      <?php
        $phone = get_theme_mod('company_phone');
        $ws = get_theme_mod('company_whatsapp');
        $ws_clean = preg_replace('/[^0-9]/', '', $ws); 
      ?>
      <?php if ($phone): ?>
        <div class="hidden md:flex items-center gap-8 px-8">
          <div class="flex items-center gap-2">
            <img src="<?php echo get_theme_file_uri('/assets/image/telefono-hola-packs.svg'); ?>" alt="Teléfono" title="llamar a Hola Packs" class="h-8 w-8">
            <a href="tel:<?php echo esc_attr($phone); ?>" class="text-primary font-bold text-[12px] font-montserrat">
              <?php echo esc_html($phone); ?>
            </a>
          </div>
          <div class="flex items-center gap-2">
            <img src="<?php echo get_theme_file_uri('/assets/image/telefono-hola-packs.svg'); ?>" alt="WhatsApp" title="escribir por Whatsapp a Hola Packs" class="h-8 w-8">
            <a href="https://wa.me/<?php echo esc_attr($ws); ?>" target="_blank" rel="noopener" class="text-primary font-bold text-[12px] font-montserrat">
              <?php echo esc_html($ws); ?>
            </a>
          </div>
        </div>
      <?php endif; ?>

      <nav id="primary-menu" class="hidden md:flex items-center gap-4 mt-4 md:mt-0" aria-label="<?php esc_attr_e('Main Navigation', 'drdevultimate'); ?>">
        
        <!-- Botón rastrear -->
          <a href="#"
          onclick="openTrackingPopup()" 
          class="relative flex items-center justify-center w-[127px] h-[59px] text-center font-montserrat "
          style="background-image: url('<?php echo get_theme_file_uri('/assets/image/fondo-rastrear.svg'); ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;">

          <img src="<?php echo get_theme_file_uri('/assets/image/ico-rastreo.svg'); ?>" alt="Rastrear" class="w-[20px] h-[20px]" />
            <span class="text-[#0D6A68] text-[14px] font-bold leading-[13px] ml-1">
              Rastrear<br>tu envío
            </span>
          </a>


        <!-- Menú principal -->
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'menu_class'     => 'flex flex-col md:flex-row gap-4 text-primary font-montserrat text-[15px] font-bold',
            'container'      => false,
          ]);
        ?>
      </nav>

      <button
        id="menu-toggle"
        class="md:hidden text-white focus:outline-none"
        aria-expanded="false"
        aria-controls="primary-menu"
        aria-label="Toggle menu"
      >
        ☰
      </button>
    </div>

    <?php
      if (is_single() || is_page()) {
        $schema = [
          "@context" => "https://schema.org",
          "@type" => is_singular('post') ? "BlogPosting" : "WebPage",
          "mainEntityOfPage" => get_permalink(),
          "headline" => get_the_title(),
          "description" => get_the_excerpt(),
          "datePublished" => get_the_date(DATE_ATOM),
          "dateModified" => get_the_modified_date(DATE_ATOM),
          "author" => [
            "@type" => "Person",
            "name" => get_the_author()
          ],
          "publisher" => [
            "@type" => "Organization",
            "name" => get_bloginfo('name'),
            "logo" => [
              "@type" => "ImageObject",
              "url" => get_theme_file_uri('/screenshot.png')
            ]
          ]
        ];
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
      }
    ?>
  </header>