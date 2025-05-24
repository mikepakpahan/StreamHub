<?php
include 'config.php'; // Sambungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Validasi ID sebagai angka

    $sql = "DELETE FROM feedback WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Kirimkan respon sukses
    } else {
        echo "error"; // Kirimkan respon error
    }
} else {
    echo "error"; // Jika request tidak valid
}

$conn->close();
?>
