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

// Query untuk membuat tabel film
$sql = "CREATE TABLE IF NOT EXISTS film (
  id INT PRIMARY KEY,
  title VARCHAR(255),
  image VARCHAR(255),
  rating INT,
  description TEXT,
  genre VARCHAR(255),
  durasi INT,
  sutradara VARCHAR(255),
  pemain VARCHAR(255),
  tahun INT
)";

// Jalankan query



// Query untuk menampilkan data dari tabel film
$sql = "SELECT * FROM film";

// Jalankan query
$result = $conn->query($sql);

// Tampilkan data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='latest-movie'>";
        echo "<img src='images/" . $row['image'] . "' alt='" . $row['title'] . "'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>Rating: " . $row['rating'] . "/10</p>";
        echo "</div>";
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
        <div class="movie-grid">
            <div class="movie-card" onclick="openMoviePage('detail_film_1')">
                <div class="movie-image">
                    <img src="images/starwars jeddi.jpg" alt="Star Wars: The Last Jedi">
                </div>
                <div class="movie-content">
                    <h2>Star Wars: The Last Jedi</h2>
                    <div class="rating">★★★★☆</div>
                    <p>Film petualangan epik tentang pertempuran galaksi yang mengagumkan.</p>
                </div>
            </div>
            
            <div class="movie-card" onclick="openMoviePage('detail_film_2')">
                <div class="movie-image">
                    <img src="images/avengers-endgame.jpg" alt="Avengers: Endgame">
                </div>
                <div class="movie-content">
                    <h2>Avengers: Endgame</h2>
                    <div class="rating">★★★★★</div>
                    <p>Kisah akhir dari pertarungan Avengers untuk menyelamatkan dunia.</p>
                </div>
            </div>
            
            <div class="movie-card" onclick="openMoviePage('detail_film_3')">
                <div class="movie-image">
                    <img src="images/nun.jpeg" alt="The Nun">
                </div>
                <div class="movie-content">
                    <h2>The Nun</h2>
                    <div class="rating">★★★★☆</div>
                    <p>Film horor yang menegangkan tentang rahasia kelam gereja.</p>
                </div>
            </div>

            </div>
        <div class="movie-grid">
            <div class="movie-card" onclick="openMoviePage('detail_film_4')">
                <div class="movie-image">
                    <img src="images/007 nt.jpg" alt="James Bond 007: No Time To Die">
                </div>
                <div class="movie-content">
                    <h2>James Bond 007: No Time To Die</h2>
                    <div class="rating">★★★★☆</div>
                    <p> Film ini bercerita tentang James Bond yang telah pensiun dari MI6 dan hidup bahagia bersama kekasihnya, Madeleine Swann. Namun, kebahagiaan mereka terganggu ketika anggota Spectre mengincar nyawa Bond.</p>
                </div>
            </div>
            
            <div class="movie-card" onclick="openMoviePage('detail_film_5')">
                <div class="movie-image">
                    <img src="images/ff9.jpg" alt="Fast and Furious 9">
                </div>
                <div class="movie-content">
                    <h2>Fast and Furious 9</h2>
                    <div class="rating">★★★★★</div>
                    <p>Film ini menceritakan tentang Dom yang kini hidup tenang bersama Letty dan anaknya.</p>
                </div>
            </div>
            
            <div class="movie-card" onclick="openMoviePage('detail_film_6')">
                <div class="movie-image">
                    <img src="images/dilan 1990.jpeg" alt="Dilan 1990">
                </div>
                <div class="movie-content">
                    <h2>Dilan 1990</h2>
                    <div class="rating">★★★★☆</div>
                    <p>Film Dilan 1990 menceritakan tentang kisah cinta remaja di era 1990-an antara Milea dan Dilan.</p>
                </div>
            </div>
        </div>
        </div ```php
    </main>
    
    <footer>
        <p>&copy; 2025 CINEVERSE. All rights reserved.</p>
    </footer>
</body>
</html>