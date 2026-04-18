<!DOCTYPE html>
<html>
<head>
    <title>Diskon Pembayaran Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form {
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"] {
            width: 300px;
            padding: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 8px 16px;
        }
        .hasil {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            width: fit-content;
        }
    </style>
</head>
<body>

<h2>Form Diskon Pembayaran UKT Mahasiswa</h2>
<form method="post">
    <label>NPM:</label>
    <input type="text" name="npm">

    <label>Nama:</label>
    <input type="text" name="nama">

    <label>Prodi:</label>
    <input type="text" name="prodi">

    <label>Semester:</label>
    <input type="number" name="semester" required>

    <label>Biaya UKT (Rp):</label>
    <input type="number" name="ukt" required>

    <input type="submit" name="submit" value="Hitung Diskon">
</form>

<?php
if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];

    // Logika diskon
    $diskon = 0;
    if ($ukt >= 5000000) {
        $diskon = 10;
        if ($semester > 8) {
            $diskon += 5;
        }
    }

    $potongan = ($diskon / 100) * $ukt;
    $total_bayar = $ukt - $potongan;

    echo "<div class='hasil'>";
    echo "<h3>Hasil Perhitungan:</h3>";
    echo "NPM       : $npm<br>";
    echo "Nama      : $nama<br>";
    echo "Prodi     : $prodi<br>";
    echo "Semester  : $semester<br>";
    echo "Biaya UKT : Rp " . number_format($ukt, 0, ',', '.') . "<br>";
    echo "Diskon    : $diskon%<br>";
    echo "Potongan  : Rp " . number_format($potongan, 0, ',', '.') . "<br>";
    echo "Total Bayar : Rp " . number_format($total_bayar, 0, ',', '.');
    echo "</div>";
}
?>

</body>
</html>
