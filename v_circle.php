
        <div class="easyPrint">
            <div class="main-content" style="margin-top:-500px;">
        <div id="map" style="height:500px">
            </div>

            <script>
            var map = L.map('map').setView([-6.981874, 106.556569], 10);
            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/"></a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">BAPPEDA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/"></a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);
            let marker = L.marker([-6.981874, 106.556569]).addTo(map)
                .bindPopup('Tower Bappeda Sukabumi')
                .openPopup();

            var circleTowerBappeda = L.circle([-6.981874, 106.556569], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map);

            var circleTowerRSUD = L.circle([-6.988838, 106.557985], {
                color: 'red',
                fillColor: 'green',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map);

            const icon1 = L.icon({
                iconUrl: "<?= base_url('icon/tower.png') ?>",
                iconSize: [20, 60],
                iconAnchor: [22, 65],
                popupAnchor: [-3, 55]
            });

           L.marker([-6.981874, 106.556569],{icon:icon1}).bindPopup('ini tower bappeda').addTo(map)

           var printer = L.easyPrint({
            tileLayer: tiles,
            sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
            filename: 'myMap',
            exportOnly: true,
            hideControlContainer: true
        }).addTo(map);

        function manualPrint () {
            printer.printMap('CurrentSize', 'MyManualPrint')
        }

            </script>
        </div>

            <button class="manualButton" onclick="manualPrint()">Manual print</button>
