<?php

function drdev_enqueue_assets() {
    wp_enqueue_style('drdev-style', get_template_directory_uri() . '/dist/style.css', [], filemtime(get_template_directory() . '/dist/style.css'));
    
    wp_enqueue_script('drdev-script', get_template_directory_uri() . '/assets/js/scripts.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'drdev_enqueue_assets');

// Habilitar soporte de características
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

