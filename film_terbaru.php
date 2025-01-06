<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEVERSE</title>
    <link rel="stylesheet" href="css/index_css.css">
    <link rel="stylesheet" href="css/film_terbaru.css">
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
            <h1>Film Terbaru</h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Cari film...">
                <button onclick="searchMovies()">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </header>

    <div class="container">
        <div class="filter-section">
            <button class="filter-button" onclick="filterMovies('all')">Semua</button>
            <button class="filter-button" onclick="filterMovies('action')">Aksi</button>
            <button class="filter-button" onclick="filterMovies('drama')">Drama</button>
            <button class="filter-button" onclick="filterMovies('animation')">Animasi</button>
            <button class="filter-button" onclick="filterMovies('horror')">Horror</button>
        </div>

        <div class="movie-grid" id="movieGrid">
            <!-- Film akan ditambahkan secara dinamis menggunakan JavaScript -->
        </div>
    </div>

    <footer>
        <p>&copy; 2024 CINEVERSE. Hak Cipta Dilindungi.</p>
    </footer>

    <script>
        // Data film
        const movies = [
            {
                title: "Venom : The Last Dance",
                image: "images/Venom The last dance.jpeg", // Jalur gambar diperbaiki
                description: "Bercerita tentang Eddie Brock dan Venom yang harus menghadapi ancaman baru yang lebih kuat.",
                rating: 4.5,
                category: "action"
            },
            {
                title: "Bolehkah Sekali Saja Ku Menangis",
                image: "images/bolehhh.jpeg", // Jalur gambar diperbaiki
                description: "Mengisahkan tentang perjuangan Tari, seorang perempuan muda yang harus menghadapi trauma masa lalu akibat kekerasan dalam rumah tangga.",
                rating: 4.0,
                category: "drama"
            },
            {
                title: "Kuasa Gelap",
                image: "images/Kuasa.jpeg", // Jalur gambar diperbaiki
                description: "Film horor eksorsisme pertama di Indonesia yang berlatar belakang agama Katolik.",
                rating: 4.7,
                category: "horror"
            },
            {
                title: "Tebusan Dosa",
                image: "images/Tebusan.jpeg", // Jalur gambar diperbaiki
                description: "Film horor yang bercerita tentang seorang ibu bernama Wening yang mengalami kecelakaan motor dan kehilangan anaknya.",
                rating: 4.0,
                category: "horror"
            },
            {
                title: "The Wild Robot",
                image: "images/the wild.jpeg", // Jalur gambar diperbaiki
                description: "Film animasi bergenre sci-fi yang menceritakan tentang petualangan robot Roz yang terdampar di pulau tak berpenghuni.",
                rating: 5.0,
                category: "animation"
            },
            {
                title: "Weekend In Taipei",
                image: "images/Weekend.jpeg", // Jalur gambar diperbaiki
                description: "Berkisah tentang John Lawlor, mantan agen rahasia DEA yang sedang menyamar dalam misi mengejar kartel narkoba di Taiwan.",
                rating: 3.8,
                category: "action"
            }
        ];

        // Fungsi untuk menampilkan film
        function displayMovies(filteredMovies) {
            const movieGrid = document.getElementById('movieGrid');
            movieGrid.innerHTML = '';

            filteredMovies.forEach(movie => {
                const movieCard = `
                    <div class="movie-card">
                        <img src="${movie.image}" alt="${movie.title}" class="movie-image">
                        <div class="movie-info">
                            <h3 class="movie-title">${movie.title}</h3>
                            <p class="movie-description">${movie.description}</p>
                            <p class="rating">Rating: ${movie.rating}/5</p>
                        </div>
                    </div>
                `;
                movieGrid.innerHTML += movieCard;
            });
        }

        // Fungsi untuk filter film
        function filterMovies(category) {
            if (category === 'all') {
                displayMovies(movies);
            } else {
                const filteredMovies = movies.filter(movie => movie.category === category);
                displayMovies(filteredMovies);
            }
        }

        // Menampilkan semua film saat halaman dimuat
        window.onload = () => {
            displayMovies(movies);
        };       
    </script><script src="js/film_terbaru js.js"></script>
</body>
</html>