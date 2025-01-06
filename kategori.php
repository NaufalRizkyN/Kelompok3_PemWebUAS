<?php
// Koneksi ke database
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "cineverse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk membuat tabel kategori
$sql = "CREATE TABLE IF NOT EXISTS kategori (
  id INT PRIMARY KEY,
  kategori VARCHAR(255)
)";

// Jalankan query


// Query untuk menampilkan data dari tabel kategori
$sql = "SELECT * FROM kategori";

// Jalankan query
$result = $conn->query($sql);

// Tampilkan data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<a href='#' class='category-card'>";
        echo "<span>" . $row['kategori'] . "</span>";
        echo "</a>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEVERSE</title>
    <link rel="stylesheet" href="css/kategori.css"> 
    <link rel="stylesheet" href="css/index_css.css">
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
        <h2 class="category-title">Kategori Film</h2>
        <div class="category-grid">
            <a href="#" class="category-card">
                <span>Action</span>
            </a>
            <a href="#" class="category-card">
                <span>Comedy</span>
            </a>
            <a href="#" class="category-card">
                <span>Drama</span>
            </a>
            <a href="#" class="category-card">
                <span>Horror</span>
            </a>
            <a href="#" class="category-card">
                <span>Romance</span>
            </a>
            <a href="#" class="category-card">
                <span>Sci-Fi</span>
            </a>
        </div>
    </main>

    <footer>
        <p>© 2024 CINEVERSE. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>