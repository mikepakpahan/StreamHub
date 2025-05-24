<?php
session_start();

// Cek jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
</head>
<body>

<header>
    <img src="../Assets/logo-admin.png" alt="Streamhub">Admin
</header>

<div class="container py-5">
    <!-- Form Tambah Film -->
    <div class="card mb-5" style="background-color: #121212; color: #ffffff; border-radius: 10px;">
        <div class="card-body">
            <form action="add_movie.php" method="POST">
                <h2 class="mb-4" style="color: #ff9900;">Tambah Film</h2>
                <div class="mb-3">
                    <label for="judul" class="form-label" style="color: #ffffff;">Judul Film:</label>
                    <input type="text" class="form-control" id="judul" name="judul" style="background-color: #1c1c1c; color: #ffffff; border: none;" required>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label" style="color: #ffffff;">Tahun Rilis:</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" style="background-color: #1c1c1c; color: #ffffff; border: none;" required>
                </div>
                <div class="mb-3">
                    <label for="sinopsis" class="form-label" style="color: #ffffff;">Sinopsis:</label>
                    <textarea id="sinopsis" class="form-control" name="sinopsis" rows="4" style="background-color: #1c1c1c; color: #ffffff; border: none;" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="urlTrailer" class="form-label" style="color: #ffffff;">URL Film:</label>
                    <input type="text" class="form-control" id="urlTrailer" name="urlTrailer" style="background-color: #1c1c1c; color: #ffffff; border: none;" required>
                </div>
                <div class="mb-3">
                    <label for="urlThumbnail" class="form-label" style="color: #ffffff;">URL Thumbnail:</label>
                    <input type="text" class="form-control" id="urlThumbnail" name="urlThumbnail" style="background-color: #1c1c1c; color: #ffffff; border: none;" required>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #ff9900; border: none;">Tambah Film</button>
            </form>
        </div>
    </div>


    <!-- Daftar Film -->
    <h2 style="color: white;">Daftar Film</h2>
    <div class="row">
        <div class="movie-list" id="movie-list">
            <?php include 'movies.php'; ?>
        </div>
    </div>
    <!-- Logout -->
    <div class="logout">
        <form action="logout.php" method="POST">
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </div>
    

    <!-- Feedback Customer -->
    <h2 class="mt-5" style="color: white">Feedback Customer</h2>
    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
        <?php include 'feedback_list.php';?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[action='add_movie.php']");
    
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah form melakukan submit biasa

        // Ambil data dari form
        const formData = new FormData(form);

        // Kirim data ke add_movie.php menggunakan fetch
        fetch("add_movie.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert("Film berhasil ditambahkan!");
                form.reset(); // Mengosongkan form
                reloadMovies(); // Memuat ulang daftar film
            } else {
                alert("Gagal menambahkan film. Coba lagi.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan saat menambahkan film.");
        });
    });
});

// Fungsi untuk menghapus film
function deleteMovie(movieId) {
    if (confirm("Apakah Anda yakin ingin menghapus film ini?")) {
        fetch('delete_movie.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + movieId
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert("Film berhasil dihapus!");
                reloadMovies(); // Memuat ulang daftar film
            } else {
                alert("Gagal menghapus film.");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus film.');
        });
    }
}

// Fungsi untuk memuat ulang daftar film
function reloadMovies() {
    fetch('movies.php')
        .then(response => response.text())
        .then(html => {
            document.getElementById('movie-list').innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat ulang daftar film.');
        });
}

function deleteFeedback(feedbackId) {
    if (confirm("Apakah Anda yakin ingin menghapus feedback ini?")) {
        fetch("delete_feedback.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "id=" + feedbackId
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert("Feedback berhasil dihapus!");
                reloadFeedback(); // Memuat ulang tabel feedback
            } else {
                alert("Gagal menghapus feedback.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan saat menghapus feedback.");
        });
    }
}

// Fungsi untuk memuat ulang tabel feedback
function reloadFeedback() {
    fetch("feedback_list.php")
        .then(response => response.text())
        .then(html => {
            document.querySelector("table tbody").innerHTML = html;
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Gagal memuat ulang feedback.");
        });
}

reloadFeedback();
setInterval(reloadFeedback, 5000);


</script>
</body>
</html>
