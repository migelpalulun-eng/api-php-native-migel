<?php
// muat file database.php secara manual
require_once __DIR__ . '/../config/database.php';

use Config\Database;

// buat objek database dan cek koneksi
$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "Koneksi database berhasil!";
} else {
    echo "Koneksi gagal!";
}
?>