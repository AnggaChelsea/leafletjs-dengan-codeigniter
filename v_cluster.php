
<!DOCTYPE html>
<html>
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
<div class="main-content" style="margin-top:-510px;">

<br/><p></p>
<!---print disini saya buat khusus print-->

<div id="printableArea">
  <div id='map'></div>
  </div>
<button type="button" class="btn btn-primary" id="printBtn" onclick="print();">Print Tab</button>


  <input type='hidden' id='latitude' value=''/><input type='hidden' id='longitude' value=''/><input type='hidden' id='zoom' value=''/>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
  <script>
    // declare variable as global
    var map;
    // declare basemap -- OSM
    var OpenStreetMapLayer = new L.TileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      minZoom: 8, 
      maxZoom: 30, 
      attribution: `Map Data &copy; <a href='http://openstreetmap.org'>OpenStreetMap</a> contributors.`
    });
    // GeoJSON object
    var _points = {
      "type": "FeatureCollection",
      "features": [
          <?php foreach($tps as $key){?>
        {
          "type": "Feature",
          "properties": {
            "nama_tps": "<?= $key['nama_tps'] ?>",
            "lokasi": "<?= $key['lokasi'] ?>",
            "kecamatan": "<?= $key['kecamatan'] ?>"
          },
          "geometry": {
            "type": "Point",
            "coordinates": [
                <?= $key['longitude'] ?>,
              <?= $key['latitude'] ?>
            ]
          }
        },
    <?php } ?>
      
      ]
    };
    
   
    var _layerA = L.geoJson(_points, {
      onEachFeature: function(feature, layer){
          layer.bindPopup('tempat:'+feature.properties.nama_tps+'<br/>lokasi:'+feature.properties.lokasi+'<br/>Kecamatan:'+feature.properties.kecamatan+'')      
    }
    });
   
    var markerklaster = L.markerClusterGroup();
    
    map = L.map('map', {
      layers: [OpenStreetMapLayer, markerklaster]
    });
    
    markerklaster.addLayer(_layerA);
    
    map.fitBounds(_layerA.getBounds());



    //dibawah ini khusus print

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

  </div>
</div>
</html>