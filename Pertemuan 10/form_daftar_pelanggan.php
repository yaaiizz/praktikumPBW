<?php
include 'koneksi_db.php';
include 'nav.php';
include 'proteksi.php';
// Ambil daftar pelanggan untuk ditampilkan
$result = $conn->query("SELECT ID, Nama, Email,Telepon, Alamat FROM Pelanggan ORDER BY ID ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Pelanggan</title>
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Pelanggan Baru</h2>

        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Pendaftaran Pelanggan</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_daftar_pelanggan.php">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelanggan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan nama pelanggan">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan email">
                            </div>

                            <div class="mb-3">
                                <label for="no_telpon" class="form-label">No. Telepon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_telpon" name="no_telpon" required placeholder="Masukkan nomor telepon">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required placeholder="Masukkan alamat lengkap"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Daftar Pelanggan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Daftar Pelanggan Terdaftar</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telpon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()):
                                    ?>
                                        <tr>
                                            <td><strong><?= $no++ ?></strong></td>
                                            <td><?= htmlspecialchars($row['Nama']) ?></td>
                                            <td><?= htmlspecialchars($row['Email']) ?></td>
                                            <td><?= htmlspecialchars($row['Telepon']) ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="bottom: 10px; left: 10px;">
            <a href="index.php" class="btn btn-secondary">Kembali ke Main Menu</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>