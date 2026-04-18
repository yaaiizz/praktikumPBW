<?php include 'header.php'; ?>

<?php
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 'kendaraan';

$allowed = ['kendaraan', 'genap', 'hewan', 'genap_ganjil'];

if (in_array($halaman, $allowed)) {
    include $halaman . '.php';
} else {
    echo "Halaman tidak ditemukan.";
}
?>

</body>
</html>