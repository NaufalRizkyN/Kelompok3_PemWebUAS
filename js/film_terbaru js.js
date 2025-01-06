// Data film
const movies = [
    {
        title: "Venom : The Last Dance",
        image: "images/Venom The last dance.jpeg",
        description: "Bercerita tentang Eddie Brock dan Venom yang harus menghadapi ancaman baru yang lebih kuat.",
        rating: 4.5,
        category: "action",
        director: "Andy Serkis",
        cast: ["Tom Hardy", "Michelle Williams"],
        releaseDate: "2024-01-10"
    },
    {
        title: "Bolehkah Sekali Saja Ku Menangis",
        image: "images/bolehhh.jpeg",
        description: "Mengisahkan tentang perjuangan Tari, seorang perempuan muda yang harus menghadapi trauma masa lalu akibat kekerasan dalam rumah tangga.",
        rating: 4.0,
        category: "drama",
        director: "Hanung Bramantyo",
        cast: ["Adinia Wirasti", "Chicco Jerikho"],
        releaseDate: "2024-02-14"
    },
    {
        title: "Kuasa Gelap",
        image: "images/Kuasa.jpeg",
        description: "Film horor eksorsisme pertama di Indonesia yang berlatar belakang agama Katolik.",
        rating: 4.7,
        category: "horror",
        director: "Joko Anwar",
        cast: ["Tara Basro", "Ario Bayu"],
        releaseDate: "2024-03-18"
    },
    {
        title: "Tebusan Dosa",
        image: "images/Tebusan.jpeg",
        description: "Film horor yang bercerita tentang seorang ibu bernama Wening yang mengalami kecelakaan motor dan kehilangan anaknya.",
        rating: 4.0,
        category: "horror",
        director: "Kimo Stamboel",
        cast: ["Christine Hakim", "Reza Rahadian"],
        releaseDate: "2024-04-22"
    },
    {
        title: "The Wild Robot",
        image: "images/the wild.jpeg",
        description: "Film animasi bergenre sci-fi yang menceritakan tentang petualangan robot Roz yang terdampar di pulau tak berpenghuni.",
        rating: 5.0,
        category: "animation",
        director: "Brad Bird",
        cast: ["Emma Stone", "John Krasinski"],
        releaseDate: "2024-05-30"
    },
    {
        title: "Weekend In Taipei",
        image: "images/Weekend.jpeg",
        description: "Berkisah tentang John Lawlor, mantan agen rahasia DEA yang sedang menyamar dalam misi mengejar kartel narkoba di Taiwan.",
        rating: 3.8,
        category: "action",
        director: "Ang Lee",
        cast: ["Leonardo DiCaprio", "Ziyi Zhang"],
        releaseDate: "2024-06-12"
    }
];

// Fungsi untuk mencari film
function searchMovies() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    // Filter film berdasarkan kata kunci pencarian
    currentMovies = movies.filter(movie => {
        return movie.title.toLowerCase().includes(searchTerm) ||
               movie.description.toLowerCase().includes(searchTerm) ||
               movie.director.toLowerCase().includes(searchTerm) ||
               movie.cast.some(actor => actor.toLowerCase().includes(searchTerm));
    });

    // Tampilkan pesan jika tidak ada hasil
    const noResultsElement = document.getElementById('noResults');
    if (currentMovies.length === 0) {
        noResultsElement.style.display = 'block';
    } else {
        noResultsElement.style.display = 'none';
    }

    displayMovies(currentMovies);
}

// Fungsi untuk filter film berdasarkan kategori
function filterMovies(category) {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    if (category === 'all') {
        currentMovies = searchTerm ? 
            movies.filter(movie => 
                movie.title.toLowerCase().includes(searchTerm) ||
                movie.description.toLowerCase().includes(searchTerm)
            ) : [...movies];
    } else {
        currentMovies = movies.filter(movie => {
            const categoryMatch = movie.category === category;
            const searchMatch = searchTerm ? 
                movie.title.toLowerCase().includes(searchTerm) ||
                movie.description.toLowerCase().includes(searchTerm) : true;
            return categoryMatch && searchMatch;
        });
    }

    // Tampilkan pesan jika tidak ada hasil
    const noResultsElement = document.getElementById('noResults');
    if (currentMovies.length === 0) {
        noResultsElement.style.display = 'block';
    } else {
        noResultsElement.style.display = 'none';
    }

    displayMovies(currentMovies);
}

// Fungsi untuk menampilkan film
function displayMovies(moviesToShow) {
    const movieGrid = document.getElementById('movieGrid');
    movieGrid.innerHTML = '';

    moviesToShow.forEach(movie => {
        const movieCard = `
            <div class="movie-card">
                <img src="${movie.image}" alt="${movie.title}" class="movie-image">
                <div class="movie-info">
                    <h3 class="movie-title">${movie.title}</h3>
                    <p class="movie-description">${movie.description}</p>
                    <p class="rating">Rating: ${movie.rating}/5</p>
                    <p class="director">Director: ${movie.director}</p>
                    <p class="cast">Cast: ${movie.cast.join(', ')}</p>
                    <p class="release-date">Release Date: ${movie.releaseDate}</p>
                </div>
            </div>
        `;
        movieGrid.innerHTML += movieCard;
    });
}

// Initialize the page
window.onload = () => {
    displayMovies(movies);
};
