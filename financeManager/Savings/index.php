<?php
include "config.php"; // Koneksi database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tabungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Daftar Tabungan</h3>

    <!-- Notifikasi -->
    <?php
    if (isset($_GET['successMsg'])) {
        echo '<div class="alert alert-success">' . htmlspecialchars($_GET['successMsg']) . '</div>';
    }
    if (isset($_GET['errMsg'])) {
        echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['errMsg']) . '</div>';
    }
    ?>

    <!-- Tabel Tabungan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Tabungan</th>
                <th>Jumlah Terkumpul</th>
                <th>Target Tabungan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM savings";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['amount_saved']}</td>
                    <td>{$row['target_amount']}</td>
                    <td>
                        <a href='delete.php?id=<?$row['id'] ?>' class='btn btn-danger' onclick='return confirm("Apakah Anda yakin ingin menghapus tabungan ini?");'>Hapus</a>
                    </td>
                </tr>";
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
