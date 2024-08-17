<?php

namespace App\Controllers;

use CodeIgniter\Database\MySQLi\Builder;
use mysqli;
use Dompdf\Dompdf;
use Dompdf\Options;

class Guru extends BaseController
{
    protected $db;
    protected $thn_akd;
    protected $guru;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->thn_akd = $this->db->table("tahun_akademik")->where("status", 1)->get()->getRowArray();
        $this->guru = $this->db->table("data_guru")->where("guru_userid", session()->get("id_user"))->get()->getRowArray();
    }
    public function dashboard()
    {
        // dd($data_guru);
        if ($this->guru["id_kelas"] == 0) {
            $jml_siswa = 0;
            $jml_mapel = 0;
            $data_guru = $this->db->table("data_guru")
                ->where("guru_userid", session()->get("id_user"))->get()->getRowArray();
        } else {
            $data_guru = $this->db->table("data_guru")
                ->join("data_kelas", "data_kelas.id_kelas = data_guru.id_kelas")
                ->where("guru_userid", session()->get("id_user"))->get()->getRowArray();
            $jml_siswa = $this->db->table("data_akademik")->where(["id_kelas" => $data_guru["id_kelas"], "id_thnAkd" => $this->thn_akd["id_thnAkd"]])->countAllResults();
            $jml_mapel = $this->db->table("mapel")->where("id_guru", $data_guru["id_guru"])->countAllResults();
        }

        $jml_data = [
            "siswa" => $jml_siswa,
            "mapel" => $jml_mapel,
        ];

        $view_data = [
            "title" => "Dashboard",
            "guru" => $data_guru,
            "jml_data" => $jml_data,
        ];

        return view('guru/dashboard', $view_data);
    }

    public function update_profil($id_guru)
    {
        $file_img = $this->request->getFile('file_img');
        //cek gambar apakah tetap gambar lama
        if ($file_img->getError() == 4) {
            $gambar = $this->request->getVar('gambarLama');
        } else {
            //ambil nama gambar
            $gambar = $file_img->getRandomName();
            //pindahkan file ke assets
            $file_img->move('assets/guru/', $gambar);
            //hapus file lama
            if ($this->request->getVar('gambarLama') != 'default.jpeg') {
                unlink('assets/guru/' . $this->request->getVar('gambarLama'));
            }
        }
        $update_guru = [
            "nama" => $this->request->getVar("nama"),
            "nip" => $this->request->getVar("nip"),
            "no_hp" => $this->request->getVar("no_hp"),
            "alamat" => $this->request->getVar("alamat"),
            "gambar" => $gambar
        ];

        $this->db->table("data_guru")->set($update_guru)->where("id_guru", $id_guru)->update();

        session()->setFlashdata("pesan_sukses", "Profil berhasil di update");
        return redirect()->to(site_url("guru/dashboard"));
    }

    public function kelas()
    {
        $data_kelas = $this->db->table("data_kelas")->get()->getResultArray();

        $view_data = [
            "title" => "Kelas",
            "kelas" => $data_kelas
        ];

        return view("guru/kelas", $view_data);
    }

    public function detail_kelas($id_kelas)
    {
        $data_kelas = $this->db->table("data_kelas")->where("id_kelas", $id_kelas)->get()->getRowArray();

        $mapel = $this->db->table("mapel")
            ->join("data_mapel", "data_mapel.id_Dmapel = mapel.id_Dmapel")
            ->where(["id_guru" => $this->guru["id_guru"], "id_kelas" => $id_kelas, "id_thnAkd" => $this->thn_akd["id_thnAkd"]])->get()->getResultArray();

        // dd($mapel);
        $data_mapel = $this->db->table("data_mapel")->get()->getResultArray();

        $view_data = [
            "title" => "Detail Kelas " . $data_kelas["nama_kelas"],
            "mapel" => $mapel,
            "d_mapel" => $data_mapel,
            "page_index" => [
                "tittle" => "Kelas",
                "url" => site_url("guru/kelas")
            ],
            "id_kelas" => $id_kelas
        ];

        return view("guru/detail_kelas", $view_data);
    }
    public function input_nilai($id_mapel)
    {
        $mapel = $this->db->table("mapel")
            ->join("data_mapel", "data_mapel.id_Dmapel = mapel.id_Dmapel")
            ->where("mapel.id_mapel", $id_mapel)->get()->getRowArray();

        $data_siswa = $this->db->table("data_akademik")
            ->join("data_siswa", "data_siswa.id_siswa = data_akademik.id_siswa")
            ->where(["id_kelas" => $mapel["id_kelas"], "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getResultArray();

        $nilai_mapel = $this->db->table("nilai_rapor")
            ->join("mapel", "mapel.id_mapel = nilai_rapor.id_mapel")
            ->join("data_siswa", "data_siswa.id_siswa = nilai_rapor.id_siswa")
            ->where(["nilai_rapor.id_mapel" => $id_mapel, "id_guru" => $this->guru["id_guru"], "mapel.id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getResultArray();

        $ujian = $this->db->table("ujian")->where(["id_mapel" => $id_mapel])->get()->getResultArray();

        $data_kelas = $this->db->table("data_kelas")->where("id_kelas", $mapel["id_kelas"])->get()->getRowArray();

        $data_tugas = $this->db->table("data_tugas")->where("id_mapel", $id_mapel)->get()->getResultArray();

        $jml_tugas = $this->db->table("data_tugas")->where("id_mapel", $id_mapel)->countAllResults();

        $view_data = [
            "title" => "Input Nilai (" . $mapel["nama_mapel"] . " Kelas " . $data_kelas["nama_kelas"] . ")",
            "siswa" => $data_siswa,
            "thn_akd" => $this->thn_akd,
            "page_index" => [
                "tittle" => "Detail Kelas",
                "url" => site_url("guru/detail_kelas/" . $mapel["id_kelas"])
            ],
            "tugas" => $data_tugas,
            "jml_tugas" => $jml_tugas,
            "id_mapel" => $id_mapel,
            "nilai_mapel" => $nilai_mapel,
            "siswa" => $data_siswa,
            "thn_akd" => $this->thn_akd,
            "id_mapel" => $id_mapel,
            "data_mapel" => $mapel,
            "data_ujian" => $ujian
        ];

        return view("guru/input_nilai", $view_data);
    }

    public function save_mapel($id_kelas)
    {
        $id_Dmapel = $this->request->getVar("id_Dmapel");

        $cek_data = $this->db->table("mapel")->where(
            [
                "id_Dmapel" => $id_Dmapel,
                "id_kelas" => $id_kelas,
                "id_thnAkd" => $this->thn_akd["id_thnAkd"]
            ]
        )->get()->getRowArray();

        $mapel = $this->db->table("mapel")
            ->join("data_guru", "data_guru.id_guru = mapel.id_guru")
            ->join("data_kelas", "data_kelas.id_kelas = mapel.id_kelas")
            ->where(["mapel.id_kelas" => $id_kelas, "mapel.id_Dmapel" => $id_Dmapel])->get()->getRowArray();
        // dd($mapel);

        if ($cek_data) {
            session()->setFlashdata("pesan_error", "Mapel sudah ada di kelas " . $mapel["nama_kelas"] . " Guru mengajar [ " . $mapel["nama"] . " ]");
            return redirect()->to(site_url("guru/detail_kelas/" . $id_kelas));
        }

        $this->db->table("mapel")->insert([
            "id_guru" => $this->guru["id_guru"],
            "id_Dmapel" => $id_Dmapel,
            "id_kelas" => $this->request->getVar("id_kelas"),
            "id_thnAkd" => $this->thn_akd["id_thnAkd"]
        ]);
        session()->setFlashdata("pesan_sukses", "Mapel berhasil di tambah");
        return redirect()->to(site_url("guru/detail_kelas/" . $this->request->getVar("id_kelas")));
    }

    public function update_nilaiTugas($id_nTugas)
    {
        $this->db->table("nilai_tugas")
            ->set("nilai_tugas", $this->request->getVar("nilai_tugas"))
            ->where("id_nTugas", $id_nTugas)->update();

        // $view_json = [
        //     "msg" =>  '<div class="pesan-update">
        //         <div class="alert alert-success">Nilai berhasil di update</div>
        //     </div>'
        // ];

        // return json_encode($view_json);
        session()->setFlashdata("pesan_sukses", "Nilai tugas berhasil di update");
        return redirect()->to(site_url("guru/input_nilai/" . $this->request->getVar("id_mapel")));
    }

    public function update_allNilaiTugas()
    {
        $id_nTugas = $this->request->getVar("id_nTugas");
        $nilai_tugas = $this->request->getVar("nilai_tugas");
        dd([$id_nTugas, $nilai_tugas]);
    }

    public function save_tugas($id_mapel)
    {
        $mapel = $this->db->table("mapel")
            ->join("data_mapel", "data_mapel.id_Dmapel = mapel.id_Dmapel")
            ->where("mapel.id_mapel", $id_mapel)->get()->getRowArray();

        $materi = $this->request->getVar("materi");
        $tgl_tugas = $this->request->getVar("tgl_tugas");

        $cek_data = $this->db->table("data_akademik")
            ->join("data_siswa", "data_siswa.id_siswa = data_akademik.id_siswa")
            ->where(["id_kelas" => $mapel["id_kelas"], "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getResultArray();

        if ($cek_data == NULL) {
            session()->setFlashdata("pesan_error", "Tidak ada siswa");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        } else {
            $this->db->table("data_tugas")->insert([
                "id_mapel" => $id_mapel,
                "materi" => $materi,
                "tgl_tugas" => $tgl_tugas
            ]);

            $id_tugas = $this->db->insertID();
            foreach ($cek_data as $siswa) {
                $id_siswa = $siswa["id_siswa"];
                $this->db->table("nilai_tugas")->insert([
                    "id_tugas" => $id_tugas,
                    "id_siswa" => $id_siswa,
                    "nilai_tugas" => 0
                ]);
            }
            session()->setFlashdata("pesan_sukses", "Tugas berhasil di tambahkan");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        }
    }

    public function update_tugas($id_tugas)
    {
        $id_mapel = $this->request->getVar("id_mapel");
        $materi = $this->request->getVar("materi");
        $tgl_tugas = $this->request->getVar("tgl_tugas");

        // dd($id_mapel);

        $this->db->table("data_tugas")->set([
            "materi" => $materi,
            "tgl_tugas" => $tgl_tugas
        ])->where("id_tugas", $id_tugas)->update();

        session()->setFlashdata("pesan_sukses", "Tugas berhasil di update");
        return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
    }

    public function hapus_tugas($id_tugas)
    {
        $cek_nilai = $this->db->table("nilai_tugas")
            ->selectSum("nilai_tugas")
            ->where("id_tugas", $id_tugas)
            ->get()->getRowArray();

        if ($cek_nilai["nilai_tugas"] > 0) {
            session()->setFlashdata("pesan_error", "Beberapa siswa sudah mendapatkan nilai di dalam tugas ini");
            return redirect()->to(site_url("guru/input_nilai/" . $this->request->getVar("id_mapel")));
        }

        $this->db->table("nilai_tugas")->where("id_tugas", $id_tugas)->delete();
        $this->db->table("data_tugas")->where("id_tugas", $id_tugas)->delete();

        session()->setFlashdata("pesan_sukses", "Tugas berhasil di hapus");
        return redirect()->to(site_url("guru/input_nilai/" . $this->request->getVar("id_mapel")));
    }

    public function save_ujian($id_mapel)
    {
        $tipe_ujian = $this->request->getVar("tipe_ujian");
        $tgl_ujian = $this->request->getVar("tgl_ujian");

        $cek_data = $this->db->table("ujian")
            ->join("mapel", "mapel.id_mapel = ujian.id_mapel")
            ->where(["ujian.id_mapel" => $id_mapel, "id_thnAkd" => $this->thn_akd["id_thnAkd"], "tipe_ujian" => $tipe_ujian])
            ->get()->getRowArray();

        if ($cek_data) {
            session()->setFlashdata("pesan_error", "Nilai ujian sudah ada");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        }

        $mapel = $this->db->table("mapel")
            ->join("data_mapel", "data_mapel.id_Dmapel = mapel.id_Dmapel")
            ->where("mapel.id_mapel", $id_mapel)->get()->getRowArray();

        $cek_siswa = $this->db->table("data_akademik")
            ->join("data_siswa", "data_siswa.id_siswa = data_akademik.id_siswa")
            ->where(["id_kelas" => $mapel["id_kelas"], "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getResultArray();

        if ($cek_siswa == NULL) {
            session()->setFlashdata("pesan_error", "Tidak ada siswa");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        }

        $this->db->table("ujian")->insert([
            "id_mapel" => $id_mapel,
            "tipe_ujian" => $tipe_ujian,
            "tgl_ujian" => $tgl_ujian
        ]);

        $id_ujian = $this->db->insertID();

        foreach ($cek_siswa as $siswa) {
            $id_siswa = $siswa["id_siswa"];
            $this->db->table("nilai_ujian")->insert([
                "id_ujian" => $id_ujian,
                "nilai" => 0,
                "id_siswa" => $id_siswa,
            ]);
        }

        session()->setFlashdata("pesan_sukses", "Nilai ujian berhasil di tambahkan");
        return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
    }

    public function update_nUjian($id_nUjian)
    {
        $nilai = $this->request->getVar("nilai");
        $id_mapel = $this->request->getVar('id_mapel');

        $this->db->table("nilai_ujian")->set("nilai", $nilai)->where("id_nUjian", $id_nUjian)->update();

        session()->setFlashdata("pesan_sukses", "Nilai ujian berhasil di update");
        return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
    }

    public function update_ujian($id_ujian)
    {
        $id_mapel = $this->request->getVar("id_mapel");
        $tipe_ujian = $this->request->getVar("tipe_ujian");
        $tgl_ujian = $this->request->getVar("tgl_ujian");

        $cek_data  = $this->db->table("ujian")->where(["id_ujian" => $id_ujian, "tipe_ujian !=" => $tipe_ujian])->get()->getRowArray();

        // dd($cek_data);

        if ($cek_data) {
            session()->setFlashdata("pesan_error", "Data ujian sudah ada");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        }

        $this->db->table("ujian")
            ->set(["tipe_ujian", $tipe_ujian, "tgl_ujian" => $tgl_ujian])
            ->where("id_ujian", $id_ujian)->update();

        session()->setFlashdata("pesan_sukses", "Data ujian berhasil di update");
        return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
    }

    public function hapus_ujian($id_ujian)
    {
        $id_mapel = $this->request->getVar("id_mapel");

        $cek_data = $this->db->table("nilai_ujian")->selectSum("nilai")->where("id_ujian", $id_ujian)->get()->getRowArray();

        // dd($cek_data);
        if ($cek_data["nilai"] > 0) {
            session()->setFlashdata("pesan_error", "Data ujian sudah ada nilai");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        }

        $this->db->table("nilai_ujian")->where("id_ujian", $id_ujian)->delete();
        $this->db->table("ujian")->where("id_ujian", $id_ujian)->delete();

        session()->setFlashdata("pesan_sukses", "Data ujian berhasil di hapus");
        return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
    }

    public function generate_nilaiMapel($id_mapel)
    {
        $id_siswa = $this->request->getVar("id_siswa");

        $cek_siswa = $this->db->table("data_siswa")
            ->join("data_akademik", "data_akademik.id_siswa = data_siswa.id_siswa")
            ->where(["data_siswa.id_siswa" => $id_siswa, "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getRowArray();

        $mapel = $this->db->table("mapel")
            ->join("data_mapel", "data_mapel.id_Dmapel = mapel.id_Dmapel")
            ->join("data_kelas", "data_kelas.id_kelas = mapel.id_kelas")
            ->where("id_mapel", $id_mapel)->get()->getRowArray();

        $n_rataTugas = $this->db->table("nilai_tugas")
            ->join("data_tugas", "data_tugas.id_tugas = nilai_tugas.id_tugas")
            ->join("mapel", "mapel.id_mapel = data_tugas.id_mapel")
            ->selectSum("nilai_tugas")
            ->where(["mapel.id_thnAkd" => $this->thn_akd["id_thnAkd"], "data_tugas.id_mapel" => $id_mapel, "id_siswa" => $id_siswa])
            ->get()->getRowArray();

        $nilai_uts = $this->db->table("nilai_ujian")
            ->join("ujian", "ujian.id_ujian = nilai_ujian.id_ujian")
            ->join("mapel", "mapel.id_mapel = ujian.id_mapel")
            ->where(["mapel.id_thnAkd" => $this->thn_akd["id_thnAkd"], "ujian.id_mapel" => $id_mapel, "ujian.tipe_ujian" => "uts", "id_siswa" => $id_siswa])
            ->get()->getRowArray();


        $nilai_uas = $this->db->table("nilai_ujian")
            ->join("ujian", "ujian.id_ujian = nilai_ujian.id_ujian")
            ->join("mapel", "mapel.id_mapel = ujian.id_mapel")
            ->where(["mapel.id_thnAkd" => $this->thn_akd["id_thnAkd"], "ujian.id_mapel" => $id_mapel, "ujian.tipe_ujian" => "uas", "id_siswa" => $id_siswa])
            ->get()->getRowArray();

        // return json_encode($nilai_uts);

        if ($nilai_uts == NULL) {
            return json_encode(["error" => "
            <div clas='alert alert-danger'>
            Nilai UTS tidak boleh kosong
            </div>
            "]);
        }

        if ($nilai_uas == NULL) {
            return json_encode(["error" => "
            <div clas='alert alert-danger'>
            Nilai UAS tidak boleh kosong
            </div>
            "]);
        }

        $jml_tugas = $this->db->table("data_tugas")
            ->join("mapel", "mapel.id_mapel = data_tugas.id_mapel")
            ->where(["mapel.id_mapel" => $id_mapel, "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->countAllResults();

        // return json_encode($nilai_uts["nilai"]);
        $n_tugas = $n_rataTugas["nilai_tugas"] / $jml_tugas;

        $r_nilaiTugas = $n_tugas * 50;
        $n_uts = $nilai_uts["nilai"] * 20;
        $n_uas = $nilai_uas["nilai"] * 30;

        $hasil_nTugas = $r_nilaiTugas / 100;
        $hasil_nilaiUts = $n_uts / 100;
        $hasil_nilaiUas = $n_uas / 100;

        //Nilai akhir raport
        $nilai_akhir = $hasil_nTugas + $hasil_nilaiUts + $hasil_nilaiUas;


        $html = '<div class="card">
        <div class="card-body">
            <div class="callout callout-info">
                <i class="fas fa-info"></i> Ini adalah hasil dari generate jumlah rata" nilai tugas yang di jumlahkan dengan nilai uts dan uas
            </div>
            <form action="/guru/save_nilaiRapor" method="post">
                <input type="hidden" name="id_siswa" id="id_siswa" value="' . $cek_siswa["id_siswa"] . '">
                <input type="hidden" name="id_mapel" id="id_mapel" value="' . $id_mapel . '">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center py-2">
                                    <img src="/assets/siswa/default.jpeg" alt="" class="img-label" width="120">
                                </div>
                                <table>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td>' . $cek_siswa["nama_siswa"] . '</td>
                                    </tr>
                                    <tr>
                                        <th>NISN</th>
                                        <td>:</td>
                                        <td>' . $cek_siswa["nisn"] . '</td>
                                    </tr>
                                    <tr>
                                        <th>MAPEL / KELAS</th>
                                        <td>:</td>
                                        <td>' . $mapel["nama_mapel"] . ' / ' . $mapel["nama_kelas"] . ' kelas</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <label for="nilai">Nilai Akhir Mapel Rapor</label>
                            <input type="number" name="nilai" id="nilai" class="form-control" value="' . round($nilai_akhir) . '" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" required>Ananda ' . $cek_siswa["nama_siswa"] . '</textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>';


        $view_json = [
            "success" => "Nilai berhasil di generate",
            "html" => $html,
        ];

        return json_encode($view_json);
    }

    public function save_nilaiRapor()
    {
        $id_mapel = $this->request->getVar("id_mapel");
        $id_siswa = $this->request->getVar("id_siswa");
        $nilai = $this->request->getVar("nilai");
        $deskripsi = $this->request->getVar("deskripsi");

        $cek_data = $this->db->table("nilai_rapor")
            ->where(["id_mapel" => $id_mapel, "id_siswa" => $id_siswa, "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getRowArray();

        if ($cek_data) {
            $this->db->table("nilai_rapor")->set("nilai", $nilai)->where("id_nilai", $cek_data["id_nilai"])->update();
            session()->setFlashdata("pesan_sukses", "Nilai rapor mapel siswa berhasil di update");
            return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
        }

        $this->db->table("nilai_rapor")->insert([
            "id_mapel" => $id_mapel,
            "id_siswa" => $id_siswa,
            "nilai" => $nilai,
            "deskripsi" => $deskripsi,
            "id_thnAkd" => $this->thn_akd["id_thnAkd"]
        ]);

        session()->setFlashdata("pesan_sukses", "Nilai rapor mapel siswa berhasil di tambahkan");
        return redirect()->to(site_url("guru/input_nilai/" . $id_mapel));
    }

    public function nilai_rapor()
    {
        $data_siswa = $this->db->table("data_siswa")
            ->join("data_akademik", "data_akademik.id_siswa = data_siswa.id_siswa")
            ->where(["id_kelas" => $this->guru["id_kelas"], "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getResultArray();

        // dd($data_siswa);
        $kelas = $this->db->table("data_kelas")->where("id_kelas", $this->guru["id_kelas"])->get()->getRowArray();

        $view_data = [
            "title" => "Nilai Rapor Kelas " . $kelas["nama_kelas"],
            "siswa" => $data_siswa,
        ];

        return view("guru/nilai_rapor", $view_data);
    }

    function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    public function cetak_rapor($id_siswa)
    {
        $cetak = $this->request->getVar("cetak");

        $nilai_mapel = $this->db->table("nilai_rapor")
            ->join("mapel", "mapel.id_mapel = nilai_rapor.id_mapel")
            ->join("data_mapel", "data_mapel.id_Dmapel = mapel.id_Dmapel")
            ->where(["mapel.id_kelas" => $this->guru["id_kelas"], "nilai_rapor.id_thnAkd" => $this->thn_akd["id_thnAkd"], "nilai_rapor.id_siswa" => $id_siswa])
            ->get()->getResultArray();

        $data_siswa = $this->db->table("data_siswa")
            ->join("data_akademik", "data_akademik.id_siswa = data_siswa.id_siswa")
            ->join("data_kelas", "data_kelas.id_kelas = data_akademik.id_kelas")
            ->where("data_siswa.id_siswa", $id_siswa)
            ->get()->getRowArray();

        $profil_sekolah = $this->db->table("profil_sekolah")
            ->get()->getRowArray();

        $tgl_rapor = $this->db->table("tgl_rapor")
            ->where("id_thnAkd", $this->thn_akd["id_thnAkd"])
            ->get()->getRowArray();


        $view_data = [
            "siswa" => $data_siswa,
            "nilai_mapel" => $nilai_mapel,
            "thnAkd" => $this->thn_akd,
            "sekolah" => $profil_sekolah,
            "wali_kelas" => $this->guru,
            "tgl_rapor" => $this->tanggal_indo($tgl_rapor["tanggal"])
        ];

        if ($cetak == 0) {
            return view("guru/cetak_rapor", $view_data);
        } else {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);

            $view =  view("guru/cetak_rapor", $view_data);

            $dompdf->loadHtml($view);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $dompdf->stream('output.pdf', ['Attachment' => 0]);
        }
    }

    public function rangking_siswa()
    {
        $data_siswa = $this->db->table("data_siswa")
            ->join("data_akademik", "data_akademik.id_siswa = data_siswa.id_siswa")
            ->where(["id_kelas" => $this->guru["id_kelas"], "id_thnAkd" => $this->thn_akd["id_thnAkd"]])
            ->get()->getResultArray();

        $rangking_siswa = [];
        foreach ($data_siswa as $s) {
            $nilai_rapor = $this->db->table("nilai_rapor")
                ->where(["id_siswa" => $s["id_siswa"], "nilai_rapor.id_thnAkd" => $this->thn_akd["id_thnAkd"]])
                ->selectSum("nilai")
                ->get()->getRowArray();

            $jml_mapel = $this->db->table("mapel")
                ->where("id_kelas", $this->guru["id_kelas"])
                ->countAllResults();

            $n_rataRapor = $nilai_rapor["nilai"] / $jml_mapel;

            $rangking_siswa[] = [
                "nama_siswa" => $s["nama_siswa"],
                "n_rataRapor" => $n_rataRapor
            ];
        }
        return json_encode($rangking_siswa);
        // dd($peringkat_siswa);
    }
}
