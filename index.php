<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>🎮 Game Catalog Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h2 class="mb-4">🎮 Game Catalog Manager</h2>

        <!-- Form Tambah Game -->
        <form action="insert.php" method="POST" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="title" class="form-control" placeholder="Game Title" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="genre" class="form-control" placeholder="Genre" required>
            </div>
            <div class="col-md-3">
                <input type="date" name="release_date" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100">Add Game</button>
            </div>
        </form>

        <!-- Tabel Game -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Game Title</th>
                    <th>Genre</th>
                    <th>Release Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM games ORDER BY id DESC");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['genre']; ?></td>
                    <td><?= $row['release_date']; ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
