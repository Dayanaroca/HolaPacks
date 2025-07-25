<?php

// scripts and styles
function drdev_enqueue_assets() {
    wp_enqueue_style('drdev-style', get_template_directory_uri() . '/dist/style.css', [], filemtime(get_template_directory() . '/dist/style.css'));   
    wp_enqueue_script('drdev-script', get_template_directory_uri() . '/assets/js/scripts.js', [], false, true);
 
    if (is_front_page()) {

        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(),'11.0.0' );
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );
        wp_enqueue_style('intl-tel-input-css', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css',array(),  '18.1.1' );
        wp_enqueue_script( 'intl-tel-input-js', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js', array(), '18.1.1', true);
        wp_enqueue_script(
            'intl-tel-input-utils',
            'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js',
            array('intl-tel-input-js'),
            '18.1.1',
            true
        );

        wp_enqueue_style(
        'intl-fix',
        get_template_directory_uri() . '/assets/css/intl-fix.css',
        array('intl-tel-input-css'), 
        filemtime(get_template_directory() . '/assets/css/intl-fix.css')
        );
        wp_enqueue_script('drdev-Intl', get_template_directory_uri() . '/assets/js/intelTel.js', [], null, true);
    }


    if(is_page_template('page-outOffices.php')) {
        wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA0gYMaGfzKHi2dL8HA5qJzKkVk3TbhleA', [], null, true);
        wp_enqueue_script('drdev-office-map', get_template_directory_uri() . '/assets/js/office-map.js', ['google-maps'], null, true);
    }

}
add_action('wp_enqueue_scripts', 'drdev_enqueue_assets');

require_once get_template_directory() . '/inc/assets-paths.php';
add_action('wp', function () {
    global $hp_assets;
    $drdev_assets = drdev_get_assets_data();
});

//add theme setup
function drdev_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('menus');
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary' => __('Menú Principal', 'drdevultimate'),
        'secondary' => __( 'Footer Menu', 'drdevultimate' ),
        'legal' => __('Menú Footer Legal', 'drdevultimate')
    ]);
}
add_action('after_setup_theme', 'drdev_theme_setup');

//scripts admin
function enqueue_recharge_plan_admin_scripts($hook) {
    global $post_type;

    // Solo en admin y solo para el CPT 'recharge_plan'
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        if ($post_type === 'recharge_plan') {
            // Media uploader
            wp_enqueue_media();

            wp_enqueue_script(
                'recharge-plan-admin-js',
                get_template_directory_uri() . '/assets/js/admin-scripts.js',
                array('jquery'),
                '1.0',
                true
            );
        }
    }
}
add_action('admin_enqueue_scripts', 'enqueue_recharge_plan_admin_scripts');

// upload svg
function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

//Company data
function drdevultimate_customize_register($wp_customize) {
    // Sección de datos empresa
    $wp_customize->add_section('company_data_section', [
        'title'    => __('Datos de la Empresa', 'drdevultimate'),
        'priority' => 30,
    ]);

    // Email
    $wp_customize->add_setting('company_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('company_email', [
        'label'    => __('Email', 'drdevultimate'),
        'section'  => 'company_data_section',
        'type'     => 'email',
    ]);

    // Teléfono
    $wp_customize->add_setting('company_phone', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_phone', [
        'label'    => __('Teléfono', 'drdevultimate'),
        'section'  => 'company_data_section',
        'type'     => 'text',
    ]);

    // WhatsApp
    $wp_customize->add_setting('company_whatsapp', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_whatsapp', [
        'label'    => __('WhatsApp', 'drdevultimate'),
        'section'  => 'company_data_section',
        'type'     => 'text',
        'description' => 'Número completo con código país, ej: +34699111222',
    ]);

    // Horario
    $wp_customize->add_setting('company_schedule', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_schedule', [
        'label'    => __('Horario', 'drdevultimate'),
        'section'  => 'company_data_section',
        'type'     => 'text',
    ]);

    //Social media
    $wp_customize->add_setting('company_tiktok', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_tiktok_control', [
        'label'    => __('TikTok URL', 'drdevultimate'),
        'section'  => 'company_data_section',
        'settings' => 'company_tiktok',
        'type'     => 'url',
    ]);

        $wp_customize->add_setting('company_facebook', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_facebook_control', [
        'label'    => __('Facebook URL', 'drdevultimate'),
        'section'  => 'company_data_section',
        'settings' => 'company_facebook',
        'type'     => 'url',
    ]);

    $wp_customize->add_setting('company_instagram', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_instagram_control', [
        'label'    => __('Instagram URL', 'drdevultimate'),
        'section'  => 'company_data_section',
        'settings' => 'company_instagram',
        'type'     => 'url',
    ]);
}
add_action('customize_register', 'drdevultimate_customize_register');

