<?php
/**
 * Template Name: Our Offices
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
    get_template_part('template-parts/ourOffices/heroOurOffices'); 

    get_template_part('template-parts/ourOffices/officeMaps'); 
?>
</main>

<?php get_footer(); ?>