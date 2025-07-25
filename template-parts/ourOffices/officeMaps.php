<section class="max-w-screen-xl mx-auto px-4 py-12">
  <!-- Mapa -->
  <div id="map" class="w-full h-[400px] rounded-xl mb-12"></div>

  <!-- Info -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" id="office-list">
    <?php
    $offices = get_posts(['post_type' => 'oficina', 'posts_per_page' => -1]);
    foreach ($offices as $office) :
      $title = get_the_title($office);
      $phone = get_post_meta($office->ID, '_office_phone', true);
      $dir = get_post_meta($office->ID, '_office_direction', true);
      $ws = get_post_meta($office->ID, '_office_whatsapp', true);
      $sched = get_post_meta($office->ID, '_office_schedlue', true);
      $lat = get_post_meta($office->ID, '_office_lat', true);
      $lng = get_post_meta($office->ID, '_office_lng', true);
      $img = get_the_post_thumbnail_url($office->ID, 'medium');
    ?>
      <div class="office-card bg-white rounded-xl shadow p-4 cursor-pointer transition-all" 
           data-lat="<?= esc_attr($lat) ?>" 
           data-lng="<?= esc_attr($lng) ?>" 
           data-title="<?= esc_attr($title) ?>" 
           data-dir="<?= esc_attr($dir) ?>" 
           data-phone="<?= esc_attr($phone) ?>" 
           data-ws="<?= esc_attr($ws) ?>" 
           data-sched="<?= esc_attr($sched) ?>">
           
        <?php if ($img): ?>
          <div class="mb-3">
            <img src="<?= esc_url($img) ?>" alt="<?= esc_attr($title) ?>" class="w-full h-40 object-cover rounded-lg">
          </div>
        <?php endif; ?>

        <h4 class="text-lg font-bold text-primary mb-1"><?= esc_html($title) ?></h4>
        <p class="text-sm text-gray-600 mb-1"><i class="fa-solid fa-location-dot mr-1 text-primary"></i><?= esc_html($dir) ?></p>
        <?php if ($phone): ?>
          <p class="text-sm text-gray-600 mb-1"><i class="fa-solid fa-phone mr-1 text-primary"></i><?= esc_html($phone) ?></p>
        <?php endif; ?>
        <?php if ($ws): ?>
          <p class="text-sm text-gray-600 mb-1"><i class="fa-brands fa-whatsapp mr-1 text-primary"></i><?= esc_html($ws) ?></p>
        <?php endif; ?>
        <?php if ($sched): ?>
          <p class="text-sm text-gray-600"><i class="fa-regular fa-clock mr-1 text-primary"></i><?= esc_html($sched) ?></p>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>

