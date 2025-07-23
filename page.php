<?php get_header(); ?>

<main class="bg-white">
 <?php 
    get_template_part('template-parts/home/hero-section'); 

    get_template_part('template-parts/home/about-us'); 

    get_template_part('template-parts/home/description'); 

    get_template_part('template-parts/home/offer'); 

     get_template_part('template-parts/home/form'); 

    get_template_part('template-parts/home/price'); 
    
    render_faq_group('home', 'Preguntas frecuentes');
?>
</main>

<?php get_footer(); ?>