<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?= $jml_siswa; ?></h3>
                    <p>DATA SISWA</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?= $jml_guru; ?></h3>
                    <p>DATA GURU</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="main-body">
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">PROFIL SEKOLAH</li>
            </ol>
        </nav>
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
        <div class="callout callout-info">
            <div class="card-body">
                <form action="<?= site_url("admin/update_profilSekolah"); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_profil" id="" value="<?= $profil_sekolah["id_profil"]; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" value="<?= $profil_sekolah["nama_sekolah"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alamat">Alamat Sekolah</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $profil_sekolah["alamat"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kepsek">Kepala Sekolah</label>
                                <input type="text" name="kepsek" id="kepsek" class="form-control" value="<?= $profil_sekolah["kepsek"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nip_kepsek">NIP Kepala Sekolah</label>
                                <input type="text" name="nip_kepsek" id="nip_kepsek" class="form-control" value="<?= $profil_sekolah["nip_kepsek"]; ?>">
                            </div>
                        </div>
                    </div>
                    <label for="logo">Logo Sekolah</label>
                    <div>
                        <input type="hidden" name="gambarLama" id="" value="<?= $profil_sekolah["logo"]; ?>">
                        <img src="/assets/<?= $profil_sekolah["logo"]; ?>" alt="" class="img-thumbnail" width="150" id="img-preview"><br>
                        <input type="file" name="file_img" id="img-input">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>