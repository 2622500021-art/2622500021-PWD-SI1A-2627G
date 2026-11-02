<?php
// Halaman Registrasi - Liris Mart
$pesan = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    
    $pesan = "<p class='sukses'>✅ Terima kasih <strong>$nama</strong>! Registrasi berhasil. Silakan tunggu informasi selanjutnya melalui email/WhatsApp.</p>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Liris Mart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="image/logo.jpeg" alt="Logo Liris Mart" class="logo">
        <div class="info-toko">
            <h1>Liris Mart</h1>
            <p>Sembako Murah & Bahagia</p>
        </div>
    </header>

    <div class="wrapper">
        <nav>
            <h3>Menu</h3>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="profil.toko.php">Profil Toko</a></li>
                <li><a href="Registrasi.php" class="aktif">Registrasi</a></li>
                <li><a href="Daftar-Produk.php">Daftar Produk</a></li>
                <li><a href="Kontak.php">Kontak</a></li>
            </ul>
        </nav>

        <main>
            <h2>Formulir Registrasi Anggota</h2>
            <p>Silakan isi data di bawah ini untuk menjadi anggota Liris Mart. Dapatkan promo khusus anggota!</p>

            <div class="form-container">
                <?php echo $pesan; ?>
                
                <form method="POST" action="Registrasi.php">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor WhatsApp / Telepon</label>
                        <input type="tel" id="telepon" name="telepon" placeholder="08xx-xxxx-xxxx" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap..." required></textarea>
                    </div>

                    <button type="submit">Kirim Pendaftaran</button>
                </form>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2622500021_Sembako Liris Mart_S1A_UTS Pemrograman Web Dasar</p>
    </footer>
</body>
</html>