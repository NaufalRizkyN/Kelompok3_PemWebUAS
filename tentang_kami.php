<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cineverse";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah tabel kritik_saran sudah ada
$table_check = $conn->query("SHOW TABLES LIKE 'kritik_saran'");
if ($table_check->num_rows == 0) {
    // Jika tabel belum ada, buat tabel
    $create_table_sql = "CREATE TABLE kritik_saran (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        kategori VARCHAR(50) NOT NULL,
        pesan TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($create_table_sql) === TRUE) {
        echo "<script>alert('Tabel kritik_saran berhasil dibuat!');</script>";
    } else {
        die("Error membuat tabel: " . $conn->error);
    }
}

// Fungsi untuk menyimpan data kritik saran
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kategori = $_POST['kategori'];
    $pesan = $_POST['pesan'];

    // Query untuk menyimpan data ke tabel kritik_saran
    $sql = "INSERT INTO kritik_saran (nama, email, kategori, pesan) VALUES ('$nama', '$email', '$kategori', '$pesan')";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Kritik dan saran berhasil dikirim!');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - CINEVERSE</title>
    <link rel="stylesheet" href="css/tentang_kami.css">
</head>
<body>
    <header>
        <h1>CINEVERSE</h1>
        <p>Review Film Jujur dan Tanpa Basa-Basi</p>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php" class="nav-btn">Beranda</a></li>
            <li><a href="film_terbaru.php" class="nav-btn">Film Terbaru</a></li>
            <li><a href="top_rating.php" class="nav-btn">Top Rating</a></li>
            <li><a href="kategori.php" class="nav-btn">Kategori</a></li>
            <li><a href="tentang_kami.php" class="nav-btn">Tentang Kami</a></li>
        </ul>
    </nav>
    
    <main>
        <div class="about-content">
            <h2>Tentang Cineverse</h2>
            <h3>Visi Kami</h3>
            <p>Menjadi sumber informasi utama dan terpercaya bagi para pecinta film dengan menyediakan konten yang up-to-date dan menyeluruh mengenai berbagai film dari seluruh dunia.</p>
            
            <h3>Misi Kami</h3>
            <ul>
                <li>Menyajikan ulasan yang jujur dan mendalam tentang berbagai film.</li>
                <li>Menyediakan sinopsis, trailer, dan rating dari sumber yang beragam untuk membantu pengguna.</li>
                <li>Menjaga konten tetap up-to-date dengan rilis film terbaru.</li>
            </ul>
        </div>

        <div class="feedback-section">
            <h2>Kritik dan Saran</h2>
            <p>Kami sangat menghargai masukan dari Anda untuk meningkatkan kualitas layanan kami.</p>
            
            <form id="feedbackForm" class="feedback-form" method="POST" action="">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required placeholder="Masukkan nama Anda">
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">
    </div>
    
    <div class="form-group">
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="">Pilih kategori</option>
            <option value="kritik">Kritik</option>
            <option value="saran">Saran</option>
            <option value="komentar">Komentar</option>
            <option value="lainnya">Lainnya</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" required placeholder="Tuliskan pesan Anda di sini"></textarea>
    </div>
    
    <button type="submit" name="submit" class="submit-btn">Kirim Masukan</button>
        </form>
    </div>
    </main>
    
    <footer>
        <p>&copy; 2024 FilmKita. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>