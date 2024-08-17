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
        <button type="button" id="tambah-tahun" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Tahun
        </button>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tahun as $s) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s["nama_tahun"]; ?></td>
                            <td><?= $s["semester"]; ?></td>
                            <?php
                            $tahun_1 = substr($s["nama_tahun"], 0, 4);
                            $tahun_2 = substr($s["nama_tahun"], 5, 9);
                            ?>
                            <?php if ($s["status"] == 1) : ?>
                                <td>
                                    <p class="bg-success p-1 rounded text-center">AKTIF</p>
                                </td>
                            <?php else : ?>
                                <td>
                                    <a href="<?= site_url("admin/active_thnAkd/" . $s["id_thnAkd"]); ?>" class="btn btn-sm btn-primary set-active">AKTIFKAN</a>
                                </td>
                            <?php endif; ?>
                            <td>
                                <div class="btn-group">
                                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm edit-tahun" data-id_thnAkd="<?= $s["id_thnAkd"]; ?>" data-tahun_1="<?= $tahun_1; ?>" data-tahun_2="<?= $tahun_2; ?>" data-semester="<?= $s["semester"]; ?>"><i class="fas fa-pen"></i></a>
                                    <a href="<?= site_url("admin/hapus_thnAkd/") . $s["id_thnAkd"]; ?>" class="btn btn-danger btn-sm hapus"><i class="fas fa-trash"></i></a>
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
                <div class="mb-2">
                    <div class="alert alert-info">
                        <i class="fas fa-info"></i>Penggunaan: tahun 1 dan tahun 2 = tahun1/tahun2
                    </div>
                </div>
                <form action="<?= site_url("admin/save_thnAkd"); ?>" method="post" id="form-tahun">
                    <input type="hidden" name="id_thnAkd" id="id_thnAkd">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_kelas">Tahun 1</label>
                                <select name="tahun_1" id="tahun_1" class="selectpicker form-control" title="Tahun 1" required>
                                    <?php for ($i = 1; $i < 10; $i++) : ?>
                                        <option value="202<?= $i; ?>">202<?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_kelas">Tahun 2</label>
                                <select name="tahun_2" id="tahun_2" class="selectpicker form-control" title="Tahun 2" required>
                                    <?php for ($i = 1; $i < 10; $i++) : ?>
                                        <option value="202<?= $i; ?>">202<?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="selectpicker form-control" title="Semester" required>
                            <option value="1">1 (Ganjil)</option>
                            <option value="2">2 (Genap)</option>
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