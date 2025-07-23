<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
  global $drdev_assets;
  if (!is_array($drdev_assets)) {
    $drdev_assets = drdev_get_assets_data(); 
  }
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr(wp_strip_all_tags($page_desc)); ?>">
  <meta name="twitter:image" content="<?php echo esc_url($image_url); ?>">

  <!-- Favicon -->
  <!--
  <link rel="icon" href="<?php echo esc_url($drdev_assets['favicon_ico']); ?>" sizes="any">
  <link rel="icon" href="<?php echo esc_url($drdev_assets['favicon_svg']); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url($drdev_assets['apple_touch_icon']); ?>">
  -->
  <meta name="theme-color" content="#1e40af">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased font-sans relative z-0'); ?>>
  <a class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:bg-white focus:px-4 focus:py-2 focus:z-10 focus:underline" href="#main-content">
    <?php esc_html_e('Saltar al contenido', 'text-domain'); ?>
  </a>
  <header class="bg-white relative z-50 xs:z-1">
    <!-- Overlay menú móvil -->
    <div id="mobile-menu-overlay" class="fixed top-[5.5rem] left-0 right-0 bottom-0 bg-black bg-opacity-50 hidden z-30"></div>

   <div class="flex justify-between items-center mx-auto px-4 py-4 md:px-6 md:py-[22px]">

       <!-- Logo (centrado en móvil) -->
      <div class="order-2 md:order-none mx-auto md:mx-0">
        <?php if (has_custom_logo()) : ?>
          <div class="site-logo h-10 md:h-16">
            <?php the_custom_logo(); ?>
          </div>
        <?php else : ?>
          <h1 class="text-lg font-bold md:text-xl">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="hover:text-primary transition-colors">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
        <?php endif; ?>
      </div>

      <!-- Botón menú hamburguesa  -->
      <button
        id="menu-toggle"
        class="order-1 md:hidden text-gray-800 p-2 focus:outline-none focus:ring-2 focus:ring-primary rounded-md"
        aria-expanded="false"
        aria-controls="mobile-menu"
        aria-label="<?php esc_attr_e('Menú de navegación', 'text-domain'); ?>"
      >
       <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
          <mask id="mask0_157_239" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="38" height="39">
            <rect y="0.154541" width="37.8457" height="37.8457" fill="#D9D9D9"/>
          </mask>
          <g mask="url(#mask0_157_239)">
            <path d="M4.73047 11.1929V8.03906H33.1147V11.1929H4.73047ZM4.73047 30.1157V26.9619H33.1147V30.1157H4.73047ZM4.73047 20.6543V17.5005H33.1147V20.6543H4.73047Z" fill="#0D6A68"/>
          </g>
        </svg>
      </button>

      <!-- Botón rastreo (derecha en móvil) -->
           <a href="#"
          onclick="openTrackingPopup()" 
          class="order-3 md:hidden relative flex items-center justify-center w-[82px] h-[39px] md:w-[127px] md:h-[59px] text-center font-montserrat "
          style="background-image: url('<?php echo esc_url($drdev_assets['tracking_bg']); ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;">

          <img src="<?php echo esc_url($drdev_assets['tracking_icon']); ?>" alt="Rastrear" class="w-[20px] h-[20px]" role="presentation"/>
            <span class="text-[#0D6A68] text-[9.054px] font-bold leading-[8.407px] ml-1 md:text-[14px] md:leading-[13px]">
              Rastrear<br>tu envío
            </span>
          </a>

      <!-- Content desktop -->
      <?php if ($drdev_assets['phone']): ?>
        <div class="hidden md:flex items-center gap-8 px-8">
          <div class="flex items-center gap-2">
           <img src="<?php echo esc_url($drdev_assets['phone_icon']); ?>" alt=""  aria-hidden="true" class="h-8 w-8">
            <a href="tel:<?php echo esc_attr($drdev_assets['phone']); ?>" class="text-primary font-bold text-[12px] font-montserrat hover:underline">
              <?php echo esc_attr($drdev_assets['phone']); ?>
            </a>
          </div>
          <div class="flex items-center gap-2">
            <img src="<?php echo esc_url($drdev_assets['whatsapp_icon']); ?>" alt="" aria-hidden="true" class="h-8 w-8">
            <a href="https://wa.me/<?php echo esc_attr($drdev_assets['whatsapp_clean']); ?>" target="_blank" rel="noopener noreferrer" class="text-primary font-bold text-[12px] font-montserrat">
              <?php echo esc_attr($drdev_assets['whatsapp']); ?>
            </a>
          </div>
        </div>
      <?php endif; ?>

      <nav id="primary-menu" class="hidden md:flex items-center gap-4 mt-4 md:mt-0" aria-label="<?php esc_attr_e('Main Navigation', 'drdevultimate'); ?>">
        
        <!-- Botón rastrear -->
          <a href="#"
          onclick="openTrackingPopup()" 
          class="relative flex items-center justify-center w-[127px] h-[59px] text-center font-montserrat "
          style="background-image: url('<?php echo esc_url($drdev_assets['tracking_bg']); ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;" 
          aria-label="<?php esc_attr_e('Rastrear tu envío', 'text-domain'); ?>">

          <img src="<?php echo esc_url($drdev_assets['tracking_icon']); ?>" alt="" class="w-[20px] h-[20px]" aria-hidden="true" />
            <span class="text-[#0D6A68] text-[14px] font-bold leading-[13px] ml-1">
              <?php esc_html_e('Rastrear', 'text-domain'); ?><br><?php esc_html_e('tu envío', 'text-domain'); ?>
            </span>
          </a>


        <!-- Menú principal -->
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'menu_class'     => 'flex flex-col md:flex-row gap-4 text-primary font-montserrat text-[15px] font-bold',
            'container'      => false,
            'walker' => new Accessibility_Walker_Nav_Menu(),
            'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>'
          ]);
        ?>
      </nav>

 <!-- Menú móvil (hidden por defecto) -->
    <div 
      id="mobile-menu" 
      class="hidden lg:hidden bg-white w-full fixed inset-x-0 top-[5.5rem] shadow-lg left-0  border-t border-black-200 z-40"
      aria-hidden="true"
    >
      <div class="container mx-auto px-9 py-7">
        <!-- Menú navegación -->
        <nav aria-label="<?php esc_attr_e('Navegación móvil', 'text-domain'); ?>">
         <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'menu_class'     => 'flex flex-col gap-4 text-primary font-montserrat text-[15px] font-bold',
            'container'      => false,
            'walker' => new Accessibility_Walker_Nav_Menu(),
            'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>'
          ]);
        ?>
        </nav>

        <!-- Teléfonos en línea -->
        <?php if ($drdev_assets['phone']): ?>
          <div class="flex justify-left items-center pt-8 gap-4">
            <div class="flex items-center gap-2">
              <img src="<?php echo esc_url($drdev_assets['phone_icon']); ?>" alt="" aria-hidden="true" class="h-7 w-7">
              <a 
                href="tel:<?php echo esc_attr($drdev_assets['phone']); ?>" 
                class="text-primary font-bold text-[12px] font-montserrat"
              >
                <?php echo esc_attr($drdev_assets['phone']); ?>
              </a>
            </div>
            <div class="flex items-center gap-2">
              <img 
                src="<?php echo esc_url($drdev_assets['whatsapp_icon']); ?>" 
                alt="" 
                aria-hidden="true"
                class="h-7 w-7"
              >
              <a 
                href="https://wa.me/<?php echo esc_attr($drdev_assets['whatsapp_clean']); ?>" 
                target="_blank" 
                rel="noopener noreferrer"
                class="text-primary font-bold text-[12px] font-montserrat"
              >
                <?php echo esc_attr($drdev_assets['whatsapp']); ?>
              </a>
            </div>
          </div>
        <?php endif; ?>    
      </div>
    </div>
  </header>