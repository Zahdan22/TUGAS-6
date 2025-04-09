<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM games WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: index.php");
?>
