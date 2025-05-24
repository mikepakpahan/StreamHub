<?php
include 'config.php'; // Menyertakan koneksi ke database

// Ambil ID film dari URL
$movie_id = $_GET['id'];

// Query untuk mengambil informasi film berdasarkan ID
$sql = "SELECT * FROM movies WHERE id = $movie_id";
$result = $conn->query($sql);

// Jika film ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Menampilkan halaman pemutar video
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>" . htmlspecialchars($row['title']) . "</title>
        <style>
            body {
                background-color: black;
                font-family: Arial, sans-serif;
            }
            
            .player-container {
                max-width: 1200px;
                margin: 40px auto;
                padding: 20px;
                background-color: #121212;
                border-radius: 10px;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.6);
            }

            .movie-title {
                color: #ff9900;
                text-align: center;
                font-size: 2rem;
                margin-bottom: 20px;
            }

            .movie-video {
                width: 100%;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            }

            .movie-synopsis {
                background-color: #1c1c1c;
                color: #fff;
                padding: 20px;
                margin-top: 30px;
                border-radius: 8px;
            }

            .movie-synopsis h2 {
                color: #ff9900;
            }

            .movie-synopsis p {
                font-size: 1rem;
                color: #ccc;
                line-height: 1.6;
            }

            @media (max-width: 768px) {
                .player-container {
                    padding: 15px;
                }

                .movie-title {
                    font-size: 1.5rem;
                }

                .movie-synopsis {
                    padding: 15px;
                }
            }
        </style>
    </head>
    <body>
        <div class='player-container'>
            <h1 class='movie-title'>" . htmlspecialchars($row['title']) . " (" . htmlspecialchars($row['year']) . ")</h1>
            <div class='video-player'>
                <video id='videoPlayer' class='movie-video' controls>
                    <source id='videoSource' src='http://localhost/films/dolby_opening.mp4' type='video/mp4'>
                    Your browser does not support the video tag.
                </video>
            </div>
            
            <div class='movie-synopsis'>
                <h2>Synopsis:</h2>
                <p>" . htmlspecialchars($row['synopsis']) . "</p>
            </div>
        </div>

        <script>
            const videoPlayer = document.getElementById('videoPlayer');
            const videoSource = document.getElementById('videoSource');

            // Video utama
            const mainVideoSrc = 'http://localhost/films/" . htmlspecialchars($row['video_path']) . "';

            // Event: Setelah video opening selesai
            videoPlayer.addEventListener('ended', () => {
                if (videoSource.src.endsWith('dolby_opening.mp4')) {
                    videoSource.src = mainVideoSrc; // Ganti sumber ke video utama
                    videoPlayer.load(); // Muat ulang video
                    videoPlayer.play(); // Lanjutkan pemutaran
                }
            });
        </script>
    </body>
    </html>";
} else {
    echo "<p>Movie not found.</p>";
}

$conn->close();
?>
