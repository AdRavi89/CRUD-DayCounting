<?php
// delete.php

// Pastikan mendapatkan ID dari URL sebelum mengakses database
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan koneksi ke database
    $conn = new mysqli("localhost", "root", "", "ex_crud_brg2");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }

    // Hapus data dari tabel hitung_hari
    $sql = "DELETE FROM hitung_hari WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Data berhasil dihapus, redirect ke index.php setelah 3 detik
        echo "<script>
                setTimeout(function() {
                  window.location.href = 'index.php';
                }, 3000);
              </script>";
        echo "Data berhasil dihapus. Redirecting...";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    echo "ID not provided.";
}
?>
