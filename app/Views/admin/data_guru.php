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
      <!-- Button trigger modal -->
      <a href="<?= site_url("admin/tambah_guru"); ?>" class="btn btn-primary">Tambah Guru</a>
   </div>
   <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
         <table id="example1" class="table table-bordered table-hover">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Mengajar Kelas</th>
                  <th>NO Hp</th>
                  <th>Alamat</th>
                  <th>Gelar</th>
                  <th>Tanggal Bekerja</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1;
               foreach ($guru as $s) :
               ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><img src="<?= base_url(); ?>/assets/guru/<?= $s["gambar"]; ?>" alt="Foto Profil" width="50"></td>
                     <td><?= $s["nama"] . "," . $s["gelar"]; ?><br><?= $s["nip"]; ?></td>
                     <?php
                     $db = db_connect();
                     $data_kelas = $db->table("data_kelas")->where("id_kelas", $s["id_kelas"])
                        ->get()->getRowArray();
                     if ($data_kelas) {
                        $nama_kelas = $data_kelas["nama_kelas"];
                     } else {
                        $nama_kelas = "Bukan Wali Kelas";
                     }
                     ?>
                     <td><?= $nama_kelas; ?></td>
                     <td><?= $s["no_hp"]; ?></td>
                     <td><?= $s["alamat"]; ?></td>
                     <td><?= $s["gelar"]; ?></td>
                     <td><?= $s["tgl_bekerja"]; ?></td>
                     <td>
                        <div class="btn-group">
                           <a href="<?= site_url("admin/edit_guru/") . $s["id_guru"]; ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                           <a href="<?= site_url("admin/hapus_guru/") . $s["id_guru"]; ?>" class="btn btn-danger btn-sm hapus"><i class="fas fa-trash"></i></a>
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

<?= $this->endSection(); ?>