<div class="main-content" style="margin-top:-500px;">

    <!-- Button trigger modal -->

    <!--ini popup database-->
    

    <section class="section" style="margin-top:30px;">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>

        <!---popup readme-->

            <!-- Button trigger modal -->
            

        <!--end--->
        <div id="map" style="height:550px">
        </div>
        </p>

<!-- Modal -->


            <br><span> Copy and <a href="<?= base_url('home/profile') ?>" class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal">Kirim to admin</a> </span>
        
        </div>

<!---awal popup--->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cara mengambil titik coordinate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>Dengan click cursor di map tertentu otomatis akan muncul alert yang berisikan coordinate, disitu anda hanya butuh copy code coordinate tersebut dan click ok 
            setelah itu anda scroll kebawah dan click save to database. disana nanti bakal di arahkan ke menu map kembali dan tambah pemetaan lagi 
        setelah itu anda masukan code tersebut dan anda masukan sesuai form yang ada </span>
      </div>
      <div class="modal-footer">
          <form action="<?= base_url('home/coordinate') ?>" method="post">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
          
            </form>
      </div>
    </div>
  </div>

</div>
</div>



<script>
//getCoordinate

function main() {

    var options = {
        center: [-6.981874, 106.556569],
        zoom: 10
    }

    var map = L.map('map').setView([-6.981874, 106.556569], 7);
    L.tileLayer(
                'http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Bappeda</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Sukabumi</a>',
                    id: 'mapbox/streets-v11',
                }).addTo(map);

    let marker = L.marker([-6.981874, 106.556569]).addTo(map)
        .bindPopup('Kantor Bappeda Sukabumi')
        .openPopup();
    routeWhileDragging: true


    // get coordinate
    map.on('click',
        function(e) {
            var coord = e.latlng.toString().split(',');
            var lat = coord[0].split('(');
            var lng = coord[1].split(')');
            alert("Copy Coordinate ini " + lat[1] + "" + lng[0] +
                " and Paste To database"
            );
        });
}
window.onload = main;

const Latetude = document.getElementById('Latetude').innerHTML.lat[1].value;
const Longtitude = document.getElementById('Longtetude').value;
</script>



<div class="section-body">

</div>
</section>
</div>

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
                 <?= form_open_multipart('home/kirim_data'); ?>
                    <div class="form-group">
                        <label for="nama_tps">Coordinate lat & Lng</label>
                        <input style="width: 100%;" type="text" value="" name="nama_tps" class="form-control"
                            required="" placeholder="-83212212, 231122332 " id="nama_tps">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="latitude">Latitude</label>
                            <input type="text" value="" name="latitude" class="form-control" required=""
                                placeholder="-83212212" id="latitude">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="longitude">Longitude</label>
                            <input type="text" value="" name="longitude" class="form-control" required=""
                                placeholder="231122332" id="longitude">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_tps">Nama Dinas</label>
                        <input type="text" value="" name="nama_dinas" class="form-control" required=""
                            placeholder="Bappeda" id="nama_dinas">
                    </div>
                     <div class="form-group">
                        <label for="lokasi">Kecamatan</label>
                        <input type="text" value="" name="kecamatan" class="form-control" required=""
                            placeholder="Pelabuhanratu" id="wilayah">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Wilayah</label>
                        <input type="text" value="" name="wilayah" class="form-control" required=""
                            placeholder="Pelabuhanratu" id="wilayah">
                    </div>
        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kecamatan">foto</label>
                            <input type="file" value="" name="photo" class="form-control" required=""
                                >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi">keterangan</label>
                        <textarea type="text" value="" name="keterangan" class="form-control" required=""
                            placeholder="kasih keterangan...." id="keterangan"></textarea> 
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Benar
                            </label>
                        </div>
                    </div>
                    <button type="submit" value="" class="btn btn-primary">Kirim</button>
               <?= form_close(); ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span style="color:red;"> Ambil Data Coordinat sesuai dengan titik yang tepat </span><a
                    href="<?= base_url('home/coordinat') ?>">Get Coordinate</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnSavee" onclick="Savee()"
                    data-dismiss="modal">Nanti</button>
            </div>
        </div>
    </div>
</div>