<?php
if (isset($_POST['roda'])) {
    $jumlah_roda = (int)$_POST['roda'];

    switch ($jumlah_roda) {
        case 2:
            $hasil = "Kendaraan: Sepeda Motor";
            break;
        case 3:
            $hasil = "Kendaraan: Bajaj";
            break;
        case 4:
            $hasil = "Kendaraan: Mobil";
            break;
        case 6:
            $hasil = "Kendaraan: Truk Kecil";
            break;
        case 18:
            $hasil = "Kendaraan: Truk Besar";
            break;
        default:
            $hasil = "Jenis kendaraan dengan $jumlah_roda roda tidak diketahui";
            break;
    }

    echo "<p><strong>Output:</strong> $hasil</p>";
}
?>

<form method="post">
    <label>Jumlah Roda:</label><br>
    <input type="number" name="roda" min="1" required>
    <button type="submit">Jalankan</button>
</form>