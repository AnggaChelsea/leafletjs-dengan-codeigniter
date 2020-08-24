

<div class="main-content" style="margin-top:-500px;">
     <?= $this->session->flashdata('pesan'); ?>

    <div class="navbar-form navbar-right">



    </div>
    <div id="result"></div>
    <br>
    <br>
    <br>
    <form style="float: left;" action="<?= base_url('home/editdata') ?>" method="POST">
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Data..."
            autocomplete="off" autofocus="">
        <button class="btn btn-primary" type="submit" name="submit"
            style="position: absolute; margin-top: -40px; margin-left: 220px;">cari</button>
    </form>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal" onclick="add()"
        style="color:White; widht:bold; float: right;">
        Tambah Peta
    </button>
    <?php echo form_close() ?>

    <br>
   
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dinas</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Coordinate</th>
                <th scop="col"><b>Hapus</b></th>
                <th scope="col"><b>Detail</b></th>
                <th scope="col"><b>update</b></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tps as $key) { ?>
            <tr>
                <th scope="row"><?= $key['kode_tps'] ?></th>
                <td><?= $key['nama_tps'] ?></td>
                <td><?= $key['kecamatan'] ?></td>
                <td><?= $key['latitude'] ?>, <?= $key['longitude'] ?></td>
                <td><a href="<?php echo base_url() . 'home/hapus/' . $key['id']; ?>" class="btn btn-danger"><i
                            class="fa fa-trash btn-sm"></i></a></td>
                <td><a href="<?php echo base_url() . 'home/detail/' . $key['id']; ?>" class="btn btn-warning"><i
                            class="fa fa-info-circle"></i></a></td>
                <td>
                    <a href="<?= base_url() .'home/detail/' . $key['id']; ?>" class="btn btn-primary"><i class="fa fa-edit btn-sm" style="color:white"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<?= $this->session->flashdata('pesan'); ?>



<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <!--  <form class="form-horizontal" action="<?= base_url();?>home/input_data"  method="post" enctype="multipart/form-data"> -->
            <?= form_open_multipart('home/input_data'); ?>
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
                        <input type="text" value="" name="nama_tps" class="form-control" required=""
                            placeholder="Bappeda" id="nama_tps">
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
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" value="" name="lokasi" class="form-control" required=""
                            placeholder="batusapi" id="lokasi">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kecamatan">foto</label>
                            <input type="file" value="" name="photo" class="form-control" required=""
                                >
                        </div>
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
<!-- <script type="text/javascript">
  $(document).ready(function(){

    load_data();

    function load_data(query)
    {
      $.ajax({
        url:"<?= base_url(); ?>home/editdata/fetch",
        method: "POST",
        data:{query:query},
        succes:function(data){
          $('#result').html(data)
        }
      })
    }
    $('#search_text').keyup(function(){
      var search = $($this).val();
      if (search != '') 
      {
        load_data(search);
      }
      else
      {
        load_data();
      }

    });
  });
</script> -->