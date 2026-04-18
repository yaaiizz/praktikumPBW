<!DOCTYPE html>
<html lang="id">
<head>
    <title>Perhitungan Toko</title>
    <style>
        .kotak-pembayaran {
            border: 2px solid black;
            padding: 20px;
            width: 500px;
            font-family: Arial, sans-serif;
        }
        hr {
            border: 0;
            border-top: 1px solid black;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="kotak-pembayaran">
    <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
    <hr>

    <?php
    define("PAJAK_PERSEN", 0.1);

    $daftar_barang = [
        "Keyboard" => 150000,
        "Mouse" => 50000,
        "Monitor" => 1500000
    ];

    $nama_barang = "Keyboard";
    $jumlah_beli = 2;
    $harga_satuan = $daftar_barang[$nama_barang];

    $total_sebelum_pajak = $harga_satuan * $jumlah_beli;
    $nominal_pajak = $total_sebelum_pajak * PAJAK_PERSEN;
    $total_bayar = $total_sebelum_pajak + $nominal_pajak;

    echo "Nama Barang: " . $nama_barang . "<br>";
    echo "Harga Satuan: Rp " . number_format($harga_satuan, 0, ',', '.') . "<br>";
    echo "Jumlah Beli: " . $jumlah_beli . "<br>";
    echo "Total Harga (Sebelum Pajak): Rp " . number_format($total_sebelum_pajak, 0, ',', '.') . "<br>";
    echo "Pajak (10%): Rp " . number_format($nominal_pajak, 0, ',', '.') . "<br>";
    echo "<b>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</b>";
    ?>
</div>

</body>
</html>