  <footer class="bg-primary mt-12 p-4 text-white">
    <?php
      global $drdev_assets;
      if (!is_array($drdev_assets)) {
        $drdev_assets = drdev_get_assets_data(); 
      }
      get_template_part('template-parts/footer/contentFooter'); 
    ?>
  </footer>
  <?php wp_footer(); ?>
  <?php get_template_part('template-parts/footer/rastreo'); ?>
</body>
</html>
