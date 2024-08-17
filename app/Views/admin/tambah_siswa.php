<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url("admin/save_siswa"); ?>" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama_siswa">Nama</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="number" name="nisn" id="nisn" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <?php foreach ($kelas  as $k) : ?>
                                    <option value="<?= $k["id_kelas"]; ?>"><?= $k["nama_kelas"]; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jk">JK (Jenis Kelamin)</label>
                            <select name="jk" id="jk" class="form-control" required>
                                <option value="L">Laki-laki (L)</option>
                                <option value="P">Perempuan (P)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Guru <small>(Guru kelas X)</small></label>
                            <select name="id_guru" id="id_guru" class="form-control">
                                <?php foreach ($guru  as $g) : ?>
                                    <option value="<?= $g["id_guru"]; ?>"><?= $g["nama"]; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="agamar">Agama</label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="islam">Islam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="no_hp">NO HP</label>
                            <input type="number" name="no_hp" id="no_hp" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sekolah_asal">Sekolah Asal</label>
                            <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ortu_ayah">Orang Tua (ayah)</label>
                            <input type="text" name="ortu_ayah" id="ortu_ayah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ortu_ibu">Orang Tua (ibu)</label>
                            <input type="text" name="ortu_ibu" id="ortu_ibu" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pekerjaan_ortu">Pekerjaan (ortu)</label>
                            <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>