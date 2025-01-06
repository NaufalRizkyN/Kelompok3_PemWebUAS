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
$sql = "SELECT * FROM film";
$result = $conn->query($sql);

// Tampilkan data film
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='movie-card'>";
        echo "<img src='images/" . $row['image'] . "' alt='" . $row['title'] . "'>";
        echo "<div class='movie-info'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<div class='rating'>" . $row['rating'] . "/10</div>";
        echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
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
    <link rel="stylesheet" href="css/top_rating.css">
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
    
    <body>
        <header class="header">
            <h1>Top Rating Film</h1>
            <div class="header-search">
                <input type="text" id="searchInput" placeholder="Cari film...">
                <button onclick="searchMovies()">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </header>
    
        <main class="container">
            <div class="filters">
                <select id="genreFilter" onchange="filterMovies()">
                    <option value="all">Semua Genre</option>
                    <option value="action">Aksi</option>
                    <option value="drama">Drama</option>
                    <option value="comedy">Komedi</option>
                    <option value="horror">Horor</option>
                </select>
                <select id="yearFilter" onchange="filterMovies()">
                    <option value="all">Semua Tahun</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
                <select id="ratingSort" onchange="sortMovies()">
                    <option value="highest">Rating Tertinggi</option>
                    <option value="lowest">Rating Terendah</option>
                </select>
            </div>
    
            <div class="top-movies">
                <div class="featured-movie" id="featuredMovie">
                </div>
    
                <div class="movie-list" id="movieList">
                    <!-- Movie list will be populated here -->
                </div>
            </div>
    
            <div class="pagination" id="pagination">
                <!-- Pagination will be added here -->
            </div>
        </main>
    
        <script src="js/top_rating js.js"></script>
        <footer>
            <p>&copy; 2024 CINEVERSE. Hak Cipta Dilindungi.</p>
        </footer>
<script>
const movies = [
    {
        id: 1,
        title: "Spider-Man: No Way Home",
        image: "images/Spiderman.jpg",
        rating: 9.3,
        year: 2021,
        genre: "action",
        description: "Bercerita tentang Peter Parker yang membuka multiverse saat meminta bantuan Doctor Strange untuk membuat dunia melupakan identitasnya. Musuh lama dari film Spider-Man sebelumnya muncul, dan Spider-Man dari versi Tobey Maguire dan Andrew Garfield bergabung untuk melawannya. Film ini penuh aksi, kejutan, dan momen nostalgia..",
        director: "Jon Watts",
        cast: ["Tom Holland, Zendaya, Benedict Cumberbatch, Jamie Foxx, Tobey Maguire, and Andrew Garfield."]
    },
    {
        id: 2,
        title: "The Dark Knight",
        image: "images/ce10fb2e34e11afaa79ef6bf7f365f1f.jpg",
        rating: 9.0,
        year: 2023,
        genre: "action",
        description: "Batman menghadapi musuh terbesarnya, The Joker, dalam pertarungan untuk menyelamatkan Gotham City.",
        director: "Christopher Nolan",
        cast: ["Christian Bale", "Heath Ledger"]
    },
    {
        id: 3,
        title: "Pulp Fiction",
        image: "images/cc5c6098b749a51a94b371210fd9162b.jpg",
        rating: 9.2,
        year: 1994,
        genre: "crime",
        description: "Cerita yang saling terkait tentang kejahatan di Los Angeles.",
        director: "Quentin Tarantino",
        cast: ["John Travolta", "Uma Thurman"]
    },
    {
        id: 4,
        title: "The Godfather",
        image: "images/510L5ypQBdL._AC_UF894,1000_QL80_.jpg",
        rating: 9.2,
        year: 2022,
        genre: "drama",
        description: "Saga keluarga mafia Italia-Amerika yang legendaris.",
        director: "Francis Ford Coppola",
        cast: ["Marlon Brando", "Al Pacino"]
    },
    {
        id: 5,
        title: "Harry Potter and the Deathly Hallows: Part 2",
        image: "images/Harry potta.jpg",
        rating: 9.0,
        year: 2011,
        genre: "action",
        description: "*Harry Potter and the Deathly Hallows: Part 2* (2011) mengakhiri seri dengan pertempuran final antara Harry dan Voldemort di Hogwarts..",
        director: "David Yates",
        cast: ["Daniel Radcliffe, Emma Watson, Rupert Grint"]
    }
];
</script>
    </body>
    </html>