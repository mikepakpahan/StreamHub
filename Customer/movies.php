<?php
include 'config.php'; 

$sql = "SELECT * FROM movies ORDER BY title ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan film
    while($row = $result->fetch_assoc()) {
        echo "<div class='movie-card'>";
        echo "<a href='player.php?id=" . $row['id'] . "'>"; // Link ke player.php
        // Menambahkan path dasar ke thumbnail
        $thumbnailPath = 'http://localhost/films/Thumbnails/' . $row['thumbnail'];
        echo "<img src='" . $thumbnailPath . "' alt='" . $row['title'] . "' class='movie-thumbnail' />";
        echo "<div class='movie-info'>";
        echo "<h3 class='movie-title'>" . $row['title'] . "</h3>";
        echo "<p class='movie-year'>" . $row['year'] . "</p>";
        echo "</div>";
        echo "</a>"; // Menutup link
        echo "</div>";
    }
} else {
    echo "<p>No movies found in the database.</p>";
}

$conn->close();
?>
