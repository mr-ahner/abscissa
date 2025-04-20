<?php
require ("db.php");
//require("ip.php"); not required

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
 


      <h2><?php $title  ?></h2>
      <?php
      $id = $_GET['id'];

        $sql = "SELECT * FROM articles WHERE id = $id LIMIT 1";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $title = htmlspecialchars($row['title']);
            $username = htmlspecialchars($row['username']);
            $date = htmlspecialchars($row['date']);
            $article = nl2br(htmlspecialchars($row['content'])); 
        
            echo ("<h1>$title</h1>");
            echo ("<p>$username</p>");
            echo ("<p>$article</p>");
            echo ("<small>$date</small>");

        } 
        
        }else {
            echo "not a true id";
        }
      ?>
