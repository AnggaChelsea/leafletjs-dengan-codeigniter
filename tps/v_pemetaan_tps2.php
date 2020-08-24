<div class="main-content" style="margin-top:-540px;">
    <section class="section" style="margin-top:30px;">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
        <div id="map" style="height:350px">
            </>
            <script>
            var map = L.map('map').setView([-6.923648, 107.615584], 10);
            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Bappeda</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Sukabumi</a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);


                <?php foreach($tps as $key) { ?>

                L.circle([<?= $key['latitude'] ?>, <?= $key['longitude'] ?>], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map);

            <?php } ?>

            </script>




<div class="section-body">
</div>
</section>
</div>
</div>