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