
<head lang='en'>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"/>
  <script src="<?= base_url(); ?>dist/leaflet.browser.print.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Print-Any-Part-Of-Your-Page-Print/jQuery.print.js"></script>
  <style>
    html, body {margin:0;padding:0;}
    #map {width:100%; height:540px;}
    .leaflet-popup-content-wrapper {border-radius: 0px !important;}
  </style>
</head>
<body class="easyPrint">
<link rel="stylesheet" href="<?= base_url() ?>routing/dist/leaflet-routing-machine.css" />
<div class="main-content" style="margin-top:-500px;">
<br/><p></p>
<button type="button" class="btn btn-primary" id="printBtn" onclick="print();">Print Tab</button>
<div id="map" style="height:500px"></div>

            <script>
            
            var map = L.map('map').setView([-6.923648, 107.615584], 7);
            L.tileLayer(
                'http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Bappeda</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Sukabumi</a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);

                <?php foreach($tps as $key) { ?>

                L.marker([<?= $key['latitude']?>, <?= $key['longitude'] ?>]).addTo(map)
                .bindPopup('<h5><?= $key['nama_tps'] ?>
                </h5> </p> <br>lokasi <?= $key['lokasi'] ?>
                </br> kecamatan <?= $key['kecamatan'] ?>
                <br>lat <?= $key['latitude'] ?>
                <br>lng <?= $key['longitude'] ?><br/><br><button style="background-color:blue; color:white; border:none;" onclick="return keSini(<?= $key['latitude'] ?>, <?= $key['longitude'] ?>)">Go Sini</button' )
                .openPopup();

                <?php } ?>

                //routing 
              var control = L.Routing.control({
                waypoints: [
                    L.latLng(-6.923648, 107.615584),
                    L.latLng(-6.887444, 107.692108)
                ],
                routeWhileDragging: true
            })
            control.addTo(map);
                        
            //disini function untuk routing click button kesini otomatis route berubah sesuao button ( kesSini )
            function keSini(latitude,longitude){
                var latLng = L.latLng(latitude, longitude)
                control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
            }




            L.control.browserPrint({
                printLayer:  L.tileLayer('//stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png', {
                                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                                subdomains: 'abcd',
                                minZoom: 0,
                                maxZoom: 20
                            }),
                closePopupsOnPrint: false,
            }).addTo(map);

            map.on("browser-pre-print", function(e) {
                        red.setStyle({fill: false});
                    });

                    map.on("browser-print-start", function(e) {
                        // Green circle;
                        e.printObjects["L.Circle"][1].setStyle({fillColor: "orange"});
                        e.printObjects["L.Circle"][1].setRadius(312330);
                    });

                    map.on("browser-print-end", function(e) {
                        red.setStyle({fill: true});
                    });



            </script>


<style type="text/css">
    <style leaflet-browser-print-content>
    .grid-print-container { // grid holder that holds all content (map and any other content)
        grid-template: auto 1fr auto / 1fr;
        background-color: orange;
    }
    .grid-map-print { // map container itself
        grid-row: 1;
    }
    .title { // Dynamic title styling
        grid-row: 1;
        justify-self: center;
        color: white;
    }
    .sub-content { // Dynamic sub content styling
        grid-row: 0;
        padding-left: 5px;
    }
</style>


            <div class="section-body">
            </div>
    </section>
</div>
</div>