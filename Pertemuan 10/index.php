<?php include 'koneksi_db.php'; ?>
<?php include 'nav.php'; ?>

<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" .
        urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h2 class="mb-4">Main Menu</h2>

        <div class="row g-3">

            <div class="col-md-4">
                <a href="daftar_buku.php" class="btn btn-primary w-100">Daftar Buku</a>
            </div>

            <div class="col-md-4">
                <a href="tambah_buku.php" class="btn btn-success w-100">Tambah Buku</a>
            </div>

            <div class="col-md-4">
                <a href="form_daftar_pelanggan.php" class="btn btn-secondary w-100">Daftar Pelanggan</a>
            </div>

            <div class="col-md-4">
                <a href="transaksi.php" class="btn btn-warning w-100">Buat Pesanan</a>
            </div>

            <div class="col-md-4">
                <a href="lihat_transaksi.php" class="btn btn-dark w-100">Lihat Pesanan</a>
            </div>

        </div>

        <!-- Statistik sederhana -->
        <div class="mt-5">
            <h5>Ringkasan</h5>
            <?php
            $buku = $conn->query("SELECT COUNT(*) as total FROM Buku")->fetch_assoc()['total'];
            $pelanggan = $conn->query("SELECT COUNT(*) as total FROM Pelanggan")->fetch_assoc()['total'];
            $pesanan = $conn->query("SELECT COUNT(*) as total FROM Pesanan")->fetch_assoc()['total'];
            ?>

            <p>Total Buku: <strong><?= $buku ?></strong></p>
            <p>Total Pelanggan: <strong><?= $pelanggan ?></strong></p>
            <p>Total Pesanan: <strong><?= $pesanan ?></strong></p>
        </div>
    </div>

</body>

</html>