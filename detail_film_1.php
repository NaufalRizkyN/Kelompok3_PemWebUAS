<?php
// Konfigurasi database
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

// Query untuk mendapatkan data film
$sql = "SELECT * FROM film WHERE id = 1";
$result = $conn->query($sql);

// Tampilkan data film
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='movie-detail'>";
        echo "<div class='movie-header'>";
        echo "<div class='movie-poster'>";
        echo "<img src='images/" . $row['image'] . "' alt='" . $row['title'] . "'>";
        echo "</div>";
        echo "<div class='movie-info'>";
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<div class='rating'>" . $row['rating'] . "/10</div>";
        echo "<div class='movie-meta'>";
        echo "<p><strong>Genre:</strong> " . $row['genre'] . "</p>";
        echo "<p><strong>Durasi:</strong> " . $row['durasi'] . "</p>";
        echo "<p><strong>Sutradara:</strong> " . $row['sutradara'] . "</p>";
        echo "<p><strong>Pemain:</strong> " . $row['pemain'] . "</p>";
        echo "<p><strong>Tahun:</strong> " . $row['tahun'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='movie-synopsis'>";
        echo "<h2>Sinopsis</h2>";
        echo "<p>" . $row['sinopsis'] . "</p>";
        echo "</div>";
        echo "<div class='movie-review'>";
        echo "<h2>Review</h2>";
        echo "<div class='review-content'>";
        echo "<p>" . $row['review'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "0 results";
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
        <div class="movie-detail">
            <div class="movie-header">
                <div class="movie-poster">
                    <img src="images/starwars jeddi.jpg" alt="Petualangan Hebat Poster"> <!-- Jalur diperbaiki -->
                </div>
                <div class="movie-info">
                    <h1>Star Wars: The Last Jedi</h1>
                    <div class="rating">★★★★☆ 4.9/5</div>
                    <div class="movie-meta">
                        <p><strong>Genre:</strong> Laga, Fiksi Ilmiah</p>
                        <p><strong>Durasi:</strong> 2 jam 32 menit</p>
                        <p><strong>Sutradara:</strong> John Doe</p>
                        <p><strong>Pemain:</strong> Daisy Ridley, Mark Hamill, John Boyega</p>
                        <p><strong>Tahun:</strong> 2017</p>
                    </div>
                </div>
            </div>

            <div class="movie-synopsis">
                <h2>Sinopsis</h2>
                <p>Star Wars: The Last Jedi merupakan lanjutan dari perjalanan tokoh utama, Rey yang dikirim dalam misi untuk menemukan Luke di Acht-To, tempat kuil Jedi pertama kali didirikan. Sang sutradara, Rian Johnson kembali membawa karakter baru seperti Poe, Fin, BB-8, dan karakter legendaris seperti Luke Skywalker dan Leia Organa ke tingkat selanjutnya.</p>
            </div>

            <div class="movie-review">
                <h2>Review</h2>
                <div class="review-content">
                    <p>Film ini memecah pendapat penggemar dengan pendekatan naratifnya yang berani. Sutradara Rian Johnson mengeksplorasi tema warisan, kegagalan, dan perubahan dalam dunia Jedi, membawa karakter seperti Luke Skywalker dan Rey ke arah yang tak terduga. Visual filmnya memukau, terutama dalam adegan pertarungan besar, namun beberapa subplot, seperti petualangan Finn dan Rose, terasa kurang relevan. Meskipun mendapat pujian karena keberaniannya mengambil risiko, banyak penggemar merasa film ini terlalu jauh dari formula klasik Star Wars.</p>
                    
                    <h3>Kelebihan:</h3>
                    <ul>
                        <li>Cinematografi dan efek visual yang memukau.</li>
                        <li>Adegan Action yang intens dan inovatif.</li>
                        <li>Memberikan cerita baru yang menarik.</li>
                    </ul>

                    <h3>Kekurangan:</h3>
                    <ul>
                        <li>Subplot Finn dan Rose yang terasa tidak relevan.</li>
                        <li>Perubahan karakter Luke yang mengecewakan sebagian penggemar.</li>
                        <li>Penggunaan humor yang terasa dipaksakan di beberapa momen.</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2024 FilmKita. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>
