<?php get_header(); ?>

<main class="max-w-5xl mx-auto p-6">
  <?php if (have_posts()) : ?>
    <div class="grid md:grid-cols-2 gap-6">
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("bg-white shadow-md rounded-xl p-4"); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-lg">
              <?php the_post_thumbnail('large', ['class' => 'w-full h-auto transition-transform duration-300 hover:scale-105']); ?>
            </a>
          <?php endif; ?>
          <h2 class="mt-4 text-xl font-bold">
            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600"><?php the_title(); ?></a>
          </h2>
          <p class="text-gray-600 text-sm"><?php the_time(get_option('date_format')); ?></p>
          <div class="mt-2 text-gray-800">
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <div class="mt-8">
      <?php the_posts_pagination([
        'mid_size'  => 2,
        'prev_text' => __('← Anterior', 'drdevultimate'),
        'next_text' => __('Siguiente →', 'drdevultimate'),
        'class'     => 'pagination flex gap-2 justify-center'
      ]); ?>
    </div>
  <?php else : ?>
    <p class="text-center text-gray-500"><?php esc_html_e('No hay publicaciones aún.', 'drdevultimate'); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>