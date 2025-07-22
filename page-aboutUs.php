<?php
/**
 * Template Name: About Us
 * Template Post Type: page
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header(); ?>

<main class="bg-white">
 <?php 
    get_template_part('template-parts/AboutUs/hero-section-about-us'); 

    get_template_part('template-parts/AboutUs/about-us'); 

    render_faq_group('home', 'Preguntas frecuentes');
?>
</main>

<?php get_footer(); ?>