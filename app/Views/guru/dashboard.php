<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-4">
         <div class="callout callout-info">
            <div class="p-2">
               <table class="table-responsive">
                  <tbody>
                     <tr>
                        <td rowspan="3" style="width: 100px;">
                           <div class="text-center">
                              <img class="img-profile rounded-circle" src="/assets/guru/<?= $guru["gambar"]; ?>" width="70px" height="70px" style="object-fit: cover; object-position: center">
                              <a href="" class="edit-profil">Edit</a>
                           </div>
                        </td>
                        <td><i class="fas fa-user"></i></td>
                        <td>:</td>
                        <td><?= $guru["nama"]; ?></td>
                     </tr>
                     <tr>
                        <td><i class="fas fa-barcode"></i></td>
                        <td>:</td>
                        <td><?= $guru["nip"]; ?></td>
                     </tr>
                     <tr>
                        <td><i class="fas fa-map"></i></td>
                        <td>:</td>
                        <td><?= $guru["alamat"]; ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <?php if ($jml_data["siswa"] != 0) : ?>
         <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box bg-teal">
               <div class="inner">
                  <h3><?= $jml_data["siswa"]; ?></h3>
                  <p>DATA SISWA</p>
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
      <?php endif; ?>
      <?php if ($jml_data["mapel"] != 0) : ?>
         <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box bg-teal">
               <div class="inner">
                  <h3><?= $jml_data["mapel"]; ?></h3>
                  <p>MAPEL</p>
               </div>
               <div class="icon">
                  <i class="ion ion-person-add"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
      <?php endif; ?>
   </div>
   <?php if (session()->getFlashdata('pesan_error')) : ?>
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-ban"></i>Error!</h4>
         <?= session()->getFlashdata('pesan_error'); ?>
      </div>
   <?php endif; ?>
   <?php if (session()->getFlashdata('pesan_sukses')) : ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-check"></i>Success!</h4>
         <?= session()->getFlashdata('pesan_sukses'); ?>
      </div>
   <?php endif; ?>
   <div id="profil-guru">
      <div class="card">
         <div class="card-body">
            <form action="<?= site_url("guru/update_profil/" . $guru["id_guru"]); ?>" method="post" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required value="<?= $guru["nama"]; ?>">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" required value="<?= $guru["nip"]; ?>">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" required value="<?= $guru["no_hp"]; ?>">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required value="<?= $guru["alamat"]; ?>">
                     </div>
                  </div>
               </div>
               <div>
                  <input type="hidden" name="gambarLama" id="" value="<?= $guru["gambar"]; ?>">
                  <img src="/assets/guru/<?= $guru["gambar"]; ?>" alt="" class="img-thumbnail" width="150" id="img-preview"><br>
                  <input type="file" name="file_img" id="img-input">
               </div>
               <div class="mt-2">
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <?php if (isset($guru["nama_kelas"])) : ?>
      <div class="main-body">
         <div class="card mb-3">
            <div class="card-header bg-teal">Rangking Siswa Kelas <?= $guru["nama_kelas"]; ?></div>
            <div class="card-body">
               <div class="chart">
                  <canvas id="myChart"></canvas>
               </div>
            </div>
         </div>
      </div>
   <?php else : ?>
   <?php endif; ?>
</div>
<?= $this->endSection(); ?>