class Accessibility_Walker_Nav_Menu extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Añade clases accesibles
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . ' role="none">';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)       ? $item->xfn       : '';
        $atts['href']   = !empty($item->url)       ? $item->url       : '';
        $atts['role']   = 'menuitem';
        $atts['aria-current'] = $item->current ? 'page' : '';

        // Si tiene submenú, añade atributos ARIA
        if ($args->walker->has_children) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\" role=\"menu\">\n";
    }
}

function drdev_register_cpt() {
    register_post_type('faq', [
        'label' => 'FAQs',
        'public' => false, 
        'publicly_queryable' => false, 
        'show_ui' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-editor-help',
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'show_in_rest' => false, // Oculta del editor de bloques (si no usás Gutenberg)
        'rewrite' => false, // No genera URLs reescritas
        'query_var' => false, // No accesible por ?faq=slug
    ]);

    register_taxonomy('faq_group', 'faq', [
    'label' => 'Grupos de FAQ',
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_menu'      => true,
    'show_admin_column' => true,
    'public'            => false,         
    'rewrite'           => false, // No crea URLs para términos
    'query_var'         => false, // No accesible por ?faq_group=
    'show_in_rest'      => true, 
    ]);

    $labels = array(
        'name'               => 'Servicios',
        'singular_name'      => 'Servicio',
        'menu_name'          => 'Servicios',
        'name_admin_bar'     => 'Servicio',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo servicio',
        'new_item'           => 'Nuevo servicio',
        'edit_item'          => 'Editar servicio',
        'view_item'          => 'Ver servicio',
        'all_items'          => 'Todos los servicios',
        'search_items'       => 'Buscar servicios',
        'not_found'          => 'No se encontraron servicios',
        'not_found_in_trash' => 'No hay servicios en la papelera'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false, // oculta de Google y del frontend
        'publicly_queryable' => false, //  evita que se genere una URL accesible
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array('title')
    );

    register_post_type('servicio', $args);

    $recharge = array(
        'name' => 'Recharge plans',
        'singular_name' => 'Recharge plan',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Recharge Plan',
        'edit_item' => 'Edit Recharge Plan',
        'new_item' => 'New Recharge Plan',
        'view_item' => 'View Recharge Plan',
        'search_items' => 'Search Recharge Plans',
        'not_found' => 'No Recharge Plans found',
        'menu_name' => 'Recharge Plans',
    );

    $argsRecharge = array(
        'labels'             => $recharge,
        'public'             => false, 
        'publicly_queryable' => false, 
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array('title')
    );

    register_post_type('recharge_plan', $argsRecharge);

        $oficina = array(
        'name'               => 'Oficinas',
        'singular_name'      => 'Oficina',
        'menu_name'          => 'Oficinas',
        'name_admin_bar'     => 'Oficina',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nueva oficina',
        'new_item'           => 'Nueva oficina',
        'edit_item'          => 'Editar oficina',
        'view_item'          => 'Ver oficina',
        'all_items'          => 'Todos lss oficina',
        'search_items'       => 'Buscar oficinas',
        'not_found'          => 'No se encontraron oficinas',
        'not_found_in_trash' => 'No hay oficinas en la papelera'
    );

    $args_oficina = array(
        'labels'             => $oficina,
        'public'             => false, // oculta de Google y del frontend
        'publicly_queryable' => false, //  evita que se genere una URL accesible
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array('title')
    );

    register_post_type('oficina', $args_oficina);

}
add_action('init', 'drdev_register_cpt');

function drdev_add_meta_box() {
  add_meta_box(
    'servicio_meta_box',
    'Detalles del Servicio',
    'drdev_render_servicio_meta_box',
    'servicio',
    'normal',
    'high'
  );

    add_meta_box(
    'oficina_meta_box',
    'Detalles de la oficina',
    'drdev_render_oficina_meta_box',
    'oficina',
    'normal',
    'high'
  );

}
add_action('add_meta_boxes', 'drdev_add_meta_box');

