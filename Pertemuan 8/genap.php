<?php
if (isset($_POST['dari']) && isset($_POST['sampai'])) {
    $dari   = (int)$_POST['dari'];
    $sampai = (int)$_POST['sampai'];

    echo "<p><strong>Bilangan genap dari $dari sampai $sampai:</strong></p>";
    for ($i = $dari; $i <= $sampai; $i++) {
        if ($i % 2 == 0) {
            echo "$i<br>";
        }
    }
}
?>

<form method="post">
    <label>Dari:</label><br>
    <input type="number" name="dari" value="2" required><br><br>
    <label>Sampai:</label><br>
    <input type="number" name="sampai" value="10" required><br><br>
    <button type="submit">Jalankan</button>
</form>