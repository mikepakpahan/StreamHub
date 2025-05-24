<?php
include 'config.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $sinopsis = $_POST['sinopsis'];
    $urlTrailer = $_POST['urlTrailer'];
    $urlThumbnail = $_POST['urlThumbnail'];

    $sql = "INSERT INTO movies (title, year, synopsis, video_path, thumbnail)
            VALUES ('$judul', '$tahun', '$sinopsis', '$urlTrailer', '$urlThumbnail')";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Mengirim respon sukses
    } else {
        echo "error"; // Jika ada kesalahan
    }
} else {
    echo "error"; // Jika request tidak valid
}

$conn->close();
?>
