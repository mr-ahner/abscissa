<?php
//abscissa software
//ability to upload a shipwreck with a article about it, title and image, username, and date. Currently, let's just do title, article, and date. and basic username
//style it

$sql = "SELECT * FROM articles ORDER BY date DESC";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    $username = htmlspecialchars($row['username']);
    echo htmlspecialchars("<h1>" . $row['title'] . "</h1>");
    echo htmlspecialchars("<p>" . $row['username'] . "</p>");
    echo htmlspecialchars("<small>$username posted on: " . $row['date'] . "</small>");
    echo "<hr>";

}
?>