<div class="main-content" style="margin-top:-440px;">
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
            var map = L.map('map').setView([-6.201741, 106.841178], 5);
            L.tileLayer(
                'http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Bappeda</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Sukabumi</a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);

                //?geojson untuk negara
                $.getJSON("<?= base_url('geojsonn/dataprovindonesia/indonesia-en.geojson') ?>", function(data) {
                    geoLayer = L.geoJson(data,({
                        style: function(feature){
                            color: 'yellow'
                        }
                    })).addTo(map)
                    //tambah keterangan
                    // geoLayer.eachLayer(function(Layer){
                    //     layer.bindPopup('Sumatera Barat')
                    // })
                })

            </script>




            <div class="section-body">
            </div>
    </section>
</div>
</div>