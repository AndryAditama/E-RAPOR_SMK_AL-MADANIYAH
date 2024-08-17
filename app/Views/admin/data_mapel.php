<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="mb-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="tambah_Dmapel">
            Tambah Mapel
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
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mapel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1;
                    foreach ($mapel as $m) : ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $m["nama_mapel"]; ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning edit_Dmapel" data-id_dmapel="<?= $m["id_Dmapel"]; ?>" data-nama_mapel="<?= $m["nama_mapel"]; ?>" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pen"></i></a>
                                <a href="<?= site_url("admin/hapus_Dmapel/" . $m["id_Dmapel"]); ?>" class="btn btn-sm btn-danger hapus"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
                <form action="" method="post" id="form-Dmapel">
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" name="nama_mapel" id="nama_mapel" class="form-control">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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