function drdev_render_servicio_meta_box($post) {
  // Obtener valores actuales
  $precio = get_post_meta($post->ID, '_servicio_precio', true);
  $entrega = get_post_meta($post->ID, '_servicio_entrega', true);
  $detalles = get_post_meta($post->ID, '_servicio_detalles', true);

  // Campo Precio
  echo '<label>Precio:</label><br>';
  echo '<input type="text" name="servicio_precio" value="' . esc_attr($precio) . '" style="width:100%; margin-bottom: 10px;"><br>';

  // Campo Tiempo de entrega
  echo '<label>Tiempo de entrega:</label><br>';
  echo '<input type="text" name="servicio_entrega" value="' . esc_attr($entrega) . '" style="width:100%; margin-bottom: 10px;"><br>';

  // Campo Detalles
  echo '<label>Detalles adicionales:</label><br>';
  echo '<textarea name="servicio_detalles" rows="4" style="width:100%;">' . esc_textarea($detalles) . '</textarea>';
}

function drdev_save_servicio_meta($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if (isset($_POST['servicio_precio'])) {
    update_post_meta($post_id, '_servicio_precio', sanitize_text_field($_POST['servicio_precio']));
  }
  if (isset($_POST['servicio_entrega'])) {
    update_post_meta($post_id, '_servicio_entrega', sanitize_text_field($_POST['servicio_entrega']));
  }
  if (isset($_POST['servicio_detalles'])) {
    update_post_meta($post_id, '_servicio_detalles', sanitize_textarea_field($_POST['servicio_detalles']));
  }
}
add_action('save_post', 'drdev_save_servicio_meta');

function drdev_render_oficina_meta_box($post) {
  $direction = get_post_meta($post->ID, '_office_direction', true);
  $phone = get_post_meta($post->ID, '_office_phone', true);
  $ws = get_post_meta($post->ID, '_office_whatsapp', true);
  $schedlue = get_post_meta($post->ID, '_office_schedlue', true);
  $lat = get_post_meta($post->ID, '_office_lat', true);
  $lng = get_post_meta($post->ID, '_office_lng', true);

  echo '<label>Dirección:</label><br>';
  echo '<input type="text" name="office_direction" value="' . esc_attr($direction) . '" style="width:100%; margin-bottom: 10px;"><br>';

  echo '<label>Teléfono:</label><br>';
  echo '<input type="text" name="office_phone" value="' . esc_attr($phone) . '" style="width:100%; margin-bottom: 10px;"><br>';

  echo '<label>WhatsApp:</label><br>';
  echo '<input type="text" name="office_whatsapp" value="' . esc_attr($ws) . '" style="width:100%; margin-bottom: 10px;"><br>';

  echo '<label>Horario:</label><br>';
  echo '<input type="text" name="office_schedlue" value="' . esc_attr($schedlue) . '" style="width:100%; margin-bottom: 10px;"><br>';

  echo '<label>Latitud:</label><br>';
  echo '<input type="text" name="office_lat" value="' . esc_attr($lat) . '" style="width:100%; margin-bottom: 10px;"><br>';

  echo '<label>Longitud:</label><br>';
  echo '<input type="text" name="office_lng" value="' . esc_attr($lng) . '" style="width:100%; margin-bottom: 10px;"><br>';

}

function drdev_save_office_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['office_direction'])) {
        update_post_meta($post_id, '_office_direction', sanitize_text_field($_POST['office_direction']));
    }
    if (isset($_POST['office_phone'])) {
        update_post_meta($post_id, '_office_phone', sanitize_text_field($_POST['office_phone']));
    }
    if (isset($_POST['office_whatsapp'])) {
        update_post_meta($post_id, '_office_whatsapp', sanitize_textarea_field($_POST['office_whatsapp']));
    }
    if (isset($_POST['office_schedlue'])) {
        update_post_meta($post_id, '_office_schedlue', sanitize_textarea_field($_POST['office_schedlue']));
    }
    if (isset($_POST['office_lat'])) {
    update_post_meta($post_id, '_office_lat', sanitize_text_field($_POST['office_lat']));
    }
    if (isset($_POST['office_lng'])) {
    update_post_meta($post_id, '_office_lng', sanitize_text_field($_POST['office_lng']));
    }
}  
add_action('save_post', 'drdev_save_office_meta');

require_once get_template_directory() . '/template-parts/faq.php';
function render_faq_group($group_slug = 'faq-home', $title = 'Preguntas frecuentes') {
    $faqs = get_posts([
        'post_type' => 'faq',
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'faq_group',
                'field' => 'slug',
                'terms' => $group_slug
            ]
        ]
    ]);

    if (empty($faqs)) return;

    $parsed_faqs = array_map(function($faq) {
        return [
            'question' => get_the_title($faq),
            'answer' => apply_filters('the_content', $faq->post_content),
        ];
    }, $faqs);

    faq_component($parsed_faqs, $title);
}

