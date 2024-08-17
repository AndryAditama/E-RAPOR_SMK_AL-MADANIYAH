<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
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
   <div class="mb-2">
      <div class="flex justify-conten-start">
         <a href="<?= site_url("admin/tambah_siswa"); ?>" class="btn btn-primary">Tambah Siswa</a>
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Import Excel
         </button>
      </div>
   </div>
   <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
         <table id="example1" class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Siswa</th>
                  <th>Tgl Lahir</th>
                  <th>jk</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>No Hp</th>
                  <th>Sekolah Asal</th>
                  <th>Orang Tua</th>
                  <th>Pekerjaan (Ortu)</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1;
               foreach ($siswa as $s) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td style="white-space: nowrap;"><?= $s["nama_siswa"]; ?><br><?= $s["nisn"]; ?></td>
                     <td><?= $s["tempat_lahir"]; ?>, <?= $s["tgl_lahir"]; ?></td>
                     <td><?= $s["jk"]; ?></td>
                     <td><?= $s["agama"]; ?></td>
                     <td><?= $s["alamat"]; ?></td>
                     <td><?= $s["no_hp"]; ?></td>
                     <td><?= $s["sekolah_asal"]; ?></td>
                     <td style="white-space: nowrap;"><?= $s["ortu_ayah"]; ?><br><?= $s["ortu_ibu"]; ?></td>
                     <td><?= $s["pekerjaan_ortu"]; ?></td>
                     <td><?= $s["status"]; ?></td>
                     <td>
                        <div class="btn-group">
                           <a href="<?= site_url("admin/edit_siswa/") . $s["id_siswa"]; ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                           <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
      <!-- /.card-body -->
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= site_url("admin/imp_siswa"); ?>" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="id_kelas">Kelas</label>
                  <select name="id_kelas" id="id_kelas" class="selectpicker form-control" required>
                     <?php foreach ($kelas as $k) : ?>
                        <option value="<?= $k["id_kelas"]; ?>"><?= $k["nama_kelas"]; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="file">File excel</label>
                  <input type="file" name="file" id="file" class="form-control" required>
               </div>
               <div class="mt-2">
                  <button type="submit" class="btn btn-primary">Import</button>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>