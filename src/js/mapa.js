if(document.querySelector('#mapa')){

    const lat =  10.674275656066785;
    const log = -71.63122379933094;

    const zoom = 16;



    const map = L.map('mapa').setView([lat, log], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, log]).addTo(map)
        .bindPopup(`

            <h2 class="mapa__heading">DevWebCamp</h2>
            <p class="mapa__texto">Centro de Convencioens de los Angeles</p>

        `).openPopup();
}