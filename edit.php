<?php
// edit.php

// Pastikan mendapatkan ID dari URL atau formulir sebelum mengakses database
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Lakukan koneksi ke database
  $conn = new mysqli("localhost", "root", "", "ex_crud_brg2");

  // Periksa koneksi
  if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
  }

  // Ambil data yang ingin diedit
  $sql = "SELECT * FROM hitung_hari WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Proses form update ketika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $jenisWaktu = $_POST["jenisWaktu"];
      $tanggalTarget = $_POST["targetDate"];
      $jumlahHari = $_POST["jumlahHari"];
      $note = $_POST["note"];

      // Update data ke dalam tabel hitung_hari
      $updateSql = "UPDATE hitung_hari SET jenis_input='$jenisWaktu', tanggal_target='$tanggalTarget', jumlah_hari='$jumlahHari', note='$note' WHERE id=$id";

      if ($conn->query($updateSql) === TRUE) {
        // Data berhasil diupdate, redirect ke index.php setelah 3 detik
    echo "<script>
            alert('Data berhasil diupdate');
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 3000);
          </script>";
} else {
    echo "Error updating record: " . $conn->error;
}
    }

    // Tutup koneksi
    $conn->close();
  } else {
    echo "Data not found.";
  }
} else {
  echo "ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update - Day Counting</title>
  <!-- Tambahkan pautan CSS Bootstrap -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"></head>
</head>
<body>

  <div class="container mt-5">
    <h1 class="mb-4">Update - Day Counting</h1>

    <!-- Formulir edit data -->
    <form action="" method="post">
      <div class="mb-3">
        <label for="jenisWaktu" class="form-label">Pilih Jenis Waktu:</label>
        <select class="form-select" id="jenisWaktu" name="jenisWaktu" required>
          <option value="datePicker" <?php echo ($row['jenis_input'] === 'datePicker') ? 'selected' : ''; ?>>Estimasi Waktu (Menggunakan Date)</option>
          <option value="estimasi" <?php echo ($row['jenis_input'] === 'estimasi') ? 'selected' : ''; ?>>Estimasi Waktu (Jumlah Hari)</option>
        </select>
      </div>

      <div id="inputContainer">
        <label for="targetDate" class="form-label">Masukkan Tanggal Target:</label>
        <input class="form-control input-field" type="date" id="targetDate" name="targetDate" value="<?php echo $row['tanggal_target']; ?>" required>
      </div>

      <div id="jumlahHariContainer" style="display:none;">
        <label for="jumlahHari" class="form-label">Masukkan Jumlah Hari:</label>
        <input class="form-control input-field" type="number" id="jumlahHari" name="jumlahHari" placeholder="Masukkan jumlah hari" value="<?php echo $row['jumlah_hari']; ?>">
      </div>

      <div class="mb-3">
        <label for="note" class="form-label">Note (Deskripsi Waktu):</label>
        <textarea class="form-control" id="note" name="note" rows="3" required><?php echo $row['note']; ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
  </div>

  <!-- Tambahkan pautan JavaScript Bootstrap dan jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ezvqgJgKAlWMBDoYSjx7d1thF2Vpgz63wHNwiI9XDAzmY6P4P+gU7PiIjlFzN+5g" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-oaZRJinxzLlHA9i+Tz47vUZbq2Jb6AuB/jFUxZ4xHAxIEnh7U2U1cdKs5Z5srRwM" crossorigin="anonymous"></script>

  <script>
    // ... (fungsi JavaScript lainnya tetap sama) ...
  </script>
</body>
</html>
