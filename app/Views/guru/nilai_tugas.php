<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="callout callout-info">
        <h4><i class="fas fa-info"></i> Info</h4>
        Tahun akadmik sekarang [<strong><?= $thn_akd["nama_tahun"]; ?> | Semester <?= $thn_akd["semester"]; ?></strong>] Lapor kepada admin operator sekolah jika tahun akadmik tidak sesuai
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

    <div class="mb-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-id_mapel="<?= $id_mapel; ?>" data-toggle="modal" data-target="#exampleModal" id="data-tugas">
            Data Tugas
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Siswa</th>
                        <?php if ($jml_tugas) : ?>
                            <th colspan="<?= $jml_tugas; ?>" style="text-align: center;">Nilai Tugas</th>
                        <?php else : ?>
                            <th colspan="1" style="text-align: center;">Tidak ada tugas</th>
                        <?php endif; ?>
                    </tr>
                    <?php
                    $db = db_connect();
                    $builder = $db->table('data_tugas');
                    $nilai_tugas = $builder->where(['id_mapel' => $id_mapel])->get()->getResultArray();
                    ?>
                    <tr>
                        <?php foreach ($nilai_tugas as $nt) : ?>
                            <th style="text-align: center;"><?= $nt["materi"]; ?><br>(<?= $nt["tgl_tugas"]; ?>)</th>
                        <?php endforeach; ?>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $s) : ?>
                        <?php
                        $db = db_connect();
                        $builder = $db->table('nilai_tugas');
                        $nilai_tugas = $builder
                            ->join("data_tugas", "data_tugas.id_tugas = nilai_tugas.id_tugas")
                            ->where(["id_mapel" => $id_mapel, 'id_siswa' => $s["id_siswa"]])->get()->getResultArray();
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td style="white-space: nowrap;"><?= $s["nama_siswa"]; ?><br><?= $s["nisn"]; ?></td>
                            <?php if ($nilai_tugas) : ?>
                                <?php foreach ($nilai_tugas as $n) : ?>
                                    <td>
                                        <form action="<?= site_url("guru/update_nilaiTugas/" . $n["id_nTugas"]); ?>" method="post">
                                            <div class="input-group">
                                                <input type="hidden" name="id_mapel" id="" value="<?= $id_mapel; ?>">
                                                <input type="hidden" name="id_nTugas" id="id_nTugas" value="<?= $n["id_nTugas"]; ?>">
                                                <input type="number" name="nilai_tugas" id="nilai_tugas" class="form-control form-control-sm" style="width: 80px;" value="<?= $n["nilai_tugas"]; ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Update Nilai ?')"><i class="fas fa-pen"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <td>Tidak ada tugas</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" id="form-tugas">
                    <div class="card-body">
                        <form action="<?= site_url("guru/save_tugas/" . $id_mapel); ?>" method="post" id="input-tugas">
                            <input type="hidden" name="id_mapel" id="" value="<?= $id_mapel; ?>">
                            <input type="hidden" name="id_tugas" id="id_tugas">
                            <div class="form-group">
                                <label for="materi">Materi</label>
                                <input type="text" name="materi" id="materi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_tugas">Tanggal</label>
                                <input type="date" name="tgl_tugas" id="tgl_tugas" class="form-control" required>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-sm btn-primary" id="tambah-tugas" data-id_mapel="<?= $id_mapel; ?>">Tambah Tugas</button>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Materi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                foreach ($tugas as $t) : ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $t["materi"]; ?></td>
                                        <td><?= $t["tgl_tugas"]; ?></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning edit-tugas" data-id_tugas="<?= $t["id_tugas"]; ?>" data-materi="<?= $t["materi"]; ?>" data-tgl_tugas="<?= $t["tgl_tugas"]; ?>"><i class="fas fa-pen"></i></a>
                                            <a href="<?= site_url("guru/hapus_tugas/" . $t["id_tugas"] . "?id_mapel=" . $id_mapel); ?>" class="btn btn-sm btn-danger hapus"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>