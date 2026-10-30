<?php
// P6 - Pemrograman Web Dasar - Liristiari [2622500021]
// SI1A - ISB Atma Luhur - Mentok, Bangka Barat

// Data pribadi
$nim = "2622500021";
$namaMahasiswa = "Liristiari";
$namaPanggilan = "Riris";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.82;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "2622500021-art";

// Hitung sisa semester
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Keterangan semester
if ($semester < 3) {
    $keteranganSemester = "Semester awal - masih adaptasi";
} elseif ($semester <= 6) {
    $keteranganSemester = "Semester menengah";
} else {
    $keteranganSemester = "Semester akhir";
}

// Prodi dengan ternary
$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : "Teknik Informatika";

// Fokus prodi
switch ($programStudi) {
    case "SI":
        $fokusProgramStudi = "Sistem informasi dan proses bisnis digital";
        break;
    case "TI":
        $fokusProgramStudi = "Komputasi dan pengembangan software";
        break;
    default:
        $fokusProgramStudi = "Belum ditentukan";
}
$teksStatus = $statusAktif ? "Aktif" : "Tidak aktif";
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Saya - Liristiari</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <div class="header-top">
      <h1>PROFIL SAYA</h1>
      <button class="nav-toggle" id="navToggle" type="button" aria-label="Buka navigasi" aria-controls="navMenu" aria-expanded="false">&#9776;</button>
    </div>
    <nav><ul id="navMenu"><li><a href="#home">Beranda</a></li><li><a href="#about">Tentang</a></li><li><a href="#contact">Kontak</a></li></ul></nav>
  </header>
  <main>
    <section id="home">
      <h2>Halo! Selamat Datang 😊</h2>
      <p>Hai, saya <strong><?= $namaMahasiswa ?></strong> biasa dipanggil <strong><?= $namaPanggilan ?></strong>. Asal saya dari Kecamatan Mentok, Kabupaten Bangka Barat.</p>
      <p>Saya mahasiswi semester <?= $semester ?> di <strong>ISB Atma Luhur</strong>, sedang belajar <strong><?= NAMA_MATA_KULIAH ?></strong> tahun akademik <?= $tahunAkademik ?>.</p>
      <div class="bingkai-foto"><img src="../Foto.jpeg" alt="Foto Profil Liristiari" width="200"></div>
    </section>
    <section id="about">
      <h2>TENTANG SAYA</h2>
      <article>
        <h3>Profil Singkat</h3>
        <p>NIM: <?= $nim ?></p>
        <p>Nama: <?= $namaMahasiswa ?> (<?= $namaPanggilan ?>)</p>
        <p>Program Studi: <?= $namaProdi ?> (<?= $programStudi ?>)</p>
        <p>Semester: <?= $semester ?> (<?= $keteranganSemester ?>)</p>
        <p>Sisa semester: <?= $sisaSemester ?> semester lagi</p>
        <p>Status: <?= $teksStatus ?> - <?= $statusSemester ?></p>
        <p>Fokus: <?= $fokusProgramStudi ?></p>
        <p>IPK: <?= number_format($ipk, 2, ',', '.') ?></p>
        <p>Catatan: <?= $catatanTambahan === null ? "Setiap hari adalah kesempatan untuk belajar dan tumbuh." : $catatanTambahan ?></p>

        <h3>Target Belajar (for)</h3>
        <ol>
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "<li>Target ke-" . $i . ": ";
            switch ($i) {
                case 1: echo "Paham dasar HTML, CSS, JavaScript & PHP."; break;
                case 2: echo "Bisa bikin form yang rapi dan terstruktur."; break;
                case 3: echo "Paham validasi client & server side."; break;
                case 4: echo "Mampu buat web profil pribadi yang dinamis."; break;
                default: echo "Terus belajar dan tumbuh."; break;
            }
            echo "</li>";
        }
        ?>
        </ol>

        <h3>Perjalanan Semester (while)</h3>
        <ol>
        <?php
        $no = 1;
        while ($no <= 3) {
            echo "<li>Semester " . $no . " - Belajar dengan semangat</li>";
            $no++;
        }
        ?>
        </ol>

        <h3>Hobi</h3><ol><li>Membaca buku novel</li><li>Memasak</li></ol>
      </article>
    </section>
    <section id="contact">
      <h2>KONTAK</h2>
      <p>WA: 085758802612 | Email: 2622500021@mahasiswa.atmaluhur.ac.id</p>
      <p>Github: <a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">github.com/<?= PROFIL_GITHUB ?></a></p>

      <form id="contactForm" action="index.php" method="get" novalidate>
        <div class="form-group"><label for="nama">Nama Lengkap</label><input class="input-form" type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" minlength="3" maxlength="50" required /></div>
        <div class="form-group"><label for="email">Email</label><input class="input-form" type="email" id="email" name="email" required /></div>
        <div class="form-group"><label for="semester">Semester</label><input class="input-form" type="number" id="semester" name="semester" min="1" max="8" required /></div>
        <div class="form-group"><label for="tanggal">Tanggal Kunjungan</label><input class="input-form" type="date" id="tanggal" name="tanggal" required /></div>
        <fieldset class="form-group"><legend>Jenis Pesan</legend><input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required /><label for="pertanyaan">Pertanyaan</label><input type="radio" id="saran" name="jenis_pesan" value="saran" /><label for="saran">Saran</label></fieldset>
        <fieldset class="form-group"><legend>Topik Diminati</legend><input type="checkbox" id="minat-html" name="minat" value="HTML" /><label for="minat-html">HTML</label><input type="checkbox" id="minat-css" name="minat" value="CSS" /><label for="minat-css">CSS</label></fieldset>
        <div class="form-group"><label for="prodi">Program Studi</label><select class="input-form" id="prodi" name="prodi" required><option value="">-- Pilih --</option><option value="SI">Sistem Informasi</option><option value="TI">Teknik Informatika</option><option value="BD">Bisnis Digital</option></select></div>
        <div class="form-group"><label for="pesan">Pesan</label><textarea class="input-form" id="pesan" name="pesan" maxlength="300" required></textarea></div>
        <button type="submit">Kirim</button><button type="reset">Batal</button>
      </form>
    </section>
  </main>
  <footer><p>&copy; <?= date("Y") ?> <?= $namaMahasiswa ?> [<?= $nim ?>] - Mentok</p></footer>
  <script src="script.js"></script>
</body>
</html>