<?php
include 'config.php'; 

$sql = "SELECT * FROM movies ORDER BY title ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan film
    while($row = $result->fetch_assoc()) {
        echo "<div class='movie-card' style='position: relative; overflow: hidden;'>";
        
        // Menambahkan path dasar ke thumbnail
        $thumbnailPath = 'http://localhost/films/Thumbnails/' . $row['thumbnail'];
        
        echo "<img src='" . $thumbnailPath . "' alt='" . $row['title'] . "' class='movie-thumbnail' style='width: 100%; height: auto;' />";  
        
        echo "<div class='movie-info' style='padding: 10px;'>";
        echo "<h3 class='movie-title' style='color: #fff;'>" . $row['title'] . "</h3>";
        echo "<p class='movie-year' style='color: #aaa;'>" . $row['year'] . "</p>";
        echo "</div>";
        
        echo '<button class="delete-button" onclick="deleteMovie(' . $row["id"] . ')">Delete</button>';
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p>No movies found in the database.</p>";
}

$conn->close();
?>
