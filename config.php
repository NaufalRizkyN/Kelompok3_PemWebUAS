<?php
// Konfigurasi database
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "cineverse";

// Fungsi untuk membuat koneksi
function getConnection() {
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>