<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama_siswa">Nama</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= $siswa["nama_siswa"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="number" name="nisn" id="nisn" class="form-control" value="<?= $siswa["nisn"]; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $siswa["tempat_lahir"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tgl_lahir">Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $siswa["tgl_lahir"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jk">Tempat Lahir</label>
                        <select name="jk" id="jk" class="form-control">
                            <option <?= ($siswa["jk"] == "L" ? "selected" : ""); ?> value="L">Laki-laki (L)</option>
                            <option <?= ($siswa["jk"] == "P" ? "selected" : ""); ?> value="P">Perempuan (P)</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="agamar">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option <?= ($siswa["agama"] == "islam" ? "selected" : ""); ?> value="islam">Islam</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $siswa["alamat"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="no_hp">NO HP</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= $siswa["no_hp"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sekolah_asal">Sekolah Asal</label>
                        <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control" value="<?= $siswa["sekolah_asal"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="ortu_ayah">Orang Tua (ayah)</label>
                        <input type="text" name="ortu_ayah" id="ortu_ayah" class="form-control" value="<?= $siswa["ortu_ayah"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="ortu_ibu">Orang Tua (ibu)</label>
                        <input type="text" name="ortu_ibu" id="ortu_ibu" class="form-control" value="<?= $siswa["ortu_ibu"]; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="pekerjaan_ortu">Pekerjaan (ortu)</label>
                        <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" class="form-control" value="<?= $siswa["pekerjaan_ortu"]; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>