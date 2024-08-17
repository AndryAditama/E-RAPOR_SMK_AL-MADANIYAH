<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>E RAPOR</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/summernote/summernote-bs4.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="<?= base_url(); ?>/template/bootstrap-select/dist/css/bootstrap-select.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

      <!-- Preloader -->
      <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-light bg-teal">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="#" class="nav-link">Contact</a>
            </li>
         </ul>

         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">


            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->
      <?php
      $db = db_connect();
      $data_guru = $db->table("data_guru")->where("guru_userid", session()->get("id_user"))->get()->getRowArray();
      if ($data_guru) {
         $img = "/assets/guru/" . $data_guru["gambar"];
         $name = $data_guru["nama"];
      } else {
         $img = "/template/dist/img/AdminLTELogo.png";
         $name = "ADMIN";
      }
      ?>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-teal elevation-4">
         <!-- Brand Logo -->
         <a href="index3.html" class="brand-link bg-teal">
            <img src="<?= base_url(); ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">E-Rapor</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?= base_url() . $img; ?>" class="img-circle" alt="User Image" style="object-fit: cover; width: 50px; height: 50px;">
               </div>
               <div class="info">
                  <a href="#" class="d-block"><?= $name; ?></a>
               </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
               <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                     <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                     </button>
                  </div>
               </div>
            </div>

            <!-- Sidebar Menu -->
            <?= $this->include("layout/sidebar"); ?>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><?= $title; ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <?php if (isset($page_index)) : ?>
                           <li class="breadcrumb-item"><a href="<?= $page_index["url"]; ?>"><?= $page_index["tittle"]; ?></a></li>
                        <?php endif; ?>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
            <!-- Small boxes (Stat box) -->
            <?= $this->renderSection('page-content'); ?>
            <!-- /.row (main row) -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
         <strong>Copyright &copy; 2023 unira.ac.id</a></strong>
         <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
         </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="<?= base_url(); ?>/template/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <!-- Sparkline -->
   <script src="<?= base_url(); ?>/template/plugins/sparklines/sparkline.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="<?= base_url(); ?>/template/plugins/jquery-knob/jquery.knob.min.js"></script>
   <!-- daterangepicker -->
   <script src="<?= base_url(); ?>/template/plugins/moment/moment.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="<?= base_url(); ?>/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Summernote -->
   <script src="<?= base_url(); ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="<?= base_url(); ?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url(); ?>/template/dist/js/adminlte.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="<?= base_url(); ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/jszip/jszip.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/pdfmake/pdfmake.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/pdfmake/vfs_fonts.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
   <script src="<?= base_url(); ?>/template/bootstrap-select/dist/js/bootstrap-select.js"></script>
   <script>
      $(function() {
         var url = window.location;
         // for single sidebar menu
         $("ul.nav-sidebar a")
            .filter(function() {
               return this.href == url;
            })
            .addClass("active");

         // for sidebar menu and treeview
         $("ul.nav-treeview a")
            .filter(function() {
               return this.href == url;
            })
            .parentsUntil(".nav-sidebar > .nav-treeview")
            .css({
               display: "block",
            })
            .addClass("menu-open")
            .prev("a")
            .addClass("active");
      });
   </script>
   <script>
      $(function() {
         $("#example1").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

         $("#example3").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

         $("#example4").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

         $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
         });
         $('#example5').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
         });
      });

      $(document).ready(function() {
         $(document).on("click", ".hapus", function(e) {
            e.preventDefault();
            Swal.fire({
               title: 'Hapus Data?',
               text: "Jika yakin klik tombol hapus!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Ya hapus data!'
            }).then((result) => {
               if (result.isConfirmed) {
                  window.location.href = $(this).attr("href");
               }
            })
         })

         //kelas
         $(document).on("click", "#tambah-kelas", function(e) {
            e.preventDefault();
            $(".modal-body #nama_kelas").val("");
            $("#form-kelas").attr("action", "/admin/save_kelas");
         })
         $(document).on("click", ".edit-kelas", function(e) {
            e.preventDefault();
            // $(".modal-body #id_kelas").val($(this).data("id_kelas"));
            $(".modal-body #nama_kelas").val($(this).data("nama_kelas"));
            $("#form-kelas").attr("action", "/admin/update_kelas/" + $(this).data("id_kelas"));
         })
         //tahun akademik
         $(document).on("click", "#tambah-tahun", function(e) {
            e.preventDefault();
            $(".selectpicker").val("").change();
            $("#form-tahun").attr("action", "/admin/save_thnAkd");
         })
         $(document).on("click", ".edit-tahun", function(e) {
            e.preventDefault();
            $("#tahun_1").val($(this).data("tahun_1")).change();
            $("#tahun_2").val($(this).data("tahun_2")).change();
            $("#semester").val($(this).data("semester")).change();
            $("#id_thnAkd").val($(this).data("id_thnakd"));
            $("#form-tahun").attr("action", "/admin/update_thnAkd/" + $(this).data("id_thnakd"));
         })
         $(document).on("click", ".set-active", function(e) {
            e.preventDefault();
            Swal.fire({
               title: 'Aktifkan Tahun Akademik?',
               text: "Silahkan cek data! jika yakin ini tahun akademik yang sekarang silahkan klik aktifkan",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Aktifkan'
            }).then((result) => {
               if (result.isConfirmed) {
                  window.location.href = $(this).attr("href");
               }
            })
         })
         //data mapel
         $(document).on("click", "#tambah_Dmapel", function(e) {
            e.preventDefault();
            $(".modal-body #nama_mapel").val("");
            $("#form-Dmapel").attr("action", "/admin/save_Dmapel");
         })
         $(document).on("click", ".edit_Dmapel", function(e) {
            e.preventDefault();
            let id_dmapel = $(this).data("id_dmapel");
            let nama_mapel = $(this).data("nama_mapel");
            $(".modal-body #nama_mapel").val(nama_mapel);
            $("#form-Dmapel").attr("action", "/admin/update_Dmapel/" + id_dmapel);
         })

         //tugas
         $(document).on("click", "#data-tugas", function() {
            $("#form-tugas").hide();
            $(".modal-body #materi").val("");
            $(".modal-body #tgl_tugas").val("");
            $(".modal-body #input-tugas").attr("action", "/guru/save_tugas/" + $(this).data("id_mapel"));
         })

         $("#form-tugas").hide();
         $("#tambah-tugas").click(function() {
            var urlForm = $(".modal-body #input-tugas").attr("action");
            // e.preventDefault();
            $("#form-tugas").slideDown();
            $(".modal-body #materi").val("");
            $(".modal-body #tgl_tugas").val("");
            if ($(this).is(":visible")) {
               $("#tambah-tugas").text("Tambah Tugas");
               console.log("tampilkan");
            } else {
               $("#tambah-tugas").text("batal");
               console.log("tidak tampilkan");
            }
            $(".modal-body #input-tugas").attr("action", "/guru/save_tugas/" + $(this).data("id_mapel"));
         })
         $(document).on("click", ".edit-tugas", function(e) {
            e.preventDefault()
            $("#form-tugas").slideDown();
            $(".modal-body #id_tugas").val($(this).data("id_tugas"));
            $(".modal-body #materi").val($(this).data("materi"));
            $(".modal-body #tgl_tugas").val($(this).data("tgl_tugas"));
            $(".modal-body #input-tugas").attr("action", "/guru/update_tugas/" + $(this).data("id_tugas"));
         })

         //ujian
         $(document).on("click", "#tambah-ujian", function(e) {
            e.preventDefault();
            let id_mapel = $(this).data("id_mapel");
            $("#form-ujian").attr("action", "/guru/save_ujian/" + id_mapel);
         })
         $(document).on("click", ".edit-ujian", function(e) {
            e.preventDefault();
            let id_mapel = $(this).data("id_mapel");
            $("#form-ujian").attr("action", "/guru/update_ujian/" + $(this).data("id_ujian"));
            $(".modal-ujian #id_ujian").val($(this).data("id_ujian"));
            $(".modal-ujian #tipe_ujian").val($(this).data("tipe_ujian")).change();
            $(".modal-ujian #tgl_ujian").val($(this).data("tgl_ujian"));
         })

         //Generate nilai raport akhir mapel
         $(document).on("submit", "#generate-nilai", function(e) {
            e.preventDefault(e);
            Swal.fire({
               title: 'Generate Nilai Akhir Mapel',
               text: "Klik generate untuk menjumlahkan semua nilai tugas dan nilai ujian",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Generate'
            }).then((result) => {
               if (result.isConfirmed) {
                  let timerInterval
                  Swal.fire({
                     title: 'Generate Nilai',
                     html: 'Nilai sedang di jumlahkan.',
                     timer: 3000,
                     timerProgressBar: true,
                     didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                           b.textContent = Swal.getTimerLeft()
                        }, 100)
                     },
                     willClose: () => {
                        clearInterval(timerInterval)
                     }
                  }).then((result) => {
                     /* Read more about handling dismissals below */
                     if (result.dismiss === Swal.DismissReason.timer) {
                        $.ajax({
                           url: $(this).attr("action"),
                           method: "post",
                           dataType: "json",
                           data: $("#generate-nilai").serialize(),
                           success: function(response) {
                              if (response.success) {
                                 $("#hasil-hitung").html(response.html);
                              }
                           }
                        })
                     }
                  })
               }
            })
         })
      })
   </script>
   <!-- Jquery Script -->
   <script>
      //Ranking Siswa
      $(document).ready(function() {
         $.ajax({
            url: "/guru/rangking_siswa", // Ganti dengan URL data Anda
            dataType: "json",
            success: function(data) {
               var rangking_siswa = data; // Menyimpan data ke dalam variabel

               const ctx = document.getElementById('myChart');

               rangking_siswa.sort(function(a, b) {
                  return b.n_rataRapor - a.n_rataRapor;
               });

               var n_rataRapor = [];
               var nama_siswa = [];
               var rank_siswa = rangking_siswa.slice(0, 10);

               $.each(rank_siswa, function(index, siswa) {
                  // console.log(siswa.nama_siswa + ': ' + siswa.n_rataRapor);
                  n_rataRapor.push(siswa.n_rataRapor);
                  nama_siswa.push(siswa.nama_siswa);
               });

               new Chart(ctx, {
                  type: 'bar',
                  data: {
                     labels: nama_siswa,
                     datasets: [{
                        label: "Nilai Rata-Rata Raport",
                        data: n_rataRapor,
                        borderWidth: 1
                     }]
                  },
                  options: {
                     scales: {
                        y: {
                           beginAtZero: true
                        }
                     }
                  }
               });
            },
            error: function(xhr, status, error) {
               console.error("Terjadi kesalahan:", error);
            }
         });

         $("#profil-guru").hide();

         $(document).on("click", ".edit-profil", function(e) {
            e.preventDefault();
            console.log("test");
            $("#profil-guru").slideToggle();
         })

         $('#img-input').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
               var reader = new FileReader();
               reader.onload = function(e) {
                  $('#img-preview').attr('src', e.target.result);
               }
               reader.readAsDataURL(file);
            }
         });

         //Centang Semua Nilai
         // <?php if (isset($jml_tugas)) : ?>
         //     var jml_tugas = <?= $jml_tugas; ?>;
         //     console.log(jml_tugas);
         // <?php endif; ?>

         // $.each(Array.from({
         //     length: jml_tugas
         // }, (_, i) => i + 1), function(index, no) {
         //     var centangTugas = "#centangTugas" + no;
         //     var centangSemua = ".centangSemua" + no;
         //     $(centangTugas).click(function() {
         //         if ($(this).is(':checked')) {
         //             console.log("centang semua");
         //             $(centangSemua).prop('checked', true);
         //         } else {
         //             $(centangSemua).prop('checked', false);
         //             console.log("tidak centang semua");
         //         }
         //     });
         // });

         $(document).on("click", "#t-tglRapor", function(e) {
            $('#form-tglRapor').attr('action', "/admin/save_tglRapor");
            $(".modal-body #tanggal").val("");
         })

         $(document).on("click", ".e-tglRapor", function(e) {
            e.preventDefault();
            let id_tglRapor = $(this).data("id_tglrapor");
            let tanggal = $(this).data("tanggal");

            $('#form-tglRapor').attr('action', "/admin/update_tglRapor/" + id_tglRapor);
            $(".modal-body #tanggal").val(tanggal);
            // console.log("edit");
         })

         $(document).on("click", "#cek-map", function(e) {
            e.preventDefault();
            let alamat_gmaps = $("#alamat_gmaps").val();
            $("#g-maps").html(alamat_gmaps);
         })
      })
   </script>
</body>

</html>