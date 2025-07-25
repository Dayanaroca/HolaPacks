document.addEventListener('DOMContentLoaded', function () {
  const mapEl = document.getElementById('map');
  const cards = document.querySelectorAll('.office-card');

  let map;
  let markers = [];
  const infoWindow = new google.maps.InfoWindow();

  const icon = {
    url: '/wp-content/themes/DrDevUltimate/assets/images/icons/office-map.svg',
    scaledSize: new google.maps.Size(40, 40),
  };

  function initMap() {
    if (!cards.length) return;

    const firstCard = cards[0];
    const center = {
      lat: parseFloat(firstCard.dataset.lat),
      lng: parseFloat(firstCard.dataset.lng),
    };

    map = new google.maps.Map(mapEl, {
      center,
      zoom: 14,
    });

    cards.forEach((card, index) => {
      const position = {
        lat: parseFloat(card.dataset.lat),
        lng: parseFloat(card.dataset.lng),
      };

      const marker = new google.maps.Marker({
        position,
        map,
        icon,
        title: card.dataset.title,
      });

      marker.addListener('click', () => {
        activateCard(card);
      });

      markers.push(marker);
    });

    activateCard(firstCard);
  }

  function activateCard(card) {
    // reset all
    cards.forEach(c => c.classList.remove('border-2', 'border-primary', 'bg-blue-50', 'scale-105'));
    card.classList.add('border-2', 'border-primary', 'bg-blue-50', 'scale-105');

    const lat = parseFloat(card.dataset.lat);
    const lng = parseFloat(card.dataset.lng);
    const title = card.dataset.title;
    const dir = card.dataset.dir;
    const phone = card.dataset.phone;
    const ws = card.dataset.ws;
    const email = card.dataset.email;
    const sched = card.dataset.sched;

    const gmLink = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;

    const content = `
      <div style="max-width: 250px; font-family: Montserrat !important;">
        <h4 class="text-xs font-bold">
          ${title}
        </h4>
        <p class="text-xs">${dir}</p>
        ${phone ? `<p class="text-xs">Tel: ${phone}</p>` : ''}
        ${ws ? `<p class="text-xs">Whatsapp:  ${ws}</p>` : ''}
        ${email ? `<p class="text-xs">Email:  ${ws}</p>` : ''}
        ${sched ? `<p class="text-xs">Horario ${sched}</p>` : ''}
        <a href="${gmLink}" target="_blank" class="text-blue-600 underline mt-2 inline-block">Cómo llegar</a>
      </div>
    `;

    map.panTo({ lat, lng });
    infoWindow.setContent(content);
    infoWindow.open({
      map,
      anchor: markers.find(m => m.getPosition().lat() === lat && m.getPosition().lng() === lng),
      shouldFocus: false
    });

  }

  cards.forEach(card => {
    card.addEventListener('click', () => {
      activateCard(card);
      mapEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  initMap();
});