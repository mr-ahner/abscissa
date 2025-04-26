<?php
session_start();

if (!isset($_SESSION['tim'])) { // put your username here
    die("you are not tim");
}
require("db.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$content = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content'])) {
        $content = trim($_POST['content']);
        $sql = "UPDATE articles SET content = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("si", $content, $id);
            if ($stmt->execute()) {
                header("Location: view.php?id=$id");
                exit;
            } else {
                echo "Update failed: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Prepare failed: " . $conn->error;
        }
    }
} else {
    $sql = "SELECT content FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($content);
        $stmt->fetch();
        $stmt->close();
    }
}

$conn->close();
?>

<?php if (isset($_GET['saved'])): ?>
  <p style="color: green;">Saved EZ!</p>
<?php endif; ?>

<form action="edit.php?id=<?php echo $id; ?>" method="POST">
  <textarea name="content" rows="5" cols="40"><?php echo htmlspecialchars($content); ?></textarea><br>
  <button type="submit">Update</button>
</form>
