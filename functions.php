<?php

function drdev_enqueue_assets() {
    wp_enqueue_style('drdev-style', get_template_directory_uri() . '/dist/style.css', [], filemtime(get_template_directory() . '/dist/style.css'));
    
    wp_enqueue_script('drdev-script', get_template_directory_uri() . '/assets/js/scripts.js', [], false, true);

        if(is_front_page() || is_page_template('template-hero.php')) {
        // CSS
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array(),
            '11.0.0'
        );
        
        // JS
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array(),
            '11.0.0',
            true // true = carga en footer
        );

       // intl-tel-input CSS
    wp_enqueue_style(
        'intl-tel-input-css',
        'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css',
        array(),
        '18.1.1'
    );

    // intl-tel-input JS
    wp_enqueue_script(
        'intl-tel-input-js',
        'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js',
        array(),
        '18.1.1',
        true
    );

    // intl-tel-input utils.js (para validación y formato internacional)
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


    }
}
add_action('wp_enqueue_scripts', 'drdev_enqueue_assets');

require_once get_template_directory() . '/inc/assets-paths.php';
add_action('wp', function () {
    global $hp_assets;
    $drdev_assets = drdev_get_assets_data();
});

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
    ]);
}
add_action('after_setup_theme', 'drdev_theme_setup');


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

    // Direcciones (5)
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("company_address_$i", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        $wp_customize->add_control("company_address_$i", [
            'label'    => __("Dirección $i", 'drdevultimate'),
            'section'  => 'company_data_section',
            'type'     => 'textarea',
        ]);
    }
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

function drdev_register_cpt_servicios() {
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
}
add_action('init', 'drdev_register_cpt_servicios');

function drdev_add_servicio_meta_box() {
  add_meta_box(
    'servicio_meta_box',
    'Detalles del Servicio',
    'drdev_render_servicio_meta_box',
    'servicio',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'drdev_add_servicio_meta_box');

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

function drdev_register_faq_post_type() {
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
}
add_action('init', 'drdev_register_faq_post_type');

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