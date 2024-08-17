<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="t-tglRapor">
            Tambah Tanggal Pembagian Rapor
        </button>
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
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tahun Akademik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tgl_rapor as $s) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s["tanggal"]; ?></td>
                            <td><?= $s["nama_tahun"]; ?><br>
                                Semester : <?= $s["semester"]; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm e-tglRapor" data-id_tglrapor="<?= $s["id_tglRapor"]; ?>" data-tanggal="<?= $s["tanggal"]; ?>"><i class="fas fa-pen"></i></a>
                                    <a href="<?= site_url("admin/hapus_tglRapor/") . $s["id_tglRapor"]; ?>" class="btn btn-danger btn-sm hapus"><i class="fas fa-trash"></i></a>
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
                <form action="" method="post" id="form-tglRapor">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_thnAkd">Tahun Akademik</label>
                        <select name="id_thnAkd" id="id_thnAkd" class="form-control">
                            <option value="<?= $thnAkd["id_thnAkd"]; ?>"><?= $thnAkd["nama_tahun"]; ?> | Semester <?= $thnAkd["semester"]; ?></option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
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