<!-- Overlay + Popup de Rastreo --> 
<div id="tracking-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[9998]"></div>

<div id="tracking-popup" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-lg shadow-lg w-[95%] sm:w-[85%] max-w-2xl hidden z-[9999]" aria-modal="true" role="dialog">
  <div class="flex justify-between items-start mb-4">
    <h2 class="text-black font-montserrat text-[20px] font-bold leading-[1.2em]">
      Localiza tus envíos en tiempo real con Hola Packs
    </h2>
    <button onclick="closeTrackingPopup()" class="ml-4 shrink-0">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path d="M2 24L0 22L10 12L0 2L2 0L12 10L22 0L24 2L14 12L24 22L22 24L12 14L2 24Z" fill="#1C1B1F"/>
      </svg>
    </button>
  </div>

  
  <p class="mb-4">
    Introduce tu número de pedido y podrás consultar en qué momento del trayecto se encuentra.
  </p>

 <div class="flex flex-col md:flex-row w-full gap-2 mb-4">
    <input id="tracking-number" type="text" class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring focus:ring-transparent">
    <button onclick="submitTracking()" class="w-full md:w-[228px] bg-primary text-white rounded-r-[0px] sm:rounded-r-[10px] p-2 font-bold text-base">
      Buscar
    </button>
  </div>

  <div id="tracking-result" class="space-y-3"></div>
</div>