<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Validasi ID sebagai angka

    $sql = "DELETE FROM movies WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Mengirimkan respon sukses
    } else {
        echo "error"; // Mengirimkan respon error
    }
} else {
    echo "error"; // Jika request tidak valid
}

$conn->close();
?>
