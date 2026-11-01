<?php
session_start();

 // P7: Penggunaan POST
 $nim = trim($_POST['nim']) ?: "2622500021";
 $namaMahasiswa = trim($_POST['nama_mahasiswa']) ?: "Liristiari";
 $programStudi = trim($_POST['program_studi']) ?: "SI";
 $tahunAkademik = trim($_POST['tahun_akademik']) ?:"2026/2027";
 $semester = trim($_POST['semester']) ?: 1;
 $asalDaerah = trim($_POST['asal_daerah']) ?: "Mentok, Bangka Barat";
 $ipk = trim($_POST['ipk']) ?:  0.00;
 $statusAktif = trim($_POST['status_aktif']) === 'on' ? true : false;
 $catatanTambahan = trim($_POST['catatan_tambahan']) ?: null;

 $PesanKesalahan = '';
 if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(trim($nama ?? '') === ' ') {
    $pesanKesalahan .= 'Nama Lengkap wajib diisi. ';
  }
 
  if (trim($email) === ''){
    $pesanKesalahan .= 'Email wajib diisi. ';
  }

if (trim($semsterForm) === ''){
  $pesanKesalahan .= 'Semester wajib diisi. ';
}

if(trim($tanggal) === ''){
  $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. ';
}

if ($JenisPesan === ''){
  $pesanKesalahan .= 'Jenis pesan wajib diisi. ';
}

if ($prodi === ''{
  $pesanKesalahan .= 'Program studi wajib dipilih. ';
 
  if(trim($pesan) === ''){
    $pesanKesalahan .= 'Pesan wajib diisi. ';
  }

  if (empty($minat)) {
    $pesanKesalahan .= 'Minat wajib dipilih minimal satu. ';
  }
  if (trim($semesterForm) !== '') {
    $semesterValid = filter_var(
      $semesterForm,
      FILTER_VALIDATE_INT
    );
if (
$semesterValid false
$semesterValid < 1
$semesterValid> 14
) {
$pesankesalahan 'Semester harus berupa bilangan bulat antara 1 dan 14.';
}
  }
if (trim($email) !== '') {
if (filter_var($email, FILTER_VALIDATE_EMAIL) false) {
$pesankesalahan 'Format email tidak valid. ';
 }
}

if (lin_array($jenisPesan, ['pertanyaan', 'saran'], true)) {
$pesankesalahan 'Jenis pesan tidak valid.';
}

if (lin_array($prodi, ['SI', 'TI'], true)) {
$pesankesalahan 'Program studi tidak valid.';
}

$minatDiizinkan ['HTML', 'CSS'];
if (lis_array($minat)) {
$pesankesalahan 'Format pilihan topik tidak valid.';
} else {
foreach ($minat as $topik) {  
  if (lin_array($topik, $minatDiizinkan, true)) {
    break;
     }
    }
   }
}
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta

$nim = "0344300002";
$namaMahasiswa = "Liristiari";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 4;
$ipk = 3.75;
$statusAktif = true;
$catatan Tambahan null;

 const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
 // Bagian 2: Operator
 $batasSemester = 8;
 $sisaSemester = $batasSemester - $semester;
 $semesterValid = $semester >= 1 && $semester <= $batasSemester;
 $statusSemester = ($semesterValid && $statusAktif)
     ? "Sesuai rentang"
     : "Perlu diperiksa";

 // Bagian 3: Percabangan if-elseif-else
 if ($semester < 3) {
     $keteranganSemester = "Semester awal";
 } elseif ($semester <= 6) {
     $keteranganSemester = "Semester menengah";
 } else {
     $keteranganSemester = "Semester akhir";
 }

 // Bagian 4: Nama program studi dengan operator ternary
 $namaProdi = ($programStudi == "SI")
     ? "Sistem Informasi"
     : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");
 // Bagian 5: Percabangan switch-case-default
 switch ($programStudi) {
     case "SI":
         $fokusProgramStudi = "Sistem informasi dan proses bisnis";
         break;
     case "TI":
         $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
         break;
     default:
         $fokusProgramStudi = "Belum ditentukan";
 }

 // P7
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$_SESSION['pesanKesalahan'] = $pesanKesalahan;
$_SESSION['nama'] = $nama;
$_SESSION['email'] = $email;
$_SESSION['semester'] = $semesterForm;
$_SESSION['tanggal'] = $tanggal;
$_SESSION['jenis_pesan'] = $jenisPesan;
$_SESSION['prodi'] = $prodi;
$_SESSION['minat'] = $minat;
$_SESSION['pesan'] = $pesan;
header('Location: index.php');
exit;
}

