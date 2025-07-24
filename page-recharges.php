<?php
/**
 * Template Name: Recharges
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
    get_template_part('template-parts/recharges/section15');

    get_template_part('template-parts/recharges/rechargesPlan');

    get_template_part('template-parts/recharges/contactRecharges');

    render_faq_group('home', 'Preguntas frecuentes');
?>
</main>

<?php get_footer(); ?>