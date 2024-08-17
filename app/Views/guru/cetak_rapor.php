<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Theme style -->
   <style>
      .kop {
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
         text-align: center;
      }


      .header {
         padding: 10px;
         font-size: 11pt;
      }

      .content {
         padding: 10px;
         font-size: 11pt;
      }

      .foter {
         padding: 10px;
         font-size: 11pt;
      }

      .table-header {
         width: 100%;
         border-collapse: collapse;
      }

      .table-content {
         width: 100%;
         border-collapse: collapse;
      }

      .table-content thead {
         background-color: #3BBE61;
      }

      .table-content tbody {
         background-color: #A9EABC;
      }

      .table-content th,
      .table-content td {
         border: 1px solid white;
         /* Batas tebal 1px, warna hitam */
         padding: 8px;
      }

      .table-kegiatan {
         width: 50%;
      }

      .table-foter {
         width: 100%;
      }

      .kegiatan {
         padding-top: 10px;
      }
   </style>
   <title>Document</title>
</head>

<body>
   <div class="header">
      <table class="table-header">
         <tr>
            <td>
               <table>
                  <tr>
                     <td style="font-weight: bold;">Sekolah</td>
                     <td>:</td>
                     <td><?= $sekolah["nama_sekolah"]; ?></td>
                  </tr>
                  <tr>
                     <td style="font-weight: bold;">Nama Peserta Didik</td>
                     <td>:</td>
                     <td><?= $siswa["nama_siswa"]; ?></td>
                  </tr>
                  <tr>
                     <td style="font-weight: bold;">NISN</td>
                     <td>:</td>
                     <td><?= $siswa["nisn"]; ?></td>
                  </tr>
                  <tr>
                     <td style="font-weight: bold;">Alamat Sekolah</td>
                     <td>:</td>
                     <td><?= $sekolah["alamat"]; ?></td>
                  </tr>
               </table>
            </td>
            <td>
               <table>
                  <tr>
                     <td style="font-weight: bold;">Kelas</td>
                     <td>:</td>
                     <td><?= $siswa["nama_kelas"]; ?></td>
                  </tr>
                  <tr>
                     <td style="font-weight: bold;">Semester</td>
                     <td>:</td>
                     <td><?= $thnAkd["semester"]; ?></td>
                  </tr>
                  <tr>
                     <td style="font-weight: bold;">Tahun Pelajaran</td>
                     <td>:</td>
                     <td><?= $thnAkd["nama_tahun"]; ?></td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </div>
   <div class="content">
      <table class="table-content">
         <thead>
            <tr>
               <th style="width: 30px;">NO</th>
               <th style="width: 200px;">Mata Pelajaran</th>
               <th style="width: 40px;">Nilai Akhir</th>
               <th>Deskripsi (Capaian Kompetensi)</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $n = 1;
            foreach ($nilai_mapel as $np) : ?>
               <tr>
                  <td style="text-align: center;"><?= $n++; ?></td>
                  <td><?= $np["nama_mapel"]; ?></td>
                  <td style="text-align: center;"><?= $np["nilai"]; ?></td>
                  <td><?= $np["deskripsi"]; ?></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      <div class="kegiatan">
         <table class="table-content table-kegiatan" style="width: 100%;">
            <thead>
               <tr>
                  <th style="width: 30px;">NO</th>
                  <th style="width: 150px;">Ekstrakurikuler</th>
                  <th style="width: 300px;">Keteraangan</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="foter">
      <table class="table-foter">
         <tr>
            <td style="width: 50%;">
               <p>Mengetahui : <br>
                  Orang Tua/Wali
               </p>
               <br><br><br>
               <?= $siswa["ortu_ayah"]; ?>
            </td>
            <td width="50%">
               <div style="float: right;">
                  <p width="100%">Pamekasan, <?= $tgl_rapor; ?><br>
                     Wali Kelas, <?= $siswa["nama_kelas"]; ?>
                     <br><br><br><br>
                  </p>
                  <p style="text-decoration: underline; padding:0; margin:0;"><?= $wali_kelas["nama"]; ?></p>
                  <p style="padding:0; margin:0;">NIP: <?= $wali_kelas["nip"]; ?></p>
               </div>
            </td>
         </tr>

      </table>
      <table style="width: 100%;">
         <tr>
            <td style="text-align: center;">
               <div>
                  <p>
                     Kepala Sekolah,
                     <br><br><br><br>
                  </p>
                  <p style="text-decoration: underline; padding:0; margin:0;"><?= $sekolah["kepsek"]; ?></p>
                  <p style="padding:0; margin:0;">NIP: <?= $sekolah["nip_kepsek"]; ?></p>
               </div>
            </td>
         </tr>
      </table>
   </div>
</body>

</html>