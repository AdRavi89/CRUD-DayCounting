<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Data - CRUD Hitung Hari</title>
  <!-- Tambahkan pautan CSS Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

  <div class="container mt-5">
    <h1 class="mb-4">Day Counting Application</h1>
    <!-- Tombol Menuju halaman tambah.php -->
    <a href="tambah.php" class="btn btn-success mb-3">Tambah Data Baru</a>
    <hr>

    <?php
    // Mengambil data dari database
    $conn = new mysqli("localhost", "root", "", "ex_crud_brg2");

    // Memeriksa koneksi
    if ($conn->connect_error) {
      die("Koneksi Gagal: " . $conn->connect_error);
    }

    // Mengambil data dari tabel hitung_hari
    $sql = "SELECT * FROM hitung_hari";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Menampilkan data dalam tabel
      echo "<table class='table'>";
      echo "<thead><tr><th>Tanggal Input</th><th>Tanggal Tujuan</th><th>Estimasi Hari</th><th>Note</th><th>Hitungan Mundur</th><th>Aksi</th></tr></thead><tbody>";

      while ($row = $result->fetch_assoc()) {
        $tanggalInput = date("Y-m-d [ H:i:s ]", strtotime($row["tanggal_input"]));
        $tanggalTujuan = ($row["jenis_input"] === 'jumlahHari') ? date("Y-m-d", strtotime("+{$row['jumlah_hari']} days", strtotime($row["tanggal_target"]))) : $row["tanggal_target"];
        $estimasiHari = ($row["jenis_input"] === 'jumlahHari') ? $row['jumlah_hari'] : hitungSelisihHari($tanggalTujuan);
        $note = $row["note"];
        $hitunganMundur = hitungMundurString($tanggalTujuan);

        echo "<tr>
                <td>$tanggalInput</td>
                <td>$tanggalTujuan</td>
                <td>$estimasiHari hari</td>
                <td>$note</td>
                <td>$hitunganMundur</td>
                <td>
                    <a href='edit.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                    <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                </td>
              </tr>";
      }

      echo "</tbody></table>";
    } else {
      echo "Tidak ada data.";
    }

    // Menutup koneksi
    $conn->close();

    function hitungSelisihHari($targetDate) {
      $currentDate = new DateTime();
      $targetDateObj = new DateTime($targetDate);
      $interval = $currentDate->diff($targetDateObj);
      return $interval->days;
    }

    function hitungMundurString($targetDate) {
      $currentDate = new DateTime('now', new DateTimeZone('UTC'));
      $targetDateObj = new DateTime($targetDate, new DateTimeZone('UTC'));
      $interval = $currentDate->diff($targetDateObj);

      $hitunganMundur = "";
      $hitunganMundur .= ($interval->y > 0) ? $interval->y . " tahun, " : "";
      $hitunganMundur .= ($interval->m > 0) ? $interval->m . " bulan, " : "";
      $hitunganMundur .= ($interval->d > 0) ? $interval->d . " hari, " : "";
      $hitunganMundur .= ($interval->h > 0) ? $interval->h . " jam, " : "";
      $hitunganMundur .= ($interval->i > 0) ? $interval->i . " menit, " : "";
      $hitunganMundur .= ($interval->s > 0) ? $interval->s . " detik" : "";

      return $hitunganMundur;
    }
    ?>

  </div>

  <!-- Tambahkan pautan JavaScript Bootstrap dan jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ezvqgJgKAlWMBDoYSjx7d1thF2Vpgz63wHNwiI9XDAzmY6P4P+gU7PiIjlFzN+5g" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-oaZRJinxzLlHA9i+Tz47vUZbq2Jb6AuB/jFUxZ4xHAxIEnh7U2U1cdKs5Z5srRwM" crossorigin="anonymous"></script>
</body>
</html>
