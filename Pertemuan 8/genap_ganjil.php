<?php
if (isset($_POST['angka'])) {
    $angka = (int)$_POST['angka'];
    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    echo "<p><strong>Output:</strong> Angka $angka adalah: $hasil</p>";
}
?>

<form method="post">
    <label>Masukkan Angka:</label><br>
    <input type="number" name="angka" required>
    <button type="submit">Jalankan</button>
</form>