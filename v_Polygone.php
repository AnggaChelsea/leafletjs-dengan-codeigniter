<div class="main-content" style="margin-top:-410px;">
    <div class="text">
        <input type="text" name="cari" placeholder="Cari 3 titik letak disini">
        <button style="background:blue; border:none;">Cari</button>
        <!-- <h3>Titik</h3> -->
    </div>
    <section class="section" style="margin-top:30px;">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
        <div id="map" style="height:350px"></div>

        <script>
        var map = L.map('map').setView([-6.981874, 106.556569], 27);
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
            }).addTo(map)


        let marker = L.marker([-6.981874, 106.556569]).addTo(map)
            .bindPopup('Kantor Bappeda Sukabumi')
            .openPopup();

        let pengadilam = L.marker([-6.980904, 106.557438]).addTo(map)
            .bindPopup('Kantor Pengadilan')
            .openPopup();

        let DPRD = L.marker([-6.980713, 106.555947]).addTo(map)
            .bindPopup('Kantor DPRD')
            .openPopup();

        //?polygone
        var polygon = L.polygon([
            [-6.981874, 106.556569],
            [-6.980904, 106.557438],
            [-6.980713, 106.555947]
            //bisa di tambah lagi jikalau mau mengambil banyak titik 
        ]).addTo(map);

        const icon1 = L.icon({
            iconUrl: "<?= base_url('icon/tower.png') ?>",
            iconSize: [20, 60],
            iconAnchor: [22, 65],
            popupAnchor: [-3, 55]
        });

        const lokasiMasjidAgung = L.marker([-6.988209, 106.550405]).addTo(map)
            .bindPopup('ini masjid agung')
        </script>


        <div class="section-body">
        </div>
    </section>
</div>
</div>