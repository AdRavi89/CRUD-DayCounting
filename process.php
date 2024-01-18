<?php
// process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil nilai dari formulir
  $jenisWaktu = $_POST["jenisWaktu"];
  $tanggalTarget = $_POST["targetDate"];
  $jumlahHari = $_POST["jumlahHari"];
  $note = $_POST["note"];

  if ($jenisWaktu === 'datePicker') {
    // Jika jenis input adalah 'datePicker', gunakan tanggal target yang dimasukkan
    $tanggalTujuan = $tanggalTarget;
  } elseif ($jenisWaktu === 'estimasi') {
    // Jika jenis input adalah 'estimasi', gunakan jumlah hari yang dimasukkan
    $tanggalTujuan = date("Y-m-d", strtotime("+{$jumlahHari} days"));
  }

  // Selanjutnya, simpan $tanggalTujuan ke dalam database bersama dengan informasi lainnya.

  // Simpan data ke dalam database
 $conn = new mysqli("localhost", "root", "", "ex_crud_brg2");

  // Memeriksa koneksi
  if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
  }

  // Menyimpan data ke dalam tabel hitung_hari
  $sql = "INSERT INTO hitung_hari (jenis_input, tanggal_target, jumlah_hari, note) VALUES ('$jenisWaktu', '$tanggalTujuan', '$jumlahHari', '$note')";

  if ($conn->query($sql) === TRUE) {
    // Data berhasil disimpan, redirect ke index.php setelah 3 detik
    echo "<script>
            setTimeout(function() {
              window.location.href = 'index.php';
            }, 3000);
          </script>";
    echo "Data berhasil disimpan. Redirecting...";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Menutup koneksi
  $conn->close();
}
?>
