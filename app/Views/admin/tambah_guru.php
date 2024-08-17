<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
   <div class="card">
      <div class="card-body">
         <form action="<?= site_url("admin/save_guru"); ?>" method="post">
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="nama">Nama</label>
                     <input type="text" name="nama" id="nama" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="nip">NIP</label>
                     <input type="text" name="nip" id="nip" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="">Wali Kelas</label>
                     <select name="id_kelas" id="id_kelas" class="selectpicker form-control" title="Kelas" required>
                        <?php foreach ($kelas  as $k) : ?>
                           <option value="<?= $k["id_kelas"]; ?>"><?= $k["nama_kelas"]; ?></option>
                        <?php endforeach ?>
                        <option value="0">Bukan Wali Kelas</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="no_hp">No HP</label>
                     <input type="number" name="no_hp" id="no_hp" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <input type="text" name="alamat" id="alamat" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="tgl_lahir">Tgl Lahir</label>
                     <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="tgl_bekerja">Tgl Bekerja</label>
                     <input type="date" name="tgl_bekerja" id="tgl_bekerja" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="tgl_pensiun">Tgl Pensiun</label>
                     <input type="date" name="tgl_pensiun" id="tgl_pensiun" class="form-control">
                  </div>
               </div>
               <!-- <div class="col-sm-6">
                  <div class="form-group">
                     <label for="gambar">Foto Profil</label><br>
                     <div class="d-flex align-items-center">
                        <img src="/assets/guru/default.jpeg" alt="" class="img-thumbnail" width="150" id="img-preview"><br>
                        <input type="file" name="gambar" class="ml-2" id="img-input">

                     </div>
                  </div>
               </div> -->
            </div>
            <div class="callout callout-info">
               <i class="fas fa-info"></i>NFO : <br> Untuk menggunakan peta google maps yaitu dengan cara bagikan peta di google maps dan sematkan peta kemudian salin html dan paste di bagian inputan di bawah ini. dan cek map.
            </div>
            <div class="form-group">
               <label for="alamat_gmaps">Alamat G-Maps</label>
               <div class="input-group">
                  <input type="text" name="alamat_gmaps" id="alamat_gmaps" class="form-control" required>
                  <div class="input-group-append">
                     <button type="button" class="btn btn-primary" id="cek-map">Cek Map</button>
                  </div>
               </div>
            </div>
            <div class="d-flex justify-content-center">
               <div id="g-maps">
                  <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="jk">JK (Jenis Kelamin)</label>
                     <select name="jk" id="jk" class="form-control">
                        <option value="L">L</option>
                        <option value="P">P</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="pend_terakbhir">Pendidikan Terakhir</label>
                     <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                        <option value="sarjana">Sarjana</option>
                        <option value="diploma">Diploma</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="gelar">Gelar</label>
                     <select name="gelar" id="gelar" class="form-control">
                        <option value="S.Kom">Sarjana Komputer</option>
                        <option value="S.Pd">Sarjana Pendidikan</option>
                        <option value="S.Psi">Sarjana Psikologi</option>
                        <option value="S.Ag">Sarjana Agama</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="bidang_ilmu">Bidang Ilmu</label>
                     <input type="text" name="bidang_ilmu" id="bidang_ilmu" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="username">Username</label>
                     <input type="text" name="username" id="alamat" class="form-control">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="text" name="password" id="password" class="form-control">
                  </div>
               </div>
            </div>
            <!-- tgl bekerja -->
            <!-- tgl pensiun -->
            <!-- alamat gmaps -->
            <!-- jk -->
            <!-- pendidikan treakhir -->
            <!-- gelar -->
            <!-- bidang ilmu -->
            <div class="mt-2">
               <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>