<?php
session_start();
include 'config.php'; // Sambungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari username di database
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verifikasi password menggunakan password_verify()
        if (password_verify($password, $row['password'])) {
            // Login berhasil, set session
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect ke dashboard admin
            exit;
        } else {
            // Password salah
            echo "<p style='color: red; text-align: center;'>Password salah!</p>";
        }
    } else {
        // Username tidak ditemukan
        echo "<p style='color: red; text-align: center;'>Username tidak ditemukan!</p>";
    }

    $stmt->close();
}

$conn->close();
?>





<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Streamhub</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet" />
</head>
<body style="background-color: #121212;">

<div class="container">
    <div class="login-card">
        <h2 class="login-title">Login Admin</h2>
        
        <!-- Form Login -->
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username" style="color: white;">Username</label>
                <input type="text" id="username" name="username" required style="background-color: #1c1c1c; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px;">
            </div>
            <div class="input-group">
                <label for="password" style="color: white;">Password</label>
                <input type="password" id="password" name="password" required style="background-color: #1c1c1c; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px;">
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</div>

</body>
</html>
