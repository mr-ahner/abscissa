<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//abscissa software
// require('ip.php'); this isn't needed, but it's here if you wnat :shrug:
require('db.php');
function sendarticle($conn) {
    if (isset($_POST['content'], $_POST['title'])) {
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');   
    //$username = $_SESSION['username'];
    $username = ""; // put your username here, I just put 'tim'
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
    $stmt= $conn->prepare("INSERT INTO articles (content, username, date, title, ip) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $content, $username, $date, $title, $ip);
     if ($stmt->execute()) {
            header("Location: index.php");
            exit; 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close(); 
    } else {
        if (!empty($_POST['content']) && !empty($_POST['title'])) {
        echo "Error: Please fill out all required fields.";
    }
    }

}
sendarticle($conn);
// sql I used.
//CREATE TABLE articles (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    content TEXT NOT NULL,
//    username VARCHAR(255) NOT NULL,
//    date DATETIME NOT NULL,
//    title VARCHAR(255) NOT NULL,
//    ip VARCHAR(45) NOT NULL
//);

date_default_timezone_set('America/New_York');

?>
<form method="post">
    <input type="text" name="title" required>
    <textarea name="content" required></textarea>
    <button type="submit">Submit</button>
</form>