function add_recharge_plan_metaboxes() {
    add_meta_box(
        'recharge_plan_fields',
        'Recharge Plan Details',
        'recharge_plan_fields_callback',
        'recharge_plan',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_recharge_plan_metaboxes');

function recharge_plan_fields_callback($post) {
    // Valores actuales
    $usd = get_post_meta($post->ID, '_usd', true);
    $cup = get_post_meta($post->ID, '_cup', true);
    $datos = get_post_meta($post->ID, '_datos', true);
    $dias_datos = get_post_meta($post->ID, '_dias_datos', true);
    $saldo = get_post_meta($post->ID, '_saldo', true);
    $vigencia_saldo = get_post_meta($post->ID, '_vigencia_saldo', true);
    $extras_info_vigencia = get_post_meta($post->ID, '_extras_info_vigencia', true);
    $extras = get_post_meta($post->ID, '_extras', true);
    $image_id = get_post_meta($post->ID, '_plan_image_id', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    $image_invert_id = get_post_meta($post->ID, '_invert_image_id', true);
    $image_invert_url = $image_invert_id ? wp_get_attachment_url($image_invert_id) : '';

    ?>
    <label>Monto en USD:</label><br>
    <input type="text" name="usd" value="<?php echo esc_attr($usd); ?>" /><br><br>

    <label>Equivalente en CUP:</label><br>
    <input type="number" name="cup" value="<?php echo esc_attr($cup); ?>" /><br><br>

    <label>Datos (MB/GB):</label><br>
    <input type="text" name="datos" value="<?php echo esc_attr($datos); ?>" /><br><br>

    <label>Días de Vigencia de Datos:</label><br>
    <input type="number" name="dias_datos" value="<?php echo esc_attr($dias_datos); ?>" /><br><br>

    <label>Extra Info vigencia:</label><br>
    <textarea name="extras_info_vigencia" rows="4" style="width:100%;"><?php echo esc_textarea($extras_info_vigencia); ?></textarea>

    <label>Saldo Principal:</label><br>
    <input type="number" name="saldo" value="<?php echo esc_attr($saldo); ?>" /><br><br>

    <label>Vigencia de Saldo (días):</label><br>
    <input type="number" name="vigencia_saldo" value="<?php echo esc_attr($vigencia_saldo); ?>" /><br><br>

    <label>Extras:</label><br>
    <textarea name="extras" rows="4" style="width:100%;"><?php echo esc_textarea($extras); ?></textarea>

    <label>Imagen del plan:</label><br>
    <input type="hidden" name="plan_image_id" id="plan_image_id" value="<?php echo esc_attr($image_id); ?>" />
    <img id="plan-image-preview" src="<?php echo  esc_url($image_url); ?>" style="max-width: 100%; height: auto;" />
    <br><input type="button" class="button" id="upload_plan_image" value="Subir imagen" />

    <label>Imagen invertida del plan:</label><br>
    <input type="hidden" name="invert_image_id" id="invert_image_id" value="<?php echo esc_attr($image_invert_id); ?>" />
    <img id="invert-image-preview" src="<?php echo  esc_url($image_invert_url); ?>" style="max-width: 100%; height: auto;" />
    <br><input type="button" class="button" id="upload_invert_image" value="Subir imagen" />
    <?php
}

function save_recharge_plan_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['usd'])) update_post_meta($post_id, '_usd', sanitize_text_field($_POST['usd']));
    if (isset($_POST['cup'])) update_post_meta($post_id, '_cup', intval($_POST['cup']));
    if (isset($_POST['datos'])) update_post_meta($post_id, '_datos', sanitize_text_field($_POST['datos']));
    if (isset($_POST['dias_datos'])) update_post_meta($post_id, '_dias_datos', intval($_POST['dias_datos']));
    if (isset($_POST['saldo'])) update_post_meta($post_id, '_saldo', intval($_POST['saldo']));
    if (isset($_POST['vigencia_saldo'])) update_post_meta($post_id, '_vigencia_saldo', intval($_POST['vigencia_saldo']));
    if (isset($_POST['extras_info_vigencia'])) update_post_meta($post_id, '_extras_info_vigencia', sanitize_textarea_field($_POST['extras_info_vigencia']));
    if (isset($_POST['extras'])) update_post_meta($post_id, '_extras', sanitize_textarea_field($_POST['extras']));
    if (isset($_POST['plan_image_id'])) update_post_meta($post_id, '_plan_image_id', intval($_POST['plan_image_id']));
    if (isset($_POST['invert_image_id'])) update_post_meta($post_id, '_invert_image_id', intval($_POST['invert_image_id']));
}
add_action('save_post', 'save_recharge_plan_fields');