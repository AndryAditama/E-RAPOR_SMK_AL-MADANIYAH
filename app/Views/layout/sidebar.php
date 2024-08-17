<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if (session()->get("role") == 1) : ?>
            <li class="nav-item">
                <a href="<?= site_url('admin/dashboard'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/data_siswa'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Siswa
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/data_guru'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Guru
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/data_mapel'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Mapel
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('admin/data_kelas'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Kelas
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Akademik
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= site_url("admin/tahun_akademik"); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tahun Akademik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url("admin/data_akademik"); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Akademik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url("admin/tgl_rapor"); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tgl Pembagian Rapor</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <!-- Sidebar GURU -->
        <?php if (session()->get("role") == 2) : ?>
            <?php
            $db = db_connect();
            $guru = $db->table("data_guru")->where("guru_userid", session()->get("id_user"))
                ->get()->getRowArray();
            ?>
            <li class="nav-item">
                <a href="<?= site_url('guru/dashboard'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('guru/kelas'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Kelas
                        <?php if (isset($sidebar_title)) : ?>
                            <br>
                            <p class="bg-success p-1 rounded"><?= $sidebar_title; ?></p>
                        <?php endif; ?>
                    </p>
                </a>
            </li>
            <?php if ($guru["id_kelas"] != 0) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('guru/nilai_rapor'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Nilai Rapor
                        </p>
                    </a>
                </li>
            <?php endif; ?>

        <?php endif; ?>
        <li class="nav-item">
            <a href="<?= site_url("auth/logout"); ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>