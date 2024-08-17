<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Tahun Akadmik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_akd as $s) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s["nama_siswa"]; ?><br><?= $s["nisn"]; ?></td>
                            <td><?= $s["nama"]; ?><br><?= $s["nip"]; ?></td>
                            <td><?= $s["nama_kelas"]; ?></td>
                            <td><?= $s["nama_tahun"]; ?><br>Semester : <?= $s["semester"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<?= $this->endSection(); ?>