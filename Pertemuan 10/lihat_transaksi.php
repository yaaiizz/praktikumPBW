<?php
include 'koneksi_db.php';
include 'proteksi.php';
$query = "
SELECT Pesanan.ID AS Pesanan_ID, Pelanggan.Nama AS Nama_Pelanggan, Pesanan.Tanggal_Pesanan,
Pesanan.Total_Harga, IFNULL(SUM(detail_pesanan.Kuantitas), 0) AS Total_Buku
FROM pesanan
JOIN pelanggan ON pesanan.Pelanggan_ID = pelanggan.ID
LEFT JOIN detail_pesanan ON pesanan.ID = detail_pesanan.Pesanan_ID
GROUP BY pesanan.ID
";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Pesanan</title>
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="container mt-4">
        <h2>Daftar Pesanan</h2>


        <!-- Tabel Daftar Pesanan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                    <th>Jumlah Buku</th>
                </tr>

            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>

                        <td><?= $row['Pesanan_ID'] ?></td>
                        <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                        <td><?= $row['Tanggal_Pesanan'] ?></td>
                        <td>Rp<?= number_format($row['Total_Harga'], 2) ?></td>
                        <td><?= $row['Total_Buku'] ?></td>
                    </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="position-fixed bottom-0 start-0 m-3">
        <a href="index.php" class="btn btn-secondary">Kembali ke Main Menu</a>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/j
s/bootstrap.bundle.min.js"></script>
</body>

</html>