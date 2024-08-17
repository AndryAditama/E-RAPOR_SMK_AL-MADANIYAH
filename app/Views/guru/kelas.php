<?= $this->extend("layout/template"); ?>
<?= $this->section("page-content"); ?>
<div class="container-fluid">

    <div class="row">
        <?php foreach ($kelas as $m) : ?>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2 text-center">
                            <img src="/assets/kelas.jpg" alt="kelas" width="100%">
                            <h4>Kelas : <?= $m["nama_kelas"]; ?></h4>
                        </div>
                        <a href="<?= site_url("guru/detail_kelas/" . $m["id_kelas"]); ?>" class="btn btn-sm btn-info">Input Nilai Kelas <?= $m["nama_kelas"]; ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- Modal -->

<?= $this->endSection(); ?>