$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? '';
$nama = $_SESSION['nama'] ?? '';
$email = $_SESSION['email'] ?? '';
$semesterForm = $_SESSION['semester'] ?? '';
$tanggal = $_SESSION['tanggal'] ?? date("Y-m-d");
$jenisPesan = $_SESSION['jenis_pesan'] ?? '';
$prodi = $_SESSION['prodi'] ?? '';
$minat = $_SESSION['minat'] ?? '';
$pesan = $_SESSION['pesan'] ?? '';

header('Location: index.php');
exit;
 }

 // Status mahasiswa dengan operator ternary
 $teksStatus = $statusAktif ? "Aktif" : "Tidak aktif";
 ?>

 <!doctype html>
 <html lang="id">
   <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Profil Mahasiswa</title>
     <link rel="stylesheet" href="style.css" />
   </head>
   <body>
     <header>
       <div class="header-top">
         <h1>PROFIL SAYA</h1>
         <button
           class="nav-toggle"
           id="navToggle"
           type="button"
           aria-label="Buka navigasi"
           aria-controls="navMenu"
           aria-expanded="false">
           &#9776;
         </button>
       </div>
       <nav aria-label="Navigasi utama">
         <ul id="navMenu">
           <li><a href="#home">Beranda</a></li>
           <li><a href="#about">Tentang</a></li>
           <li><a href="#contact">Kontak</a></li>
         </ul>
       </nav>
     </header>
     <main>
       <section id="home">
         <h2>Halo! Selamat Datang 😊</h2>
         <p>
           Hai teman-teman, perkenalkan nama saya <strong><?= $namaMahasiswa ?></strong>. 
           Asal daerah saya adalah kecamatan <i>Mentok</i> Kabupaten <i>Bangka Barat</i>.
         </p>
         <div class="bingkai-foto">
           <img
             src="../Foto.jpeg"
             alt="Foto Profil Liristiari"
             width="200" />
         </div>
       </section>
       <section id="about">
         <h2>TENTANG SAYA</h2>
         <article>
           <h3>Profil Singkat</h3>
           <p>Sisa semester hingga batas: <?= $sisaSemester ?></p>
           <p>Pemeriksaan rentang semester: <?= $statusSemester ?></p>
           <p>Semester: <?= $semester ?> (<?= $keteranganSemester ?>)</p>
           <p>Program Studi: <?= $namaProdi ?> (<?= $programStudi ?>)</p>
           <p>Status mahasiswa: <?= $teksStatus ?></p>
           <p>Fokus program studi: <?= $fokusProgramStudi ?></p>
           <p>IPK: <?= number_format($ipk, 2, ',', '.') ?></p>
           <p>
             Catatan tambahan:
             <?= $catatanTambahan === null ? "Belum ada" : $catatanTambahan ?>
           </p>
           <h3>Nama Lengkap</h3>
           <p><?= $namaMahasiswa ?></p>
           <h3>NIM</h3>
           <p><?= $nim ?></p>
           <h3>Asal Daerah</h3>
           <p><?= $asalDaerah ?></p>
           <h3>Jurusan</h3>
           <p><?= $namaProdi ?></p>
           <h3>Target Belajar (Perulangan for)</h3>
           <ol>
             <?php
             for ($i = 1; $i <= 3; $i++) {
                 echo "<li>";
                 switch ($i) {
                     case 1:
                         echo "Memahami dasar-dasar HTML, CSS, dan JavaScript.";
                         break;
                     case 2:
                         echo "Memahami cara menambahkan fungsi dan interaksi sederhana ke halaman web.";
                         break;
                     case 3:
                         echo "Mampu menyusun halaman web yang rapi dan terstruktur.";
                         break;
                 }
                 echo "</li>";
             }
             ?>
           </ol>
           <h3>Hobi</h3>
           <ol>
             <?php
             $daftarHobi = ["Membaca buku novel", "Memasak"];
             foreach ($daftarHobi as $hobi) {
                 echo "<li>$hobi</li>";
             }
             ?>
           </ol>
           <h3>Motto Hidup</h3>
           <p><i>"Setiap hari adalah kesempatan untuk belajar dan tumbuh."</i></p>
           <h3>Semester (Perulangan while)</h3>
           <ol>
             <?php
             $nomorSemester = 1;
             while ($nomorSemester <= 3) {
                 echo "<li>Semester " . $nomorSemester . "</li>";
                 $nomorSemester++; // operator penugasan
             }
             ?>
           </ol>
         </article>
       </section>
       <section id="contact">
         <h2>KONTAK</h2>
         <?php if ($pesanKesalahan !== ''): ?>
