
<div class="main-content" style="margin-top:-410px;">
    <div class="text">
        <!-- <h3>Titik</h3> -->
    </div>
<section class="section" style="margin-top:30px;">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
   <div id="map" style="height:350px"></div>
<script>
    var map = L.map('map').setView([-6.981874, 106.556569], 7);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
}).addTo(map);
let marker=L.marker([-6.981874, 106.556569]).addTo(map)
    .bindPopup('Kantor Bappeda Sukabumi')
    .openPopup();

    const lokasiBapeda = L.marker([-6.981874, 106.556569]).addTo(map)
    .bindPopup('Kantor Bappeda Sukabumi')
    .openPopup();
//-6.983695, 106.557535

const lokasiSamsat = L.marker([-6.983695, 106.557535]).addTo(map)
    .bindPopup('Kantor Samsat Sukabumi')
    // .openPopup();


const lokasiRSUD = L.marker([-6.988838, 106.557985]).addTo(map)
    .bindPopup('Kantor RSUD Pelabuhanratu')
    // .openPopup();

const lokasiPertigaan = L.marker([-6.997420, 106.556625],{}).addTo(map)
    .bindPopup('Pertigaan Tugu Jangilus')
    .openPopup()
    // .openPopup();

const lokasiMasjidAgung = L.marker([-6.988209, 106.550405]).addTo(map)
.bindPopup('ini masjid agung')


//?polyline arah dari pertigaan tugu jangilus ke kantor bappeda bappeda
var latlngs = [
    [-6.997420, 106.556625],
    [-6.983695, 106.557535],
    [-6.981874, 106.556569]
];
var polyline = L.polyline(latlngs, {color: 'green'}).addTo(map);
// zoom the map to the polyline
map.fitBounds(polyline.getBounds());

</script>            
            
          <div class="section-body">
          </div>
        </section>
      </div>
</div>

</script>
         

          <div class="section-body">
          </div>
        </section>
      </div>
</div>