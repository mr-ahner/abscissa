<?php
//abscissa software
require('ip.php');
require('db.php');
function sendarticle($conn) {
    $content = $_POST['content'];
    //$username = $_SESSION['username'];
    $username = "tim";
    $title = $_POST['title'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    $stmt= $conn->prepare("INSERT INTO articles (content, username, date, title, ip) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $content, $username, $date, $title, $ip);
    $stmt->execute();
    header("Location: index.php");
    $stmt->close();
    $conn->close();
    //ssisi
}
//CREATE TABLE articles (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    content TEXT NOT NULL,
//    username VARCHAR(255) NOT NULL,
//    date DATETIME NOT NULL,
//    title VARCHAR(255) NOT NULL,
//    ip VARCHAR(45) NOT NULL
//);

sendarticle($conn);
?>