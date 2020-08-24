<div class="main-content" style="margin-top:-420px;">
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
            var map = L.map('map').setView([-6.981874, 106.556569], 4);
            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);

            
                <?php forEach($pemetaan as $key -> $value) { ?>

                    const lokasiPertigaan = L.marker([ <?php $value -> latitude ?> , <?php $value -> longitude ?>
                        ], {
                            icon: icon1
                        }).addTo(map)
                        .bindPopup('Pertigaan Tugu Jangilus')
                        .openPopup() 
        
                <?php } ?>

            </script>




            <div class="section-body">
            </div>
    </section>
</div>
</div>