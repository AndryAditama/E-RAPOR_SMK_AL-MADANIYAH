<?php

namespace App\Controllers;

use CodeIgniter\Database\SQLite3\Table;

class Admin extends BaseController
{
   protected $db;
   protected $thn_akd;
   public function __construct()
   {
      $this->db      = \Config\Database::connect();
      $this->thn_akd = $this->db->table("tahun_akademik")->where("status", 1)->get()->getRowArray();
   }
   public function dashboard()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }

      $jml_siswa = $this->db->table("data_siswa")->countAllResults();
      $jml_guru = $this->db->table("data_guru")->countAllResults();

      $profil_sekolah = $this->db->table("profil_sekolah")->get()->getRowArray();

      $view_data = [
         "title" => "Dashboard",
         "jml_siswa" => $jml_siswa,
         "jml_guru" => $jml_guru,
         "profil_sekolah" => $profil_sekolah
      ];

      return view('admin/dashboard', $view_data);
   }

   public function update_profilSekolah()
   {
      $id_profil = $this->request->getVar("id_profil");
      $nama_sekolah = $this->request->getVar("nama_sekolah");
      $alamat = $this->request->getVar("alamat");
      $kepsek = $this->request->getVar("kepsek");
      $nip_kepsek = $this->request->getVar("nip_kepsek");
      $file_img = $this->request->getFile('file_img');

      if ($file_img->getError() == 4) {
         $gambar = $this->request->getVar('gambarLama');
      } else {
         //ambil nama gambar
         $gambar = $file_img->getRandomName();
         //pindahkan file ke assets
         $file_img->move('assets/', $gambar);
         //hapus file lama
         if ($this->request->getVar('gambarLama') != 'default.jpeg') {
            unlink('assets/' . $this->request->getVar('gambarLama'));
         }
      }

      $update_data = [
         "nama_sekolah" => $nama_sekolah,
         "alamat" => $alamat,
         "kepsek" => $kepsek,
         "nip_kepsek" => $nip_kepsek,
         "logo" => $gambar
      ];

      $this->db->table("profil_sekolah")->set($update_data)->where("id_profil", $id_profil)->update();

      session()->setFlashdata("pesan_sukses", "Profil sekolah berhasil diubah");
      return redirect()->to(site_url("admin/dashboard"));
   }

   public function data_siswa()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $data_siswa = $this->db->table("data_siswa")->get()->getResultArray();
      $data_kelas = $this->db->table("data_kelas")->get()->getResultArray();
      // dd($data_siswa);

      $view_data = [
         "title" => "Data Siswa",
         "siswa" => $data_siswa,
         "kelas" => $data_kelas
      ];

      return view('admin/data_siswa', $view_data);
   }

   public function tambah_siswa()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }

      $data_kelas = $this->db->table("data_kelas")->where("nama_kelas", "X")->get()->getResultArray();
      $data_guru = $this->db->table("data_guru")->join("data_kelas", "data_kelas.id_kelas = data_guru.id_kelas")->where("nama_kelas", "X")->get()->getResultArray();

      $view_data = [
         "title" => "Tambah Siswa",
         "kelas" => $data_kelas,
         "guru" => $data_guru
      ];

      return view('admin/tambah_siswa', $view_data);
   }

   public function save_siswa()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }

      $thn_akd = $this->db->table("tahun_akademik")->where("status", 1)->get()->getRowArray();
      $id_thnAkd = $thn_akd["id_thnAkd"];
      $semester = $thn_akd["semester"];

      $nama_siswa = $this->request->getVar("nama_siswa");
      $nisn = $this->request->getVar("nisn");
      $tgl_lahir = $this->request->getVar("tgl_lahir");
      $tempat_lahir = $this->request->getVar("tempat_lahir");
      $jk = $this->request->getVar("jk");
      $agama = $this->request->getVar("agama");
      $alamat = $this->request->getVar("alamat");
      $no_hp = $this->request->getVar("no_hp");
      $sekolah_asal = $this->request->getVar("sekolah_asal");
      $ortu_ayah = $this->request->getVar("ortu_ayah");
      $ortu_ibu = $this->request->getVar("ortu_ibu");
      $pekerjaan_ortu = $this->request->getVar("pekerjaan_ortu");

      $id_guru = $this->request->getVar("id_guru");
      $id_kelas = $this->request->getVar("id_kelas");

      $data = [
         "nama_siswa" => $nama_siswa,
         "nisn" => $nisn,
         "tgl_lahir" => $tgl_lahir,
         "tempat_lahir" => $tempat_lahir,
         "jk" => $jk,
         "agama" => $agama,
         "alamat" => $alamat,
         "no_hp" => $no_hp,
         "sekolah_asal" => $sekolah_asal,
         "ortu_ayah" => $ortu_ayah,
         "ortu_ibu" => $ortu_ibu,
         "pekerjaan_ortu" => $pekerjaan_ortu,
         "status" => "aktif"
      ];

      $cek_data = $this->db->table("data_siswa")->where("nisn", $nisn)->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Data sudah ada di db");
      } else {
         $this->db->table("data_siswa")->insert($data);
         $id_siswa = $this->db->insertID();
         $this->db->table("data_akademik")->insert(
            ["id_siswa" => $id_siswa, "id_guru" => $id_guru, "id_kelas" => $id_kelas, "id_thnAkd" => $id_thnAkd, "semester" => $semester, "tahun" => date("Y")]
         );
         session()->setFlashdata("pesan_sukses", "Data siswa berhasil di tambahkan");
      }

      return redirect()->to(site_url("admin/data_siswa"));
   }

   public function imp_siswa()
   {
      $id_kelas = $this->request->getVar("id_kelas");
      $file_excel = $this->request->getFile('file');

      $ext = $file_excel->getClientExtension();

      if ($ext == 'xls') {
         $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
      } else {
         $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      }

      $spreadsheet = $render->load($file_excel);

      $data_simpan = $spreadsheet->getActiveSheet()->toArray();

      $jml_sukses = 0;
      $jml_erorr = 0;

      foreach ($data_simpan as $x => $row) {
         if ($x == 0) {
            continue;
         }

         $data = [
            "nama_siswa" => $row[1],
            "nisn" => str_replace("'", "", $row[2]),
            "tgl_lahir" => $row[3],
            "tempat_lahir" => $row[4],
            "jk" => $row[5],
            "agama" => $row[6],
            "alamat" => "Pamekasan",
            "no_hp" => 0,
            "sekolah_asal" => "-",
            "ortu_ayah" => $row[7],
            "ortu_ibu" => $row[8],
            "pekerjaan_ortu" => $row[9],
            "gambar" => "default.jpeg",
            "status" => "aktif"
         ];

         // echo $data["tgl_lahir"] . "<br>";
         $cek_data = $this->db->table("data_siswa")->where("nisn", $data["nisn"])->get()->getRowArray();

         if ($cek_data) {
            $jml_erorr++;
         } else {
            $this->db->table("data_siswa")->insert($data);
            $id_siswa = $this->db->insertID();

            $get_waliKelas = $this->db->table("data_guru")->where("id_kelas", $id_kelas)
               ->get()->getRowArray();

            $this->db->table("data_akademik")->insert(
               [
                  "id_siswa" => $id_siswa,
                  "id_guru" => $get_waliKelas["id_guru"],
                  "id_kelas" => $id_kelas,
                  "id_thnAkd" => $this->thn_akd["id_thnAkd"],
                  "semester" => $this->thn_akd["semester"],
                  "tahun" => date("Y")
               ]
            );
            $jml_sukses++;
         }
      }

      session()->setFlashdata("pesan_sukses", "Jml data berhasil di import " . $jml_sukses . " gagal di import " . $jml_erorr);
      return redirect()->to(site_url("admin/data_siswa"));
   }

   public function edit_siswa($id_siswa)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }

      $data_siswa = $this->db->table("data_siswa")->where("id_siswa", $id_siswa)->get()->getRowArray();
      // dd($data_siswa);

      $view_data = [
         "title" => "Edit Siswa (" . $data_siswa["nama_siswa"] . ")",
         "siswa" => $data_siswa,
      ];

      return view('admin/edit_siswa', $view_data);
   }

   public function hapus_siswa($id_siswa)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
   }

   public function data_mapel()
   {
      $data_mapel = $this->db->table("data_mapel")->get()->getResultArray();

      $view_data = [
         "title" => "Data Mapel",
         "mapel" => $data_mapel
      ];

      return view("admin/data_mapel", $view_data);
   }

   public function save_Dmapel()
   {
      $nama_mapel = $this->request->getVar("nama_mapel");

      $cek_data = $this->db->table("data_mapel")->where("nama_mapel", $nama_mapel)->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Mapel sudah ada");
         return redirect()->to(site_url("admin/data_mapel"));
      }

      $this->db->table("data_mapel")->insert(["nama_mapel" => $nama_mapel]);
      session()->setFlashdata("pesan_sukses", "Mapel berhasil di tambah");
      return redirect()->to(site_url("admin/data_mapel"));
   }

   public function update_Dmapel($id_Dmapel)
   {
      $this->db->table("data_mapel")->set(["nama_mapel" => $this->request->getVar("nama_mapel")])->where("id_Dmapel", $id_Dmapel)->update();

      session()->setFlashdata("pesan_sukses", "Mapel berhasil di update");
      return redirect()->to(site_url("admin/data_mapel"));
   }

   public function hapus_Dmapel($id_Dmapel)
   {
      $cek_data = $this->db->table("mapel")->where("id_Dmapel", $id_Dmapel)->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Mapel sudah ada data di bagian guru");
         return redirect()->to(site_url("admin/data_mapel"));
      }

      $this->db->table("data_mapel")->where("id_Dmapel", $id_Dmapel)->delete();
      session()->setFlashdata("pesan_sukses", "Mapel berhasil di hapus");
      return redirect()->to(site_url("admin/data_mapel"));
   }

   public function data_guru()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $data_guru = $this->db->table("data_guru")->get()->getResultArray();
      $data_kelas = $this->db->table("data_kelas")->get()->getResultArray();

      $view_data = [
         "title" => "Data Guru",
         "guru" => $data_guru,
         "kelas" => $data_kelas
      ];

      return view('admin/data_guru', $view_data);
   }

   public function tambah_guru()
   {
      $data_kelas = $this->db->table("data_kelas")->get()->getResultArray();
      $view_data = [
         "title" => "Tambah Guru",
         "kelas" => $data_kelas
      ];

      return view("admin/tambah_guru", $view_data);
   }

   public function save_guru()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }

      $nip = $this->request->getVar("nip");
      $id_kelas = $this->request->getVar("id_kelas");
      $cek_data = $this->db->table("data_guru")->where(["nip" => $nip, "id_kelas" => $id_kelas])->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Data sudah ada di db atau guru kelas ");
      } else {
         $insert_user = [
            "username" => $this->request->getVar("username"),
            "password" => $this->request->getVar("password"),
            "role" => 2
         ];

         $this->db->table("users")->insert($insert_user);

         $guru_userid = $this->db->insertID();

         $insert_guru = [
            "guru_userid" => $guru_userid,
            "nama" => $this->request->getVar("nama"),
            "nip" => $nip,
            "id_kelas" => $id_kelas,
            "no_hp" => $this->request->getVar("no_hp"),
            "alamat" => $this->request->getVar("alamat"),
            "tgl_lahir" => $this->request->getVar("tgl_lahir"),
            "tgl_bekerja" => $this->request->getVar("tgl_bekerja"),
            "tgl_pensiun" => $this->request->getVar("tgl_pensiun"),
            "alamat_gmaps" => $this->request->getVar("alamat_gmaps"),
            "jk" => $this->request->getVar("jk"),
            "pend_terakhir" => $this->request->getVar("pend_terakhir"),
            "gelar" => $this->request->getVar("gelar"),
            "bidang_ilmu" => $this->request->getVar("bidang_ilmu"),
            "gambar" => "default.jpeg",
         ];

         $this->db->table("data_guru")->insert($insert_guru);
         session()->setFlashdata("pesan_suksess", "Data guru berhasil di tambahkan");
      }
      return redirect()->to(site_url("admin/data_guru"));
   }

   public function edit_guru($id_guru)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $data_guru = $this->db->table("data_guru")->join("users", "users.id_user = data_guru.guru_userid")->where("id_guru", $id_guru)->get()->getRowArray();
      // dd($data_siswa);
      $data_kelas = $this->db->table("data_kelas")->get()->getResultArray();

      $view_data = [
         "title" => "Edit Guru (" . $data_guru["nama"] . ")",
         "guru" => $data_guru,
         "kelas" => $data_kelas
      ];

      return view('admin/edit_guru', $view_data);
   }

   public function update_guru()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $id_guru = $this->request->getVar("id_guru");
      $guru_userid = $this->request->getVar("guru_userid");

      $insert_user = [
         "username" => $this->request->getVar("username"),
         "password" => $this->request->getVar("password"),
      ];

      $this->db->table("users")->set($insert_user)->where("id_user", $guru_userid)->update();

      $insert_guru = [
         "nama" => $this->request->getVar("nama"),
         "id_kelas" => $this->request->getVar("id_kelas"),
         "no_hp" => $this->request->getVar("no_hp"),
         "alamat" => $this->request->getVar("alamat"),
         "tgl_lahir" => $this->request->getVar("tgl_lahir"),
         "tgl_bekerja" => $this->request->getVar("tgl_bekerja"),
         "tgl_pensiun" => $this->request->getVar("tgl_pensiun"),
         "alamat_gmaps" => $this->request->getVar("alamat_gmaps"),
         "jk" => $this->request->getVar("jk"),
         "pend_terakhir" => $this->request->getVar("pend_terakhir"),
         "gelar" => $this->request->getVar("gelar"),
         "bidang_ilmu" => $this->request->getVar("bidang_ilmu"),
      ];

      $this->db->table("data_guru")->set($insert_guru)->where("id_guru", $id_guru)->update();
      session()->setFlashdata("pesan_sukses", "Data guru berhasil di update");

      return redirect()->to(site_url("admin/data_guru"));
   }

   public function hapus_guru($id_guru)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $cek_data = $this->db->table("data_akademik")->where("id_guru")->get()->getResultArray();
      $get_guru = $this->db->table("data_guru")->where("id_guru", $id_guru)->get()->getRowArray();
      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Data gagal di hapus, terhubung ke data akademk");
      } else {
         $this->db->table("data_guru")->where("id_guru", $id_guru)->delete();
         $guru_userid = $get_guru["guru_userid"];
         $this->db->table("users")->where("id_user", $guru_userid)->delete();
         session()->setFlashdata("pesan_sukses", "Data berhasil di hapus");
      }

      return redirect()->to(site_url("admin/data_guru"));
   }

   public function data_kelas()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $data_kelas = $this->db->table("data_kelas")->get()->getResultArray();

      $view_data = [
         "title" => "Data Kelas",
         "kelas" => $data_kelas
      ];

      return view("admin/data_kelas", $view_data);
   }

   public function save_kelas()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $nama_kelas = $this->request->getVar("nama_kelas");

      $cek_data = $this->db->table("data_kelas")->where("nama_kelas", $nama_kelas)->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Data sudah ada di db");
      } else {
         $this->db->table("data_kelas")->insert(["nama_kelas" => $nama_kelas, "status" => "aktif"]);
         session()->setFlashdata("pesan_sukses", "Data kelas berhasil di tambahkan");
      }

      return redirect()->to(site_url("admin/data_kelas"));
   }

   public function update_kelas($id_kelas)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $nama_kelas  = $this->request->getVar("nama_kelas");
      $this->db->table("data_kelas")->set("nama_kelas", $nama_kelas)->where("id_kelas", $id_kelas)->update();

      session()->setFlashdata("pesan_sukses", "Data berhasil di ubah");
      return redirect()->to(site_url("admin/data_kelas"));
   }

   public function hapus_kelas($id_kelas)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $cek_data = $this->db->table("data_akademik")->where("id_kelas", $id_kelas)->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Data gagal di hapus, karena terhubung ke data akademik");
      } else {
         $this->db->table("data_kelas")->where("id_kelas", $id_kelas)->delete();
         session()->setFlashdata("pesan_sukses", "Data berhasil di hapus");
      }

      return redirect()->to(site_url("admin/data_kelas"));
   }

   public function tahun_akademik()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $tahun_akd = $this->db->table("tahun_akademik")->get()->getResultArray();

      $view_data = [
         "title" => "Tahun Akademik",
         "tahun" => $tahun_akd
      ];

      return view("admin/tahun_akademik", $view_data);
   }

   public function save_thnAkd()
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $tahun_1 = $this->request->getVar("tahun_1");
      $tahun_2 = $this->request->getVar("tahun_2");
      $semester = $this->request->getVar("semester");

      $nama_tahun = $tahun_1 . "/" . $tahun_2;

      $cek_data = $this->db->table("tahun_akademik")->where(["nama_tahun" => $nama_tahun, "semester" => $semester])->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Tahun akademik sudah ada");
      } else {
         if ($tahun_1 == $tahun_2) {
            session()->setFlashdata("pesan_error", "Tahun tidak boleh sama");
         } else {
            if ($tahun_1 > $tahun_2) {
               session()->setFlashdata("pesan_error", "Tahun 1 tidak boleh lebih besar dari tahun 2");
            } else {
               $this->db->table("tahun_akademik")->insert(["nama_tahun" => $nama_tahun, "semester" => $semester, "status" => 0]);
               session()->setFlashdata("pesan_sukses", "Tahun akademik baru berhasil ditambahkan silahkan aktifkan tahun");
            }
         }
      }
      return redirect()->to(site_url("admin/tahun_akademik"));
   }

   public function update_thnAkd($id_thnAkd)
   {
      if (session()->get("role") == 2) {
         return redirect()->to(site_url("guru/dashboard"));
      }
      $tahun_1 = $this->request->getVar("tahun_1");
      $tahun_2 = $this->request->getVar("tahun_2");
      $nama_tahun = $tahun_1 . "/" . $tahun_2;
      $data = [
         "nama_tahun" =>  $nama_tahun,
         "semester" => $this->request->getVar("semester")
      ];
      if ($tahun_1 == $tahun_2) {
         session()->setFlashdata("pesan_error", "Tahun tidak boleh sama");
      } else {
         if ($tahun_1 > $tahun_2) {
            session()->setFlashdata("pesan_error", "Tahun 1 tidak boleh lebih besar dari tahun 2");
         } else {
            $this->db->table("tahun_akademik")->set($data)->where("id_thnAkd", $id_thnAkd)->update();
            session()->setFlashdata("pesan_sukses", "Tahun akademik berhasil di update");
         }
      }
      return redirect()->to(site_url("admin/tahun_akademik"));
   }

   public function active_thnAkd($id_thnAkd)
   {
      $this->db->table("tahun_akademik")->where("status", 1)->set("status", 0)->update();
      $this->db->table("tahun_akademik")->where("id_thnAkd", $id_thnAkd)->set("status", 1)->update();

      $thn_akd =  $this->db->table("tahun_akademik")->where("id_thnAkd", $id_thnAkd)->get()->getRowArray();
      session()->setFlashdata("pesan_sukses", "Tahun akademik berhasil di aktifkan, semua aktifitas data dialihkan ke " . $thn_akd["nama_tahun"] . " semester " . $thn_akd["semester"]);
      return redirect()->to(site_url("admin/tahun_akademik"));
   }

   public function hapus_thnAkd($id_thnAkd)
   {
      $cek_data = $this->db->table("data_akademik")->where("id_thnAkd", $id_thnAkd)->get()->getRowArray();

      if ($cek_data) {
         session()->setFlashdata("pesan_error", "Tahun gagal di hapus, terhubung dengan data akademik");
      } else {
         $this->db->table("tahun_akademik")->where("id_thnAkd", $id_thnAkd)->delete();
         session()->setFlashdata("pesan_sukses", "Tahun akademik berhasil di hapus");
      }
      return redirect()->to(site_url("admin/tahun_akademik"));
   }

   public function data_akademik()
   {
      $data_akademik = $this->db->table("data_akademik")
         ->join("data_guru", "data_guru.id_guru = data_akademik.id_guru")
         ->join("data_siswa", "data_siswa.id_siswa = data_akademik.id_siswa")
         ->join("data_kelas", "data_kelas.id_kelas = data_akademik.id_kelas")
         ->join("tahun_akademik", "tahun_akademik.id_thnAkd = data_akademik.id_thnAkd")
         ->where("data_akademik.id_thnAkd", $this->thn_akd["id_thnAkd"])
         ->orderBy("nama_kelas", "ASC")
         ->get()->getResultArray();

      $view_data = [
         "title" => "Data Akademik",
         "data_akd" => $data_akademik,
      ];

      return view("admin/data_akademik", $view_data);
   }

   public function tgl_rapor()
   {
      $tgl_rapor = $this->db->table("tgl_rapor")
         ->join("tahun_akademik", "tahun_akademik.id_thnAkd = tgl_rapor.id_thnAkd")
         ->get()->getResultArray();

      $view_data = [
         "title" => "Tanggal Pembagian Rapor Siswa",
         "tgl_rapor" => $tgl_rapor,
         "thnAkd" => $this->thn_akd
      ];

      return view("admin/tgl_rapor", $view_data);
   }

   public function save_tglRapor()
   {
      $data = [
         "tanggal" => $this->request->getVar("tanggal"),
         "id_thnAkd" => $this->thn_akd["id_thnAkd"]
      ];

      $this->db->table("tgl_rapor")->insert($data);

      session()->setFlashdata("pesan_sukses", "Tanggal pembagian rapor berhasil di tambahkan");
      return redirect()->to(site_url("admin/tgl_rapor"));
   }

   public function update_tglRapor($id_tglRapor)
   {
      $data = [
         "tanggal" => $this->request->getVar("tanggal"),
      ];

      $this->db->table("tgl_rapor")->set($data)->where("id_tglRapor", $id_tglRapor)->update();

      session()->setFlashdata("pesan_sukses", "Tanggal pembagian rapor berhasil di update");
      return redirect()->to(site_url("admin/tgl_rapor"));
   }

   public function hapus_tglRapor($id_tglRapor)
   {
      $this->db->table("tgl_rapor")->where("id_tglRapor", $id_tglRapor)->delete();

      session()->setFlashdata("pesan_sukses", "Tanggal pembagian rapor berhasil di hapus");
      return redirect()->to(site_url("admin/tgl_rapor"));
   }
}
