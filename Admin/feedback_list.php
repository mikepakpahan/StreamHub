<?php
include 'config.php';

$sql = "SELECT id, name, email, message, created_at FROM feedback ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='feedback-row' style='position: relative;'>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td style='position: absolute; right: 10px; display: none; border: none;' class='delete-feedback'>";
        echo "<button onclick='deleteFeedback(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Hapus</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada feedback tersedia.</td></tr>";
}

$conn->close();
?>
