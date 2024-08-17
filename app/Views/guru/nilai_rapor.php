<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Tgl Lahir</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $s) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s["nama_siswa"]; ?><br><?= $s["nisn"]; ?></td>
                            <td><?= $s["tempat_lahir"]; ?>, <?= $s["tgl_lahir"]; ?></td>
                            <td><?= $s["jk"]; ?></td>
                            <td><?= $s["alamat"]; ?></td>
                            <td>
                                <a href="<?= site_url("guru/cetak_rapor/" . $s["id_siswa"] . "?cetak=0"); ?>" class="btn btn-info btn-sm">Preview</a>
                                <a href="<?= site_url("guru/cetak_rapor/" . $s["id_siswa"] . "?cetak=1"); ?>" class="btn btn-success btn-sm">Cetak Rapor</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>