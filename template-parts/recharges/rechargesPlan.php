<section class="mb-12 lg:mb-16" aria-labelledby="recharge-plans-heading">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-6 lg:gap-10 items-center">
    <h2 id="recharge-plans-heading" class="text-primary font-black text-2xl sm:text-4xl text-center">
      ¿Cuáles son mis opciones de recarga?
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full lg:max-w-[90%]">
      <?php
      $args = array(
          'post_type'      => 'recharge_plan',
          'posts_per_page' => 4,
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'ASC',
      );
      $plans = new WP_Query($args);

      if ($plans->have_posts()):
          while ($plans->have_posts()): $plans->the_post();
              $title           = get_the_title();
              $usd             = get_post_meta(get_the_ID(), '_usd', true);
              $cup             = get_post_meta(get_the_ID(), '_cup', true);
              $datos           = get_post_meta(get_the_ID(), '_datos', true);
              $dias_datos      = get_post_meta(get_the_ID(), '_dias_datos', true);
              $saldo           = get_post_meta(get_the_ID(), '_saldo', true);
              $vigencia_saldo  = get_post_meta(get_the_ID(), '_vigencia_saldo', true);
              $extras_info_vigencia  = get_post_meta(get_the_ID(), '_extras_info_vigencia', true);
              $extras          = get_post_meta(get_the_ID(), '_extras', true);
              $slug_id         = 'plan-' . get_the_ID();
              $image_id = get_post_meta(get_the_ID(), '_plan_image_id', true);
              $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
              $image_invert_id = get_post_meta(get_the_ID(), '_invert_image_id', true);
              $image_invert_url = $image_invert_id ? wp_get_attachment_url($image_invert_id) : '';
      ?>
        <article class="group bg-drdevGrey p-4 rounded-xl shadow-blockpr transform transition-all duration-300 hover:scale-[1.02] hover:bg-primary" role="region" aria-labelledby="<?php echo esc_attr($slug_id); ?>">
            <div class="flex flex-row gap-7">
                <div class="flex flex-col items-center justify-center w-1/5">
                     <?php if ($image_url && $image_invert_url): ?>
                        <!-- Imagen normal (visible por defecto) -->
                        <img src="<?php echo esc_url($image_url); ?>"
                            alt="<?php echo esc_attr($title); ?>"
                            class="w-20 h-20 object-contain mb-2 block group-hover:hidden" />

                        <!-- Imagen invertida (visible solo en hover) -->
                        <img src="<?php echo esc_url($image_invert_url); ?>"
                            alt="<?php echo esc_attr($title); ?>"
                            class="w-20 h-20 object-contain mb-2  hidden group-hover:block" />
                    <?php elseif ($image_url): ?>
                        <!-- Fallback: solo una imagen si no hay invertida -->
                        <img src="<?php echo esc_url($image_url); ?>"
                            alt="<?php echo esc_attr($title); ?>"
                            class="w-20 h-20 object-contain mb-2" />
                    <?php endif; ?>

                    <h3 id="<?php echo esc_attr($slug_id); ?>" class="text-sm lg:text-2xl font-bold text-primary text-center leading-4 lg:leading-6 group-hover:text-secondary transition-colors duration-300">
                        <?php echo esc_html($title); ?>
                    </h3>
                </div>
                <div class="flex flex-row w-4/5">
                <div class="flex flex-col gap-3 w-full">
                    <!-- Fila 1 -->
                    <div class="grid grid-cols-3 gap-1 lg:gap-3">
                    <?php if ($usd): ?>
                        <div class="flex flex-col justify-between text-left">
                            <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Monto en USD: </div>
                            <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-5 group-hover:text-white transition-colors duration-300">$<?php echo esc_html($usd); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($cup): ?>
                        <div class="flex flex-col justify-between text-left">
                            <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Equivalente</br >en CUP: </div>
                            <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-5 group-hover:text-white transition-colors duration-300"><?php echo esc_html($cup); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($datos): ?>
                        <div class="flex flex-col justify-between text-left">
                            <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Datos:  </div>
                            <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-[11.238px] lg:leading-5 group-hover:text-white transition-colors duration-300"><?php echo esc_html($datos); ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                    
                    <hr class="border-primary group-hover:border-white transition-colors duration-300">

                    <!-- Fila 2 -->
                    <div class="grid grid-cols-3 gap-1 lg:gap-3">
                    <?php if ($dias_datos): ?>
                        <div class="flex flex-col justify-between text-left">
                            <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Días de Vigencia</br >de Datos: </div>
                                <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-5 group-hover:text-white transition-colors duration-300">
                                <?php echo esc_html($dias_datos); ?> días
                                <?php if ($extras_info_vigencia) { ?>
                                    <p class="text-primary font-semibold text-[0.37rem] lg:text-[10px] leading-[0.444rem] lg:leading-3 group-hover:text-white transition-colors duration-300"><?php echo esc_html($extras_info_vigencia); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($saldo): ?>
                        <div class="flex flex-col justify-between text-left">
                            <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Saldo Principal: </div>
                            <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-5 group-hover:text-white transition-colors duration-300"><?php echo esc_html($saldo); ?> CUP</div>
                        </div>
                    <?php endif; ?>
                    <?php if ($vigencia_saldo): ?>
                        <div class="flex flex-col justify-between text-left">
                            <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Vigencia de</br >Saldo:</div>
                            <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-5 group-hover:text-white transition-colors duration-300"><?php echo esc_html($vigencia_saldo); ?> días</div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <hr class="border-primary group-hover:border-white transition-colors duration-300">

                    <!-- Fila 3: Extras -->
                    <?php if ($extras): ?>
                    <div class="text-left">
                        <div class="text-[0.513rem] lg:text-sm font-normal text-primary group-hover:text-white transition-colors duration-300">Extras: </div>
                        <div class="text-[0.77rem] lg:text-xl text-primary font-black leading-[0.835rem] lg:leading-5 group-hover:text-white transition-colors duration-300"><?php echo esc_html($extras); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
                </div>

            </div>
        </article>
      <?php
          endwhile;
          wp_reset_postdata();
      else:
          echo '<p class="text-gray-600">No hay planes de recarga disponibles en este momento.</p>';
      endif;
      ?>
    </div>
  </div>
</section>
