document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const mobileOverlay = document.getElementById('mobile-menu-overlay');
  
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      
      // Alternar estados
      menuToggle.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');
      mobileMenu.setAttribute('aria-hidden', isExpanded);
      
      mobileOverlay.classList.toggle('hidden');
    });
    
    // Cerrar al hacer clic fuera
    document.addEventListener('click', (e) => {
      if (!mobileMenu.contains(e.target) && e.target !== menuToggle) {
        menuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.add('hidden');
        mobileMenu.setAttribute('aria-hidden', 'true');
        mobileOverlay.classList.add('hidden');
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

    //phone
    const input = document.querySelector("#telefono");

    window.intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: function (callback) {
        fetch('https://ipapi.co/json')
          .then(res => res.json())
          .then(data => callback(data.country_code))
          .catch(() => callback('us'));
      },
      utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js" // para validación y formato
    });
});

function openTrackingPopup() {
  document.getElementById('tracking-popup').classList.remove('hidden');
  document.getElementById('tracking-overlay').classList.remove('hidden');
}

function closeTrackingPopup() {
  document.getElementById('tracking-popup').classList.add('hidden');
  document.getElementById('tracking-overlay').classList.add('hidden');
  document.getElementById('tracking-result').innerHTML = '';
}

async function submitTracking() {
  const number = document.getElementById('tracking-number').value.trim();
  const resultContainer = document.getElementById('tracking-result');
  resultContainer.innerHTML = 'Consultando...';

  try {
    const response = await fetch('https://api.tu-crm.com/tracking', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
        // Añade aquí tu token si es necesario
        // 'Authorization': 'Bearer TU_API_KEY'
      },
      body: JSON.stringify({ trackingNumber: number })
    });

    if (!response.ok) throw new Error('Error al consultar el pedido');

    const data = await response.json();

    // Muestra datos recibidos
    resultContainer.innerHTML = `
      <p class="text-[#040404] font-montserrat font-bold text-[16px] leading-[26.4px]">Estados de los paquetes</p>
      ${data.states.map(state => `
        <div class="flex items-start space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><mask id="mask" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20"><rect width="20" height="20" fill="#D9D9D9"/></mask><g mask="url(#mask)"><path d="M8.83 13.83l5.88-5.88-1.17-1.17L8.83 11.5 6.46 9.12 5.29 10.29l3.54 3.54zM10 18.33a8.33 8.33 0 1 1 0-16.67 8.33 8.33 0 0 1 0 16.67z" fill="#0D6A68"/></g></svg>
          <div>
            <p class="text-[#040404] font-montserrat text-[12px] font-bold leading-[26.4px]">${state.status}</p>
            <p class="text-black font-montserrat text-[12px] font-normal leading-[20.8px]">${state.timestamp}</p>
          </div>
        </div>
      `).join('')}
    `;
  } catch (error) {
    resultContainer.innerHTML = `<p class="text-red-600">No se pudo obtener el estado del envío. Intenta de nuevo.</p>`;
  }
}
  function toggleServicio(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  }
    function toggleFaq(index) {
        const answer = document.getElementById(`faq-answer-${index}`);
        const button = answer.previousElementSibling;
        const icon = button.querySelector('.faq-toggle-icon');
        
        // Toggle visibility
        answer.classList.toggle('hidden');
        
        // Update ARIA attributes
        const isExpanded = answer.classList.contains('hidden') ? 'false' : 'true';
        button.setAttribute('aria-expanded', isExpanded);
        
        // Rotate icon
        if (isExpanded === 'true') {
            icon.innerHTML = '<path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />';
        } else {
            icon.innerHTML = '<path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />';
        }
    }