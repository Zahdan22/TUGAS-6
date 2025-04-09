<?php
include 'db.php';

$title = $_POST['title'];
$genre = $_POST['genre'];
$release_date = $_POST['release_date'];

$stmt = $conn->prepare("INSERT INTO games (title, genre, release_date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $genre, $release_date);
$stmt->execute();
$stmt->close();

header("Location: index.php");
?>
