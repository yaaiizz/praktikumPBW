<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi dan sanitasi input
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $no_telpon = trim($_POST['no_telpon'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    // Validasi data tidak boleh kosong
    if (empty($nama) || empty($email) || empty($no_telpon) || empty($alamat)) {
        header("Location: form_daftar_pelanggan.php?error=Semua field harus diisi!");
        exit;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: form_daftar_pelanggan.php?error=Format email tidak valid!");
        exit;
    }

    // Cek apakah email sudah terdaftar
    $stmt = $conn->prepare("SELECT ID FROM Pelanggan WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: form_daftar_pelanggan.php?error=Email sudah terdaftar!");
        $stmt->close();
        exit;
    }
    $stmt->close();

    // Insert data pelanggan baru
    $stmt = $conn->prepare("INSERT INTO pelanggan (Nama, Email, Telepon, Alamat) VALUES (?, ?, ?, ?)");
    
    if (!$stmt) {
        header("Location: form_daftar_pelanggan.php?error=Error: " . $conn->error);
        exit;
    }

    $stmt->bind_param("ssss", $nama, $email, $no_telpon, $alamat);

    if ($stmt->execute()) {
        $pelanggan_id = $conn->insert_id;
        $message = "Pelanggan berhasil didaftarkan dengan ID: $pelanggan_id";
        header("Location: form_daftar_pelanggan.php?message=" . urlencode($message));
    } else {
        header("Location: form_daftar_pelanggan.php?error=Error: " . $stmt->error);
    }

    $stmt->close();
    exit;
}

// Jika bukan POST request, redirect ke form
header("Location: form_daftar_pelanggan.php");
exit;
?>
