<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Query untuk menyimpan feedback
    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Success"; // Mengirimkan pesan sukses
    } else {
        echo "Error: " . $conn->error; // Jika ada error, kirim pesan error
    }
}

$conn->close();
?>
