document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      
      // Alternar estados
      menuToggle.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');
      mobileMenu.setAttribute('aria-hidden', isExpanded);
      
      // Forzar reflow para asegurar la transición
      void mobileMenu.offsetHeight;
    });
    
    // Cerrar al hacer clic fuera
    document.addEventListener('click', (e) => {
      if (!mobileMenu.contains(e.target) && e.target !== menuToggle) {
        menuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.add('hidden');
        mobileMenu.setAttribute('aria-hidden', 'true');
      }
    });
  }

  //hero section home
   new Swiper('.hero-slider', {
 /*      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      }, */
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
});