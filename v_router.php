
<div class="main-content" style="margin-top:-410px;">
<input type="text" name="cari" id="cari" placeholder="Type titik mulai " style="border-top:none; border-left:none; border-right:none; display:none; ">
        <button style="background:blue; border:none; display:none;">Cari</button></p>
<div id="map" style="height:310px"></div>
<script>

const cari = document.getElementById('cari').value;

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

// //?router

L.Routing.control({
    waypoints: [
        L.latLng(-6.981874, 106.556569), //disini variable titik start 
        L.latLng(-6.850757, 106.875607) //disini titik akhir . kantor bappeda
    ],
    routeWhileDragging: true
}).addTo(map);


</script>            
            