<p class="form-feedback-error">
<?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?>
</p>
<?php
unset(
$_SESSION['pesanKesalahan']
);
?>
<?php endif; ?>

<p>
Kunjungi
<a target="_blank" href="https:
         <p>Wa/Telepon: 085758802612</p>
         <p>Email: 2622500021@mahasiswa.atmaluhur.ac.id</p>
         <p>
           Kunjungi
           <a target="_blankrel="noopener noreferrer"
             href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
         </p>
         <form id="contactForm" action="index.php" method="post" novalidate>
           <div class="form-group">
             <label for="nama">Nama Lengkap</label>
             <input
               class="input-form"
               type="text"
               id="nama"
               name="nama"
               placeholder="Masukkan nama lengkap Anda"
               minlength="3"
               maxlength="50"
               required />
           </div>
           <div class="form-group">
             <label for="email">Email</label>
             <input
               class="input-form"
               type="email"
               id="email"
               name="email"
               placeholder="nama@email.com"
               required />
           </div>
           <div class="form-group">
             <label for="semester">Semester</label>
             <input
               class="input-form"
               type="number"
               id="semester"
               name="semester"
               min="1"
               max="8"
               required />
           </div>
           <div class="form-group">
             <label for="tanggal">Tanggal Kunjungan</label>
             <input
               class="input-form"
               type="date"
               id="tanggal"
               name="tanggal"
               required />
           </div>
           <fieldset class="form-group">
             <legend>Jenis Pesan</legend>
             <input
               type="radio"
               id="pertanyaan"
               name="jenis_pesan"
               value="pertanyaan"
               required />
             <label for="pertanyaan">Pertanyaan</label>
             <input
               type="radio"
               id="saran"
               name="jenis_pesan"
               value="saran" />
             <label for="saran">Saran</label>
           </fieldset>
           <fieldset class="form-group">
             <legend>Topik yang Diminati</legend>
             <input
               type="checkbox"
               id="minat-html"
               name="minat"
               value="HTML" />
             <label for="minat-html">HTML</label>
             <input
               type="checkbox"
               id="minat-css"
               name="minat"
               value="CSS" />
             <label for="minat-css">CSS</label>
           </fieldset>
           <div class="form-group">
             <label for="prodi">Program Studi</label>
             <select class="input-form" id="prodi" name="prodi" required>
               <option value="">-- Pilih Program Studi --</option>
               <option value="SI">Sistem Informasi</option>
               <option value="TI">Teknik Informatika</option>
               <option value="BD">Bisnis Digital</option>
             </select>
           </div>
           <div class="form-group">
             <label for="pesan">Pesan</label>
             <textarea
               class="input-form"
               id="pesan"
               name="pesan"
               maxlength="300"
               placeholder="Tulis pesan Anda"
               required></textarea>
           </div>
           <p id="formFeedback" aria-live="polite"></p>
           <button type="submit">Kirim</button>
           <button type="reset">Batal</button>
         </form>
<?php if (!empty($nama)): ?>
   <h3>Data yang Diterima Peladen</h3>
   <p>Nama:
  <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>
  </p>
  <p>Email:
  <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>
  </p>
  <p>Semester:
  <?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?>
  </p>
  <p>Tanggal kunjungan:
   <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?>
   </p>
   <p>Jenis pesan:
   <?= htmlspecialchars($jenisPesan, ENT_QUOTES, 'UTF-8') ?>
   </p>
   <p>Program studi:
   <?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?>
   </p>
   <p>Minat:</p>
   <?php if (is_array($minat) && count($minat) > 0): ?>
   <ul>
   <?php foreach ($minat as $topik): ?>
   <li>
   <?= htmlspecialchars((string) $topik, ENT_QUOTES, 'UTF-8') ?>
   </li>
   <?php endforeach; ?>
   </ul>
   <?php else: ?>
   <p>Tidak ada minat yang dipilih.</p>
<?php endif; ?>
<p>Pesan:</p>
<p><?= nl2br(htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8')) ?></p>
<?php endif; ?>


       </section>
     </main>
     <footer>
       <p>&copy; <?= date("Y") ?> <?= $namaMahasiswa ?> [<?= $nim ?>]</p>
     </footer>
     <script src="script.js"></script>
   </body>
 </html>