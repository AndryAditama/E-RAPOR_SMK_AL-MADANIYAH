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
        <button type="button" id="tambah-kelas" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Kelas
        </button>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kelas as $s) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s["nama_kelas"]; ?></td>
                            <td><?= $s["status"]; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm edit-kelas" data-id_kelas="<?= $s["id_kelas"]; ?>" data-nama_kelas="<?= $s["nama_kelas"]; ?>"><i class="fas fa-pen"></i></a>
                                    <a href="<?= site_url("admin/hapus_kelas/") . $s["id_kelas"]; ?>" class="btn btn-danger btn-sm hapus"><i class="fas fa-trash"></i></a>
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
                <form action="<?= site_url("admin/save_kelas"); ?>" method="post" id="form-kelas">
                    <input type="hidden" name="id_kelas" id="id_kelas">
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required>
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