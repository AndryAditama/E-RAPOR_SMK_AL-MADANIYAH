<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url("admin/update_guru"); ?>" method="post">
                <input type="hidden" name="id_guru" value="<?= $guru["id_guru"]; ?>">
                <input type="hidden" name="guru_userid" value="<?= $guru["guru_userid"]; ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $guru["nama"]; ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" value="<?= $guru["nip"]; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <?php foreach ($kelas  as $k) : ?>
                                    <option <?= ($k["id_kelas"] == $guru["id_kelas"] ? "selected" : ""); ?> value="<?= $k["id_kelas"]; ?>"><?= $k["nama_kelas"]; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= $guru["no_hp"]; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value=" <?= $guru["alamat"]; ?>" required>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $guru["tgl_lahir"]; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tgl_bekerja">Tgl Bekerja</label>
                            <input type="text" name="tgl_bekerja" id="tgl_bekerja" class="form-control" value="<?= $guru["tgl_bekerja"]; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tgl_pensiun">Tgl Pensiun</label>
                            <input type="date" name="tgl_pensiun" id="tgl_pensiun" class="form-control" value="<?= $guru["tgl_pensiun"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat_gmaps">Alamat G-Maps</label>
                    <div class="input-group">
                        <input type="text" name="alamat_gmaps" id="alamat_gmaps" class="form-control" required value='<?= $guru["alamat_gmaps"]; ?>'>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" id="cek-map">Cek Map</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div id="g-maps">
                        <?= $guru["alamat_gmaps"]; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jk">JK (Jenis Kelamin)</label>
                            <select name="jk" id="jk" class="form-control">
                                <option <?= ($guru["jk"] == "L" ? "selected" : ""); ?> value="L">L</option>
                                <option <?= ($guru["jk"] == "P" ? "selected" : ""); ?> value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pend_terakbhir">Pendidikan Terakhir</label>
                            <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                                <option <?= ($guru["pend_terakhir"] == "sarjana" ? "selected" : ""); ?> value="sarjana">Sarjana</option>
                                <option <?= ($guru["pend_terakhir"] == "diploma" ? "selected" : ""); ?> value="diploma">Diploma</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gelar">Gelar</label>
                            <select name="gelar" id="gelar" class="form-control">
                                <option <?= ($guru["gelar"] == "S.Kom" ? "selected" : ""); ?> value="S.Kom">Sarjana Komputer</option>
                                <option <?= ($guru["gelar"] == "S.Pd" ? "selected" : ""); ?> value="S.Pd">Sarjana Pendidikan</option>
                                <option <?= ($guru["gelar"] == "S.Psi" ? "selected" : ""); ?> value="S.Psi">Sarjana Psikologi</option>
                                <option <?= ($guru["gelar"] == "S.Ag" ? "selected" : ""); ?> value="S.Ag">Sarjana Agama</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="bidang_ilmu">Bidang Ilmu</label>
                            <input type="text" name="bidang_ilmu" id="bidang_ilmu" class="form-control" value="<?= $guru["bidang_ilmu"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="alamat" class="form-control" value="<?= $guru["username"]; ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?= $guru["password"]; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>