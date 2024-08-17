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

</div>


<?= $this->endSection(); ?>