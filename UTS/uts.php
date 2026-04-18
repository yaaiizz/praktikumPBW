<?php
define('PAJAK', 0.15);
define('BIAYA_PRIORITAS', 10000);

$harga_barang = array(
    'Pulpen' => 15000,
    'Pensil' => 12000,
    'Penghapus' => 5000
);

$nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
$nim = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$layanan = isset($_POST['layanan']) ? htmlspecialchars($_POST['layanan']) : '';
$barang = isset($_POST['barang']) ? $_POST['barang'] : array();

$daftar_item = array();
$subtotal = 0;

foreach ($harga_barang as $nama_barang => $harga) {
    $nama_qty = 'qty_' . str_replace(' ', '_', strtolower($nama_barang));
    $jumlah = isset($_POST[$nama_qty]) ? intval($_POST[$nama_qty]) : 0;
    
    if (in_array($nama_barang, $barang) && $jumlah > 0) {
        $total_item = $jumlah * $harga;
        $subtotal += $total_item;
        
        $daftar_item[] = array(
            'nama' => $nama_barang,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'total' => $total_item
        );
    }
}

$pajak = $subtotal * PAJAK;

$biaya_layanan = 0;
if ($layanan == 'Reguler') {
    $biaya_layanan = 0;
} elseif ($layanan == 'Prioritas') {
    $biaya_layanan = BIAYA_PRIORITAS;
}

$total_akhir = $subtotal + $pajak + $biaya_layanan;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Hasil Pemesanan Alat Tulis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <h1>Hasil Pemesanan Alat Tulis</h1>
    
    <?php
    if (empty($nama) || empty($nim) || empty($email) || empty($layanan)) {
        echo "<p><strong>Error: Data belum lengkap!</strong></p>";
    } elseif (empty($daftar_item)) {
        echo "<p><strong>Error: Pilih minimal 1 barang!</strong></p>";
    } else {
        echo "<p><strong>Pesanan berhasil didaftarkan</strong></p>";
    }
    ?>
    
    <h2>Data Pemesan</h2>
    <table border="1">
        <tr>
            <td><strong>Nama:</strong></td>
            <td><?php echo $nama ?: '-'; ?></td>
        </tr>
        <tr>
            <td><strong>NIM:</strong></td>
            <td><?php echo $nim ?: '-'; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $email ?: '-'; ?></td>
        </tr>
        <tr>
            <td><strong>Jenis Layanan:</strong></td>
            <td><?php echo $layanan ?: '-'; ?></td>
        </tr>
    </table>
    
    <?php if (!empty($daftar_item)) { ?>
    
    <h2>Daftar Item</h2>
    <table border="1">
        <tr>
            <th>Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        foreach ($daftar_item as $item) {
            echo "<tr>";
            echo "<td>{$item['nama']}</td>";
            echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
            echo "<td>{$item['jumlah']}</td>";
            echo "<td>Rp " . number_format($item['total'], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <h2>Ringkasan Pembayaran</h2>
    <table border="1">
        <tr>
            <td><strong>Subtotal:</strong></td>
            <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td><strong>Pajak (15%):</strong></td>
            <td>Rp <?php echo number_format($pajak, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td><strong>Biaya Layanan:</strong></td>
            <td>Rp <?php echo number_format($biaya_layanan, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td><strong>Total Akhir:</strong></td>
            <td><strong>Rp <?php echo number_format($total_akhir, 0, ',', '.'); ?></strong></td>
        </tr>
    </table>
    
    <?php } ?>
    
        <img src="https://media.giphy.com/media/v1.Y2lkPWVjZjA1ZTQ3YXo5cm9iNGNld2QwZWRia211bjM0YnhydmxqdmtxNDRieXlwdjN2eiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/kU2entve2ala0kOGMG/giphy.gif" alt="gif" width="300" height="200">

    <br>
    <a href="UTS.html">Kembali ke Form</a>
    <a href
    <button onclick="window.print();">Cetak</button>
</body>
</html>

