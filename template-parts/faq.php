<?php
function faq_component($faqs = [], $title = 'Preguntas frecuentes') {
    if (empty($faqs)) return;
    ?>
    <section class="faq-section pb-12 px-2.5 md:px-8 max-w-6xl mx-auto sm:pb-16">
        <h2 class="text-2xl md:text-3xl font-bold text-primary mb-4 md:mb-8 text-center">
            <?php echo esc_html($title); ?>
        </h2>
        
        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full ">
                <?php foreach ($faqs as $index => $faq) : ?>
                    <div class="faq-item border-b border-secondary py-4">
                        <button 
                            class="faq-question flex justify-between items-center w-full text-left text-primary gap-4"
                            aria-expanded="false"
                            aria-controls="faq-answer-<?php echo $index; ?>"
                            onclick="toggleFaq(<?php echo $index; ?>)"
                        >
                            <h3 class="font-bold text-primary text-base flex-1">
                                <?php echo esc_html($faq['question']); ?>
                            </h3>
                            <span class="flex items-center justify-center w-6 h-6">
                                <svg class="faq-toggle-icon w-5 h-5 text-primary transition-transform" 
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>                        
                        <div id="faq-answer-<?php echo $index; ?>" class="faq-answer hidden mt-2 text-base text-black [&>p]:text-base [&>p]:text-black">
                            <?php echo wp_kses_post($faq['answer']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}