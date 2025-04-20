<?php
    require("ip.php");
    require("db.php");
      $sql = "SELECT * FROM articles ORDER BY date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $title = htmlspecialchars($row['title']);
              $id = (int)$row['id'];
              echo "<a href='view.php?id=$id'>&bull; $title</a>";
          }
      } else {
          echo "<p>No posts!</p>";
      }
?>
