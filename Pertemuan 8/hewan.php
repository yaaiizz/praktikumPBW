<?php
if (isset($_POST['hewan'])) {
    $input = trim($_POST['hewan']);
    $hewan = array_filter(array_map('trim', explode(',', $input)));

    echo "<p><strong>Daftar Nama Hewan:</strong></p>";
    foreach ($hewan as $index => $nama) {
        echo ($index + 1) . ". $nama<br>";
    }
}
?>

<form method="post">
    <label>Nama Hewan (pisahkan dengan koma):</label><br>
    <input type="text" name="hewan" placeholder="Kucing, Anjing, Kelinci" required>
    <button type="submit">Jalankan</button>
</form>