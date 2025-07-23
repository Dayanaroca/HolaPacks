  <?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

global $drdev_assets;
if (!is_array($drdev_assets)) {
    $drdev_assets = drdev_get_assets_data(); 
}

// Función reusable para mostrar menús
function drdev_display_menu($location, $title) {
    if (has_nav_menu($location)) : ?>
        <!-- Desktop -->
        <div class="mb-6 md:mb-0 hidden lg:block">
            <h4 class="font-outfit mb-4 mt-4 text-base font-bold"><?php echo esc_html($title); ?></h4>
            <?php
            wp_nav_menu([
                'theme_location' => $location,
                'menu_class' => 'space-y-2',
                'container' => false,
                'depth' => 1,
                'walker' => new Footer_Menu_Walker()
            ]);
            ?>
        </div>

        <!-- Mobile -->
        <div class="block lg:hidden space-y-4">
            <div class="border-b-2 border-secondary p-4">
                <button 
                    onclick="toggleServicio(this)" 
                    class="flex justify-between items-center w-full text-left"
                    aria-expanded="false"
                    aria-controls="menu-<?php echo $location; ?>"
                >
                    <h4 class="font-outfit mb-2 md:mb-4 mt-4 text-base font-bold"><?php echo esc_html($title); ?></h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none" aria-hidden="true">
                        <path d="M10.9377 12.7275L7.60429 9.22754H14.271L10.9377 12.7275Z" fill="#F7B11D"/>
                    </svg>
                </button>
                <div id="menu-<?php echo $location; ?>" class="toggle-content mt-3 hidden space-y-2 text-sm text-white">
                    <?php
                    wp_nav_menu([
                        'theme_location' => $location,
                        'menu_class' => 'space-y-2',
                        'container' => false,
                        'depth' => 1,
                        'walker' => new Footer_Menu_Walker()
                    ]);
                    ?>
                </div>
            </div>
        </div>
    <?php endif;
}
?>

<footer role="contentinfo" class="bg-primary text-white">
    <div class="mx-auto px-4 py-6 md:px-10">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Columna Logo y Copyright -->
            <div class="mb-0 flex flex-col items-center md:items-start justify-between">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center" aria-label="<?php bloginfo('name'); ?>">
                    <img 
                        src="<?php echo esc_url($drdev_assets['logo-footer']); ?>" 
                        alt="<?php bloginfo('name'); ?>" 
                        width="239" 
                        height="59"
                        loading="lazy"
                    >
                </a>
                
                <div class="flex items-center gap-2 justify-center md:justify-start mt-4" aria-label="<?php esc_attr_e('Redes sociales', 'drdevultimate'); ?>">
                    <a href="<?php echo esc_attr($drdev_assets['tiktok']); ?>" aria-label="TikTok">
                        <img src="<?php echo esc_url($drdev_assets['tiktok_icon']); ?>" alt="" aria-hidden="true" class="h-8 w-8">
                    </a>
                    <a href="<?php echo esc_attr($drdev_assets['facebook']); ?>" aria-label="Facebook">
                        <img src="<?php echo esc_url($drdev_assets['facebook_icon']); ?>" alt="" aria-hidden="true" class="h-8 w-8">
                    </a>
                    <a href="<?php echo esc_attr($drdev_assets['instagram']); ?>" aria-label="Instagram">
                        <img src="<?php echo esc_url($drdev_assets['instagram_icon']); ?>" alt="" aria-hidden="true" class="h-8 w-8">
                    </a>
                </div>
                
                <p class="text-white text-xs font-bold text-center md:text-left mt-4">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Todos los derechos reservados.', 'drdevultimate'); ?>
                </p>
            </div>

            <!-- Menús -->
            <?php drdev_display_menu('legal', __('Legal', 'drdevultimate')); ?>
            <?php drdev_display_menu('secondary', __('Nosotros', 'drdevultimate')); ?>

            <!-- Columna Contacto -->
            <div class="flex flex-col text-center md:text-right gap-3 md:gap-2">
                <h2 class="font-bold text-base mt-8 lg:mt-4 mb-1"><?php esc_html_e('Si tiene alguna pregunta, contáctenos', 'mipacks'); ?></h2>
                <?php if ($drdev_assets['phone']): ?>
                    <div class="flex items-center gap-8 pl-8 justify-center sm:justify-end" aria-label="<?php esc_attr_e('Contacto telefónico', 'drdevultimate'); ?>">
                        <div class="flex items-center gap-2">
                            <img src="<?php echo esc_url($drdev_assets['phone_icon']); ?>" alt="" aria-hidden="true" class="h-8 w-8">
                            <a href="tel:<?php echo esc_attr($drdev_assets['phone']); ?>" class="text-white font-bold text-xs hover:text-secondary transition-colors">
                                <?php echo esc_attr($drdev_assets['phone']); ?>
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="<?php echo esc_url($drdev_assets['whatsapp_icon']); ?>" alt="" aria-hidden="true" class="h-8 w-8">
                            <a href="https://wa.me/<?php echo esc_attr($drdev_assets['whatsapp_clean']); ?>" target="_blank" rel="noopener noreferrer" class="text-white font-bold text-xs hover:text-secondary transition-colors">
                                <?php echo esc_attr($drdev_assets['whatsapp']); ?>
                            </a>
                        </div>
                    </div>
                    <a href="mailto:<?php echo esc_attr($drdev_assets['email']); ?>" target="_blank" rel="noopener noreferrer" class="text-white font-bold text-[12px] font-montserrat hover:text-secondary transition-colors">
                        <?php echo esc_attr($drdev_assets['email']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
  <?php get_template_part('template-parts/footer/rastreo'); ?>
</body>
</html>

<?php
class Footer_Menu_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        
        $output .= '<li class="text-xs font-normal md:font-bold">';
        $output .= '<a href="' . esc_url($item->url) . '" class="hover:text-secondary transition-colors"';
        $output .= ' aria-current="' . ($item->current ? 'page' : 'false') . '">';
        $output .= esc_html($item->title);
        $output .= '</a></li>';
    }
}
?>

