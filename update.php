<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $game = $conn->query("SELECT * FROM games WHERE id = $id")->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];

    $stmt = $conn->prepare("UPDATE games SET title=?, genre=?, release_date=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $genre, $release_date, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h3>Edit Game</h3>
        <form method="POST">
            <input type="text" name="title" value="<?= $game['title']; ?>" class="form-control mb-2" required>
            <input type="text" name="genre" value="<?= $game['genre']; ?>" class="form-control mb-2" required>
            <input type="date" name="release_date" value="<?= $game['release_date']; ?>" class="form-control mb-2" required>
            <button class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
