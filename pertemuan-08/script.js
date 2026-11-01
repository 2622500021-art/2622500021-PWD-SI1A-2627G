const form = document.getElementById('loginForm');
const pesan = document.getElementById('pesan');

form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const user = document.getElementById('username').value;
    const pass = document.getElementById('password').value;
    
    if (user === "Lirismart" && pass === "belanjamurah") {
        pesan.textContent = "✅ Login berhasil! Selamat datang, " + user;
        pesan.style.color = "green";
        // Arahkan ke halaman utama setelah login berhasil
        setTimeout(function() {
            window.location.href = "index.php";
        }, 1000);
    } else {
        pesan.textContent = "❌ Username atau Password salah!";
        pesan.style.color = "red";
    }
});