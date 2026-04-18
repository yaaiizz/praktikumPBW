<!DOCTYPE html>
<html>
<head>
    <title>Latihan POST</title>
</head>
<body>

<h2>Input Nilai Mahasiswa</h2>

<form method="POST">
    Nama: <input type="text" name="nama"><br><br>
    NPM: <input type="text" name="nim"><br><br>
    Nilai: <input type="number" name="nilai"><br><br>

    <button type="submit" name="proses">Proses</button>
</form>

<?php
if(isset($_POST['proses'])){
    $nama = $_POST['nama'];
    $npm = $_POST['nim'];
    $nilai = $_POST['nilai'];

    echo "<h3>Hasil:</h3>";
    echo "Nama: $nama <br>";
    echo "NPM: $npm <br>";
    echo "Nilai: $nilai <br>";

    if($nilai >= 85){
        echo "Grade: A (Sangat Baik)";
    } elseif($nilai >= 70){
        echo "Grade: B (Baik)";
    } elseif($nilai >= 60){
        echo "Grade: C (Cukup)";
    } else {
        echo "Grade: D (Tidak Lulus)";
    }
}
?>

</body>
</html>